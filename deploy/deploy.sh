#!/bin/bash
# =============================================================================
# deploy.sh — Jalankan dari WSL di mesin developer
# Fungsi: Build assets, sync ke server, jalankan artisan commands
#
# Prerequisites di mesin developer:
#   - WSL dengan bash, rsync, ssh
#   - SSH key sudah terdaftar di server (ssh-copy-id)
#
# Usage:
#   bash deploy/deploy.sh
# =============================================================================

set -e

# ─── KONFIGURASI ─────────────────────────────────────────────────────────────
SERVER_HOST="157.173.218.181"
SERVER_USER="root"            # Ganti jika user SSH berbeda (ubuntu, admin, dll)
SERVER_PORT="22"              # Port SSH default
APP_DIR="/var/www/tapatupa"   # Path di server
PHP_VERSION="8.1"
# ─────────────────────────────────────────────────────────────────────────────

LOCAL_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

echo "============================================="
echo "  Tapatupa - Deploy Script"
echo "  Server  : ${SERVER_USER}@${SERVER_HOST}"
echo "  App Dir : ${APP_DIR}"
echo "============================================="

# ------------------------------------
# 1. Build Vite assets di lokal
# ------------------------------------
echo ""
echo "[1/6] Build Vite assets..."
cd "$LOCAL_DIR"

if [ ! -d "node_modules" ]; then
    echo "  Installing npm dependencies..."
    npm install --silent
fi

npm run build
echo "  Assets berhasil di-build ke public/build/"

# ------------------------------------
# 2. Sync file ke server via rsync
# ------------------------------------
echo ""
echo "[2/6] Sync file ke server..."

rsync -avz --progress \
    --exclude='.git/' \
    --exclude='node_modules/' \
    --exclude='.env' \
    --exclude='deploy/.env.production' \
    --exclude='storage/logs/*.log' \
    --exclude='storage/framework/cache/data/*' \
    --exclude='storage/framework/sessions/*' \
    --exclude='storage/framework/views/*.php' \
    --exclude='bootstrap/cache/*.php' \
    -e "ssh -p ${SERVER_PORT}" \
    "${LOCAL_DIR}/" \
    "${SERVER_USER}@${SERVER_HOST}:${APP_DIR}/"

echo "  File berhasil di-sync."

# ------------------------------------
# 3. Jalankan post-deploy commands di server
# ------------------------------------
echo ""
echo "[3/6] Menjalankan setup di server..."

ssh -p ${SERVER_PORT} "${SERVER_USER}@${SERVER_HOST}" bash <<REMOTE_SCRIPT
set -e
cd ${APP_DIR}

echo "  -> Setup .env production..."
if [ ! -f ".env" ]; then
    if [ -f "deploy/.env.production" ]; then
        cp deploy/.env.production .env
        echo "  .env dibuat dari template. EDIT PASSWORD DATABASE terlebih dahulu!"
    else
        echo "  ERROR: .env tidak ada! Upload manual ke ${APP_DIR}/.env"
        exit 1
    fi
fi

echo "  -> Composer install (no-dev)..."
composer install --no-dev --optimize-autoloader --no-interaction --quiet

echo "  -> Artisan key:generate (skip jika sudah ada)..."
grep -q "APP_KEY=base64:" .env || php artisan key:generate --force

echo "  -> Artisan storage:link..."
php artisan storage:link --force 2>/dev/null || true

echo "  -> Database migrate..."
php artisan migrate --force

echo "  -> Artisan optimize..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "  -> Set permissions..."
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo "  -> Restart PHP-FPM..."
sudo systemctl restart php${PHP_VERSION}-fpm

echo "  -> Reload Nginx..."
sudo nginx -t && sudo systemctl reload nginx

REMOTE_SCRIPT

# ------------------------------------
# 4. Cek koneksi ke aplikasi
# ------------------------------------
echo ""
echo "[4/6] Testing koneksi ke aplikasi..."
sleep 2
HTTP_STATUS=$(curl -s -o /dev/null -w "%{http_code}" "http://${SERVER_HOST}" --max-time 10 || echo "000")

if [ "$HTTP_STATUS" == "200" ] || [ "$HTTP_STATUS" == "302" ]; then
    echo "  Aplikasi berjalan! HTTP Status: ${HTTP_STATUS}"
else
    echo "  Peringatan: HTTP Status ${HTTP_STATUS} — cek error log di server:"
    echo "    ssh ${SERVER_USER}@${SERVER_HOST} 'tail -50 /var/log/nginx/tapatupa.error.log'"
fi

# ------------------------------------
# Done
# ------------------------------------
echo ""
echo "============================================="
echo "  DEPLOY SELESAI!"
echo "  URL: http://tapatupa.manoume.com"
echo "============================================="
