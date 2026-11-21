@extends('layouts.app')

@section('content')
<div class="catalog-section">
    <div class="catalog-heading">
        <span class="catalog-label">Pilihan Varian Puding</span>

        <h2>Katalog Menu Puding</h2>

        <p>
            Pilih puding favoritmu, tekan tombol
            <strong>Pesan</strong> untuk melanjutkan ke formulir pemesanan.
        </p>
    </div>

    <div class="catalog-grid">
        @foreach ($menuItems as $item)
            <article class="menu-card">
                <div class="menu-image">
                    <img
                        src="{{ asset($item->image) }}"
                        alt="{{ $item->name }}"
                    >

                    @if ($item->badge)
                        <span class="menu-badge">
                            ✨ {{ $item->badge }}
                        </span>
                    @endif

                    <span class="menu-size">
                        {{ $item->size }}
                    </span>
                </div>

                <div class="menu-content">
                    <div>
                        <h3>{{ $item->name }}</h3>

                        <p>{{ $item->description }}</p>
                    </div>

                    <div class="menu-footer">
                        <div>
                            <span>Harga per loyang</span>

                            <strong>
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </strong>
                        </div>

                        <a
                            href="{{ url('/pemesanan') }}?produk={{ $item->slug }}"
                            class="btn-pesan"
                        >
                            🛒 Pesan
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <div class="catalog-help">
        💡 Ingin custom tulisan kartu ucapan atau vla vanila ekstra?
        Anda dapat menambahkannya di catatan formulir pemesanan!
    </div>
</div>
@endsection