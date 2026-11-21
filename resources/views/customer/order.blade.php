@extends('layouts.app')

@section('content')

@php
    $orderMenuData = $menuItems->map(function ($item) {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'image' => asset($item->image),
            'size' => $item->size,
        ];
    })->values();

    $initialMenuId = $selectedProduct?->id ?? '';
@endphp

<style>
    .order-page {
        max-width: 720px;
        margin: 0 auto;
        padding: 20px 16px 55px;
        color: #292524;
    }

    .order-heading {
        text-align: center;
        margin-bottom: 25px;
    }

    .order-heading h2 {
        font-family: Georgia, serif;
        font-size: 30px;
        font-weight: 800;
        color: #292524;
        margin-bottom: 8px;
    }

    .order-heading p {
        color: #78716c;
        font-size: 13px;
    }

    .order-card {
        background: white;
        border: 1px solid #ffe4e6;
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(251, 113, 133, 0.08);
    }

    .order-group {
        margin-bottom: 22px;
    }

    .order-group label,
    .order-section-title {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #44403c;
        margin-bottom: 8px;
    }

    .order-required {
        color: #f43f5e;
    }

    .order-input {
        display: block;
        width: 100%;
        min-height: 46px;
        padding: 12px 15px;
        border: 1px solid #e7e5e4;
        border-radius: 13px;
        background: white;
        color: #292524;
        font-size: 14px;
        outline: none;
        transition: .2s;
    }

    .order-input:focus {
        border-color: #fb7185;
        box-shadow: 0 0 0 3px rgba(251, 113, 133, .15);
    }

    .order-divider {
        border: 0;
        border-top: 1px solid #ffe4e6;
        margin: 24px 0;
    }

    .order-section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .order-section-heading a {
        color: #e11d48;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
    }

    .order-section-heading a:hover {
        text-decoration: underline;
    }

    .order-item-card {
        background: rgba(255, 241, 242, .65);
        border: 1px solid #fecdd3;
        border-radius: 17px;
        padding: 17px;
        margin-bottom: 15px;
    }

    .order-item-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 13px;
    }

    .order-item-title {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #881337;
        font-size: 12px;
        font-weight: 700;
    }

    .order-item-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 23px;
        height: 23px;
        border-radius: 50%;
        background: #f43f5e;
        color: white;
    }

    .order-remove {
        border: 0;
        background: #fee2e2;
        color: #b91c1c;
        padding: 7px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
    }

    .order-preview {
        display: none;
        align-items: center;
        gap: 12px;
        padding: 11px;
        margin-top: 12px;
        border: 1px solid #ffe4e6;
        border-radius: 12px;
        background: white;
    }

    .order-preview img {
        width: 55px;
        height: 55px;
        object-fit: cover;
        border-radius: 9px;
    }

    .order-preview-name {
        font-size: 13px;
        font-weight: 700;
        color: #292524;
    }

    .order-preview-price {
        color: #e11d48;
        font-size: 12px;
        font-weight: 800;
        margin-top: 3px;
    }

    .order-preview-size {
        color: #a8a29e;
        font-size: 10px;
        margin-top: 3px;
    }

    .order-quantity-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-top: 15px;
    }

    .order-quantity-label {
        font-size: 12px;
        font-weight: 600;
        color: #57534e;
    }

    .order-quantity-control {
        display: flex;
        align-items: center;
        overflow: hidden;
        border: 1px solid #e7e5e4;
        border-radius: 11px;
        background: white;
    }

    .order-quantity-control button {
        min-width: 35px;
        min-height: 36px;
        border: 0;
        background: white;
        cursor: pointer;
        color: #57534e;
        font-size: 17px;
    }

    .order-quantity-control button:hover {
        background: #f5f5f4;
    }

    .order-quantity-value {
        width: 34px;
        text-align: center;
        font-size: 13px;
        font-weight: 700;
    }

    .order-subtotal {
        min-width: 95px;
        text-align: right;
        color: #e11d48;
        font-size: 12px;
        font-weight: 800;
    }

    .order-add-button {
        width: 100%;
        padding: 13px;
        border: 2px dashed #fda4af;
        border-radius: 15px;
        background: transparent;
        color: #e11d48;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .order-add-button:hover {
        background: #fff1f2;
        border-color: #f43f5e;
    }

    .order-total {
        display: none;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        padding: 15px;
        margin-top: 15px;
        border: 1px solid #fecdd3;
        border-radius: 15px;
        background: #fff1f2;
    }

    .order-total-label {
        font-size: 12px;
        color: #57534e;
    }

    .order-total-value {
        color: #e11d48;
        font-size: 18px;
        font-weight: 900;
        white-space: nowrap;
    }

    .order-warning,
    .order-success {
        display: none;
        padding: 14px;
        border-radius: 13px;
        margin-top: 12px;
        font-size: 12px;
    }

    .order-warning {
        background: #fffbeb;
        border: 1px solid #fcd34d;
        color: #92400e;
    }

    .order-success {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #065f46;
    }

    .order-closed-dates {
        padding: 12px;
        margin-top: 12px;
        border: 1px solid #e7e5e4;
        border-radius: 12px;
        background: #fafaf9;
        color: #57534e;
        font-size: 11px;
    }

    .order-date-badge {
        display: inline-block;
        padding: 4px 7px;
        margin: 5px 3px 0 0;
        border-radius: 6px;
        background: #e7e5e4;
        font-weight: 600;
    }

    .order-submit {
        width: 100%;
        min-height: 49px;
        padding: 13px;
        border: 0;
        border-radius: 15px;
        background: #f43f5e;
        color: white;
        font-size: 14px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 6px 15px rgba(244, 63, 94, .2);
        transition: .2s;
    }

    .order-submit:hover {
        background: #e11d48;
    }

    .order-submit:disabled {
        background: #d6d3d1;
        color: #78716c;
        box-shadow: none;
        cursor: not-allowed;
    }

    .order-error {
        padding: 13px;
        margin-bottom: 18px;
        border: 1px solid #fecdd3;
        border-radius: 13px;
        background: #fff1f2;
        color: #be123c;
        font-size: 12px;
    }

    .order-help {
        margin-top: 6px;
        color: #a8a29e;
        font-size: 11px;
    }

    @media (max-width: 600px) {
        .order-page {
            padding: 15px 12px 40px;
        }

        .order-heading h2 {
            font-size: 25px;
        }

        .order-card {
            padding: 19px 15px;
            border-radius: 20px;
        }

        .order-item-card {
            padding: 13px;
        }

        .order-quantity-row {
            align-items: flex-start;
            flex-direction: column;
        }

        .order-quantity-row > div {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    }
</style>

<div class="order-page">

    <div class="order-heading">
        <h2>Formulir Pemesanan</h2>
        <p>Lengkapi data pemesanan di bawah ini. Anda dapat menambah lebih dari 1 varian puding.</p>
    </div>

    <div class="order-card">

        @if ($errors->any())
            <div class="order-error">
                <strong>Periksa kembali data pemesanan:</strong>
                <ul style="padding-left: 18px; margin-top: 7px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="form-pemesanan" action="{{ route('order.store') }}" method="POST">
            @csrf

            <div class="order-group">
                <label for="nama">
                    Nama Pembeli <span class="order-required">*</span>
                </label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="order-input"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

            <div class="order-group">
                <label for="whatsapp">
                    Nomor WhatsApp <span class="order-required">*</span>
                </label>

                <input
                    type="tel"
                    id="whatsapp"
                    name="whatsapp"
                    class="order-input"
                    value="{{ old('whatsapp') }}"
                    placeholder="Contoh: 081234567890"
                    required
                >

                <p class="order-help">
                    Nomor ini akan digunakan untuk konfirmasi status dan pengiriman pesanan (minimal 12 digit).
                </p>

                <!-- Notifikasi validasi WhatsApp -->
                <div
                    id="whatsapp-error"
                    style="display:none; color:#e11d48; font-size:12px; margin-top:7px;"
                >
                    Nomor WhatsApp tidak valid. Masukkan minimal 12 digit.
                </div>

                @error('whatsapp')
                    <div style="color:#e11d48; font-size:12px; margin-top:7px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            @error('whatsapp')
                <div style="color:#e11d48; font-size:12px; margin-top:7px;">
                    {{ $message }}
                </div>
            @enderror

            <hr class="order-divider">

            <div class="order-section-heading">
                <span class="order-section-title">
                    Pilihan Menu Puding <span class="order-required">*</span>
                </span>
                <a href="{{ route('catalog') }}">Lihat Foto di Katalog →</a>
            </div>

            <div id="order-items-container"></div>

            <button type="button" class="order-add-button" id="btn-add-menu">
                ＋ Tambah Menu Puding Lainnya
            </button>

            <div class="order-total" id="order-total">
                <div class="order-total-label" id="order-total-label"></div>
                <div class="order-total-value" id="order-total-value">Rp0</div>
            </div>

            <hr class="order-divider">

            <div class="order-group">
                <label for="tanggal">
                    Tanggal Pengambilan <span class="order-required">*</span>
                </label>

                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    class="order-input"
                    min="{{ now()->format('Y-m-d') }}"
                    value="{{ old('tanggal') }}"
                    required
                >

                <div class="order-warning" id="tanggal-warning">
                    <strong>⚠️ Maaf, kuota pemesanan untuk tanggal ini sudah penuh/ditutup oleh Admin.</strong>
                    <p style="margin-top: 5px;">
                        Silakan pilih tanggal lain. Dapur Puding Calista membatasi kuota harian agar mutu dan kelembutan puding selalu sempurna.
                    </p>
                </div>

                <div class="order-success" id="tanggal-success"></div>

                @if (count($closedDates) > 0)
                    <div class="order-closed-dates">
                        <strong>ⓘ Tanggal Kuota Penuh / Ditutup oleh Admin:</strong>
                        <div>
                            @foreach ($closedDates as $date)
                                <span class="order-date-badge">{{ $date }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="order-group">
                <label for="waktu">
                    Waktu Pengambilan <span class="order-required">*</span>
                </label>

                <select id="waktu" name="waktu" class="order-input" required>
                    <option value="">-- Pilih Jam Pengambilan --</option>
                    @foreach ($availableTimes as $time)
                        <option
                            value="{{ $time }}"
                            {{ old('waktu', '14:00 WIB') === $time ? 'selected' : '' }}
                        >
                            {{ $time }}
                            @if ($time === '10:00 WIB')
                                (Pagi)
                            @elseif (in_array($time, ['11:00 WIB', '12:00 WIB', '13:00 WIB', '14:00 WIB']))
                                (Siang)
                            @elseif (in_array($time, ['15:00 WIB', '16:00 WIB', '17:00 WIB']))
                                (Sore)
                            @elseif ($time === '18:00 WIB')
                                (Petang)
                            @else
                                (Malam)
                            @endif
                        </option>
                    @endforeach
                </select>

                <p class="order-help">
                    Pilih perkiraan jam pengambilan atau pengantaran pesanan Anda.
                </p>
            </div>

            <div class="order-group">
                <label for="catatan">
                    Catatan Khusus <span style="color: #a8a29e; font-weight: 400;">(Opsional)</span>
                </label>

                <textarea
                    id="catatan"
                    name="catatan"
                    rows="3"
                    class="order-input"
                    placeholder="Contoh: Tulisan kartu ucapan 'Selamat Ulang Tahun Ibu', vla dipisah, dll."
                >{{ old('catatan') }}</textarea>
            </div>

            <button type="submit" class="order-submit" id="btn-submit-pesan">
                Lanjut ke Pembayaran&nbsp; →
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuData = @json($orderMenuData);
    const initialMenuId = @json($initialMenuId);
    const closedDates = @json(array_values($closedDates));

    const container = document.getElementById('order-items-container');
    const addButton = document.getElementById('btn-add-menu');
    const dateInput = document.getElementById('tanggal');
    const dateWarning = document.getElementById('tanggal-warning');
    const dateSuccess = document.getElementById('tanggal-success');
    const submitButton = document.getElementById('btn-submit-pesan');
    const totalBox = document.getElementById('order-total');

    let orderItems = [{
        menuId: initialMenuId,
        jumlah: 1
    }];

    function formatRupiah(number) {
        return 'Rp' + Number(number).toLocaleString('id-ID');
    }

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, function (char) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            }[char];
        });
    }

    function getMenu(id) {
        return menuData.find(menu => String(menu.id) === String(id));
    }

    function renderItems() {
        container.innerHTML = '';

        orderItems.forEach(function (item, index) {
            const menu = getMenu(item.menuId);
            const card = document.createElement('div');

            card.className = 'order-item-card';

            let options = '<option value="">-- Pilih Puding --</option>';

            menuData.forEach(function (product) {
                options += `
                    <option value="${product.id}" ${String(item.menuId) === String(product.id) ? 'selected' : ''}>
                        ${escapeHtml(product.name)} - ${formatRupiah(product.price)}
                    </option>
                `;
            });

            card.innerHTML = `
                <div class="order-item-header">
                    <div class="order-item-title">
                        <span class="order-item-number">${index + 1}</span>
                        <span>${index === 0 ? 'Menu Puding Pilihan' : 'Menu Tambahan #' + (index + 1)}</span>
                    </div>

                    ${index > 0 ? `
                        <button type="button" class="order-remove" data-action="remove">
                            − Hapus Menu
                        </button>
                    ` : ''}
                </div>

                <select
                    class="order-input product-select"
                    name="items[${index}][menu_item_id]"
                    required
                >
                    ${options}
                </select>

                <div class="order-preview" style="${menu ? 'display:flex;' : ''}">
                    ${menu ? `
                        <img src="${escapeHtml(menu.image)}" alt="${escapeHtml(menu.name)}">
                        <div>
                            <div class="order-preview-name">${escapeHtml(menu.name)}</div>
                            <div class="order-preview-price">${formatRupiah(menu.price)}</div>
                            <div class="order-preview-size">${escapeHtml(menu.size)}</div>
                        </div>
                    ` : ''}
                </div>

                <input
                    type="hidden"
                    name="items[${index}][jumlah]"
                    value="${item.jumlah}"
                >

                <div class="order-quantity-row">
                    <span class="order-quantity-label">Jumlah Loyang:</span>

                    <div>
                        <div class="order-quantity-control">
                            <button type="button" data-action="minus" aria-label="Kurangi jumlah">−</button>
                            <span class="order-quantity-value">${item.jumlah}</span>
                            <button type="button" data-action="plus" aria-label="Tambah jumlah">+</button>
                        </div>

                        <span class="order-subtotal">
                            ${menu ? formatRupiah(menu.price * item.jumlah) : ''}
                        </span>
                    </div>
                </div>
            `;

            card.querySelector('.product-select').addEventListener('change', function (event) {
                orderItems[index].menuId = event.target.value;
                renderItems();
            });

            card.querySelectorAll('[data-action]').forEach(function (button) {
                button.addEventListener('click', function () {
                    const action = button.dataset.action;

                    if (action === 'remove') {
                        orderItems.splice(index, 1);
                    } else if (action === 'minus') {
                        orderItems[index].jumlah = Math.max(1, orderItems[index].jumlah - 1);
                    } else if (action === 'plus') {
                        orderItems[index].jumlah = Math.min(20, orderItems[index].jumlah + 1);
                    }

                    renderItems();
                });
            });

            container.appendChild(card);
        });

        updateTotal();
    }

    function updateTotal() {
        let total = 0;
        let totalLoyang = 0;
        let selectedCount = 0;

        orderItems.forEach(function (item) {
            const menu = getMenu(item.menuId);

            if (menu) {
                total += menu.price * item.jumlah;
                totalLoyang += item.jumlah;
                selectedCount++;
            }
        });

        if (total > 0) {
            totalBox.style.display = 'flex';
            document.getElementById('order-total-label').textContent =
                `Total Pesanan (${selectedCount} menu, ${totalLoyang} loyang):`;
            document.getElementById('order-total-value').textContent = formatRupiah(total);
        } else {
            totalBox.style.display = 'none';
        }
    }

    addButton.addEventListener('click', function () {
        orderItems.push({
            menuId: '',
            jumlah: 1
        });

        renderItems();
    });

    function checkClosedDate() {
        const selectedDate = dateInput.value;
        const isClosed = selectedDate && closedDates.includes(selectedDate);

        dateWarning.style.display = isClosed ? 'block' : 'none';
        dateSuccess.style.display = selectedDate && !isClosed ? 'block' : 'none';

        if (selectedDate && !isClosed) {
            dateSuccess.innerHTML =
                '✓ Kuota tanggal <strong>' + escapeHtml(selectedDate) + '</strong> masih tersedia!';
        }

        submitButton.disabled = Boolean(isClosed);
    }

    dateInput.addEventListener('change', checkClosedDate);

    
    // Validasi nomor WhatsApp saat formulir dikirim
    document.getElementById('form-pemesanan').addEventListener('submit', function (event) {
        const whatsapp = document.getElementById('whatsapp').value.replace(/\D/g, '');
        const whatsappError = document.getElementById('whatsapp-error');

        if (whatsapp.length < 12) {
            event.preventDefault();

            whatsappError.style.display = 'block';
            document.getElementById('whatsapp').focus();

            return;
        } else {
            whatsappError.style.display = 'none';
        }

        const incomplete = orderItems.some(item => !item.menuId);

        if (incomplete || orderItems.length === 0) {
            event.preventDefault();
            alert('Silakan pilih menu puding untuk setiap pilihan.');
            return;
        }

        if (!dateInput.value) {
            event.preventDefault();
            alert('Silakan tentukan tanggal pengambilan.');
            return;
        }

        if (closedDates.includes(dateInput.value)) {
            event.preventDefault();
            alert('Maaf, kuota pemesanan untuk tanggal ini sudah ditutup oleh Admin.');
        }
    });

    // Menghilangkan notifikasi ketika nomor WhatsApp diperbaiki
    document.getElementById('whatsapp').addEventListener('input', function () {
        const digits = this.value.replace(/\D/g, '');

        if (digits.length >= 12) {
            document.getElementById('whatsapp-error').style.display = 'none';
        }
    });

    renderItems();
    checkClosedDate();
});
</script>

@endsection