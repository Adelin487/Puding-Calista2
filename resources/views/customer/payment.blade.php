@extends('layouts.app')

@section('content')

@php
    $bankAccounts = [
        [
            'bank' => 'Bank BCA',
            'number' => '123-456-7890',
            'holder' => 'Puding Calista',
            'color' => '#1648d8',
        ],
        [
            'bank' => 'Bank Mandiri',
            'number' => '098-765-4321',
            'holder' => 'Puding Calista',
            'color' => '#c45a13',
        ],
    ];
@endphp

<div class="payment-page">
    <div id="payment-toast" class="payment-toast">
        <span>✓</span>
        <span id="payment-toast-message"></span>
    </div>

    <div class="payment-heading">
        <h1>Pembayaran</h1>
        <p>Silakan selesaikan pembayaran dan unggah bukti transfer di bawah ini.</p>
    </div>

    <div class="payment-container">

        <div class="payment-main-card">

            <div class="payment-bank-panel">

                <div class="payment-bank-heading">
                    <h3>
                        <span>▤</span>
                        REKENING RESMI PUDING CALISTA
                    </h3>

                    <span class="payment-fast-badge">
                        Verifikasi Cepat
                    </span>
                </div>

                <div class="payment-bank-grid">
                    @foreach ($bankAccounts as $account)
                        <div class="payment-bank-card">

                            <span
                                class="payment-bank-title"
                                style="color: {{ $account['color'] }}"
                            >
                                {{ $account['bank'] }}
                            </span>

                            <strong>{{ $account['number'] }}</strong>

                            <small>
                                a.n {{ $account['holder'] }}
                            </small>

                            <button
                                type="button"
                                class="payment-copy-button"
                                onclick="copyAccount('{{ $account['number'] }}')"
                                title="Salin nomor rekening"
                            >
                                <svg width="23" height="23" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="8" y="8" width="13" height="13" rx="2"/>
                                    <path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"/>
                                </svg>
                            </button>

                        </div>
                    @endforeach
                </div>

                <div class="payment-divider"></div>

                <div class="payment-summary-row">
                    <span>Nama Pembeli:</span>
                    <strong>{{ $order->nama }}</strong>
                </div>

                <div class="payment-menu-heading">
                    <span>Daftar Menu:</span>
                    <small>{{ $order->items->count() }} varian</small>
                </div>

                <div class="payment-menu-list">
                    @foreach ($order->items as $item)
                        <div class="payment-menu-item">
                            <span>
                                • {{ $item->product_name }} (x{{ $item->jumlah }})
                            </span>

                            <strong>
                                Rp {{ number_format($item->product_price * $item->jumlah, 0, ',', '.') }}
                            </strong>
                        </div>
                    @endforeach
                </div>

                <div class="payment-summary-row payment-schedule">
                    <span>Jadwal Pengambilan:</span>

                    <strong>
                        {{ $order->tanggal->locale('id')->translatedFormat('l, d F Y') }}
                        • {{ $order->waktu }}
                    </strong>
                </div>

                <div class="payment-total-row">
                    <strong>Total Pembayaran:</strong>

                    <strong>
                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                    </strong>
                </div>

            </div>

            <div class="payment-upload-section">

                <label class="payment-upload-label" for="bukti_pembayaran">
                    Upload Bukti Pembayaran (Gambar / Struk)
                    <span>*</span>
                </label>

                <form
                    action="{{ route('payment.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    id="payment-form"
                >
                    @csrf

                    <div class="payment-upload-area" id="payment-upload-area">

                        <div id="payment-upload-initial">
                            <div class="payment-upload-icon">
                                <svg width="35" height="35" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M12 16V4"/>
                                    <path d="m7 9 5-5 5 5"/>
                                    <path d="M20 16.5v2A2.5 2.5 0 0 1 17.5 21h-11A2.5 2.5 0 0 1 4 18.5v-2"/>
                                </svg>
                            </div>

                            <strong>Klik untuk memilih foto / struk</strong>

                            <small>
                                Mendukung JPG, PNG, atau WebP dari galeri atau kamera HP
                            </small>

                            <label for="bukti_pembayaran" class="payment-select-button">
                                Pilih Foto
                            </label>
                        </div>

                        <input
                            type="file"
                            name="bukti_pembayaran"
                            id="bukti_pembayaran"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            required
                        >

                        <div id="payment-file-preview" style="display:none;">
                            <img
                                id="payment-preview-image"
                                src=""
                                alt="Preview Bukti Pembayaran"
                            >

                            <span id="payment-file-name"></span>

                            <div class="payment-file-actions">
                                <button type="button" id="payment-change-file">
                                    Ganti Foto
                                </button>

                                <button type="button" id="payment-remove-file">
                                    Hapus Foto
                                </button>
                            </div>
                        </div>

                    </div>

                    @error('bukti_pembayaran')
                        <p class="payment-error">{{ $message }}</p>
                    @enderror

                    <p id="payment-client-error" class="payment-error" style="display:none;"></p>

                    <button type="submit" class="payment-submit" id="payment-submit">
                        Kirim Bukti Pembayaran
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<style>
.payment-page {
    min-height: 100vh;
    background: #fff9f7;
    padding: 20px 24px 70px;
}

