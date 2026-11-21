<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Puding Calista')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="navbar-container">

            <button class="menu-button" id="openSidebar">
                <span class="menu-icon">☰</span>
                <span>Menu</span>
            </button>

            <a href="{{ route('home') }}" class="brand">
                <div class="brand-text">
                    <div class="brand-name">Puding Calista</div>
                    <p>Manis, Lembut, &amp; Istimewa</p>
                </div>
                <div class="brand-icon" style="width:44px; height:44px; flex:0 0 44px; overflow:hidden;">
                    <img src="{{ asset('images/logo-calista.png') }}"
                        alt="Logo Puding Calista"
                        style="display:block; width:38px; height:38px; object-fit:contain;">
                </div>
            </a>

        </div>
    </header>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <div class="sidebar-header">
            <div class="sidebar-brand">
                <span class="sidebar-logo" style="width:48px; height:48px; flex:0 0 48px; overflow:hidden;">
                    <img src="{{ asset('images/logo-calista.png') }}"
                        alt="Logo Puding Calista"
                        style="display:block; width:44px; height:44px; object-fit:contain;">
                </span>
                <div>
                    <h2>Puding Calista</h2>
                    <p>PILIHAN MENU</p>
                </div>
            </div>

            <button class="close-sidebar" id="closeSidebar">×</button>
        </div>

        <div class="sidebar-content">
            <div class="sidebar-heading">PILIHAN MENU</div>

            <a href="{{ route('home') }}"
               class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <span class="sidebar-item-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 10 9-7 9 7"/>
                        <path d="M5 9v12h14V9"/>
                        <path d="M9 21v-7h6v7"/>
                    </svg>
                </span>
                <span class="sidebar-item-text">
                    <strong>Beranda</strong>
                    <small>Sejarah &amp; keunggulan Puding Calista</small>
                </span>
            </a>

            <a href="{{ route('catalog') }}"
               class="sidebar-item {{ request()->routeIs('catalog') ? 'active' : '' }}">
                <span class="sidebar-item-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="3" width="16" height="18" rx="2"/>
                        <path d="M8 8h8M8 12h8M8 16h5"/>
                    </svg>
                </span>
                <span class="sidebar-item-text">
                    <strong>Katalog</strong>
                    <small>Pilihan puding lezat &amp; harga</small>
                </span>
                <span class="sidebar-badge">Menu</span>
            </a>

            <a href="{{ route('order.index') }}"
               class="sidebar-item {{ request()->routeIs('order') ? 'active' : '' }}">
                <span class="sidebar-item-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="19" cy="21" r="1"/>
                        <path d="M2 3h2l2.4 12.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6L22 7H5"/>
                        <path d="M9 11h8"/>
                    </svg>
                </span>
                <span class="sidebar-item-text">
                    <strong>Pesan Sekarang</strong>
                    <small>Formulir order &amp; tanggal kuota</small>
                </span>
                <span class="sidebar-badge">Order</span>
            </a>

            <a href="{{ route('payment.index') }}"
               class="sidebar-item {{ request()->routeIs('payment') ? 'active' : '' }}">
                <span class="sidebar-item-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2.5" y="5" width="19" height="14" rx="2"/>
                        <path d="M2.5 10h19M7 15h4"/>
                    </svg>
                </span>
                <span class="sidebar-item-text">
                    <strong>Bayar</strong>
                    <small>Pembayaran &amp; upload bukti transfer</small>
                </span>
            </a>

            <a href="{{ route('admin.login') }}"
               class="sidebar-item {{ request()->routeIs('admin.login') ? 'active' : '' }}">
                <span class="sidebar-item-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 21a8 8 0 0 1 16 0"/>
                    </svg>
                </span>
                <span class="sidebar-item-text">
                    <strong>Login sebagai Admin</strong>
                    <small>Masuk panel pengelola usaha</small>
                </span>
                <span class="sidebar-badge">Admin</span>
            </a>
        </div>

        <div class="sidebar-footer">
            <p>🍮 Puding Calista • Puding Lezat dan Lembut</p>
            <small>WhatsApp: 0812-3456-7890</small>
        </div>

    </aside>

    <!-- HALAMAN -->
    <main>
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>