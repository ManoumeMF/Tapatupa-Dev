#!/bin/bash
# =============================================================================
# server-init.sh — Jalankan SEKALI di server (sebagai root atau sudo user)
# Target: Ubuntu 20.04 / 22.04 dengan Nginx sudah terinstall
# Usage: bash server-init.sh
# =============================================================================

set -e

APP_DIR="/var/www/tapatupa"
SERVER_USER="www-data"
PHP_VERSION="8.2"

echo "============================================="
echo "  Tapatupa - Server Initialization Script"
echo "============================================="

# ------------------------------------
# 1. Update & install dependencies
# ------------------------------------
echo "[1/8] Installing PHP ${PHP_VERSION} dan dependencies..."
apt-get update -qq
apt-get install -y -qq \
    php${PHP_VERSION} \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-mysql \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-bcmath \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-gd \
    php${PHP_VERSION}-tokenizer \
    php${PHP_VERSION}-fileinfo \
    unzip \
    git \
    curl

# ------------------------------------
# 2. Install Composer
# ------------------------------------
echo "[2/8] Installing Composer..."
if ! command -v composer &> /dev/null; then
    curl -sS https://getcomposer.org/installer | php
    mv composer.phar /usr/local/bin/composer
    chmod +x /usr/local/bin/composer
else
    echo "  Composer sudah terinstall: $(composer --version)"
fi

# ------------------------------------
# 3. Install Node.js (untuk build Vite assets)
# ------------------------------------
echo "[3/8] Installing Node.js 20..."
if ! command -v node &> /dev/null; then
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
    apt-get install -y nodejs
else
    echo "  Node.js sudah terinstall: $(node --version)"
fi

# ------------------------------------
# 4. Buat direktori aplikasi
# ------------------------------------
echo "[4/8] Membuat direktori aplikasi..."
mkdir -p ${APP_DIR}
chown -R $SUDO_USER:$SUDO_USER ${APP_DIR} 2>/dev/null || chown -R ubuntu:ubuntu ${APP_DIR} 2>/dev/null || true

# ------------------------------------
# 5. Konfigurasi Nginx
# ------------------------------------
echo "[5/8] Mengkonfigurasi Nginx..."
NGINX_CONF="/etc/nginx/sites-available/tapatupa.manoume.com"

# Copy nginx config (script ini harus dijalankan dari /var/www/tapatupa)
if [ -f "${APP_DIR}/deploy/nginx.conf" ]; then
    cp ${APP_DIR}/deploy/nginx.conf ${NGINX_CONF}
else
    echo "  PERINGATAN: deploy/nginx.conf tidak ditemukan, skip konfigurasi Nginx"
fi

# Aktifkan site
if [ -f "${NGINX_CONF}" ]; then
    ln -sf ${NGINX_CONF} /etc/nginx/sites-enabled/tapatupa.manoume.com
    # Nonaktifkan default site jika ada
    rm -f /etc/nginx/sites-enabled/default
    nginx -t && systemctl reload nginx
    echo "  Nginx dikonfigurasi dan di-reload."
fi

# ------------------------------------
# 6. Set permission storage & cache
# ------------------------------------
echo "[6/8] Setting permissions..."
if [ -d "${APP_DIR}" ]; then
    chown -R www-data:www-data ${APP_DIR}/storage ${APP_DIR}/bootstrap/cache
    chmod -R 775 ${APP_DIR}/storage ${APP_DIR}/bootstrap/cache
fi

# ------------------------------------
# 7. PHP-FPM configuration
# ------------------------------------
echo "[7/8] Konfigurasi PHP-FPM..."
PHP_FPM_CONF="/etc/php/${PHP_VERSION}/fpm/pool.d/tapatupa.conf"
cat > ${PHP_FPM_CONF} <<'EOF'
[tapatupa]
user = www-data
group = www-data
listen = /run/php/php8.1-fpm.sock
listen.owner = www-data
listen.group = www-data
pm = dynamic
pm.max_children = 10
pm.start_servers = 3
pm.min_spare_servers = 2
pm.max_spare_servers = 5
php_admin_value[upload_max_filesize] = 50M
php_admin_value[post_max_size] = 50M
php_admin_value[memory_limit] = 256M
php_admin_value[max_execution_time] = 60
EOF

systemctl restart php${PHP_VERSION}-fpm
echo "  PHP-FPM dikonfigurasi dan di-restart."

# ------------------------------------
# 8. Selesai
# ------------------------------------
echo ""
echo "============================================="
echo "  Server initialization SELESAI!"
echo "============================================="
echo ""
echo "  Langkah selanjutnya:"
echo "  1. Upload .env production ke: ${APP_DIR}/.env"
echo "     cp ${APP_DIR}/deploy/.env.production ${APP_DIR}/.env"
echo "     nano ${APP_DIR}/.env   # edit password database"
echo ""
echo "  2. Jalankan deploy.sh dari mesin developer"
echo "     bash deploy/deploy.sh"
echo ""
echo "  3. (Opsional) Setup SSL dengan Certbot:"
echo "     apt install certbot python3-certbot-nginx"
echo "     certbot --nginx -d tapatupa.manoume.com"
echo ""
