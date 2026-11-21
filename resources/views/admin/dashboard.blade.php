<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Puding Calista</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #fff7ed;
            color: #44403c;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: white;
            border-bottom: 1px solid #fed7aa;
        }

        .admin-header h1 {
            color: #881337;
            font-size: 22px;
        }

        .admin-header p {
            margin-top: 5px;
            color: #78716c;
            font-size: 13px;
        }

        .logout-button {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            background: #e11d48;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .dashboard-content {
            padding: 40px;
        }

        .welcome-card {
            padding: 30px;
            border-radius: 16px;
            background: white;
            border: 1px solid #fed7aa;
            box-shadow: 0 8px 25px rgba(159, 18, 57, .06);
        }

        .welcome-card h2 {
            margin-bottom: 12px;
            color: #881337;
            font-size: 25px;
        }

        .welcome-card p {
            color: #78716c;
            line-height: 1.7;
        }

        @media (max-width: 600px) {
            .admin-header {
                padding: 18px 20px;
                gap: 15px;
            }

            .admin-header h1 {
                font-size: 18px;
            }

            .dashboard-content {
                padding: 22px 18px;
            }
        }
    </style>
</head>
<body>

    <header class="admin-header">
        <div>
            <h1>Puding Calista</h1>
            <p>Panel Administrasi</p>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">
                Keluar
            </button>
        </form>
    </header>

    
    <main class="dashboard-content">

        <section class="welcome-card">
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p>
                Anda berhasil masuk ke halaman Dashboard Admin
                Puding Calista.
            </p>
        </section>

        <section class="menu-section">
            <h2>Menu Pengelolaan</h2>

            <div class="menu-grid">
                <a href="{{ route('admin.orders.index') }}" class="menu-card">
                    <div class="menu-icon">📦</div>
                    <h3>Manajemen Pesanan</h3>
                    <p>Lihat dan kelola pesanan pelanggan.</p>
                </a>
            </div>
        </section>

    </main>

    <style>
        .menu-section {
            margin-top: 30px;
        }

        .menu-section h2 {
            margin-bottom: 18px;
            color: #881337;
            font-size: 20px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 18px;
        }

        .menu-card {
            display: block;
            padding: 25px;
            background: white;
            border: 1px solid #fed7aa;
            border-radius: 14px;
            text-decoration: none;
            transition: .2s;
        }

        .menu-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(159, 18, 57, .10);
        }

        .menu-icon {
            margin-bottom: 15px;
            font-size: 30px;
        }

        .menu-card h3 {
            margin-bottom: 8px;
            color: #881337;
            font-size: 17px;
        }

        .menu-card p {
            color: #78716c;
            font-size: 13px;
            line-height: 1.6;
        }
    </style>
</body>
</html>