.payment-heading {
    text-align: center;
    margin: 0 auto 35px;
    max-width: 700px;
}

.payment-heading h1 {
    color: #ed0045;
    font-family: Georgia, serif;
    font-size: 46px;
    font-weight: 700;
    margin: 0 0 10px;
}

.payment-heading p {
    color: #624d50;
    font-size: 21px;
    line-height: 1.45;
    margin: 0;
}

.payment-container {
    max-width: 1008px;
    width: 100%;
    margin: 0 auto;
}

.payment-main-card {
    background: #fff;
    border: 1px solid #ffdce3;
    border-radius: 36px;
    padding: 48px;
    box-shadow: 0 8px 25px rgba(235, 0, 69, .035);
}

.payment-bank-panel {
    background: linear-gradient(135deg, #fff7f8, #fffafa);
    border: 1px solid #ffcbd5;
    border-radius: 24px;
    padding: 30px;
}

.payment-bank-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 24px;
}

.payment-bank-heading h3 {
    color: #ed0045;
    font-size: 18px;
    font-weight: 700;
    margin: 0;
}

.payment-bank-heading h3 span {
    font-size: 23px;
    margin-right: 5px;
}

.payment-fast-badge {
    background: #c9f7e6;
    color: #006b50;
    border-radius: 30px;
    padding: 7px 15px;
    font-size: 14px;
    font-weight: 700;
    white-space: nowrap;
}

.payment-bank-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.payment-bank-card {
    background: #fff;
    border: 1px solid #ffdae1;
    border-radius: 19px;
    padding: 22px 20px;
    min-height: 128px;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 7px;
}

.payment-bank-title {
    font-size: 16px;
    font-weight: 600;
}

.payment-bank-card > strong {
    color: #171717;
    font-size: 20px;
    letter-spacing: 1px;
}

.payment-bank-card small {
    color: #a08c91;
    font-size: 14px;
}

.payment-copy-button {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    border: 1px solid #e6e1df;
    background: #faf9f8;
    color: #5d5855;
    border-radius: 13px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: .2s;
}

.payment-copy-button:hover {
    background: #ffe8ed;
    color: #ed0045;
}

.payment-divider {
    height: 1px;
    background: #ffcbd5;
    margin: 24px 0 14px;
}

.payment-summary-row,
.payment-menu-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin: 12px 0;
}

.payment-summary-row > span,
.payment-menu-heading > span {
    color: #897477;
    font-size: 20px;
}

.payment-summary-row > strong {
    color: #171717;
    font-size: 20px;
    text-align: right;
}

.payment-menu-heading small {
    color: #a18d91;
    font-size: 14px;
}

.payment-menu-list {
    display: grid;
    gap: 8px;
}

.payment-menu-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: rgba(255,255,255,.75);
    border: 1px solid #ffdae1;
    border-radius: 17px;
    color: #171717;
    font-size: 16px;
}

