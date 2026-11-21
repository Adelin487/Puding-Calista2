<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal PO - Puding Calista</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #fffaf8;
            color: #443b3b;
        }

        button, input {
            font: inherit;
        }
  
        /* HEADER */
        .admin-header {
            min-height: 118px;
            padding: 18px 2.3%;
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 20px;
            background: white;
            border-bottom: 1px solid #fce1df;
        }

        /* HEADER LEFT */
        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .menu-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border: 1px solid #fce1df;
            border-radius: 12px;
            background: #fff;
            color: #ff174d;
            font-size: 23px;
            cursor: pointer;
            flex-shrink: 0;
        }

        /* LOGOUT */
        .logout-button {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            padding: 16px 23px;
            border: none;
            border-radius: 20px;
            background: #f5f5f5;
            color: #44403c;
            font-family: inherit;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap;
        }

        .logout-button i {
            color: #ff174d;
            font-size: 20px;
        }

        .logout-button:hover {
            background: #ffecef;
            color: #e11d48;
        }

        /* NAVIGATION */
        .admin-nav {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 6px;
            border: 1px solid #ffe1e4;
            border-radius: 24px;
            background: #fff7f7;
        }

        .nav-item {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 11px;
            padding: 15px 22px;
            border-radius: 18px;
            color: #57534e;
            font-size: 20px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s;
        }

        .nav-item.active {
            background: #ff174d;
            color: white;
            box-shadow: 0 4px 12px rgba(255,23,77,.15);
        }

        .nav-item:not(.active):hover {
            background: #ffecef;
        }

        /* BRAND */
        .admin-brand {
            justify-self: end;
            display: flex;
            align-items: center;
            gap: 15px;
            text-align: right;
        }

        .brand-name {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            font-weight: 800;
            color: #292524;
            white-space: nowrap;
        }

        .admin-badge {
            padding: 5px 12px;
            border: 1px solid #ffd65b;
            border-radius: 20px;
            background: #fff3c4;
            color: #a34b00;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 800;
        }

        .brand-description {
            margin-top: 3px;
            color: #928781;
            font-size: 16px;
            white-space: nowrap;
        }

        .brand-icon {
            width: 61px;
            height: 61px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 19px;
            background: linear-gradient(135deg, #ff9b00, #ff174d);
            color: white;
            font-size: 27px;
        }

        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(40, 30, 30, .25);
            z-index: 29;
            display: none;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: -320px;
            width: min(300px, 85vw);
            height: 100vh;
            background: #fff;
            z-index: 30;
            padding: 28px 22px;
            transition: left .25s ease;
            box-shadow: 8px 0 30px rgba(50, 30, 30, .08);
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-overlay.open {
            display: block;
        }

        .sidebar-title {
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            color: #654b4d;
            margin-bottom: 7px;
        }

        .sidebar-caption {
            font-size: 11px;
            color: #a18e8b;
            margin-bottom: 28px;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #766563;
            padding: 13px 14px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #fbefef;
            color: #b66e79;
        }

        .sidebar-divider {
            height: 1px;
            background: #f0e8e5;
            margin: 18px 0;
        }

        
    .main-content {
        max-width: 1440px;
        margin: 0 auto;
        padding: 42px 65px 70px;
    }

    .page-heading {
        margin-bottom: 28px;
    }

    .page-heading h1 {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        color: #282323;
        margin-bottom: 8px;
    }

    .page-heading p {
        color: #888080;
        font-size: 14px;
    }

    .po-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 25px;
    }

    .po-card,
    .closed-card {
        background: #fff;
        border: 1px solid #f5dfe1;
        border-radius: 13px;
        padding: 25px;
        box-shadow: 0 2px 5px rgba(80, 40, 40, .025);
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 23px;
    }

    .card-icon {
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        display: grid;
        place-items: center;
        border-radius: 10px;
        background: #fff0f1;
        color: #ff3158;
        font-size: 20px;
    }

    .card-heading h2,
    .closed-card-heading h2 {
        color: #292323;
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .card-heading p,
    .closed-card-heading p {
        color: #888080;
        font-size: 12px;
        line-height: 1.6;
    }

    .field-label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #403939;
        margin-bottom: 10px;
    }

    .quota-input-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-input {
        width: 100%;
        height: 43px;
        border: 1px solid #eadcdd;
        border-radius: 7px;
        background: #fff;
        padding: 0 13px;
        color: #403939;
        outline: none;
        font-size: 13px;
    }

    .form-input:focus {
        border-color: #ff3158;
    }

    .quota-input {
        max-width: 125px;
    }

    .input-suffix {
        font-size: 13px;
        color: #777;
    }

    .form-hint {
        color: #929090;
        font-size: 11px;
        margin-top: 9px;
    }

    .primary-button {
        border: none;
        border-radius: 7px;
        background: #242121;
        color: #fff;
        padding: 12px 19px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        margin-top: 20px;
    }

    .primary-button:hover {
        background: #403838;
    }

    .close-date-form {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .close-date-form .primary-button {
        background: #ff741f;
        margin-top: 0;
        white-space: nowrap;
    }

    .close-date-form .primary-button:hover {
        background: #ed6410;
    }

    .closed-card {
        padding: 25px;
    }

    .closed-card-heading {
        margin-bottom: 22px;
    }

    .closed-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 13px;
    }

    .closed-item {
        border: 1px solid #f2dfe0;
        background: #fffafa;
        border-radius: 9px;
        padding: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .closed-date {
        font-size: 13px;
        font-weight: 700;
        color: #393030;
        margin-bottom: 7px;
    }

    .closed-count {
        font-size: 11px;
        color: #858080;
    }

    .closed-status {
        display: inline-block;
        background: #fff0e8;
        color: #e66b25;
        border-radius: 5px;
        padding: 5px 8px;
        font-size: 10px;
        font-weight: 700;
        margin-top: 8px;
    }

    .open-button {
        border: 1px solid #f2d5d5;
        background: #fff;
        color: #e45b62;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        white-space: nowrap;
    }

    .open-button:hover {
        background: #fff0f0;
    }

    .empty-state {
        text-align: center;
        padding: 35px 15px;
        color: #999;
        font-size: 12px;
        line-height: 1.8;
    }

@media (max-width: 900px) {
    .main-content {
        padding: 30px 22px;
    }

    .po-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 600px) {
    .main-content {
        padding: 25px 15px;
    }

    .closed-list {
        grid-template-columns: 1fr;
    }

    .close-date-form {
        flex-direction: column;
        align-items: stretch;
    }

    .close-date-form .primary-button {
        width: 100%;
    }
}

        @media (max-width: 900px) {
            .admin-header {
                padding: 0 20px;
                grid-template-columns: 1fr auto;
            }

            .admin-nav {
                display: none;
            }

            .brand {
                grid-column: 2;
            }
        }

        @media (max-width: 650px) {
            .admin-header {
                height: 70px;
                padding: 0 15px;
            }

            .header-left {
                gap: 10px;
            }

            .brand-name {
                font-size: 14px;
            }

            .brand-subtitle {
                font-size: 8px;
            }

            .brand-icon {
                width: 33px;
                height: 33px;
            }

            .admin-badge {
                display: none;
            }

            .main-content {
                padding: 30px 16px 50px;
            }

            .page-heading h1 {
                font-size: 25px;
            }

            .po-grid {
                grid-template-columns: 1fr;
            }

            .po-card,
            .closed-card {
                padding: 20px;
            }

            .close-date-form {
                flex-direction: column;
                align-items: stretch;
            }

            .close-date-form .primary-button {
                width: 100%;
            }

            .closed-item {
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

    
    <header class="admin-header">

        <div class="header-left">
            <button type="button" class="menu-toggle"
                onclick="openAdminSidebar()" aria-label="Buka menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <form action="{{ route('admin.logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Keluar
                </button>
            </form>
        </div>

        <nav class="admin-nav">

            <a href="{{ route('admin.orders.index') }}" class="nav-item">
                <i class="fa-regular fa-clipboard"></i>
                Data Pesanan
            </a>

            <a href="{{ route('admin.catalog.index') }}" class="nav-item">
                <i class="fa-solid fa-book-open"></i>
                Katalog Produk
            </a>

            <a href="{{ route('admin.po.index') }}" class="nav-item active">
                <i class="fa-regular fa-calendar-check"></i>
                Jadwal PO
            </a>

        </nav>

        <div class="admin-brand">
            <div>
                <div class="brand-name">
                    Puding Calista
                    <span class="admin-badge">ADMIN</span>
                </div>

                <div class="brand-description">
                    Kelola Pesanan, Menu Produk, &amp; Jadwal PO
                </div>
            </div>

            <div class="brand-icon" style="background: transparent; border-radius: 0; box-shadow: none; overflow: hidden;">
                <img src="{{ asset('images/logo-calista.png') }}"
                    alt="Logo Puding Calista"
                    style="display: block; width: 56px; height: 56px; max-width: 56px; max-height: 56px; object-fit: contain;">
            </div>
        </div>

    </header>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-title">Puding Calista</div>
        <div class="sidebar-caption">Menu Navigasi Admin</div>

        <a href="{{ route('admin.orders.index') }}">Data Pesanan</a>
        <a href="{{ route('admin.catalog.index') }}">Katalog Produk</a>
        <a href="{{ route('admin.po.index') }}" class="active">Jadwal PO</a>

        <div class="sidebar-divider"></div>

        <a href="{{ route('home') }}">Lihat Tampilan Pembeli</a>
    </aside>

    <main class="main-content">

        <div class="page-heading">
            <h1>Jadwal Pre-Order</h1>
            <p>Atur kuota produksi harian dan tanggal ketika pre-order tidak tersedia.</p>
        </div>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                Terdapat kesalahan pada input:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="po-grid">

            <div class="po-card">
                <div class="card-heading">
                    <div class="card-icon">⚙</div>
                    <div>
                        <h2>Aturan Kuota Harian</h2>
                        <p>Tentukan batas maksimal produksi untuk setiap tanggal PO.</p>
                    </div>
                </div>

                <form action="{{ route('admin.po.updateQuota') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label class="field-label" for="daily_quota">
                        Maksimal Kuota Produksi
                    </label>

                    <div class="quota-input-wrap">
                        <input
                            type="number"
                            name="daily_quota"
                            id="daily_quota"
                            class="form-input quota-input"
                            min="1"
                            value="{{ old('daily_quota', $setting->daily_quota) }}"
                            required
                        >
                        <span class="input-suffix">Loyang / hari</span>
                    </div>

                    <p class="form-hint">
                        Kuota ini menjadi batas maksimal pesanan yang diterima dalam satu hari.
                    </p>

                    <button type="submit" class="primary-button">
                        Simpan Pengaturan
                    </button>
                </form>
            </div>

            <div class="po-card">
                <div class="card-heading">
                    <div class="card-icon">▣</div>
                    <div>
                        <h2>Tutup Kuota Tanggal Tertentu</h2>
                        <p>Tutup penerimaan pre-order pada tanggal tertentu, misalnya saat libur atau produksi penuh.</p>
                    </div>
                </div>

                <form
                    action="{{ route('admin.po.closeDate') }}"
                    method="POST"
                >
                    @csrf

                    <label class="field-label" for="closed_date">
                        Pilih Tanggal
                    </label>

                    <div class="close-date-form">
                        <input
                            type="date"
                            name="closed_date"
                            id="closed_date"
                            class="form-input"
                            min="{{ date('Y-m-d') }}"
                            value="{{ old('closed_date') }}"
                            required
                        >

                        <button type="submit" class="primary-button">
                            Tutup Kuota
                        </button>
                    </div>
                </form>
            </div>

        </section>

        <section class="closed-card">
            <div class="closed-card-heading">
                <h2>Tanggal yang Sedang Ditutup</h2>
                <p>Daftar tanggal ketika penerimaan pre-order dinonaktifkan.</p>
            </div>

            @if ($closedDates->count() > 0)
                <div class="closed-list">
                    @foreach ($closedDates as $closedDate)
                        <div class="closed-item">
                            <div>
                                <div class="closed-date">
                                    {{ \Carbon\Carbon::parse($closedDate->closed_date)->translatedFormat('d F Y') }}
                                </div>

                                <div class="closed-count">
                                    {{ $closedDate->filled }} / {{ $setting->daily_quota }} loyang terpesan
                                </div>

                                <span class="closed-status">PO Ditutup</span>
                            </div>

                            <form
                                action="{{ route('admin.po.openDate', $closedDate->id) }}"
                                method="POST"
                                onsubmit="return confirm('Buka kembali kuota pada tanggal ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="open-button">
                                    Buka Kuota
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    Belum ada tanggal yang ditutup.<br>
                    Semua tanggal masih mengikuti aturan kuota harian.
                </div>
            @endif
        </section>

    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('open');
        }
    </script>

</body>
</html>