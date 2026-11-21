<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Puding Calista</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #fff9f7;
            color: #292524;
            min-height: 100vh;
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

        /* MAIN CONTENT */

        .main-content {
            max-width: 1800px;
            margin: auto;
            padding: 43px 2.3% 60px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 36px;
        }

        .page-heading h1 {
            font-family: 'Playfair Display', serif;
            color: #211c19;
            font-size: 43px;
            font-weight: 800;
        }

        .page-heading p {
            margin-top: 4px;
            color: #8a7d75;
            font-size: 20px;
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            padding: 17px 28px;
            border: none;
            border-radius: 24px;
            background: #ff174d;
            color: white;
            font-family: inherit;
            font-size: 19px;
            font-weight: 800;
            text-decoration: none;
            white-space: nowrap;
            box-shadow: 0 5px 12px rgba(255,23,77,.18);
            cursor: pointer;
            transition: .2s;
        }

        .add-button:hover {
            background: #e91243;
            transform: translateY(-2px);
        }

        /* PRODUCT GRID */

        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 30px;
        }

        .product-card {
            min-width: 0;
            overflow: hidden;
            background: white;
            border: 1px solid #f8dedd;
            border-radius: 38px;
            box-shadow: 0 3px 5px rgba(0,0,0,.04);
            transition: .2s;
        }

        .product-card:hover {
            box-shadow: 0 7px 18px rgba(0,0,0,.08);
            transform: translateY(-3px);
        }

        .product-image-wrapper {
            position: relative;
            width: 100%;
            height: 265px;
            background: #f8efed;
            overflow: hidden;
        }

        .product-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            color: #c4aaa5;
            font-size: 45px;
        }

        .availability-badge {
            position: absolute;
            top: 19px;
            left: 18px;
            padding: 9px 17px;
            border-radius: 22px;
            background: #00bd83;
            color: white;
            font-size: 15px;
            font-weight: 800;
        }

        .availability-badge.unavailable {
            background: #a8a29e;
        }

        .availability-badge i {
            margin-right: 4px;
            font-size: 10px;
        }

        .favorite-badge {
            position: absolute;
            top: 19px;
            right: 17px;
            padding: 9px 16px;
            border-radius: 22px;
            background: #ff174d;
            color: white;
            font-size: 13px;
            font-weight: 800;
        }

        .favorite-badge i {
            margin-right: 5px;
        }

        /* PRODUCT INFORMATION */

        .product-info {
            min-height: 278px;
            padding: 29px 30px 25px;
            display: flex;
            flex-direction: column;
        }

        .product-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
        }

        .product-name {
            font-family: 'Playfair Display', serif;
            color: #211c19;
            font-size: 23px;
            font-weight: 800;
            line-height: 1.4;
        }

        .product-price {
            flex-shrink: 0;
            color: #ff174d;
            font-size: 21px;
            font-weight: 800;
            white-space: nowrap;
        }

        .product-size {
            margin-top: 4px;
            color: #786e68;
            font-size: 16px;
        }

        .product-description {
            margin-top: 15px;
            color: #786e68;
            font-size: 16px;
            line-height: 1.8;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* PRODUCT FOOTER */

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: auto;
            padding-top: 17px;
            border-top: 1px solid #faeeee;
        }

        .product-status {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 11px 19px;
            border: 1px solid #8af2c7;
            border-radius: 19px;
            background: #effdf6;
            color: #047857;
            font-family: inherit;
            font-size: 16px;
            font-weight: 800;
            white-space: nowrap;
            cursor: pointer;
        }

        .product-status.unavailable {
            border-color: #fecaca;
            background: #fff1f2;
            color: #be123c;
        }

        .product-actions {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .action-button {
            width: 49px;
            height: 49px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 18px;
            background: #f5f5f5;
            color: #57534e;
            font-size: 21px;
            cursor: pointer;
            transition: .2s;
        }

        .action-button:hover {
            background: #ffecef;
            color: #ff174d;
        }

        .empty-message {
            grid-column: 1 / -1;
            padding: 65px 20px;
            border: 1px solid #f8dedd;
            border-radius: 28px;
            background: white;
            text-align: center;
            color: #928781;
        }

        .empty-message i {
            margin-bottom: 15px;
            color: #ff9bad;
            font-size: 45px;
        }

        .empty-message h3 {
            margin-bottom: 8px;
            color: #292524;
            font-family: 'Playfair Display', serif;
            font-size: 24px;
        }

        .pagination {
            margin-top: 30px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        /* RESPONSIVE */

        @media (max-width: 1250px) {
            .admin-header {
                grid-template-columns: auto 1fr;
            }

            .admin-nav {
                grid-column: 1 / -1;
                grid-row: 2;
                justify-self: center;
            }

            .admin-brand {
                grid-column: 2;
                grid-row: 1;
            }

            .catalog-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 750px) {
            .admin-header {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 18px 16px;
            }

            .admin-nav {
                width: 100%;
                justify-content: flex-start;
                overflow-x: auto;
            }

            .nav-item {
                padding: 12px;
                font-size: 13px;
            }

            .logout-button {
                padding: 12px 14px;
                font-size: 12px;
            }

            .admin-brand {
                gap: 8px;
            }

            .brand-name {
                font-size: 17px;
            }

            .brand-description {
                font-size: 10px;
            }

            .admin-badge {
                padding: 3px 7px;
                font-size: 10px;
            }

            .brand-icon {
                width: 40px;
                height: 40px;
                font-size: 19px;
            }

            .main-content {
                padding: 28px 16px 40px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-heading h1 {
                font-size: 30px;
            }

            .page-heading p {
                font-size: 14px;
                line-height: 1.6;
            }

            .add-button {
                width: 100%;
                padding: 14px;
                font-size: 15px;
            }

            .catalog-grid {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .product-image-wrapper {
                height: 230px;
            }

            .product-info {
                min-height: 245px;
                padding: 22px 20px;
            }

            .product-name {
                font-size: 19px;
            }

            .product-price {
                font-size: 17px;
            }

            .product-size,
            .product-description {
                font-size: 14px;
            }

            .product-card {
                border-radius: 25px;
            }
        }

        @media (max-width: 400px) {
            .product-top {
                flex-direction: column;
            }

            .product-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .product-actions {
                align-self: flex-end;
            }
        }


        /* =====================================
        PENYESUAIAN UKURAN AGAR SAMA DENGAN
        HALAMAN DATA PESANAN
        ===================================== */

        /* HEADER */
        .admin-header {
            min-height: 85px;
            padding: 12px 6.4%;
            gap: 18px;
        }

        .logout-button {
            padding: 13px 20px;
            border-radius: 18px;
            font-size: 14px;
            gap: 9px;
        }

        .logout-button i {
            font-size: 16px;
        }

        .admin-nav {
            gap: 5px;
            padding: 6px;
            border-radius: 23px;
        }

        .nav-item {
            padding: 12px 17px;
            gap: 9px;
            border-radius: 17px;
            font-size: 16px;
        }

        .admin-brand {
            gap: 12px;
        }

        .brand-name {
            gap: 9px;
            font-size: 22px;
        }

        .admin-badge {
            padding: 4px 10px;
            font-size: 11px;
        }

        .brand-description {
            font-size: 12px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            font-size: 23px;
        }

        /* KONTEN UTAMA */
        .main-content {
            max-width: 1650px;
            padding: 42px 6.4% 60px;
        }

        .page-heading {
            margin-bottom: 30px;
            gap: 20px;
        }

        .page-heading h1 {
            font-size: 37px;
        }

        .page-heading p {
            font-size: 16px;
            line-height: 1.6;
        }

        /* TOMBOL TAMBAH */
        .add-button {
            padding: 13px 20px;
            gap: 10px;
            border-radius: 18px;
            font-size: 15px;
        }

        /* GRID PRODUK */
        .catalog-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
        }

        .product-card {
            border-radius: 27px;
        }

        /* FOTO PRODUK */
        .product-image-wrapper {
            height: 220px;
        }

        .availability-badge {
            top: 15px;
            left: 15px;
            padding: 8px 13px;
            font-size: 13px;
        }

        .favorite-badge {
            top: 15px;
            right: 15px;
            padding: 8px 12px;
            font-size: 11px;
        }

        /* INFORMASI PRODUK */
        .product-info {
            min-height: 235px;
            padding: 22px 22px 20px;
        }

        .product-name {
            font-size: 19px;
            line-height: 1.4;
        }

        .product-price {
            font-size: 17px;
        }

        .product-size {
            font-size: 14px;
        }

        .product-description {
            margin-top: 12px;
            font-size: 14px;
            line-height: 1.6;
        }

        /* FOOTER KARTU */
        .product-footer {
            padding-top: 14px;
        }

        .product-status {
            padding: 9px 15px;
            border-radius: 16px;
            font-size: 14px;
            gap: 7px;
        }

        .product-actions {
            gap: 7px;
        }

        .action-button {
            width: 43px;
            height: 43px;
            border-radius: 15px;
            font-size: 17px;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .admin-header {
                grid-template-columns: auto 1fr;
            }

            .admin-nav {
                grid-column: 1 / -1;
                grid-row: 2;
            }

            .admin-brand {
                grid-column: 2;
                grid-row: 1;
            }

            .catalog-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 750px) {
            .admin-header {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 15px 16px;
            }

            .admin-nav {
                width: 100%;
                justify-content: flex-start;
                overflow-x: auto;
            }

            .nav-item {
                padding: 11px 12px;
                font-size: 12px;
            }

            .main-content {
                padding: 28px 16px 40px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-heading h1 {
                font-size: 29px;
            }

            .page-heading p {
                font-size: 14px;
            }

            .add-button {
                width: 100%;
                padding: 13px;
                font-size: 14px;
            }

            .catalog-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .product-image-wrapper {
                height: 210px;
            }

            .product-info {
                min-height: 215px;
                padding: 20px;
            }

            .product-name {
                font-size: 18px;
            }

            .product-price {
                font-size: 16px;
            }
        }

        @media (max-width: 430px) {
            .product-top {
                flex-direction: row;
            }

            .product-footer {
                align-items: center;
                flex-direction: row;
            }

            .product-actions {
                align-self: auto;
            }
        }


        /* Tombol tambah produk */
        .catalog-add-button {
            border: none;
            border-radius: 12px;
            background: #ff174d;
            color: #fff;
            padding: 13px 20px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(255, 23, 77, .15);
        }

        .catalog-add-button:hover {
            background: #e91345;
        }

        /* Modal tambah produk */
        .product-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(30, 15, 20, .65);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .product-modal-overlay.active {
            display: flex;
        }

        .product-modal {
            width: 100%;
            max-width: 620px;
            max-height: 95vh;
            background: #fff;
            border-radius: 25px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 15px 50px rgba(0, 0, 0, .2);
        }

        .product-modal-header {
            background: #fff3f6;
            border-bottom: 1px solid #f8e1e7;
            padding: 25px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .product-modal-header h2 {
            font-family: Georgia, serif;
            font-size: 20px;
            margin: 0 0 5px;
            color: #242020;
        }

        .product-modal-header p {
            margin: 0;
            color: #888;
            font-size: 14px;
        }

        .product-modal-close {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border: 1px solid #e5e0e0;
            border-radius: 50%;
            background: #fff;
            color: #666;
            font-size: 23px;
            cursor: pointer;
        }

        .product-modal-body {
            padding: 25px 22px 18px;
            overflow-y: auto;
        }

        .product-form-group {
            margin-bottom: 21px;
        }

        .product-form-group label {
            display: block;
            margin-bottom: 9px;
            color: #494541;
            font-size: 15px;
            font-weight: 700;
        }

        .product-form-group input,
        .product-form-group textarea {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #e5dfdf;
            border-radius: 15px;
            padding: 14px 17px;
            font-family: inherit;
            font-size: 15px;
            color: #494541;
            outline: none;
        }

        .product-form-group input:focus,
        .product-form-group textarea:focus {
            border-color: #ff174d;
            box-shadow: 0 0 0 3px rgba(255, 23, 77, .08);
        }

        .product-form-group input::placeholder,
        .product-form-group textarea::placeholder {
            color: #aaa;
        }

        .product-form-group textarea {
            min-height: 75px;
            resize: vertical;
        }

        .product-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .product-upload-area {
            min-height: 205px;
            border: 2px dashed #d9d4d4;
            border-radius: 20px;
            background: #fafafa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .product-upload-icon {
            width: 58px;
            height: 58px;
            border-radius: 19px;
            background: #ffe8ee;
            color: #ff174d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            margin-bottom: 12px;
        }

        .product-upload-area strong {
            color: #383333;
            font-size: 15px;
        }

        .product-upload-area small {
            color: #999;
            margin-top: 7px;
            font-size: 12px;
        }

        .product-upload-label {
            background: #ffe8ed;
            color: #ff174d;
            border-radius: 20px;
            padding: 5px 13px;
            font-size: 12px;
            margin-top: 11px;
        }

        .product-image-preview {
            display: none;
            max-width: 100%;
            max-height: 180px;
            border-radius: 12px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        .product-badge-hint {
            display: block;
            margin-top: 8px;
            color: #aaa;
            font-size: 12px;
        }

        .product-modal-footer {
            border-top: 1px solid #f0eeee;
            padding-top: 15px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .product-cancel-button,
        .product-submit-button {
            border: none;
            border-radius: 14px;
            padding: 14px 20px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .product-cancel-button {
            background: #f3f3f3;
            color: #494541;
        }

        .product-submit-button {
            background: #ff174d;
            color: #fff;
            min-width: 200px;
        }

        @media (max-width: 600px) {
            .product-modal-overlay {
                padding: 0;
            }

            .product-modal {
                max-height: 100vh;
                height: 100%;
                border-radius: 24px;
            }

            .product-form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .product-modal-footer {
                position: sticky;
                bottom: 0;
                background: #fff;
            }

            .product-submit-button {
                min-width: 0;
            }
        }


        /* PERBAIKAN MODAL TAMBAH PRODUK */

        .product-modal {
            display: flex;
            flex-direction: column;
            min-height: 0;
        }

        .product-modal form {
            display: flex;
            flex-direction: column;
            min-height: 0;
            flex: 1;
            overflow: hidden;
        }

        .product-modal-body {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            padding: 25px 22px 0;
        }

        /* Area upload foto */
        .product-form-group .product-upload-area {
            display: flex !important;
            width: 100%;
            min-height: 205px;
            margin: 0;
            padding: 25px 15px;
            box-sizing: border-box;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 0;
            border: 2px dashed #d9d4d4;
            border-radius: 20px;
            background: #fafafa;
            cursor: pointer;
            text-align: center;
        }

        .product-upload-area .product-upload-icon {
            display: flex;
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            margin: 0 0 12px;
        }

        .product-upload-area strong {
            display: block;
            margin: 0;
        }

        .product-upload-area small {
            display: block;
            margin: 7px 0 0;
        }

        .product-upload-area .product-upload-label {
            display: inline-block;
            margin-top: 11px;
        }

        .product-upload-area .product-image-preview {
            max-width: 100%;
            max-height: 180px;
            margin: 0 auto 12px;
            object-fit: contain;
        }

        /* Tombol modal */
        .product-modal-footer {
            position: sticky;
            bottom: 0;
            z-index: 5;
            display: flex !important;
            flex-shrink: 0;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            padding: 15px 22px 18px;
            margin: 0;
            background: #fff;
            border-top: 1px solid #f0eeee;
        }

        .product-modal-footer button {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .product-cancel-button {
            min-width: 80px;
        }

        .product-submit-button {
            min-width: 200px;
        }

        @media (max-width: 600px) {
            .product-modal {
                height: 100%;
                max-height: 100vh;
            }

            .product-modal-footer {
                padding: 15px 18px 18px;
            }

            .product-submit-button {
                flex: 1;
                min-width: 0;
            }
        }


        /* MODAL EDIT PRODUK */
        .edit-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 10000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(30, 15, 20, .65);
        }

        .edit-modal-overlay.active {
            display: flex;
        }

        .edit-modal {
            width: 100%;
            max-width: 620px;
            max-height: 95vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: #fff;
            border-radius: 27px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, .2);
        }

        .edit-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 25px 24px;
            background: #fff3f6;
            border-bottom: 1px solid #f8e1e7;
        }

        .edit-modal-header h2 {
            margin: 0 0 5px;
            color: #292524;
            font-family: 'Playfair Display', serif;
            font-size: 20px;
        }

        .edit-modal-header p {
            margin: 0;
            color: #888;
            font-size: 14px;
        }

        .edit-modal-close {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border: 1px solid #e5e0e0;
            border-radius: 50%;
            background: white;
            color: #666;
            font-size: 23px;
            cursor: pointer;
        }

        .edit-modal form {
            display: flex;
            flex: 1;
            flex-direction: column;
            min-height: 0;
            overflow: hidden;
        }

        .edit-modal-body {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            padding: 25px 24px 0;
        }

        .edit-form-group {
            margin-bottom: 21px;
        }

        .edit-form-group > label {
            display: block;
            margin-bottom: 9px;
            color: #494541;
            font-size: 15px;
            font-weight: 700;
        }

        .edit-form-group input[type="text"],
        .edit-form-group input[type="number"],
        .edit-form-group textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 14px 17px;
            border: 1px solid #e5dfdf;
            border-radius: 15px;
            outline: none;
            color: #494541;
            background: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
        }

        .edit-form-group textarea {
            min-height: 75px;
            resize: vertical;
        }

        .edit-form-group input:focus,
        .edit-form-group textarea:focus {
            border-color: #ff174d;
            box-shadow: 0 0 0 3px rgba(255, 23, 77, .08);
        }

        .edit-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        /* FOTO PRODUK LAMA */
        .edit-photo-preview {
            display: flex;
            align-items: center;
            gap: 17px;
            padding: 15px;
            border: 2px dashed #ffbdca;
            border-radius: 19px;
            background: #fff9fa;
        }

        .edit-photo-preview img {
            width: 132px;
            height: 114px;
            flex-shrink: 0;
            object-fit: cover;
            border: 1px solid #f3e4e4;
            border-radius: 13px;
        }

        .edit-photo-details {
            min-width: 0;
        }

        .edit-photo-status {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            color: #008b62;
            font-size: 14px;
            font-weight: 700;
        }

        .edit-photo-details p {
            margin: 0 0 10px;
            color: #888;
            font-size: 13px;
            line-height: 1.6;
        }

        .edit-change-photo {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            border: 1px solid #ded8d8;
            border-radius: 13px;
            background: #fff;
            color: #494541;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .edit-change-photo i {
            color: #ff174d;
        }

        .edit-photo-input {
            display: none;
        }

        .edit-badge-hint {
            display: block;
            margin-top: 8px;
            color: #aaa;
            font-size: 12px;
        }

        /* FOOTER EDIT */
        .edit-modal-footer {
            position: sticky;
            bottom: 0;
            z-index: 2;
            display: flex;
            flex-shrink: 0;
            justify-content: flex-end;
            gap: 12px;
            padding: 15px 24px 20px;
            border-top: 1px solid #f0eeee;
            background: #fff;
        }

        .edit-cancel-button,
        .edit-submit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 20px;
            border: none;
            border-radius: 14px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .edit-cancel-button {
            background: #f3f3f3;
            color: #494541;
        }

        .edit-submit-button {
            min-width: 210px;
            background: #ff174d;
            color: #fff;
        }

        @media (max-width: 600px) {
            .edit-modal-overlay {
                padding: 0;
            }

            .edit-modal {
                height: 100%;
                max-height: 100vh;
                border-radius: 24px;
            }

            .edit-form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .edit-photo-preview {
                align-items: flex-start;
                gap: 12px;
            }

            .edit-photo-preview img {
                width: 105px;
                height: 100px;
            }

            .edit-modal-footer {
                padding: 14px 18px 18px;
            }

            .edit-submit-button {
                min-width: 0;
                flex: 1;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER ADMIN -->

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

            <a href="{{ route('admin.catalog.index') }}" class="nav-item active">
                <i class="fa-solid fa-book-open"></i>
                Katalog Produk
            </a>

            <a href="{{ route('admin.po.index') }}" class="nav-item">
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


    <!-- MAIN CONTENT -->

    <main class="main-content">

        <!-- JUDUL HALAMAN -->

        <div class="page-heading">

            <div>
                <h1>Katalog Produk Puding</h1>

                <p>
                    Tambah varian puding baru, ubah harga, upload foto produk, atau atur ketersediaan menu.
                </p>
            </div>

            <button type="button" class="add-button" onclick="openAddModal()">
                <i class="fa-solid fa-plus"></i>
                Tambah Varian Puding Baru
            </button>

        </div>


        <!-- DAFTAR PRODUK -->

        <div class="catalog-grid">

            @forelse ($products as $product)

                <article class="product-card">

                    <!-- FOTO PRODUK -->

                    <div class="product-image-wrapper">

                        @if ($product->image)
                            <img
                                src="{{ asset($product->image) }}"
                                alt="{{ $product->name }}"
                                class="product-image"
                            >
                        @else
                            <div class="image-placeholder">
                                <i class="fa-solid fa-image"></i>
                            </div>
                        @endif

                        <!-- STATUS KETERSEDIAAN -->

                        <span class="availability-badge {{ $product->is_available ? '' : 'unavailable' }}">
                            <i class="fa-solid fa-circle"></i>
                            {{ $product->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span>

                        <!-- FAVORIT -->

                        @if ($product->popular)
                            <span class="favorite-badge">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                                Favorit Pelanggan
                            </span>
                        @endif

                    </div>


                    <!-- INFORMASI PRODUK -->

                    <div class="product-info">

                        <div class="product-top">

                            <h2 class="product-name">
                                {{ $product->name }}
                            </h2>

                            <span class="product-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>

                        </div>

                        <div class="product-size">
                            {{ $product->size }}
                        </div>

                        @if ($product->description)
                            <p class="product-description">
                                {{ $product->description }}
                            </p>
                        @endif


                        <!-- FOOTER KARTU -->

                        <div class="product-footer">

                            <button
                                type="button"
                                class="product-status {{ $product->is_available ? '' : 'unavailable' }}"
                            >
                                <i class="fa-solid {{ $product->is_available ? 'fa-check' : 'fa-xmark' }}"></i>

                                {{ $product->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                            </button>

                            <div class="product-actions">

                                <button
                                    type="button"
                                    class="action-button"
                                    title="Edit Produk"

                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-size="{{ $product->size }}"
                                    data-description="{{ $product->description }}"
                                    data-image="{{ $product->image ? asset($product->image) : '' }}"
                                    data-badge="{{ $product->badge }}"

                                    onclick="openEditModal(this)"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                                <form
                                    action="{{ route('admin.catalog.destroy', $product->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                    style="display: inline;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-button"
                                        title="Hapus Produk"
                                    >
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                </article>

            @empty

                <div class="empty-message">
                    <i class="fa-solid fa-box-open"></i>

                    <h3>Belum Ada Produk</h3>

                    <p>
                        Belum ada produk puding yang ditambahkan ke katalog.
                    </p>
                </div>

            @endforelse

        </div>


        <!-- PAGINATION -->

        <div class="pagination">
            {{ $products->links() }}
        </div>

    </main>

    
    
    <!-- MODAL EDIT PRODUK -->
    <div class="edit-modal-overlay" id="editModal">

        <div class="edit-modal">

            <div class="edit-modal-header">
                <div>
                    <h2>Edit Varian Puding</h2>
                    <p>Ubah detail nama, harga, deskripsi, atau upload foto puding baru.</p>
                </div>

                <button
                    type="button"
                    class="edit-modal-close"
                    onclick="closeEditModal()"
                >
                    ×
                </button>
            </div>

            <form
                id="editProductForm"
                action="{{ route('admin.catalog.update', ['id' => '__ID__']) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                <div class="edit-modal-body">

                    <input type="hidden" name="product_id" id="editProductId">

                    <div class="edit-form-group">
                        <label>Nama Varian Puding *</label>
                        <input
                            type="text"
                            name="name"
                            id="editProductName"
                            required
                        >
                    </div>

                    <div class="edit-form-row">

                        <div class="edit-form-group">
                            <label>Harga (Rp) *</label>
                            <input
                                type="number"
                                name="price"
                                id="editProductPrice"
                                min="0"
                                required
                            >
                        </div>

                        <div class="edit-form-group">
                            <label>Ukuran / Porsi</label>
                            <input
                                type="text"
                                name="size"
                                id="editProductSize"
                            >
                        </div>

                    </div>

                    <div class="edit-form-group">
                        <label>Deskripsi Bahan &amp; Kelezatan</label>
                        <textarea
                            name="description"
                            id="editProductDescription"
                            placeholder="Jelaskan cita rasa, tekstur, dan vla pelengkap..."
                        ></textarea>
                    </div>

                    <div class="edit-form-group">
                        <label>Foto Produk Puding *</label>

                        <div class="edit-photo-preview">

                            <img
                                src=""
                                id="editProductImagePreview"
                                alt="Foto produk puding"
                            >

                            <div class="edit-photo-details">

                                <div class="edit-photo-status">
                                    <i class="fa-regular fa-circle-check"></i>
                                    Foto Produk Siap Dipakai
                                </div>

                                <p id="editPhotoDescription">
                                    Foto telah terpasang. Klik tombol di bawah untuk mengganti foto dari galeri atau kamera perangkat Anda.
                                </p>

                                <label for="editProductImage" class="edit-change-photo">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                    Ganti Foto
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    id="editProductImage"
                                    class="edit-photo-input"
                                    accept="image/jpeg,image/png,image/webp"
                                >

                            </div>
                        </div>
                    </div>

                    <div class="edit-form-group">
                        <label>Badge Label (Opsional)</label>

                        <input
                            type="text"
                            name="badge"
                            id="editProductBadge"
                            placeholder="Contoh: Best Seller, Favorit Baru, Klasik Autentik"
                        >

                        <small class="edit-badge-hint">
                            Label pemikat yang muncul di sudut atas foto pada menu pembeli.
                        </small>
                    </div>

                </div>

                <div class="edit-modal-footer">

                    <button
                        type="button"
                        class="edit-cancel-button"
                        onclick="closeEditModal()"
                    >
                        Batal
                    </button>

                    <button type="submit" class="edit-submit-button">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>
    </div>

    <script>
    function openAddModal() {
        document.getElementById('addModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeAddModal() {
        document.getElementById('addModal').classList.remove('active');
        document.body.style.overflow = '';
    }

    const productImageInput = document.getElementById('productImageInput');

    productImageInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) return;

        if (!file.type.startsWith('image/')) {
            alert('Silakan pilih file gambar.');
            this.value = '';
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {
            const preview = document.getElementById('productImagePreview');

            preview.src = event.target.result;
            preview.style.display = 'block';

            document.getElementById('productUploadIcon').style.display = 'none';
            document.getElementById('productUploadTitle').textContent = file.name;
            document.getElementById('productUploadDescription').textContent =
                'Foto berhasil dipilih. Klik kembali untuk mengganti foto.';
        };

        reader.readAsDataURL(file);
    });

    document.getElementById('addModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeAddModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAddModal();
        }
    });


        function openEditModal(button) {
            const data = button.dataset;
            const editForm = document.getElementById('editProductForm');

            editForm.action = editForm.action.replace('__ID__', data.id);

            document.getElementById('editProductId').value = data.id;
            document.getElementById('editProductName').value = data.name;
            document.getElementById('editProductPrice').value = data.price;
            document.getElementById('editProductSize').value = data.size || '';
            document.getElementById('editProductDescription').value = data.description || '';
            document.getElementById('editProductBadge').value = data.badge || '';

            const preview = document.getElementById('editProductImagePreview');
            const description = document.getElementById('editPhotoDescription');

            preview.src = data.image || '';
            description.textContent = data.image
                ? 'Foto telah terpasang. Klik tombol di bawah untuk mengganti foto dari galeri atau kamera perangkat Anda.'
                : 'Belum ada foto produk. Silakan pilih foto baru.';

            document.getElementById('editProductImage').value = '';

            document.getElementById('editModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.getElementById('editProductImage').addEventListener('change', function () {
            const file = this.files[0];

            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('Silakan pilih file gambar.');
                this.value = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                document.getElementById('editProductImagePreview').src = event.target.result;

                document.getElementById('editPhotoDescription').textContent =
                    'Foto baru berhasil dipilih dan siap disimpan.';
            };

            reader.readAsDataURL(file);
        });

        document.getElementById('editModal').addEventListener('click', function (event) {
            if (event.target === this) {
                closeEditModal();
            }
        });
    </script>
</body>
</html>