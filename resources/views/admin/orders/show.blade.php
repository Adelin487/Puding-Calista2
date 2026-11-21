<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Puding Calista</title>

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

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-actions a {
            color: #9a3412;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
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

        .content {
            max-width: 950px;
            margin: auto;
            padding: 35px 25px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h2 {
            color: #881337;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: #78716c;
            font-size: 14px;
        }

        .detail-card {
            padding: 25px;
            margin-bottom: 20px;
            background: white;
            border: 1px solid #fed7aa;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(159, 18, 57, .05);
        }

        .detail-card h3 {
            margin-bottom: 20px;
            color: #881337;
            font-size: 18px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-item label {
            display: block;
            margin-bottom: 7px;
            color: #a8a29e;
            font-size: 12px;
        }

        .info-item p {
            color: #44403c;
            font-size: 14px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
            font-size: 12px;
            font-weight: 600;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
        }

        .product-table th,
        .product-table td {
            padding: 13px 10px;
            border-bottom: 1px solid #f5e7df;
            text-align: left;
            font-size: 13px;
        }

        .product-table th {
            color: #881337;
            background: #fff1f2;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #fed7aa;
            color: #881337;
            font-size: 17px;
            font-weight: bold;
        }

        .note-box {
            padding: 15px;
            border-radius: 9px;
            background: #fff7ed;
            color: #57534e;
            font-size: 14px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .proof-image {
            display: block;
            max-width: 100%;
            max-height: 450px;
            margin-top: 12px;
            border: 1px solid #fed7aa;
            border-radius: 10px;
            object-fit: contain;
        }

        .proof-link {
            display: inline-block;
            margin-top: 12px;
            color: #e11d48;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .back-button {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 9px;
            background: #e11d48;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .back-button:hover {
            background: #be123c;
        }

        @media (max-width: 600px) {
            .admin-header {
                padding: 18px 20px;
                gap: 12px;
            }

            .admin-header h1 {
                font-size: 18px;
            }

            .content {
                padding: 25px 16px;
            }

            .detail-card {
                padding: 20px 16px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .product-table {
                min-width: 500px;
            }

            .table-wrapper {
                overflow-x: auto;
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

        <div class="header-actions">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Keluar</button>
            </form>
        </div>
    </header>

    <main class="content">

        <div class="page-heading">
            <h2>Detail Pesanan</h2>
            <p>Informasi lengkap pesanan pelanggan Puding Calista.</p>
        </div>

        <section class="detail-card">
            <h3>Informasi Pesanan</h3>

            <div class="info-grid">
                <div class="info-item">
                    <label>Nomor Invoice</label>
                    <p>{{ $order->invoice_id }}</p>
                </div>

                <div class="info-item">
                    <label>Status Pesanan</label>
                    <p><span class="status">{{ $order->status }}</span></p>
                </div>

                <div class="info-item">
                    <label>Nama Pelanggan</label>
                    <p>{{ $order->nama }}</p>
                </div>

                <div class="info-item">
                    <label>Nomor WhatsApp</label>
                    <p>{{ $order->whatsapp }}</p>
                </div>

                <div class="info-item">
                    <label>Tanggal Pemesanan</label>
                    <p>{{ $order->tanggal->format('d/m/Y') }}</p>
                </div>

                <div class="info-item">
                    <label>Waktu Pemesanan</label>
                    <p>{{ $order->waktu }}</p>
                </div>
            </div>
        </section>

        <section class="detail-card">
            <h3>Daftar Produk</h3>

            <div class="table-wrapper">
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td>Rp{{ number_format($item->product_price, 0, ',', '.') }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    Rp{{ number_format($item->product_price * $item->jumlah, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="total-row">
                <span>Total Pembayaran</span>
                <span>Rp{{ number_format($order->total_harga, 0, ',', '.') }}</span>
            </div>
        </section>

        <section class="detail-card">
            <h3>Catatan Pelanggan</h3>

            <div class="note-box">
                {{ $order->catatan ?: 'Tidak ada catatan dari pelanggan.' }}
            </div>
        </section>

        <section class="detail-card">
            <h3>Bukti Pembayaran</h3>

            @if ($order->bukti_bayar_url)
                <img
                    src="{{ asset('storage/' . $order->bukti_bayar_url) }}"
                    alt="Bukti Pembayaran"
                    class="proof-image"
                >

                <a
                    href="{{ asset('storage/' . $order->bukti_bayar_url) }}"
                    target="_blank"
                    class="proof-link"
                >
                    Lihat Bukti Pembayaran
                </a>
            @else
                <p>Belum ada bukti pembayaran yang diunggah.</p>
            @endif
        </section>

        <a href="{{ route('admin.orders.index') }}" class="back-button">
            ← Kembali ke Daftar Pesanan
        </a>

    </main>

</body>
</html>