.payment-menu-item strong {
    color: #ed0045;
    white-space: nowrap;
}

.payment-schedule {
    margin-top: 14px;
}

.payment-total-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-top: 30px;
}

.payment-total-row strong:first-child {
    color: #493d3d;
    font-size: 20px;
}

.payment-total-row strong:last-child {
    color: #ed0045;
    font-size: 29px;
}

.payment-upload-section {
    padding: 35px 24px 0;
}

.payment-upload-label {
    display: block;
    color: #282020;
    font-size: 19px;
    font-weight: 700;
    margin-bottom: 15px;
}

.payment-upload-label span {
    color: #ed0045;
}

.payment-upload-area {
    min-height: 310px;
    border: 3px dashed #ffcbd5;
    border-radius: 24px;
    background: #fffdfd;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    gap: 12px;
    padding: 25px;
    cursor: pointer;
    transition: .2s;
}

.payment-upload-area:hover {
    background: #fff7f9;
    border-color: #ed7192;
}

.payment-upload-icon {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: #ffe4e8;
    color: #ed0045;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0;
}

.payment-upload-area > strong {
    color: #ed0045;
    font-size: 20px;
}

.payment-upload-area > small {
    color: #a08c91;
    font-size: 16px;
}

.payment-upload-area input[type="file"] {
    display: none;
}

#payment-upload-initial {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
}

.payment-select-button,
#payment-change-file,
#payment-remove-file {
    border: 0;
    border-radius: 25px;
    padding: 9px 18px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s;
}

.payment-select-button,
#payment-change-file {
    background: #ffe4e8;
    color: #ed0045;
}

.payment-select-button:hover,
#payment-change-file:hover {
    background: #ffd0da;
}

.payment-file-actions {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
}

#payment-remove-file {
    background: #fee2e2;
    color: #dc2626;
}

#payment-remove-file:hover {
    background: #fecaca;
}

.payment-upload-area input[type="file"]::file-selector-button {
    background: #ffe4e8;
    border: 0;
    border-radius: 30px;
    padding: 10px 19px;
    margin-right: 15px;
    color: #ed0045;
    font-size: 15px;
    cursor: pointer;
}

#payment-file-preview {
    width: 100%;
    color: #785b65;
    font-size: 13px;
    margin-top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

#payment-preview-image {
    display: block;
    width: 100%;
    max-width: 300px;
    max-height: 250px;
    object-fit: contain;
    border-radius: 12px;
    border: 1px solid #ffcbd5;
    background: #fff;
    padding: 5px;
}

#payment-preview-image {
    display: block;
    width: 100%;
    max-width: 300px;
    max-height: 250px;
    object-fit: contain;
    border-radius: 12px;
    border: 1px solid #ffcbd5;
    background: #fff;
    padding: 5px;
}

#payment-preview-image {
    display: block;
    width: 100%;
    max-width: 300px;
    max-height: 250px;
    object-fit: contain;
    border-radius: 12px;
    border: 1px solid #ffcbd5;
    background: #fff;
    padding: 5px;
}

#payment-remove-file {
    display: block;
    margin: 8px auto 0;
    border: 0;
    background: #ffe4e8;
    color: #ed0045;
    border-radius: 20px;
    padding: 7px 15px;
    cursor: pointer;
}

.payment-error {
    color: #e11d48;
    font-size: 13px;
    margin-top: 10px;
}

.payment-toast {
    position: fixed;
    top: 25px;
    right: 25px;
    z-index: 9999;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 20px;
    border-radius: 12px;
    background: #059669;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .15);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: .3s ease;
}

.payment-toast.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.payment-toast span:first-child {
    width: 23px;
    height: 23px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255, 255, 255, .2);
    font-size: 14px;
}

@media (max-width: 600px) {
    .payment-toast {
        top: 15px;
        right: 12px;
        left: 12px;
        justify-content: center;
        font-size: 12px;
    }
}

