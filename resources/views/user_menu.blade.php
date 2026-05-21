<ul class="main-menu">
    <!-- Start::slide__category -->
    <li class="slide__category"><span class="category-name">Dashboard</span></li>
    <!-- End::slide__category -->

    <!-- Start::slide -->
    <li class="slide">
        <a href="{{ route('Dashboard.index') }}" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24"
                width="24px" fill="#5f6368">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z" />
                <path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3" />
            </svg>
            <span class="side-menu__label">Dashboards</span>
        </a>
    </li>
    <!-- End::slide -->

    <!-- Start::slide__category -->
    <li class="slide__category"><span class="category-name">Data Master</span></li>
    <!-- End::slide__category -->

    <!-- Start::slide -->
    <li class="slide has-sub">
        <a href="javascript:void(0);" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24"
                height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                <g>
                    <rect fill="none" height="24" width="24"></rect>
                </g>
                <g>
                    <g></g>
                    <g>
                        <path
                            d="M6.44,9.86L7.02,5H5.05L4.04,9.36c-0.1,0.42-0.01,0.84,0.25,1.17C4.43,10.71,4.73,11,5.23,11 C5.84,11,6.36,10.51,6.44,9.86z"
                            opacity=".3"></path>
                        <path
                            d="M9.71,11C10.45,11,11,10.41,11,9.69V5H9.04L8.49,9.52c-0.05,0.39,0.07,0.78,0.33,1.07 C9.05,10.85,9.37,11,9.71,11z"
                            opacity=".3"></path>
                        <path
                            d="M14.22,11c0.41,0,0.72-0.15,0.96-0.41c0.25-0.29,0.37-0.68,0.33-1.07L14.96,5H13v4.69 C13,10.41,13.55,11,14.22,11z"
                            opacity=".3"></path>
                        <path
                            d="M18.91,4.99L16.98,5l0.58,4.86c0.08,0.65,0.6,1.14,1.21,1.14c0.49,0,0.8-0.29,0.93-0.47 c0.26-0.33,0.35-0.76,0.25-1.17L18.91,4.99z"
                            opacity=".3"></path>
                        <path
                            d="M21.9,8.89l-1.05-4.37c-0.22-0.9-1-1.52-1.91-1.52H5.05C4.15,3,3.36,3.63,3.15,4.52L2.1,8.89 c-0.24,1.02-0.02,2.06,0.62,2.88C2.8,11.88,2.91,11.96,3,12.06V19c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2v-6.94 c0.09-0.09,0.2-0.18,0.28-0.28C21.92,10.96,22.15,9.91,21.9,8.89z M13,5h1.96l0.54,4.52c0.05,0.39-0.07,0.78-0.33,1.07 C14.95,10.85,14.63,11,14.22,11C13.55,11,13,10.41,13,9.69V5z M8.49,9.52L9.04,5H11v4.69C11,10.41,10.45,11,9.71,11 c-0.34,0-0.65-0.15-0.89-0.41C8.57,10.3,8.45,9.91,8.49,9.52z M4.29,10.53c-0.26-0.33-0.35-0.76-0.25-1.17L5.05,5h1.97L6.44,9.86 C6.36,10.51,5.84,11,5.23,11C4.73,11,4.43,10.71,4.29,10.53z M19,19H5v-6.03C5.08,12.98,5.15,13,5.23,13 c0.87,0,1.66-0.36,2.24-0.95c0.6,0.6,1.4,0.95,2.31,0.95c0.87,0,1.65-0.36,2.23-0.93c0.59,0.57,1.39,0.93,2.29,0.93 c0.84,0,1.64-0.35,2.24-0.95c0.58,0.59,1.37,0.95,2.24,0.95c0.08,0,0.15-0.02,0.23-0.03V19z M19.71,10.53 C19.57,10.71,19.27,11,18.77,11c-0.61,0-1.14-0.49-1.21-1.14L16.98,5l1.93-0.01l1.05,4.37C20.06,9.78,19.97,10.21,19.71,10.53z">
                        </path>
                    </g>
                </g>
            </svg>
            <span class="side-menu__label">Objek Retribusi</span>
            <i class="ri-arrow-right-s-line side-menu__angle"></i>
        </a>
        <ul class="slide-menu child1">
            <li class="slide side-menu__label1">
                <a href="javascript:void(0)">Objek Retribusi</a>
            </li>
            <li class="slide">
                <a href="{{ route('WajibRetribusi.objekRetribusi') }}" class="side-menu__item">Objek Retribusi</a>
            </li>
            <li class="slide">
                <a href="{{ route('WajibRetribusi.tarifObjekRetribusi') }}" class="side-menu__item">Tarif Objek Retribusi</a>
            </li>
        </ul>
    </li>
    <!-- End::slide -->

    <!-- Start::slide__category -->
    <li class="slide__category"><span class="category-name">Sewa Aset</span></li>
    <!-- End::slide__category -->

    <!-- Start::slide -->
    <li class="slide has-sub">
        <a href="javascript:void(0);" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24"
                width="24px" fill="#5f6368">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path
                    d="M15.99 9h3.43C18.6 7 17 5.4 15 4.58v3.43c.37.28.71.62.99.99zM4 12c0 3.35 2.04 6.24 5 7.42v-3.44c-1.23-.93-2-2.4-2-3.99C7 10.4 7.77 8.93 9 8V4.58C6.04 5.76 4 8.65 4 12zm11 3.99v3.43c2-.82 3.6-2.42 4.42-4.42h-3.43c-.28.37-.62.71-.99.99z"
                    opacity=".3"></path>
                <path
                    d="M14.82 11h7.13c-.47-4.72-4.23-8.48-8.95-8.95v7.13c.85.31 1.51.97 1.82 1.82zM15 4.58C17 5.4 18.6 7 19.42 9h-3.43c-.28-.37-.62-.71-.99-.99V4.58zM2 12c0 5.19 3.95 9.45 9 9.95v-7.13C9.84 14.4 9 13.3 9 12c0-1.3.84-2.4 2-2.82V2.05c-5.05.5-9 4.76-9 9.95zm7-7.42v3.44c-1.23.92-2 2.39-2 3.98 0 1.59.77 3.06 2 3.99v3.44C6.04 18.24 4 15.35 4 12c0-3.35 2.04-6.24 5-7.42zm4 10.24v7.13c4.72-.47 8.48-4.23 8.95-8.95h-7.13c-.31.85-.97 1.51-1.82 1.82zm2 1.17c.37-.28.71-.61.99-.99h3.43C18.6 17 17 18.6 15 19.42v-3.43z">
                </path>
            </svg>
            <span class="side-menu__label">Permohonan Sewa</span>
            <i class="ri-arrow-right-s-line side-menu__angle"></i>
        </a>
        <ul class="slide-menu child1">
            <li class="slide side-menu__label1">
                <a href="javascript:void(0)">Permohonan Sewa</a>
            </li>
            <li class="slide">
                <a href="{{ route('PermohonanSewa.index') }}" class="side-menu__item">Permohonan Sewa</a>
            </li>
        </ul>
    </li>
    <!-- End::slide -->

    <!-- Start::slide -->
    <li class="slide">
        <a href="{{ route('Perjanjian.index') }}" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24"
                width="24px" fill="#5f6368">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
                <path
                    d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
            </svg>
            <span class="side-menu__label">Perjanjian Sewa</span>
        </a>
        <!-- End::slide -->

        <!-- Start::slide__category -->
    <li class="slide__category"><span class="category-name">Tagihan dan Pembayaran</span></li>
    <!-- End::slide__category -->

    <!-- Start::slide -->
    <li class="slide">
        <a href="{{ route('Tagihan.index') }}" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px" viewBox="0 0 24 24"
                width="24px" fill="#5f6368">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path
                    d="M22 11h-4.17l3.24-3.24-1.41-1.42L15 11h-2V9l4.66-4.66-1.42-1.41L13 6.17V2h-2v4.17L7.76 2.93 6.34 4.34 11 9v2H9L4.34 6.34 2.93 7.76 6.17 11H2v2h4.17l-3.24 3.24 1.41 1.42L9 13h2v2l-4.66 4.66 1.42 1.41L11 17.83V22h2v-4.17l3.24 3.24 1.42-1.41L13 15v-2h2l4.66 4.66 1.41-1.42L17.83 13H22v-2z">
                </path>
            </svg>
            <span class="side-menu__label">Tagihan Sewa</span>
        </a>
        <!-- End::slide -->

        <!-- Start::slide -->
    <li class="slide">
        <a href="{{ route('Pembayaran.index') }}" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24"
                height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                <g>
                    <rect fill="none" height="24" width="24"></rect>
                </g>
                <g>
                    <g>
                        <rect height="4" opacity=".3" width="4" x="5" y="5"></rect>
                        <rect height="4" opacity=".3" width="4" x="5" y="15"></rect>
                        <rect height="4" opacity=".3" width="4" x="15" y="15"></rect>
                        <rect height="4" opacity=".3" width="4" x="15" y="5"></rect>
                        <path d="M3,21h8v-8H3V21z M5,15h4v4H5V15z"></path>
                        <path d="M3,11h8V3H3V11z M5,5h4v4H5V5z"></path>
                        <path d="M13,21h8v-8h-8V21z M15,15h4v4h-4V15z"></path>
                        <path d="M13,3v8h8V3H13z M19,9h-4V5h4V9z"></path>
                    </g>
                </g>
            </svg>
            <span class="side-menu__label">Pembayaran Sewa</span>
        </a>
        <!-- End::slide -->
</ul>