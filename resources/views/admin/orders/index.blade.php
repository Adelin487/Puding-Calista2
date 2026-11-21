<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan - Puding Calista</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', Arial, sans-serif;
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

        /* MAIN CONTENT */

        .main-content {
            max-width: 1650px;
            margin: auto;
            padding: 42px 6.4% 60px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 32px;
        }

        .page-heading h1 {
            font-family: 'Playfair Display', Georgia, serif;
            color: #211c19;
            font-size: 37px;
            font-weight: 800;
        }

        .page-heading p {
            margin-top: 5px;
            color: #8a7d75;
            font-size: 16px;
        }

        .total-badge {
            flex-shrink: 0;
            padding: 11px 19px;
            border: 1px solid #ffd1d5;
            border-radius: 17px;
            background: white;
            font-size: 14px;
            font-weight: 700;
        }

        .total-badge strong {
            color: #ff174d;
        }

        /* SEARCH AND FILTER */

        .filter-container {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            margin-bottom: 30px;
            background: white;
            border: 1px solid #ffe0df;
            border-radius: 23px;
            box-shadow: 0 2px 5px rgba(0,0,0,.025);
        }

        .search-form {
            flex: 1;
            min-width: 150px;
        }

        .search-input {
            width: 100%;
            height: 53px;
            padding: 0 20px;
            border: 1px solid #e7e5e4;
            border-radius: 17px;
            outline: none;
            font-family: inherit;
            font-size: 16px;
        }

        .search-input:focus {
            border-color: #ff6685;
            box-shadow: 0 0 0 3px rgba(255, 23, 77, .07);
        }

        .filter-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .filter-button {
            display: inline-block;
            padding: 12px 17px;
            border-radius: 22px;
            background: #f5f5f5;
            color: #57534e;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .filter-button.active {
            background: #ff174d;
            color: white;
        }

        .filter-button:hover:not(.active) {
            background: #ffecef;
        }

        /* ORDER CARD */

        .order-card {
            padding: 30px;
            margin-bottom: 25px;
            background: white;
            border: 1px solid #f8dedd;
            border-radius: 29px;
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
        }

        .order-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding-bottom: 19px;
            border-bottom: 1px solid #faeeee;
        }

        .customer-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .customer-avatar {
            width: 47px;
            height: 47px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: #ffe5e8;
            color: #ff174d;
            font-size: 19px;
            font-weight: 800;
        }

        .customer-name {
            font-size: 20px;
            font-weight: 800;
            color: #292524;
        }

        .customer-phone {
            display: inline-block;
            margin-top: 5px;
            padding: 5px 12px;
            border: 1px solid #a7f3d0;
            border-radius: 20px;
            background: #ecfdf5;
            color: #059669;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .order-top-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-label {
            padding: 9px 14px;
            border: 1px solid #ddd6fe;
            border-radius: 20px;
            background: #f5edff;
            color: #7e22ce;
            font-size: 13px;
            font-weight: 700;
        }

        .order-body {
            display: grid;
            grid-template-columns: 1.04fr 1fr;
            gap: 20px;
            padding: 22px 0;
        }

        .section-label {
            display: block;
            margin-bottom: 10px;
            color: #a8a29e;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .product-box {
            padding: 15px 16px;
            border: 1px solid #ffe0e3;
            border-radius: 20px;
            background: #fff8f8;
        }

        .product-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 9px;
            font-size: 14px;
            line-height: 1.5;
        }

        .product-row:last-of-type {
            margin-bottom: 0;
        }

        .product-price {
            flex-shrink: 0;
            color: #ff174d;
            font-weight: 700;
        }

        .product-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 13px;
            padding-top: 13px;
            border-top: 1px solid #ffdce0;
            font-size: 14px;
            font-weight: 700;
        }

        .product-total strong {
            color: #ff174d;
            font-size: 21px;
        }

        .schedule-box {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 48px;
            padding: 12px 15px;
            margin-bottom: 13px;
            border: 1px solid #e7e5e4;
            border-radius: 17px;
            background: #fafafa;
            font-size: 14px;
            font-weight: 700;
        }

        .schedule-icon {
            color: #ff174d;
            font-size: 19px;
        }

        .note-box {
            padding: 13px 15px;
            border: 1px solid #ffdf8a;
            border-radius: 17px;
            background: #fffdf4;
            color: #92400e;
            font-size: 13px;
            font-style: italic;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        /* CARD FOOTER */

        .order-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding-top: 17px;
            border-top: 1px solid #faeeee;
        }

        .proof-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 17px;
            border: 1px solid #ffcbd2;
            border-radius: 16px;
            background: #fff3f4;
            color: #e11d48;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        .proof-button:hover {
            background: #ffe4e8;
        }

        .no-proof {
            color: #a8a29e;
            font-size: 13px;
        }

        .status-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 7px;
            flex-wrap: wrap;
        }

        .status-actions-label {
            margin-right: 5px;
            color: #78716c;
            font-size: 13px;
            font-weight: 700;
        }

        .status-form {
            display: inline;
        }

        .status-button {
            padding: 10px 15px;
            border: 1px solid;
            border-radius: 16px;
            background: white;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .status-button.processing {
            border-color: #bfdbfe;
            background: #eff6ff;
            color: #2563eb;
        }

        .status-button.sent {
            border-color: #d8b4fe;
            background: #f5edff;
            color: #9333ea;
        }

        .status-button.done {
            border-color: #a7f3d0;
            background: #ecfdf5;
            color: #059669;
        }

        .status-button.current {
            outline: 2px solid;
            outline-offset: 2px;
        }

        .status-button:hover {
            filter: brightness(.96);
        }

        .flash-message {
            padding: 14px 18px;
            margin-bottom: 22px;
            border: 1px solid #a7f3d0;
            border-radius: 13px;
            background: #ecfdf5;
            color: #047857;
            font-size: 14px;
            font-weight: 600;
        }

        .empty-message {
            padding: 55px 20px;
            background: white;
            border: 1px solid #f8dedd;
            border-radius: 22px;
            text-align: center;
            color: #78716c;
        }

        .pagination {
            margin-top: 25px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        /* PROOF IMAGE MODAL */

        .proof-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(0,0,0,.78);
        }

        .proof-modal.show {
            display: flex;
        }

        .proof-modal-content {
            position: relative;
            max-width: 850px;
            max-height: 90vh;
        }

        .proof-modal-content img {
            display: block;
            max-width: 100%;
            max-height: 85vh;
            border-radius: 12px;
            object-fit: contain;
        }

        .modal-close {
            position: absolute;
            top: -15px;
            right: -15px;
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 50%;
            background: #ff174d;
            color: white;
            font-size: 22px;
            cursor: pointer;
        }

        /* RESPONSIVE */

        @media (max-width: 1100px) {
            .admin-header {
                grid-template-columns: auto 1fr;
            }

            .admin-nav {
                grid-column: 1 / -1;
                grid-row: 2;
                justify-self: center;
                order: 3;
            }

            .admin-brand {
                grid-column: 2;
                grid-row: 1;
            }
        }

        @media (max-width: 750px) {
            .admin-header {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 18px 20px;
            }

            .admin-nav {
                width: 100%;
                justify-content: center;
                overflow-x: auto;
            }

            .nav-item {
                padding: 12px;
                font-size: 12px;
            }

            .admin-brand {
                gap: 8px;
            }

            .brand-name {
                font-size: 18px;
            }

            .brand-description {
                font-size: 10px;
            }

            .brand-icon {
                width: 40px;
                height: 40px;
                font-size: 20px;
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

            .filter-container {
                flex-direction: column;
                align-items: stretch;
                padding: 15px;
            }

            .filter-buttons {
                justify-content: flex-start;
            }

            .order-card {
                padding: 20px 16px;
                border-radius: 22px;
            }

            .order-body {
                grid-template-columns: 1fr;
            }

            .order-top {
                align-items: flex-start;
            }

            .order-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .status-actions {
                justify-content: flex-start;
            }

            .status-actions-label {
                width: 100%;
                margin-bottom: 5px;
            }
        }

        @media (max-width: 430px) {
            .order-top {
                flex-direction: column;
            }

            .customer-name {
                font-size: 17px;
            }

            .product-total strong {
                font-size: 17px;
            }

            .nav-item {
                gap: 5px;
                padding: 10px 8px;
            }
        }

        /* =====================================
        ADMIN HAMBURGER MENU & SIDEBAR
        ===================================== */

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

        /* Overlay */
        .admin-sidebar-overlay {
            position: fixed;
            inset: 0;
            z-index: 999;
            background: rgba(25, 25, 25, 0.45);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
        }

        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            width: min(300px, 85vw);
            height: 100dvh;
            background: #fff;
            border: 3px solid #e8f0ee;
            border-radius: 13px;
            display: flex;
            flex-direction: column;
            transform: translateX(-105%);
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .admin-sidebar.open {
            transform: translateX(0);
        }

        .admin-sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Sidebar Header */
        .sidebar-header {
            min-height: 115px;
            padding: 20px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            background: linear-gradient(120deg, #fff9e9, #fff0f2);
            border-bottom: 1px solid #fce1df;
        }

        .sidebar-heading {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .sidebar-lock {
            font-size: 30px;
        }

        .sidebar-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 23px;
            font-weight: 800;
            color: #292524;
        }

        .sidebar-subtitle {
            margin-top: 2px;
            color: #c65b00;
            font-size: 15px;
        }

        .sidebar-close {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border: 1px solid #eadfdf;
            border-radius: 50%;
            background: #fff;
            color: #777;
            font-size: 28px;
            cursor: pointer;
        }

        /* Sidebar Content */
        .sidebar-content {
            flex: 1;
            padding: 30px 24px;
            overflow-y: auto;
        }

        .sidebar-section-title {
            margin: 0 12px 20px;
            color: #aaa29d;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .sidebar-menu-item,
        .sidebar-buyer-link {
            display: flex;
            align-items: center;
            gap: 17px;
            padding: 17px 18px;
            border-radius: 23px;
            color: #514b48;
            text-decoration: none;
        }

        .sidebar-menu-item.active {
            background: #ff174d;
            color: #fff;
            box-shadow: 0 6px 12px rgba(255, 23, 77, 0.2);
        }

        .sidebar-menu-icon,
        .sidebar-buyer-icon {
            flex-shrink: 0;
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: #ffe5e8;
            color: #ff174d;
            font-size: 25px;
        }

        .sidebar-menu-item.active .sidebar-menu-icon {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .sidebar-menu-item strong,
        .sidebar-buyer-link strong {
            display: block;
            font-size: 19px;
            font-weight: 800;
        }

        .sidebar-menu-item small,
        .sidebar-buyer-link small {
            display: block;
            margin-top: 3px;
            color: #aaa29d;
            font-size: 15px;
            line-height: 1.5;
        }

        .sidebar-menu-item.active small {
            color: #fff;
        }

        .sidebar-divider {
            height: 1px;
            margin: 28px 0;
            background: #fce1df;
        }

        .sidebar-buyer-link {
            align-items: flex-start;
            padding: 15px 18px;
        }

        .sidebar-buyer-icon {
            background: #f5f5f5;
        }

        .sidebar-footer {
            min-height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background: #fafafa;
            border-top: 1px solid #fce1df;
            color: #514b48;
            font-size: 16px;
            font-weight: 700;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .admin-header {
                grid-template-columns: 1fr auto;
            }

            .admin-header .admin-nav {
                display: none;
            }

            .admin-header .admin-brand {
                grid-column: 2;
                grid-row: 1;
            }

            .admin-header .header-left {
                grid-column: 1;
                grid-row: 1;
            }

            .admin-header .logout-button {
                display: none;
            }
        }

        /* Ukuran sidebar lebih ringkas */
        .sidebar-header {
            min-height: 75px;
            padding: 12px 14px;
        }

        .sidebar-heading {
            gap: 9px;
        }

        .sidebar-lock {
            font-size: 23px;
        }

        .sidebar-title {
            font-size: 16px;
        }

        .sidebar-subtitle {
            font-size: 11px;
        }

        .sidebar-close {
            width: 34px;
            height: 34px;
            font-size: 21px;
        }

        .sidebar-content {
            padding: 18px 13px;
        }

        .sidebar-section-title {
            margin: 0 8px 13px;
            font-size: 11px;
        }

        .sidebar-menu {
            gap: 8px;
        }

        .sidebar-menu-item,
        .sidebar-buyer-link {
            gap: 11px;
            padding: 10px 11px;
            border-radius: 15px;
        }

        .sidebar-menu-icon,
        .sidebar-buyer-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            font-size: 19px;
        }

        .sidebar-menu-item strong,
        .sidebar-buyer-link strong {
            font-size: 13px;
        }

        .sidebar-menu-item small,
        .sidebar-buyer-link small {
            font-size: 10px;
        }

        .sidebar-divider {
            margin: 19px 0;
        }

        .sidebar-footer {
            min-height: 42px;
            padding: 10px;
            font-size: 12px;
        }

        /* =====================================
        MODAL KONFIRMASI PERUBAHAN STATUS
        ===================================== */

        .status-confirm-overlay {
            position: fixed;
            inset: 0;
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.68);
            opacity: 0;
            visibility: hidden;
            transition: 0.25s ease;
        }

        .status-confirm-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .status-confirm-modal {
            width: 100%;
            max-width: 570px;
            background: #fff;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            transform: translateY(15px);
            transition: 0.25s ease;
        }

        .status-confirm-overlay.show .status-confirm-modal {
            transform: translateY(0);
        }

        .status-confirm-header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 22px 25px;
            background: linear-gradient(120deg, #fffaf0, #fff2f5);
            border-bottom: 1px solid #fce1df;
        }

        .confirm-header-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #d1fae5;
            color: #00865d;
            font-size: 22px;
            font-weight: 800;
        }

        .confirm-header-text {
            flex: 1;
        }

        .confirm-header-text h2 {
            margin: 0;
            color: #292524;
            font-size: 19px;
            font-weight: 800;
        }

        .confirm-header-text p {
            margin: 3px 0 0;
            color: #928781;
            font-size: 13px;
        }

        .confirm-close {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border: 1px solid #e8e3e0;
            border-radius: 50%;
            background: #fff;
            color: #777;
            font-size: 25px;
            cursor: pointer;
        }

        .status-confirm-body {
            padding: 24px 25px 28px;
        }

        .confirm-order-info {
            padding: 16px 18px;
            background: #faf9f8;
            border: 1px solid #e9e5e2;
            border-radius: 20px;
        }

        .confirm-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 12px;
            color: #817a75;
            font-size: 14px;
        }

        .confirm-info-row strong {
            color: #292524;
            text-align: right;
        }

        #confirmCustomerWhatsapp {
            color: #00865d;
        }

        .confirm-status-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding-top: 12px;
            border-top: 1px solid #e5e1de;
            color: #817a75;
            font-size: 14px;
        }

        .confirm-status-change {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
        }

        #confirmOldStatus {
            color: #89817c;
            text-decoration: line-through;
        }

        #confirmNewStatus {
            padding: 5px 12px;
            border-radius: 15px;
            background: #d1fae5;
            color: #00865d;
        }

        .confirm-warning {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            padding: 17px;
            border: 1px solid #ffd0d5;
            border-radius: 20px;
            background: #fff7f7;
        }

        .confirm-warning-icon {
            flex-shrink: 0;
            color: #ff174d;
            font-size: 21px;
        }

        .confirm-warning strong {
            color: #292524;
            font-size: 14px;
        }

        .confirm-warning p {
            margin: 6px 0 0;
            color: #77706c;
            font-size: 13px;
            line-height: 1.6;
        }

        .status-confirm-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding: 18px 25px;
            border-top: 1px solid #e9e5e2;
            background: #fafafa;
        }

        .confirm-cancel,
        .confirm-submit {
            min-height: 45px;
            padding: 0 20px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }

        .confirm-cancel {
            border: 1px solid #d6d0cc;
            background: #fff;
            color: #514b48;
        }

        .confirm-submit {
            border: none;
            background: #009b70;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 155, 112, 0.15);
        }

        .confirm-cancel:hover {
            background: #f5f3f1;
        }

        .confirm-submit:hover {
            background: #00845f;
        }

        @media (max-width: 600px) {
            .status-confirm-overlay {
                padding: 12px;
            }

            .status-confirm-header {
                padding: 17px;
            }

            .status-confirm-body {
                padding: 18px 16px;
            }

            .status-confirm-footer {
                padding: 15px;
                flex-wrap: wrap;
            }

            .confirm-submit,
            .confirm-cancel {
                flex: 1;
                padding: 0 12px;
            }

            .confirm-status-row {
                align-items: flex-start;
                flex-direction: column;
            }
        }


        /* MODAL BUKTI PEMBAYARAN */

        .proof-modal-content {
            width: 100%;
            max-width: 550px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0,0,0,0.2);
        }

        .proof-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 22px;
            border-bottom: 1px solid #fce1df;
            background: #fffafa;
        }

        .proof-modal-header h3 {
            margin: 0;
            color: #292524;
            font-size: 19px;
            font-weight: 800;
        }

        .proof-modal-header p {
            margin: 4px 0 0;
            color: #928781;
            font-size: 12px;
        }

        .proof-image-container {
            padding: 20px;
            background: #f8f6f5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 250px;
            max-height: 65vh;
        }

        .proof-image-container img {
            display: block;
            max-width: 100%;
            max-height: 60vh;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 10px;
        }

        .proof-modal-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 15px 22px;
            border-top: 1px solid #f1e9e7;
            color: #928781;
            font-size: 12px;
        }

        .proof-modal-footer button {
            padding: 9px 20px;
            border: none;
            border-radius: 10px;
            background: #ff174d;
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .proof-modal-content {
                max-width: 100%;
                border-radius: 16px;
            }

            .proof-modal-header {
                padding: 14px 16px;
            }

            .proof-image-container {
                padding: 12px;
            }

            .proof-modal-footer {
                padding: 12px 16px;
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

            <a href="{{ route('admin.orders.index') }}" class="nav-item active">
                <i class="fa-regular fa-clipboard"></i>
                Data Pesanan
            </a>

            <a href="{{ route('admin.catalog.index') }}" class="nav-item">
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


    <div class="admin-sidebar-overlay" id="adminSidebarOverlay" onclick="closeAdminSidebar()"></div>

    <aside class="admin-sidebar" id="adminSidebar">

        <div class="sidebar-header">
            <div class="sidebar-heading">
                <span class="sidebar-lock">🔐</span>
                <div>
                    <div class="sidebar-title">Admin Puding Calista</div>
                    <div class="sidebar-subtitle">Bilah Menu Utama</div>
                </div>
            </div>

            <button type="button" class="sidebar-close" onclick="closeAdminSidebar()">
                ×
            </button>
        </div>

        <div class="sidebar-content">
            <div class="sidebar-section-title">MENU NAVIGASI ADMIN</div>

            <nav class="sidebar-menu">
                <a href="{{ route('admin.orders.index') }}" class="sidebar-menu-item active">
                    <span class="sidebar-menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 3h8l4 4v14H4V3h4z"/>
                            <path d="M14 3v5h6M8 12h8M8 16h8"/>
                        </svg>
                    </span>
                    <span>
                        <strong>Data Pesanan</strong>
                        <small>Beranda Utama Admin</small>
                    </span>
                </a>

                <a href="{{ route('admin.catalog.index') }}" class="sidebar-menu-item">
                    <span class="sidebar-menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="8" height="8" rx="2"/>
                            <rect x="13" y="3" width="8" height="8" rx="2"/>
                            <rect x="3" y="13" width="8" height="8" rx="2"/>
                            <rect x="13" y="13" width="8" height="8" rx="2"/>
                        </svg>
                    </span>
                    <span>
                        <strong>Katalog Produk</strong>
                        <small>Edit menu &amp; harga puding</small>
                    </span>
                </a>

                <a href="#" class="sidebar-menu-item">
                    <span class="sidebar-menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="16" rx="2"/>
                            <path d="M16 3v4M8 3v4M3 10h18"/>
                            <path d="m9 15 2 2 4-4"/>
                        </svg>
                    </span>
                    <span>
                        <strong>Jadwal PO</strong>
                        <small>Atur kuota harian</small>
                    </span>
                </a>
            </nav>

            <div class="sidebar-divider"></div>

            <a href="{{ route('home') }}" class="sidebar-buyer-link">
                <span class="sidebar-buyer-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 10 9-7 9 7"/>
                        <path d="M5 9v12h14V9"/>
                        <path d="M9 21v-7h6v7"/>
                    </svg>
                </span>
                <span>
                    <strong>Lihat Tampilan Pembeli</strong>
                    <small>Keluar dari mode admin &amp; kembali ke beranda pembeli</small>
                </span>
            </a>
        </div>

        <div class="sidebar-footer">
            Puding Calista • Mode Pengelola
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <div class="page-heading">
            <div>
                <h1>Data Pesanan Masuk</h1>
                <p>Pantau pesanan pelanggan, cek bukti pembayaran, dan perbarui status pesanan.</p>
            </div>

            <div class="total-badge">
                Total: <strong>{{ number_format($totalOrders, 0, ',', '.') }}</strong> Pesanan
            </div>
        </div>

        @if (session('success'))
            <div class="flash-message">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- PENCARIAN DAN FILTER -->
        <div class="filter-container">

            <form action="{{ route('admin.orders.index') }}" method="GET" class="search-form">
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    value="{{ request('search') }}"
                    placeholder="⌕  Cari nama pemesan atau no whatsapp"
                >
            </form>

            <div class="filter-buttons">
                @foreach (['Semua', 'Diproses', 'Terkirim', 'Selesai'] as $status)
                    <a
                        href="{{ route('admin.orders.index', array_merge(request()->except('page'), ['status' => $status === 'Semua' ? null : $status])) }}"
                        class="filter-button {{ (request('status') === $status || ($status === 'Semua' && !request('status'))) ? 'active' : '' }}"
                    >
                        {{ $status }}
                    </a>
                @endforeach
            </div>

        </div>

        <!-- DAFTAR PESANAN -->
        @forelse ($orders as $order)

            <article class="order-card">

                <!-- IDENTITAS PELANGGAN -->
                <div class="order-top">

                    <div class="customer-info">
                        <div class="customer-avatar">
                            {{ strtoupper(substr($order->nama, 0, 1)) }}
                        </div>

                        <div>
                            <div class="customer-name">
                                {{ $order->nama }}
                            </div>

                            <a
                                href="https://wa.me/{{ preg_replace('/\D/', '', $order->whatsapp) }}"
                                target="_blank"
                                class="customer-phone"
                            >
                                ☎ {{ $order->whatsapp }}
                            </a>
                        </div>
                    </div>

                    <div class="order-top-right">
                        <span class="status-label">
                            {{ $order->status }}
                        </span>
                    </div>

                </div>

                <!-- INFORMASI PRODUK DAN JADWAL -->
                <div class="order-body">

                    <div>
                        <span class="section-label">VARIAN PESANAN:</span>

                        <div class="product-box">

                            @foreach ($order->items as $item)
                                <div class="product-row">
                                    <span>
                                        • {{ $item->product_name }} (x{{ $item->jumlah }})
                                    </span>

                                    <span class="product-price">
                                        Rp {{ number_format($item->product_price * $item->jumlah, 0, ',', '.') }}
                                    </span>
                                </div>
                            @endforeach

                            <div class="product-total">
                                <span>Total Pembayaran:</span>

                                <strong>
                                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </strong>
                            </div>

                        </div>
                    </div>

                    <div>

                        <span class="section-label">JADWAL PENGAMBILAN:</span>

                        <div class="schedule-box">
                            <span class="schedule-icon">▣</span>

                            <span>
                                {{ $order->tanggal->locale('id')->translatedFormat('l, d F Y') }}
                                • Jam {{ $order->waktu }} WIB
                            </span>
                        </div>

                        <span class="section-label">CATATAN KHUSUS PELANGGAN:</span>

                        <div class="note-box">
                            {{ $order->catatan ? '"' . $order->catatan . '"' : 'Tidak ada catatan khusus dari pelanggan.' }}
                        </div>

                    </div>

                </div>

                <!-- BUKTI PEMBAYARAN DAN STATUS -->
                <div class="order-footer">

                    <div>
                        @if ($order->bukti_bayar_url)
                            <button
                                type="button"
                                class="proof-button"
                                onclick="showProof('{{ asset('storage/' . $order->bukti_bayar_url) }}')"
                            >
                                ◎ Lihat Foto Bukti Pembayaran
                            </button>
                        @else
                            <span class="no-proof">
                                Belum ada bukti pembayaran.
                            </span>
                        @endif
                    </div>

                    
                    <div class="status-actions">
                        <span class="status-actions-label">
                            Ubah Status:
                        </span>

                        <form
                            action="{{ route('admin.orders.updateStatus', $order->id) }}"
                            method="POST"
                            class="status-form"
                            onsubmit="return requestStatusConfirmation(event, this)"
                            data-order-name="{{ $order->nama }}"
                            data-order-whatsapp="{{ $order->whatsapp }}"
                            data-current-status="{{ $order->status }}"
                        >
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="status" value="Diproses">

                            <button
                                type="submit"
                                class="status-button processing {{ $order->status === 'Diproses' ? 'current' : '' }}"
                            >
                                Diproses
                            </button>
                        </form>

                        <form
                            action="{{ route('admin.orders.updateStatus', $order->id) }}"
                            method="POST"
                            class="status-form"
                            onsubmit="return requestStatusConfirmation(event, this)"
                            data-order-name="{{ $order->nama }}"
                            data-order-whatsapp="{{ $order->whatsapp }}"
                            data-current-status="{{ $order->status }}"
                        >
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="status" value="Terkirim">

                            <button
                                type="submit"
                                class="status-button sent {{ $order->status === 'Terkirim' ? 'current' : '' }}"
                            >
                                Terkirim
                            </button>
                        </form>

                        <form
                            action="{{ route('admin.orders.updateStatus', $order->id) }}"
                            method="POST"
                            class="status-form"
                            onsubmit="return requestStatusConfirmation(event, this)"
                            data-order-name="{{ $order->nama }}"
                            data-order-whatsapp="{{ $order->whatsapp }}"
                            data-current-status="{{ $order->status }}"
                        >
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="status" value="Selesai">

                            <button
                                type="submit"
                                class="status-button done {{ $order->status === 'Selesai' ? 'current' : '' }}"
                            >
                                Selesai
                            </button>
                        </form>
                    </div>
                </div>
            </article>

        @empty

            <div class="empty-message">
                <h3>Belum Ada Pesanan</h3>
                <p style="margin-top: 8px;">
                    Tidak ditemukan pesanan yang sesuai dengan pencarian atau filter.
                </p>
            </div>

        @endforelse

        <!-- PAGINATION -->
        <div class="pagination">
            {{ $orders->links() }}
        </div>

    </main>

    
    <!-- MODAL BUKTI PEMBAYARAN -->
    <div class="proof-modal" id="proof-modal" onclick="closeProof(event)">

        <div class="proof-modal-content">

            <div class="proof-modal-header">
                <div>
                    <h3>Bukti Pembayaran</h3>
                    <p>Foto bukti transfer dari pelanggan</p>
                </div>

                <button type="button" class="modal-close" onclick="hideProof()">
                    ×
                </button>
            </div>

            <div class="proof-image-container">
                <img
                    src=""
                    id="proof-modal-image"
                    alt="Bukti Pembayaran"
                >
            </div>

            <div class="proof-modal-footer">
                <span>📄 Bukti transaksi pelanggan</span>

                <button type="button" onclick="hideProof()">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    
    <!-- MODAL KONFIRMASI PERUBAHAN STATUS -->
    <div class="status-confirm-overlay" id="statusConfirmModal">

        <div class="status-confirm-modal">

            <div class="status-confirm-header">
                <div class="confirm-header-icon">✓✓</div>

                <div class="confirm-header-text">
                    <h2>Konfirmasi Perubahan Status</h2>
                    <p>Pastikan detail pesanan sudah sesuai</p>
                </div>

                <button type="button" class="confirm-close" onclick="closeStatusConfirmation()">
                    ×
                </button>
            </div>

            <div class="status-confirm-body">

                <div class="confirm-order-info">

                    <div class="confirm-info-row">
                        <span>Pemesan:</span>
                        <strong id="confirmCustomerName">-</strong>
                    </div>

                    <div class="confirm-info-row">
                        <span>No. WhatsApp:</span>
                        <strong id="confirmCustomerWhatsapp">-</strong>
                    </div>

                    <div class="confirm-status-row">
                        <span>Perubahan Status:</span>

                        <div class="confirm-status-change">
                            <strong id="confirmOldStatus">-</strong>
                            <span>→</span>
                            <strong id="confirmNewStatus">-</strong>
                        </div>
                    </div>

                </div>

                <div class="confirm-warning">
                    <span class="confirm-warning-icon">ⓘ</span>

                    <div>
                        <strong>Apakah Anda yakin ingin mengubah status ini?</strong>

                        <p id="confirmStatusDescription">
                            Pastikan perubahan status pesanan sudah benar.
                        </p>
                    </div>
                </div>

            </div>

            <div class="status-confirm-footer">

                <button type="button" class="confirm-cancel" onclick="closeStatusConfirmation()">
                    Batal
                </button>

                <button type="button" class="confirm-submit" onclick="submitStatusConfirmation()">
                    ✓ &nbsp; Ya, Ubah Status
                </button>

            </div>

        </div>

    </div>

    <script>
        // =====================================
        // MODAL BUKTI PEMBAYARAN
        // =====================================

        function showProof(imageUrl) {
            const modal = document.getElementById('proof-modal');
            const image = document.getElementById('proof-modal-image');

            image.src = imageUrl;
            modal.classList.add('show');
        }

        function hideProof() {
            document.getElementById('proof-modal').classList.remove('show');
        }

        function closeProof(event) {
            if (event.target.id === 'proof-modal') {
                hideProof();
            }
        }


        // =====================================
        // ADMIN SIDEBAR
        // =====================================

        function openAdminSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('adminSidebarOverlay');

            sidebar.classList.add('open');
            overlay.classList.add('show');

            document.body.style.overflow = 'hidden';
        }

        function closeAdminSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('adminSidebarOverlay');

            sidebar.classList.remove('open');
            overlay.classList.remove('show');

            document.body.style.overflow = '';
        }


        // =====================================
        // KEYBOARD ESCAPE
        // =====================================

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                hideProof();
                closeAdminSidebar();
            }
        });


        // =====================================
        // KONFIRMASI PERUBAHAN STATUS PESANAN
        // =====================================

        let pendingStatusForm = null;

        function requestStatusConfirmation(event, form) {
            event.preventDefault();

            const oldStatus = form.dataset.currentStatus;
            const newStatus = form.querySelector('input[name="status"]').value;

            // Tidak perlu konfirmasi jika status tidak berubah
            if (oldStatus === newStatus) {
                return false;
            }

            pendingStatusForm = form;

            document.getElementById('confirmCustomerName').textContent =
                form.dataset.orderName;

            document.getElementById('confirmCustomerWhatsapp').textContent =
                form.dataset.orderWhatsapp;

            document.getElementById('confirmOldStatus').textContent =
                oldStatus;

            document.getElementById('confirmNewStatus').textContent =
                newStatus;

            const descriptions = {
                'Diproses': 'Pesanan akan ditandai sedang diproses oleh pengelola.',
                'Terkirim': 'Pesanan akan ditandai sudah dikirim kepada pelanggan.',
                'Selesai': 'Pesanan akan ditandai telah selesai.'
            };

            document.getElementById('confirmStatusDescription').textContent =
                descriptions[newStatus] || 'Pastikan perubahan status pesanan sudah benar.';

            document.getElementById('statusConfirmModal').classList.add('show');

            return false;
        }

        function closeStatusConfirmation() {
            document.getElementById('statusConfirmModal').classList.remove('show');
            pendingStatusForm = null;
        }

        function submitStatusConfirmation() {
            if (!pendingStatusForm) {
                return;
            }

            const form = pendingStatusForm;
            pendingStatusForm = null;

            form.onsubmit = null;
            form.submit();
        }
    </script>
</body>
</html>