.payment-submit {
    width: 100%;
    min-height: 78px;
    background: #ff1754;
    color: white;
    border: 0;
    border-radius: 24px;
    margin-top: 24px;
    font-size: 22px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 12px 20px rgba(255, 23, 84, .18);
    transition: .2s;
}

.payment-submit:hover {
    background: #e90045;
    transform: translateY(-1px);
}

.payment-submit:disabled {
    opacity: .65;
    cursor: not-allowed;
    transform: none;
}


/* RESPONSIVE MOBILE */

@media (max-width: 700px) {
    .payment-page {
        padding: 20px 12px 45px;
    }

    .payment-heading {
        margin-bottom: 25px;
    }

    .payment-heading h1 {
        font-size: 34px;
    }

    .payment-heading p {
        font-size: 15px;
    }

    .payment-container {
        max-width: 100%;
    }

    .payment-main-card {
        padding: 18px;
        border-radius: 23px;
    }

    .payment-bank-panel {
        padding: 18px;
        border-radius: 18px;
    }

    .payment-bank-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .payment-bank-heading h3 {
        font-size: 14px;
    }

    .payment-bank-grid {
        grid-template-columns: 1fr;
    }

    .payment-bank-card {
        padding: 17px;
    }

    .payment-summary-row > span,
    .payment-menu-heading > span {
        font-size: 14px;
    }

    .payment-summary-row > strong {
        font-size: 14px;
    }

    .payment-menu-item {
        font-size: 13px;
    }

    .payment-total-row strong:first-child {
        font-size: 15px;
    }

    .payment-total-row strong:last-child {
        font-size: 20px;
    }

    .payment-upload-section {
        padding: 25px 0 0;
    }

    .payment-upload-label {
        font-size: 15px;
    }

    .payment-upload-area {
        min-height: 250px;
        padding: 18px;
    }

    .payment-upload-area > strong {
        font-size: 16px;
    }

    .payment-upload-area > small {
        font-size: 12px;
    }

    .payment-submit {
        min-height: 62px;
        font-size: 17px;
        border-radius: 17px;
    }
}

/* PENYESUAIAN UKURAN DESKTOP */

@media (min-width: 701px) {
    .payment-page {
        padding: 14px 20px 50px;
    }

    .payment-heading {
        margin-bottom: 25px;
    }

    .payment-heading h1 {
        font-size: 33px;
    }

    .payment-heading p {
        font-size: 15px;
    }

    .payment-container {
        max-width: 720px;
    }

    .payment-main-card {
        padding: 35px;
        border-radius: 26px;
    }

    .payment-bank-panel {
        padding: 22px;
        border-radius: 18px;
    }

    .payment-bank-heading {
        margin-bottom: 17px;
    }

    .payment-bank-heading h3 {
        font-size: 14px;
    }

    .payment-fast-badge {
        padding: 6px 12px;
        font-size: 12px;
    }

    .payment-bank-grid {
        gap: 13px;
    }

    .payment-bank-card {
        min-height: 92px;
        padding: 16px;
        gap: 5px;
    }

    .payment-bank-title {
        font-size: 13px;
    }

    .payment-bank-card > strong {
        font-size: 15px;
    }

    .payment-bank-card small {
        font-size: 11px;
    }

    .payment-copy-button {
        width: 38px;
        height: 38px;
        right: 12px;
    }

    .payment-divider {
        margin: 18px 0 12px;
    }

    .payment-summary-row,
    .payment-menu-heading {
        margin: 9px 0;
    }

    .payment-summary-row > span,
    .payment-menu-heading > span {
        font-size: 14px;
    }

    .payment-summary-row > strong {
        font-size: 14px;
    }

    .payment-menu-heading small {
        font-size: 12px;
    }

    .payment-menu-item {
        padding: 11px;
        font-size: 12px;
        border-radius: 12px;
    }

    .payment-total-row {
        margin-top: 20px;
    }

    .payment-total-row strong:first-child {
        font-size: 15px;
    }

    .payment-total-row strong:last-child {
        font-size: 21px;
    }

    .payment-upload-section {
        padding: 26px 17px 0;
    }

    .payment-upload-label {
        font-size: 14px;
        margin-bottom: 12px;
    }

    .payment-upload-area {
        min-height: 220px;
        padding: 18px;
        border-radius: 17px;
    }

    .payment-upload-icon {
        width: 55px;
        height: 55px;
    }

    .payment-upload-area > strong {
        font-size: 15px;
    }

    .payment-upload-area > small {
        font-size: 12px;
    }

    .payment-upload-area input[type="file"] {
        margin-top: 12px;
        font-size: 12px;
    }

    .payment-upload-area input[type="file"]::file-selector-button {
        padding: 8px 14px;
        font-size: 12px;
    }

    .payment-submit {
        min-height: 56px;
        margin-top: 17px;
        font-size: 16px;
        border-radius: 16px;
    }
}
</style>

