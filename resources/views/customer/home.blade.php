@extends('layouts.app')

@section('title', 'Beranda - Puding Calista')

@section('content')

<style>
    .home-page {
        padding: 32px 4.5%;
        background: #fffaf8;
        min-height: calc(100vh - 75px);
        font-family: 'DM Sans', Arial, sans-serif;
    }

    .home-hero {
        max-width: 1400px;
        min-height: 870px;
        margin: auto;
        padding: 56px 30px;
        border: 1px solid #ffe1e4;
        border-radius: 25px;
        background:
            radial-gradient(circle at 10% 10%, #ffe8eb, transparent 35%),
            radial-gradient(circle at 90% 90%, #fce7f3, transparent 35%),
            linear-gradient(135deg, #fff7f7, #ffffff, #fff5f7);
        box-shadow: 0 2px 4px rgba(159,18,57,.08);
        text-align: center;
    }

    .home-badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 8px 16px;
        border: 1px solid #ffcbd4;
        border-radius: 30px;
        background: #ffe9ed;
        color: #be123c;
        font-size: 14px;
        font-weight: 700;
    }

    .home-title {
        margin: 23px 0 16px;
        color: #57051e;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 60px;
        font-weight: 800;
        line-height: 1.15;
    }

    .home-tagline {
        margin-bottom: 20px;
        color: #ff174d;
        font-size: 17px;
        font-weight: 800;
        letter-spacing: 1.2px;
    }

    .home-description {
        max-width: 650px;
        margin: 0 auto 32px;
        color: #57534e;
        font-size: 16px;
        line-height: 1.7;
    }

    .home-story {
        position: relative;
        display: flex;
        align-items: flex-end;
        max-width: 670px;
        min-height: 234px;
        margin: 0 auto 36px;
        padding: 30px 36px;
        overflow: hidden;
        border-radius: 23px;
        background-image:
            linear-gradient(180deg, rgba(30,15,12,.35), rgba(0,0,0,.85)),
            url('{{ asset('images/chocolate-panna-cotta.jpg') }}');
        background-size: cover;
        background-position: center;
        text-align: left;
        box-shadow: 0 12px 22px rgba(0,0,0,.15);
    }

    .home-story-content {
        position: relative;
        z-index: 1;
        color: white;
    }

    .story-label {
        display: inline-block;
        margin-bottom: 13px;
        padding: 5px 13px;
        border: 1px solid rgba(255,255,255,.35);
        border-radius: 20px;
        background: rgba(255,255,255,.25);
        color: #fff;
        font-size: 12px;
        font-weight: 700;
    }

    .home-story h2 {
        margin-bottom: 12px;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 25px;
        font-weight: 800;
    }

    .home-story p {
        margin: 0;
        color: #f5f5f5;
        font-size: 15px;
        line-height: 1.75;
    }

    .home-features {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        max-width: 670px;
        margin: 0 auto 45px;
    }

    .home-feature {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        min-height: 108px;
        padding: 16px;
        border: 1px solid #ffe1e4;
        border-radius: 17px;
        background: white;
        text-align: left;
        box-shadow: 0 2px 4px rgba(159,18,57,.05);
    }

    .feature-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 13px;
        background: #fff0f2;
        font-size: 21px;
    }

    .feature-text h3 {
        margin: 2px 0 3px;
        color: #292524;
        font-size: 14px;
        font-weight: 800;
    }

    .feature-text p {
        margin: 0;
        color: #928781;
        font-size: 12px;
        line-height: 1.5;
    }

    .home-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
    }

    .home-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        min-height: 54px;
        padding: 0 27px;
        border: 2px solid #ff174d;
        border-radius: 17px;
        color: #ff174d;
        background: white;
        text-decoration: none;
        font-size: 15px;
        font-weight: 800;
        transition: .2s;
    }

    .home-button-primary {
        color: white;
        background: #ff174d;
        box-shadow: 0 7px 15px rgba(255,23,77,.18);
    }

    .home-button-primary:hover {
        color: white;
        background: #e11d48;
        border-color: #e11d48;
        transform: translateY(-2px);
    }

    .home-button-secondary:hover {
        color: white;
        background: #ff174d;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .home-page {
            padding: 20px 15px;
        }

        .home-hero {
            min-height: auto;
            padding: 42px 18px;
        }

        .home-title {
            font-size: 42px;
        }

        .home-description {
            font-size: 14px;
        }

        .home-story {
            min-height: 250px;
            padding: 24px;
        }

        .home-story p {
            font-size: 13px;
        }

        .home-features {
            grid-template-columns: 1fr;
            max-width: 400px;
            margin-bottom: 32px;
        }

        .home-feature {
            min-height: 85px;
        }

        .home-actions {
            flex-direction: column;
        }

        .home-button {
            width: 100%;
            max-width: 300px;
        }
    }

    @media (max-width: 420px) {
        .home-title {
            font-size: 35px;
        }

        .home-story {
            padding: 20px;
        }

        .home-story h2 {
            font-size: 22px;
        }
    }
</style>

<section class="home-page">
    <div class="home-hero">

        <div class="home-badge">
            <span>✨</span>
            <span>✨ Premium Homemade Dessert</span>
        </div>

        <h1 class="home-title">Puding Calista</h1>

        <p class="home-tagline">
            MANIS, LEMBUT, DAN ISTIMEWA
        </p>

        <p class="home-description">
            Rasakan kelembutan puding artisan dengan bahan alami terbaik.
            Dibuat fresh setiap batch untuk menghadirkan kebahagiaan
            di setiap gigitan.
        </p>

        <div class="home-story">
            <div class="home-story-content">
                <span class="story-label">📖 Cerita Dapur Kami</span>

                <h2>Sejarah Kami</h2>

                <p>
                    Lahir dari dapur rumah pada tahun 2025, Puding Calista
                    diracik dari bahan pilihan tanpa pemanis buatan.
                    Sebuah sajian penutup yang lembut, autentik, dan dibuat
                    sepenuh hati untuk menyempurnakan momen manis Anda
                    setiap hari.
                </p>
            </div>
        </div>

        <div class="home-features">

            <div class="home-feature">
                <div class="feature-icon">🍓</div>
                <div class="feature-text">
                    <h3>Bahan Segar Alami</h3>
                    <p>Diproses higienis setiap hari</p>
                </div>
            </div>

            <div class="home-feature">
                <div class="feature-icon">🍮</div>
                <div class="feature-text">
                    <h3>100% Gula Asli</h3>
                    <p>Tanpa biang gula &amp; pengawet</p>
                </div>
            </div>

            <div class="home-feature">
                <div class="feature-icon">✨</div>
                <div class="feature-text">
                    <h3>Batch Terbatas</h3>
                    <p>Kualitas rasa selalu terjaga</p>
                </div>
            </div>

        </div>

        <div class="home-actions">
            <a href="{{ route('catalog') }}"
                class="home-button home-button-primary">
                <span>▣</span>
                Lihat Katalog Menu
            </a>

            <a href="{{ route('order.index') }}"
                class="home-button home-button-secondary">
                <span>♧</span>
                Pesan Sekarang
            </a>
        </div>

    </div>
</section>

@endsection