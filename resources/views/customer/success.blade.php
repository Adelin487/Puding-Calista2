@extends('layouts.app')

@section('content')

@php
    $customerName = $order->nama ?? 'Pelanggan Puding Calista';

    $tanggal = $order->tanggal
        ? \Carbon\Carbon::parse($order->tanggal)->locale('id')->translatedFormat('l, d F Y')
        : 'Tanggal Terjadwal';

    $waNumber = '6281234567890';
    $waMessage = urlencode(
        "Halo Puding Calista, saya ingin bertanya terkait pesanan atas nama *{$customerName}*."
    );

    $waUrl = "https://wa.me/{$waNumber}?text={$waMessage}";
@endphp

<div class="success-page">
    <div class="success-card">

        <div class="success-icon-wrapper">
            <div class="success-icon">✅</div>
        </div>

        <h2 class="success-title">Pesanan Diterima!</h2>

        <p class="success-message">
            Pesanan sudah diterima, jika sudah siap kami akan menginfokan anda melalui WhatsApp
        </p>

        <div class="success-details">

            <div class="success-details-header">
                <span class="success-details-heading">
                    <span>📦</span>
                    Detail Pesanan
                </span>

                <span class="success-status">Lunas</span>
            </div>

            <div class="success-info-row">
                <span>Nama Pembeli:</span>
                <strong>{{ $customerName }}</strong>
            </div>

            <div class="success-products">
                <span class="success-label">Daftar Puding yang Dipesan:</span>

                <div class="success-product-list">
                    @foreach ($order->items as $item)
                        <div class="success-product-row">
                            <span>
                                • {{ $item->product_name }} (x{{ $item->jumlah }})
                            </span>

                            <strong>
                                Rp{{ number_format($item->product_price * $item->jumlah, 0, ',', '.') }}
                            </strong>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="success-info-row">
                <span>Jadwal Pengambilan:</span>

                <strong class="success-date">
                    {{ $tanggal }}
                    @if ($order->waktu)
                        • {{ $order->waktu }}
                    @endif
                </strong>
            </div>

            <div class="success-total">
                <span>Total:</span>

                <strong>
                    Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                </strong>
            </div>

        </div>

        <div class="success-actions">
            <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                class="success-whatsapp">
                <span>💬</span>
                Jika ada yang ingin ditanyakan, hubungi kami
            </a>

            <a href="{{ url('/') }}" class="success-home">
                <span>⌂</span>
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

<style>
    .success-page {
        width: 100%;
        max-width: 576px;
        margin: 0 auto;
        padding: 20px 16px 48px;
        animation: successFadeIn .5s ease;
    }

    .success-card {
        background: #fff;
        border: 1px solid #d1fae5;
        border-radius: 24px;
        padding: 32px 28px;
        text-align: center;
        box-shadow: 0 15px 35px rgba(16, 185, 129, .08);
    }

    .success-icon-wrapper {
        margin-bottom: 20px;
    }

    .success-icon {
        width: 88px;
        height: 88px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(209, 250, 229, .9);
        font-size: 43px;
        box-shadow: inset 0 2px 8px rgba(16, 185, 129, .08);
        animation: successBounce 1.5s infinite;
    }

    .success-title {
        margin: 0 0 18px;
        color: #4CAF50;
        font-family: 'Playfair Display', serif;
        font-size: 29px;
        font-weight: 800;
    }

    .success-message {
        margin: 0 0 22px;
        padding: 17px;
        border: 1px solid #c8e6c9;
        border-radius: 16px;
        background: #e8f5e9;
        color: #44403c;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.7;
    }

    .success-details {
        padding: 18px;
        border: 1px solid #e7e5e4;
        border-radius: 16px;
        background: rgba(250, 250, 249, .8);
        text-align: left;
        font-size: 13px;
    }

    .success-details-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 12px;
        margin-bottom: 13px;
        border-bottom: 1px solid #e7e5e4;
    }

    .success-details-heading {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #44403c;
        font-weight: 800;
    }

    .success-status {
        padding: 4px 11px;
        border-radius: 20px;
        background: #d1fae5;
        color: #047857;
        font-size: 11px;
        font-weight: 800;
    }

    .success-info-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 14px;
        color: #57534e;
    }

    .success-info-row strong {
        color: #1c1917;
        text-align: right;
    }

    .success-products {
        margin: 16px 0;
    }

    .success-label {
        display: block;
        margin-bottom: 9px;
        color: #57534e;
        font-weight: 600;
    }

    .success-product-list {
        padding: 12px;
        border: 1px solid #e7e5e4;
        border-radius: 12px;
        background: #fff;
    }

    .success-product-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 8px;
        color: #1c1917;
        font-size: 12px;
        font-weight: 600;
    }

    .success-product-row:last-child {
        margin-bottom: 0;
    }

    .success-product-row strong {
        color: #e11d48;
        white-space: nowrap;
    }

    .success-date {
        max-width: 65%;
    }

    .success-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 13px;
        margin-top: 13px;
        border-top: 1px solid #e7e5e4;
        color: #57534e;
    }

    .success-total strong {
        color: #e11d48;
        font-size: 18px;
        font-weight: 900;
    }

    .success-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 22px;
    }

    .success-whatsapp,
    .success-home {
        min-height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 12px 18px;
        border-radius: 15px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: .2s ease;
    }

    .success-whatsapp {
        background: #059669;
        color: #fff;
        box-shadow: 0 4px 12px rgba(16, 185, 129, .2);
    }

    .success-whatsapp:hover {
        background: #047857;
        color: #fff;
    }

    .success-home {
        border: 1px solid #d6d3d1;
        background: #f5f5f4;
        color: #292524;
        font-size: 14px;
    }

    .success-home:hover {
        background: #e7e5e4;
        color: #292524;
    }

    @keyframes successFadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes successBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-7px); }
    }

    @media (max-width: 600px) {
        .success-page {
            padding: 14px 10px 32px;
        }

        .success-card {
            padding: 25px 17px;
        }

        .success-title {
            font-size: 25px;
        }

        .success-message {
            font-size: 13px;
            padding: 14px;
        }

        .success-details {
            padding: 14px;
            font-size: 12px;
        }

        .success-info-row {
            gap: 8px;
        }

        .success-product-row {
            font-size: 11px;
        }

        .success-whatsapp {
            font-size: 12px;
        }
    }
</style>

@endsection