<script>

function showPaymentToast(message, success = true) {
    const toast = document.getElementById('payment-toast');
    const toastMessage = document.getElementById('payment-toast-message');
    const icon = toast.querySelector('span:first-child');

    toastMessage.textContent = message;
    icon.textContent = success ? '✓' : '!';

    toast.style.background = success ? '#059669' : '#dc2626';

    toast.classList.add('show');

    clearTimeout(window.paymentToastTimer);

    window.paymentToastTimer = setTimeout(() => {
        toast.classList.remove('show');
    }, 2500);
}

function copyAccount(number) {
    const cleanNumber = number.replace(/-/g, '');

    navigator.clipboard.writeText(cleanNumber)
        .then(() => {
            showPaymentToast('Nomor rekening berhasil disalin!');
        })
        .catch(() => {
            showPaymentToast('Tidak dapat menyalin nomor rekening.', false);
        });
}


const paymentInput = document.getElementById('bukti_pembayaran');
const paymentForm = document.getElementById('payment-form');
const paymentError = document.getElementById('payment-client-error');
const filePreview = document.getElementById('payment-file-preview');
const fileName = document.getElementById('payment-file-name');
const previewImage = document.getElementById('payment-preview-image');
const uploadInitial = document.getElementById('payment-upload-initial');
const changeFileButton = document.getElementById('payment-change-file');

let previewUrl = null;

paymentInput.addEventListener('change', function () {
    const file = this.files[0];

    paymentError.style.display = 'none';

    if (!file) return;

    const allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    if (!allowedTypes.includes(file.type)) {
        this.value = '';
        paymentError.textContent = 'Format file harus JPG, PNG, atau WebP.';
        paymentError.style.display = 'block';
        return;
    }

    if (file.size > 5 * 1024 * 1024) {
        this.value = '';
        paymentError.textContent = 'Ukuran file maksimal 5 MB.';
        paymentError.style.display = 'block';
        return;
    }

    if (previewUrl) {
        URL.revokeObjectURL(previewUrl);
    }

    previewUrl = URL.createObjectURL(file);

    previewImage.src = previewUrl;
    fileName.textContent = 'File dipilih: ' + file.name;

    uploadInitial.style.display = 'none';
    filePreview.style.display = 'flex';
});

// Tombol Ganti Foto
changeFileButton.addEventListener('click', function () {
    paymentInput.click();
});

// Tombol Hapus Foto
document.getElementById('payment-remove-file').addEventListener('click', function () {
    paymentInput.value = '';

    previewImage.src = '';
    fileName.textContent = '';

    filePreview.style.display = 'none';
    uploadInitial.style.display = 'flex';

    paymentError.style.display = 'none';

    if (previewUrl) {
        URL.revokeObjectURL(previewUrl);
        previewUrl = null;
    }
});

paymentForm.addEventListener('submit', function (event) {
    if (!paymentInput.files.length) {
        event.preventDefault();
        paymentError.textContent = 'Silakan pilih foto bukti pembayaran terlebih dahulu.';
        paymentError.style.display = 'block';
        return;
    }

    const submitButton = document.getElementById('payment-submit');
    submitButton.disabled = true;
    submitButton.textContent = 'Mengirim Bukti Pembayaran...';
});
</script>

@endsection