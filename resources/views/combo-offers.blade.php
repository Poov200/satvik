<!DOCTYPE html>
<html lang="en" ng-app="SatvikComboOffers">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combo Offers | Satvik Foods</title>
    <meta name="description"
        content="Discover thoughtfully grouped Satvik Foods favourites and add a complete combo to your bag.">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <style>
        /* =========================================================
           ROOT
        ========================================================= */

        :root {
            --green: #246b45;
            --green-dark: #174b31;
            --green-light: #e9f6ed;

            --cream: #fffaf0;
            --cream-dark: #f7efdf;

            --orange: #e98b35;
            --yellow: #f5c451;

            --text: #1e2a22;
            --muted: #6e776f;

            --white: #ffffff;
            --black: #111111;

            --border: #e8e8e8;

            --shadow-sm:
                0 5px 20px rgba(0, 0, 0, .06);

            --shadow:
                0 15px 45px rgba(31, 68, 45, .12);

            --radius: 20px;

            --transition: .3s ease;
        }


        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            color: var(--text);
            background: #fff;

            overflow-x: hidden;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        button {
            cursor: pointer;
            border: 0;
        }

        img {
            max-width: 100%;
            display: block;
        }

        a {
            color: inherit;
            text-decoration: none;
        }


        /* =========================================================
           ANGULAR LOADING
        ========================================================= */

        [ng-cloak] {
            display: none !important;
        }


        /* =========================================================
           ANNOUNCEMENT BAR
        ========================================================= */

        .announcement {
            background: var(--green-dark);
            color: #fff;

            text-align: center;

            padding: 10px 15px;

            font-size: 13px;
            font-weight: 600;

            letter-spacing: .2px;
        }

        .announcement span {
            color: #f8d889;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            position: sticky;
            top: 0;

            z-index: 1000;

            background: rgba(255, 255, 255, .94);

            backdrop-filter: blur(18px);

            border-bottom: 1px solid rgba(0, 0, 0, .05);
        }

        .header-inner {
            max-width: 1250px;

            margin: auto;

            min-height: 76px;

            padding: 0 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 25px;
        }


        /* =========================================================
           LOGO
        ========================================================= */

        .logo {
            display: flex;
            align-items: center;
            gap: 11px;

            min-width: 190px;
        }

        .logo-icon {
            width: 85px;
            height: 55px;



            background:


                display: flex;
            align-items: center;
            justify-content: center;

            color: #fff;

            font-size: 23px;


        }

        .logo-text strong {
            display: block;

            font-size: 20px;

            line-height: 1;

            color: var(--green-dark);
        }

        .logo-text small {
            display: block;

            margin-top: 4px;

            color: var(--muted);

            font-size: 10px;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        /* =========================================================
           SEARCH
        ========================================================= */

        .search-box {
            flex: 1;

            max-width: 520px;

            position: relative;
        }

        .search-box input {
            width: 100%;

            height: 46px;

            padding:
                0 48px 0 18px;

            border:
                1px solid var(--border);

            border-radius: 50px;

            outline: none;

            background: #f8f9f7;

            color: var(--text);

            transition: var(--transition);
        }

        .search-box input:focus {
            border-color: var(--green);

            background: #fff;

            box-shadow:
                0 0 0 4px rgba(36, 107, 69, .08);
        }

        .search-icon {
            position: absolute;

            right: 17px;
            top: 50%;

            transform: translateY(-50%);

            font-size: 19px;

            color: var(--muted);
        }


        /* =========================================================
           HEADER ACTIONS
        ========================================================= */

        .header-actions {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .icon-button {
            position: relative;

            width: 45px;
            height: 45px;

            border-radius: 14px;

            background: #f5f7f4;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 20px;

            transition: var(--transition);
        }

        .icon-button:hover {
            background: var(--green-light);

            transform: translateY(-2px);
        }

        .cart-badge {
            position: absolute;

            top: -5px;
            right: -5px;

            min-width: 20px;
            height: 20px;

            padding: 0 5px;

            background: var(--orange);

            color: white;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 800;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 2px solid #fff;
        }


        /* =========================================================
           HERO
        ========================================================= */

        .hero {
            position: relative;

            overflow: hidden;

            background:
                radial-gradient(circle at 85% 20%,
                    rgba(255, 255, 255, .8),
                    transparent 28%),

                linear-gradient(135deg,
                    #edf8e9,
                    #fff8e9);
        }

        .hero-inner {
            max-width: 1250px;

            min-height: 470px;

            margin: auto;

            padding:
                70px 20px;

            display: grid;

            grid-template-columns:
                1.05fr .95fr;

            align-items: center;

            gap: 40px;
        }

        .hero-content {
            animation:
                heroContent .8s ease both;
        }

        @keyframes heroContent {

            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        .hero-tag {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 8px 13px;

            border-radius: 50px;

            background: #fff;

            color: var(--green);

            font-size: 12px;

            font-weight: 800;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, .05);

            margin-bottom: 20px;
        }

        .hero h1 {
            font-size:
                clamp(42px,
                    6vw,
                    72px);

            line-height: .98;

            letter-spacing: -3px;

            color: var(--green-dark);

            max-width: 680px;
        }

        .hero h1 span {
            color: var(--orange);
        }

        .hero p {
            max-width: 570px;

            margin-top: 22px;

            font-size: 17px;

            line-height: 1.7;

            color: var(--muted);
        }

        .hero-buttons {
            margin-top: 28px;

            display: flex;

            gap: 12px;

            flex-wrap: wrap;
        }

        .primary-button {
            padding: 14px 22px;

            border-radius: 13px;

            background: var(--green);

            color: #fff;

            font-weight: 800;

            box-shadow:
                0 12px 25px rgba(36, 107, 69, .22);

            transition: var(--transition);
        }

        .primary-button:hover {
            transform: translateY(-3px);

            background: var(--green-dark);
        }

        .secondary-button {
            padding: 14px 22px;

            border-radius: 13px;

            background: #fff;

            color: var(--green);

            font-weight: 800;

            border: 1px solid #dfe9e1;

            transition: var(--transition);
        }

        .secondary-button:hover {
            transform: translateY(-3px);

            border-color: var(--green);
        }


        /* =========================================================
           HERO ART
        ========================================================= */

        .hero-art {
            min-height: 350px;

            position: relative;

            display: flex;

            align-items: center;
            justify-content: center;
        }

        .hero-circle {
            width: 330px;
            height: 330px;

            border-radius: 50%;

            background:
                linear-gradient(145deg,
                    #fff,
                    #e5f2df);

            box-shadow:
                0 30px 80px rgba(36, 107, 69, .15);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 145px;

            animation:
                floating 4s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-14px);
            }

        }

        .floating-card {
            position: absolute;

            background: #fff;

            padding: 14px 17px;

            border-radius: 16px;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, .10);

            font-size: 13px;

            font-weight: 800;
        }

        .floating-card.one {
            top: 35px;
            left: 5%;
        }

        .floating-card.two {
            right: 3%;
            bottom: 35px;
        }


        /* =========================================================
           TRUST BAR
        ========================================================= */

        .trust-section {
            max-width: 1250px;

            margin:
                -30px auto 0;

            padding:
                0 20px;

            position: relative;

            z-index: 5;
        }

        .trust-grid {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 14px;
        }

        .trust-card {
            background: #fff;

            border-radius: 17px;

            padding: 18px;

            display: flex;

            align-items: center;

            gap: 12px;

            box-shadow:
                0 12px 35px rgba(0, 0, 0, .07);

            border:
                1px solid #f1f1f1;
        }

        .trust-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            border-radius: 12px;

            background: var(--green-light);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
        }

        .trust-card strong {
            display: block;

            font-size: 13px;
        }

        .trust-card span {
            color: var(--muted);

            font-size: 11px;
        }


        /* =========================================================
           SECTION
        ========================================================= */

        .section {
            max-width: 1250px;

            margin: auto;

            padding:
                75px 20px;
        }

        .section-heading {
            display: flex;

            align-items: end;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 30px;
        }

        .section-heading h2 {
            color: var(--green-dark);

            font-size:
                clamp(28px,
                    4vw,
                    42px);

            letter-spacing: -1.5px;
        }

        .section-heading p {
            margin-top: 7px;

            color: var(--muted);

            font-size: 14px;
        }


        /* =========================================================
           CATEGORIES
        ========================================================= */

        .categories {
            display: flex;

            gap: 10px;

            overflow-x: auto;

            padding-bottom: 8px;

            scrollbar-width: none;
        }

        .categories::-webkit-scrollbar {
            display: none;
        }

        .category-button {
            white-space: nowrap;

            padding:
                10px 17px;

            border-radius: 50px;

            background: #f6f8f5;

            color: #526057;

            font-size: 13px;

            font-weight: 700;

            transition: var(--transition);
        }

        .category-button:hover,
        .category-button.active {
            background: var(--green);

            color: #fff;

            box-shadow:
                0 7px 20px rgba(36, 107, 69, .16);
        }


        /* =========================================
   PRODUCTS GRID - COMPACT
========================================= */

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            width: 100%;
        }

        .product-card {
            position: relative;
            min-width: 0;
            background: #fff;
            border: 1px solid #eeeeec;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: none;
            transition: box-shadow .22s ease, transform .22s ease;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
        }

        .product-image {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            height: auto;
            overflow: hidden;
            background: #f7f7f6;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .product-photo {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: contain;
            object-position: center;
            padding: 0;
            transition: transform .35s ease;
        }

        .product-card:hover .product-photo {
            transform: scale(1.025);
        }

        .product-tag {
            position: absolute;
            top: 9px;
            left: 9px;
            z-index: 5;
            padding: 5px 9px;
            border-radius: 20px;
            background: #176b3a;
            color: #fff;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .quick-view {
            position: absolute;
            top: 9px;
            right: 9px;
            z-index: 6;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .95);
            color: #174d2b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .14);
            transition: .2s ease;
        }

        .quick-view:hover {
            transform: scale(1.08);
        }

        .product-content {
            padding: 10px 12px 12px;
        }

        .product-rating {
            display: none;
        }

        .product-name {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.35;
            color: #151515;
            margin: 0 0 7px;
            min-height: 17px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-price-line {
            display: flex;
            align-items: baseline;
            gap: 6px;
            flex-wrap: wrap;
            margin-bottom: 9px;
        }

        .product-price-line .price-current {
            font-size: 13px;
            color: #d71920;
            font-weight: 600;
        }

        .product-price-line .old-price {
            font-size: 11px;
            color: #777;
            text-decoration: line-through;
        }

        .product-variant-select {
            display: block;
            width: 100%;
            height: 43px;
            padding: 0 12px;
            margin: 0 0 8px;
            border: 1px solid #d2d2d2;
            border-radius: 17px;
            background: #fff;
            color: #333;
            font-size: 11px;
            outline: none;
        }

        .product-variant-select:focus {
            border-color: #999;
        }

        .product-card-quantity {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 43px;
            margin-bottom: 8px;
            border: 1px solid #d0d0d0;
            border-radius: 17px;
            overflow: hidden;
            background: #f7f7f7;
        }

        .product-card-quantity button {
            width: 42px;
            height: 100%;
            flex: 0 0 42px;
            background: transparent;
            color: #111;
            font-size: 16px;
        }

        .product-card-quantity button:hover {
            background: #eaeaea;
        }

        .product-card-quantity span {
            flex: 1;
            text-align: center;
            font-size: 12px;
            color: #222;
        }

        .add-button {
            display: block;
            width: 100%;
            min-height: 43px;
            border: none;
            border-radius: 24px;
            background: #050505;
            color: #fff;
            padding: 10px 12px;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            white-space: nowrap;
            transition: background .2s ease, transform .2s ease;
        }

        .add-button:hover {
            background: #246b45;
            transform: translateY(-1px);
        }

        @media (max-width: 1100px) {
            .products-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 15px;
            }
        }

        @media (max-width: 760px) {
            .products-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .product-content {
                padding: 9px;
            }

            .product-variant-select {
                height: 40px;
                padding: 0 8px;
                font-size: 10px;
            }

            .product-card-quantity {
                height: 40px;
            }

            .product-card-quantity button {
                width: 34px;
                flex-basis: 34px;
            }

            .add-button {
                min-height: 40px;
                font-size: 11px;
            }
        }

        /* =========================================================
           EMPTY PRODUCTS
        ========================================================= */

        .empty-products {
            grid-column: 1/-1;

            text-align: center;

            padding: 60px 20px;

            color: var(--muted);
        }

        .empty-products div {
            font-size: 50px;

            margin-bottom: 10px;
        }


        /* =========================================================
           DEAL BANNER
        ========================================================= */

        .deal {
            max-width: 1250px;

            margin:
                0 auto 70px;

            padding: 0 20px;
        }

        .deal-inner {
            border-radius: 25px;

            overflow: hidden;

            padding:
                35px 40px;

            background:
                linear-gradient(120deg,
                    var(--green-dark),
                    var(--green));

            color: #fff;

            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 30px;

            position: relative;
        }

        .deal-inner:after {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            border-radius: 50%;

            border:
                30px solid rgba(255, 255, 255, .05);

            right: 10%;

            top: -100px;
        }

        .deal h3 {
            font-size: 30px;

            letter-spacing: -1px;
        }

        .deal p {
            color: rgba(255, 255, 255, .72);

            margin-top: 7px;

            font-size: 14px;
        }

        .timer {
            display: flex;

            gap: 8px;

            position: relative;

            z-index: 2;
        }

        .time-box {
            width: 60px;

            text-align: center;

            padding:
                9px 5px;

            background: rgba(255, 255, 255, .12);

            border-radius: 12px;

            backdrop-filter: blur(10px);
        }

        .time-box strong {
            display: block;

            font-size: 20px;
        }

        .time-box span {
            display: block;

            margin-top: 2px;

            font-size: 9px;

            color: rgba(255, 255, 255, .7);

            text-transform: uppercase;
        }


        /* =========================================================
           CART DRAWER
        ========================================================= */

        .overlay {
            position: fixed;

            inset: 0;

            background:
                rgba(10, 20, 14, .48);

            z-index: 2000;

            opacity: 0;

            visibility: hidden;

            transition: var(--transition);
        }

        .overlay.active {
            opacity: 1;

            visibility: visible;
        }

        .cart-drawer {
            position: fixed;

            z-index: 2100;

            top: 0;
            right: 0;

            height: 100vh;

            width:
                min(440px,
                    100%);

            background: #fff;

            box-shadow:
                -20px 0 70px rgba(0, 0, 0, .18);

            transform:
                translateX(100%);

            transition:
                transform .4s ease;

            display: flex;

            flex-direction: column;
        }

        .cart-drawer.open {
            transform:
                translateX(0);
        }

        .cart-header {
            padding:
                22px;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;
            justify-content: space-between;
        }

        .cart-header h3 {
            color: var(--green-dark);
        }

        .close-button {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #f4f6f4;

            font-size: 18px;
        }

        .cart-items {
            flex: 1;

            overflow-y: auto;

            padding: 18px;
        }

        .cart-item {
            display: grid;

            grid-template-columns:
                65px 1fr;

            gap: 12px;

            padding:
                14px 0;

            border-bottom:
                1px solid #f0f0f0;
        }

        .cart-item-image {
            width: 65px;
            height: 65px;

            border-radius: 14px;

            background:
                linear-gradient(145deg,
                    #f0f7eb,
                    #fff7e8);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 30px;
        }

        .cart-item-name {
            font-size: 13px;

            font-weight: 800;

            color: var(--green-dark);
        }

        .cart-item-weight {
            color: var(--muted);

            font-size: 10px;

            margin-top: 3px;
        }

        .cart-item-bottom {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-top: 9px;
        }

        .quantity-control {
            display: flex;

            align-items: center;

            background: #f3f6f2;

            border-radius: 9px;

            overflow: hidden;
        }

        .quantity-control button {
            width: 29px;
            height: 29px;

            background: transparent;

            color: var(--green);

            font-weight: 900;
        }

        .quantity-control span {
            min-width: 25px;

            text-align: center;

            font-size: 12px;

            font-weight: 800;
        }

        .cart-price {
            font-size: 13px;

            font-weight: 800;

            color: var(--green-dark);
        }

        .remove {
            color: #bd4b4b;

            background: none;

            font-size: 11px;

            margin-top: 6px;
        }

        .empty-cart {
            height: 100%;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-direction: column;

            color: var(--muted);

            text-align: center;
        }

        .empty-cart-icon {
            font-size: 65px;

            margin-bottom: 15px;
        }

        .cart-footer {
            padding:
                20px;

            border-top:
                1px solid var(--border);

            background: #fff;
        }

        .cart-total {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-bottom: 15px;
        }

        .cart-total span {
            color: var(--muted);

            font-size: 13px;
        }

        .cart-total strong {
            color: var(--green-dark);

            font-size: 23px;
        }

        .free-delivery {
            color: var(--green) !important;
        }

        .checkout-button {
            width: 100%;

            padding:
                15px;

            border-radius: 13px;

            background: var(--green);

            color: #fff;

            font-weight: 800;
        }


        /* =========================================================
           MODAL
        ========================================================= */

        .modal {
            position: fixed;

            inset: 0;

            z-index: 3000;

            background:
                rgba(10, 20, 14, .55);

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 20px;

            opacity: 0;

            visibility: hidden;

            transition: var(--transition);
        }

        .modal.active {
            opacity: 1;

            visibility: visible;
        }

        .modal-box {
            width:
                min(850px,
                    100%);

            max-height:
                90vh;

            overflow-y: auto;

            background: #fff;

            border-radius: 25px;

            box-shadow:
                0 30px 100px rgba(0, 0, 0, .25);

            transform:
                translateY(20px) scale(.97);

            transition:
                transform .3s ease;
        }

        .modal.active .modal-box {
            transform:
                translateY(0) scale(1);
        }

        /* Modal layout */
        .modal-content {
            display: flex;
            height: 80vh;
            max-height: 80vh;
            overflow: hidden;
        }

        /* Fixed product image */
        .modal-image {
            flex: 0 0 50%;
            height: 100%;
            position: sticky;
            top: 0;
            overflow: hidden;
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Scrollable product details */
        .modal-info {
            flex: 1;
            min-width: 0;
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 24px;
            box-sizing: border-box;
            overscroll-behavior: contain;
        }

        .modal-info h2 {
            color: var(--green-dark);

            font-size: 30px;

            margin:
                10px 0;
        }

        .modal-info p {
            color: var(--muted);

            line-height: 1.7;

            font-size: 14px;
        }

        .modal-price {
            margin:
                20px 0;

            font-size: 28px;

            color: var(--green);
        }

        .modal-close {
            position: absolute;

            right: 18px;
            top: 18px;

            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: #f4f6f4;

            font-size: 18px;
        }


        /* =========================================================
           CHECKOUT
        ========================================================= */

        .checkout-box {
            width:
                min(600px,
                    100%);

            background: #fff;

            border-radius: 25px;

            padding: 30px;

            position: relative;

            max-height: 90vh;

            overflow-y: auto;
        }

        .checkout-box h2 {
            color: var(--green-dark);

            margin-bottom: 6px;
        }

        .checkout-box>p {
            color: var(--muted);

            font-size: 13px;

            margin-bottom: 22px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;

            margin-bottom: 6px;

            font-size: 12px;

            font-weight: 800;

            color: var(--green-dark);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;

            border:
                1px solid #e4e8e4;

            border-radius: 11px;

            padding:
                12px 13px;

            outline: none;

            background: #fafbfa;
        }

        .form-group textarea {
            min-height: 85px;

            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--green);

            background: #fff;

            box-shadow:
                0 0 0 4px rgba(36, 107, 69, .07);
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        footer {
            background: #122a1d;

            color: #fff;

            padding:
                60px 20px 25px;
        }

        .footer-inner {
            max-width: 1250px;

            margin: auto;

            display: grid;

            grid-template-columns:
                1.4fr 1fr 1fr;

            gap: 40px;
        }

        footer h3 {
            margin-bottom: 12px;
        }

        footer p {
            color: rgba(255, 255, 255, .62);

            font-size: 13px;

            line-height: 1.7;
        }

        footer h4 {
            margin-bottom: 12px;

            font-size: 14px;
        }

        footer li {
            list-style: none;

            margin:
                7px 0;

            color: rgba(255, 255, 255, .62);

            font-size: 12px;
        }

        .copyright {
            max-width: 1250px;

            margin:
                40px auto 0;

            padding-top: 20px;

            border-top:
                1px solid rgba(255, 255, 255, .08);

            color: rgba(255, 255, 255, .4);

            font-size: 11px;

            text-align: center;
        }


        /* =========================================================
           TOAST
        ========================================================= */

        .toast {
            position: fixed;

            right: 20px;
            bottom: 20px;

            z-index: 5000;

            background: #173c28;

            color: #fff;

            padding:
                13px 17px;

            border-radius: 12px;

            box-shadow:
                0 15px 35px rgba(0, 0, 0, .2);

            font-size: 13px;

            font-weight: 700;

            transform:
                translateY(30px);

            opacity: 0;

            pointer-events: none;

            transition: .3s ease;
        }

        .toast.show {
            transform:
                translateY(0);

            opacity: 1;
        }


        .modal-image {
            min-height: 400px;

            background:
                linear-gradient(145deg,
                    #edf7e9,
                    #fff5e3);

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 30px;
        }

        .modal-image img {
            width: 100%;
            height: 350px;

            object-fit: contain;

            transition: transform .4s ease;
        }

        .modal-image:hover img {
            transform: scale(1.05);
        }

        .cart-item-image {
            width: 65px;
            height: 65px;

            border-radius: 14px;

            background:
                linear-gradient(145deg,
                    #f0f7eb,
                    #fff7e8);

            display: flex;

            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .cart-item-image img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            padding: 5px;
        }


        /* =========================================================
           UPI PAYMENT
        ========================================================== */

        .payment-amount {
            background: var(--green-light);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            margin: 18px 0;
        }

        .payment-amount small {
            color: var(--muted);
            font-size: 12px;
        }

        .payment-amount strong {
            display: block;
            color: var(--green-dark);
            font-size: 32px;
            margin-top: 5px;
        }

        .payment-divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
        }

        .payment-divider::before,
        .payment-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .upi-qr-wrap {
            text-align: center;
            margin: 20px 0;
        }

        .upi-qr {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 250px;
            margin: 15px auto;
        }

        .upi-note {
            background: #fff8e8;
            border-radius: 12px;
            padding: 14px;
            margin: 18px 0;
            font-size: 12px;
            line-height: 1.6;
            color: #6e5a30;
        }

        .payment-upi-id {
            text-align: center;
            color: var(--muted);
            font-size: 12px;
            margin-top: 8px;
            word-break: break-all;
        }

        .checkout-button[disabled],
        .checkout-button:disabled {
            opacity: .6;
            cursor: not-allowed;
        }



        /* Header navigation menu */
        .main-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            flex-shrink: 0;
        }

        .main-nav a {
            color: #284533;
            font-size: 13px;
            font-weight: 750;
            white-space: nowrap;
            padding: 10px 0;
            position: relative;
            transition: color .2s ease;
        }

        .main-nav a:hover {
            color: var(--green);
        }

        .main-nav a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 3px;
            width: 0;
            height: 2px;
            border-radius: 2px;
            background: var(--orange);
            transition: width .2s ease;
        }

        .main-nav a:hover::after {
            width: 100%;
        }

        @media (max-width: 1100px) {
            .header-inner {
                gap: 16px;
            }

            .main-nav {
                gap: 13px;
            }

            .main-nav a {
                font-size: 12px;
            }

            .search-box {
                max-width: 300px;
            }
        }

        @media (max-width: 900px) {
            .main-nav {
                order: 4;
                flex-basis: 100%;
                justify-content: center;
                gap: 24px;
                padding: 4px 0 8px;
                overflow-x: auto;
            }

            .search-box {
                order: 3;
                flex-basis: 100%;
                max-width: none;
            }
        }

        @media (max-width: 480px) {
            .main-nav {
                justify-content: flex-start;
                gap: 22px;
            }

            .main-nav a {
                font-size: 12px;
            }
        }

        /* =========================================================
           MOBILE
        ========================================================= */

        /* =========================================================
           PRODUCT VARIANTS
        ========================================================== */

        .product-variants {
            margin-top: 20px;
        }

        .product-variants h4 {
            margin: 0 0 12px;
            color: var(--green-dark);
            font-size: 14px;
            font-weight: 800;
        }

        .variant-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .variant-button {
            min-width: 105px;
            padding: 10px 14px;
            border: 1px solid #dce7de;
            border-radius: 11px;
            background: #fff;
            color: var(--green-dark);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            transition: .2s ease;
        }

        .variant-button:hover {
            border-color: var(--green);
            transform: translateY(-1px);
        }

        .variant-button.active {
            background: var(--green);
            border-color: var(--green);
            color: #fff;
            box-shadow: 0 7px 18px rgba(36, 107, 69, .18);
        }

        .variant-weight {
            font-size: 13px;
            font-weight: 800;
        }

        .variant-price {
            font-size: 12px;
            font-weight: 700;
            opacity: .9;
        }


        @media(max-width: 900px) {

            .header-inner {
                flex-wrap: wrap;

                padding:
                    12px 15px;
            }

            .logo {
                min-width: auto;
            }

            .search-box {
                order: 3;

                max-width: none;

                flex-basis: 100%;
            }

            .hero-inner {
                grid-template-columns: 1fr;

                text-align: center;

                padding:
                    60px 20px 80px;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-art {
                min-height: 270px;
            }

            .hero-circle {
                width: 245px;
                height: 245px;

                font-size: 100px;
            }

            .trust-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .products-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .footer-inner {
                grid-template-columns:
                    1fr 1fr;
            }

        }


        @media(max-width: 600px) {

            .announcement {
                font-size: 11px;
            }

            .header-inner {
                min-height: auto;
            }

            .header-actions {
                gap: 5px;
            }

            .icon-button {
                width: 40px;
                height: 40px;
            }

            .product-image {
                height: 180px;
            }

            .product-photo {
                padding: 12px;
            }

            .hero h1 {
                letter-spacing: -2px;
            }

            .hero p {
                font-size: 14px;
            }

            .trust-section {
                margin-top: -25px;
            }

            .trust-grid {
                grid-template-columns:
                    1fr 1fr;

                gap: 8px;
            }

            .trust-card {
                padding: 12px;

                gap: 8px;
            }

            .trust-icon {
                width: 34px;
                height: 34px;

                font-size: 15px;
            }

            .trust-card strong {
                font-size: 10px;
            }

            .trust-card span {
                font-size: 9px;
            }

            .section {
                padding:
                    55px 15px;
            }

            .section-heading {
                display: block;
            }

            .products-grid {
                grid-template-columns:
                    1fr 1fr;

                gap: 12px;
            }

            .product-image {
                height: 170px;
            }

            .product-emoji {
                font-size: 70px;
            }

            .product-content {
                padding: 13px;
            }

            .product-name {
                font-size: 13px;

                min-height: 34px;
            }

            .product-bottom {
                display: block;
            }

            .price {
                margin-bottom: 10px;
            }

            .add-button {
                width: 100%;
            }

            .deal-inner {
                display: block;

                padding:
                    25px;
            }

            .deal h3 {
                font-size: 23px;

                margin-bottom: 17px;
            }

            .time-box {
                width: 55px;
            }



            .modal-image {
                min-height: 230px;

                font-size: 100px;
            }

            .modal-info {
                padding: 25px;
            }

            .footer-inner {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 768px) {
            .modal-content {
                height: 85vh;
                max-height: 85vh;
            }

            .modal-image {
                flex-basis: 40%;
            }

            .modal-info {
                padding: 16px;
            }
        }

        /* =========================================
   RESPONSIVE
========================================= */

        @media (max-width: 1200px) {

            .products-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 16px;
            }

            .product-image {
                height: 180px;
            }
        }


        @media (max-width: 900px) {

            .products-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 14px;
            }

            .product-image {
                height: 170px;
            }
        }


        @media (max-width: 650px) {

            .products-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .product-image {
                height: 155px;
            }

            .product-content {
                padding: 10px;
            }

            .product-name {
                font-size: 13px;
            }

            .price strong {
                font-size: 14px;
            }

            .add-button {
                padding: 6px 8px;
                font-size: 9px;
            }
        }


        @media (max-width: 400px) {

            .products-grid {
                gap: 10px;
            }

            .product-image {
                height: 140px;
            }

            .product-bottom {
                flex-direction: column;
                align-items: flex-start;
            }

            .add-button {
                width: 100%;
            }
        }


        .hero-image-section {
            width: 100%;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        .hero-banner {
            width: 100%;
            line-height: 0;
        }

        .hero-banner-image {
            display: block;
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .hero-banner-image {
                width: 100%;
                height: auto;
            }
        }


        /* =========================================================
           PREMIUM FOOD RETAIL NAVBAR & CATEGORY REDESIGN
        ========================================================= */
        .announcement {
            background: #143d29;
            padding: 9px 16px;
            font-size: 12px;
            letter-spacing: .25px;
        }

        .announcement span {
            color: #f5cf7a;
        }

        .food-header {
            background: rgba(255, 255, 255, .97);
            box-shadow: 0 8px 28px rgba(27, 61, 39, .07);
            border-bottom: 1px solid #e8eee7;
        }

        .food-header-main {
            max-width: 1380px;
            min-height: 86px;
            padding: 12px 28px;
            gap: 28px;
        }

        .food-logo {
            min-width: 220px;
            gap: 12px;
        }

        .food-logo .logo-icon {
            width: 68px;
            height: 56px;
            flex-shrink: 0;
        }

        .food-logo .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .food-logo .logo-text strong {
            font-size: 22px;
            letter-spacing: -.6px;
        }

        .food-logo .logo-text small {
            font-size: 9px;
            letter-spacing: 1.25px;
        }

        .food-search {
            max-width: 570px;
        }

        .food-search input {
            height: 48px;
            padding-left: 20px;
            border: 1px solid #e0e8df;
            background: #f7f9f5;
            border-radius: 13px;
            font-size: 13px;
        }

        .food-search input:focus {
            box-shadow: 0 0 0 4px rgba(36, 107, 69, .09);
        }

        .food-search .search-icon {
            right: 17px;
            font-size: 26px;
            color: #31583e;
        }

        .food-actions {
            gap: 14px;
        }

        .header-help-link {
            display: flex;
            align-items: center;
            gap: 9px;
            white-space: nowrap;
        }

        .help-icon {
            display: grid;
            place-items: center;
            width: 39px;
            height: 39px;
            border-radius: 12px;
            background: #edf5e9;
            color: #205d38;
            font-size: 20px;
        }

        .header-help-link small,
        .header-help-link strong {
            display: block;
        }

        .header-help-link small {
            color: #7b857b;
            font-size: 10px;
            margin-bottom: 2px;
        }

        .header-help-link strong {
            color: #24452f;
            font-size: 12px;
        }

        .food-cart-button {
            width: 46px;
            height: 46px;
            border-radius: 13px;
            background: #1b633a;
            color: white;
        }

        .food-cart-button:hover {
            background: #12472a;
        }

        .food-nav-wrap {
            border-top: 1px solid #f0f2ed;
            background: #fff;
        }

        .food-nav {
            max-width: 1380px;
            min-height: 48px;
            margin: 0 auto;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 30px;
        }

        .food-nav a {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 15px 0 13px;
            color: #405347;
            font-size: 12px;
            font-weight: 800;
        }

        .food-nav a:hover,
        .food-nav a.nav-home {
            color: #17663a;
        }

        .food-nav a::after {
            bottom: 5px;
            background: #e78a36;
        }

        .nav-pill {
            background: #fff0dc;
            color: #b55b16;
            border-radius: 5px;
            padding: 3px 5px;
            font-size: 8px;
            letter-spacing: .4px;
        }

        .nav-promise {
            margin-left: auto;
            color: #7a897d;
            font-size: 10px;
            white-space: nowrap;
        }

        .category-heading-row {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 16px;
            margin: 32px 0 16px;
        }

        .eyebrow-label {
            display: block;
            color: #bb702c;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1.8px;
            margin-bottom: 6px;
        }

        .category-heading-row h3 {
            color: #183f29;
            font-size: 24px;
            letter-spacing: -.7px;
            line-height: 1.15;
        }

        .category-heading-row p {
            color: #788278;
            font-size: 12px;
            margin-top: 6px;
        }

        .category-scroll-hint {
            color: #7b897d;
            font-size: 10px;
            font-weight: 700;
            padding-bottom: 3px;
            white-space: nowrap;
        }

        .food-categories {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding: 3px 2px 16px;
            scroll-snap-type: x proximity;
            scrollbar-width: thin;
            scrollbar-color: #d8e3d6 transparent;
        }

        .food-category-card {
            flex: 0 0 158px;
            min-height: 132px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 7px;
            padding: 15px 15px 14px;
            border: 1px solid #e7ece4;
            border-radius: 16px;
            background: linear-gradient(145deg, #fff 55%, #f7faf3);
            color: #244a30;
            white-space: normal;
            text-align: left;
            scroll-snap-align: start;
            box-shadow: 0 4px 14px rgba(27, 62, 38, .035);
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .food-category-card:hover {
            transform: translateY(-3px);
            border-color: #a9c7ad;
            box-shadow: 0 9px 22px rgba(27, 62, 38, .09);
        }

        .food-category-card.active {
            background: linear-gradient(145deg, #1e6b3e, #164b2d);
            color: #fff;
            border-color: #1e6b3e;
            box-shadow: 0 8px 20px rgba(24, 92, 51, .17);
        }

        .category-icon {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 13px;
            background: #edf5e8;
            color: #28633b;
            font-size: 21px;
        }

        .food-category-card.active .category-icon {
            background: rgba(255, 255, 255, .16);
            color: #fff;
        }

        .category-label {
            display: block;
            font-size: 12px;
            line-height: 1.25;
            font-weight: 850;
        }

        .category-subtitle {
            display: block;
            font-size: 10px;
            color: #859086;
            font-weight: 500;
        }

        .food-category-card.active .category-subtitle {
            color: rgba(255, 255, 255, .72);
        }

        .anchor-target {
            display: block;
            position: relative;
            top: -150px;
            visibility: hidden;
        }

        @media (max-width: 1100px) {
            .food-header-main {
                gap: 16px;
                padding-left: 18px;
                padding-right: 18px;
            }

            .food-logo {
                min-width: 190px;
            }

            .food-nav {
                gap: 22px;
                padding-left: 20px;
                padding-right: 20px;
            }

            .nav-promise {
                display: none;
            }
        }

        @media (max-width: 900px) {
            .food-header-main {
                flex-wrap: wrap;
            }

            .food-logo {
                min-width: 0;
                flex: 1;
            }

            .food-actions {
                margin-left: auto;
            }

            .food-search {
                order: 3;
                flex-basis: 100%;
                max-width: none;
            }

            .food-nav {
                overflow-x: auto;
                justify-content: flex-start;
                gap: 24px;
            }

            .food-nav a {
                flex-shrink: 0;
            }

            .header-help-link {
                display: none;
            }

            .food-category-card {
                flex-basis: 145px;
            }
        }

        @media (max-width: 600px) {
            .announcement {
                font-size: 10px;
                padding: 8px 10px;
            }

            .food-header-main {
                min-height: auto;
                padding: 10px 14px 12px;
                gap: 12px;
            }

            .food-logo .logo-icon {
                width: 48px;
                height: 43px;
            }

            .food-logo .logo-text strong {
                font-size: 17px;
            }

            .food-logo .logo-text small {
                font-size: 8px;
                letter-spacing: .8px;
            }

            .food-cart-button {
                width: 41px;
                height: 41px;
            }

            .food-nav {
                min-height: 44px;
                padding: 0 14px;
                gap: 22px;
            }

            .food-nav a {
                font-size: 11px;
                padding: 14px 0 12px;
            }

            .category-heading-row {
                margin-top: 25px;
            }

            .category-heading-row h3 {
                font-size: 21px;
            }

            .category-scroll-hint {
                font-size: 9px;
            }

            .food-category-card {
                flex-basis: 132px;
                min-height: 119px;
                padding: 12px;
            }

            .category-icon {
                width: 37px;
                height: 37px;
                font-size: 19px;
            }

            .category-label {
                font-size: 11px;
            }

            .category-subtitle {
                font-size: 9px;
            }
        }



        /* Compact food-business navigation and footer */
        .food-header-main {
            min-height: 66px;
            gap: 18px;
            padding: 7px 22px;
        }

        .food-logo {
            min-width: 185px;
            gap: 9px;
        }

        .food-logo .logo-icon {
            width: 52px;
            height: 43px;
        }

        .food-logo .logo-text strong {
            font-size: 19px;
        }

        .food-search {
            flex: 0 1 360px;
            max-width: 360px;
        }

        .food-search input {
            height: 40px;
            padding-left: 15px;
            font-size: 12px;
            border-radius: 11px;
        }

        .food-search .search-icon {
            font-size: 21px;
            right: 13px;
        }

        .food-actions {
            gap: 10px;
        }

        .food-cart-button {
            width: 40px;
            height: 40px;
            border-radius: 11px;
        }

        .food-nav-wrap {
            order: 0;
            border-top: 0;
            border-bottom: 1px solid #e8eee6;
            background: #f7faf5;
        }

        .food-nav {
            min-height: 37px;
            padding: 0 22px;
            gap: 25px;
        }

        .food-nav a {
            padding: 10px 0 9px;
            font-size: 11px;
        }

        .food-nav a::after {
            bottom: 2px;
        }

        .nav-promise {
            font-size: 9px;
        }

        .food-header-main {
            order: 1;
        }

        .food-header {
            display: flex;
            flex-direction: column;
        }

        .satvik-footer {
            padding: 42px 22px 18px;
            background: #122a1d;
            color: #fff;
        }

        .satvik-footer-grid {
            max-width: 1250px;
            margin: 0 auto;
            grid-template-columns: 1.35fr 1fr 1fr 1.1fr;
            gap: 30px;
        }

        .satvik-footer h3 {
            margin-bottom: 12px;
            font-size: 22px;
        }

        .satvik-footer h4 {
            margin-bottom: 13px;
            font-size: 13px;
            color: #fff;
        }

        .satvik-footer p,
        .satvik-footer li {
            color: rgba(255, 255, 255, .68);
            font-size: 12px;
            line-height: 1.8;
        }

        .satvik-footer ul {
            padding: 0;
            margin: 0;
        }

        .satvik-footer li {
            list-style: none;
            margin: 5px 0;
        }

        .satvik-footer a {
            color: inherit;
            transition: color .2s ease;
        }

        .satvik-footer a:hover {
            color: #f4c77b;
        }

        .footer-trust {
            margin-top: 14px;
        }

        .footer-legal {
            max-width: 1250px;
            margin: 24px auto 0;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, .10);
        }

        .footer-legal h4 {
            margin-bottom: 6px;
        }

        .footer-legal p {
            font-size: 11px;
            max-width: 1050px;
        }

        .footer-legal-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 12px;
        }

        .copyright {
            max-width: 1250px;
            margin: 24px auto 0;
            padding-top: 16px;
            line-height: 1.7;
        }

        .cart-fly-image {
            position: fixed;
            z-index: 99999;
            pointer-events: none;
            object-fit: contain;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 10px 28px rgba(0, 0, 0, .22);
            transition: top .65s cubic-bezier(.2, .75, .25, 1), left .65s cubic-bezier(.2, .75, .25, 1), width .65s ease, height .65s ease, opacity .65s ease, transform .65s ease;
        }

        .food-cart-button.cart-bounce {
            animation: cartBounce .55s ease;
        }

        @keyframes cartBounce {

            0%,
            100% {
                transform: scale(1)
            }

            35% {
                transform: scale(1.18) rotate(-8deg)
            }

            65% {
                transform: scale(.94) rotate(5deg)
            }
        }

        @media(max-width:900px) {
            .food-header-main {
                flex-wrap: nowrap;
            }

            .food-search {
                order: initial;
                flex: 0 1 320px;
                max-width: 320px;
            }

            .food-logo {
                min-width: 0;
            }

            .food-nav {
                gap: 20px;
            }

            .satvik-footer-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width:600px) {
            .food-header-main {
                min-height: 58px;
                padding: 8px 12px;
                gap: 9px;
            }

            .food-logo .logo-icon {
                width: 38px;
                height: 36px;
            }

            .food-logo .logo-text strong {
                font-size: 15px;
            }

            .food-logo .logo-text small {
                font-size: 7px;
                letter-spacing: .4px;
            }

            .food-search {
                flex: 1 1 auto;
                max-width: none;
                min-width: 80px;
            }

            .food-search input {
                height: 36px;
                padding: 0 30px 0 10px;
                font-size: 10px;
            }

            .food-search .search-icon {
                right: 9px;
                font-size: 18px;
            }

            .food-actions {
                gap: 0;
            }

            .food-cart-button {
                width: 36px;
                height: 36px;
            }

            .food-nav {
                min-height: 35px;
                padding: 0 12px;
                gap: 18px;
            }

            .food-nav a {
                font-size: 10px;
                padding: 10px 0 8px;
            }

            .satvik-footer {
                padding: 32px 16px 16px;
            }

            .satvik-footer-grid {
                gap: 22px 16px;
            }

            .satvik-footer h3 {
                font-size: 18px;
            }

            .satvik-footer h4 {
                font-size: 12px;
            }

            .satvik-footer p,
            .satvik-footer li {
                font-size: 11px;
            }

            .footer-legal {
                margin-top: 18px;
            }

            .footer-legal-links {
                gap: 10px;
                font-size: 10px;
            }
        }


        /* Single-row compact navbar */
        .food-header {
            display: block !important;
        }

        .single-navbar {
            width: 100%;
            max-width: 1500px;
            min-height: 68px;
            margin: 0 auto;
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
            gap: clamp(10px, 1.4vw, 22px);
            padding: 8px clamp(12px, 2vw, 26px);
            overflow: visible;
        }

        .single-navbar .food-logo {
            flex: 0 0 auto;
            min-width: 0;
            gap: 8px;
        }

        .single-navbar .food-logo .logo-icon {
            width: 45px;
            height: 42px;
        }

        .single-navbar .food-logo .logo-text strong {
            font-size: 18px;
            white-space: nowrap;
        }

        .single-navbar .food-logo .logo-text small {
            font-size: 8px;
            letter-spacing: .6px;
            white-space: nowrap;
        }

        .single-navbar .food-nav {
            flex: 1 1 auto;
            min-width: 0;
            max-width: none;
            min-height: 0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
            justify-content: center;
            gap: clamp(10px, 1.25vw, 20px);
            overflow: visible;
            white-space: nowrap;
        }

        .single-navbar .food-nav a {
            flex: 0 0 auto;
            padding: 10px 0;
            font-size: clamp(10px, .85vw, 12px);
        }

        .single-navbar .food-nav a::after {
            bottom: 3px;
        }

        .single-navbar .nav-pill {
            font-size: 8px;
        }

        .single-navbar .food-search {
            flex: 0 1 220px;
            width: 220px;
            max-width: 220px;
            min-width: 125px;
        }

        .single-navbar .food-search input {
            height: 38px;
            padding: 0 34px 0 12px;
            font-size: 11px;
            border-radius: 10px;
        }

        .single-navbar .food-search .search-icon {
            right: 10px;
            font-size: 20px;
        }

        .single-navbar .food-actions {
            flex: 0 0 auto;
            margin: 0;
            gap: 0;
        }

        .single-navbar .food-cart-button {
            width: 39px;
            height: 39px;
        }

        @media (max-width:1100px) {
            .single-navbar {
                gap: 10px;
                padding-left: 12px;
                padding-right: 12px;
            }

            .single-navbar .food-logo .logo-icon {
                width: 38px;
                height: 36px;
            }

            .single-navbar .food-logo .logo-text strong {
                font-size: 15px;
            }

            .single-navbar .food-logo .logo-text small {
                display: none;
            }

            .single-navbar .food-nav {
                gap: 10px;
            }

            .single-navbar .food-nav a {
                font-size: 10px;
            }

            .single-navbar .food-search {
                flex-basis: 150px;
                width: 150px;
                min-width: 105px;
            }
        }

        @media (max-width:760px) {
            .single-navbar {
                min-height: 58px;
                gap: 9px;
                padding: 7px 10px;
            }

            .single-navbar .food-nav {
                justify-content: flex-start;
                overflow-x: auto;
                scrollbar-width: none;
                gap: 14px;
            }

            .single-navbar .food-nav::-webkit-scrollbar {
                display: none;
            }

            .single-navbar .food-nav a {
                font-size: 10px;
            }

            .single-navbar .food-search {
                flex: 0 1 125px;
                width: 125px;
                min-width: 90px;
            }

            .single-navbar .food-search input {
                height: 34px;
                font-size: 10px;
            }

            .single-navbar .food-cart-button {
                width: 34px;
                height: 34px;
            }
        }

        @media (max-width:480px) {
            .single-navbar {
                gap: 7px;
                padding: 7px 8px;
            }

            .single-navbar .food-logo .logo-icon {
                width: 31px;
                height: 30px;
            }

            .single-navbar .food-logo .logo-text strong {
                font-size: 12px;
            }

            .single-navbar .food-nav {
                gap: 12px;
            }

            .single-navbar .food-nav a {
                font-size: 9px;
            }

            .single-navbar .food-search {
                flex: 0 1 92px;
                width: 92px;
                min-width: 75px;
            }

            .single-navbar .food-search input {
                padding-left: 7px;
                padding-right: 24px;
                font-size: 9px;
            }

            .single-navbar .food-search input::placeholder {
                color: transparent;
            }

            .single-navbar .food-search .search-icon {
                right: 6px;
                font-size: 17px;
            }

            .single-navbar .food-cart-button {
                width: 31px;
                height: 31px;
                font-size: 16px;
            }
        }


        /* Shop All page additions, styled to match the main Satvik Foods homepage */
        .announcement {
            background: #143d29;
            color: #fff;
            text-align: center;
            padding: 9px 16px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .25px
        }

        .shop-page-wrap {
            max-width: 1250px;
            margin: auto;
            padding: 32px 20px 70px
        }

        .shop-breadcrumb {
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 18px
        }

        .shop-breadcrumb a {
            color: var(--green)
        }

        .shop-intro {
            background: linear-gradient(115deg, #edf6e9, #fff8e9);
            border-radius: 18px;
            padding: 28px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
            overflow: hidden
        }

        .shop-intro .eyebrow-label {
            display: block;
            color: #bb702c;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.6px;
            margin-bottom: 8px
        }

        .shop-intro h1 {
            margin: 0 0 9px;
            color: var(--green-dark);
            font-size: clamp(30px, 4vw, 44px);
            line-height: 1.05;
            letter-spacing: -1.5px
        }

        .shop-intro p {
            margin: 0;
            color: var(--muted);
            max-width: 650px;
            font-size: 14px;
            line-height: 1.7
        }

        .shop-intro-art {
            font-size: 64px;
            min-width: 100px;
            text-align: center
        }

        .shop-benefits {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin: 0 0 30px
        }

        .shop-benefit {
            background: #fff;
            border: 1px solid #e8eee7;
            border-radius: 14px;
            padding: 14px;
            display: flex;
            align-items: center;
            gap: 11px
        }

        .shop-benefit-icon {
            width: 40px;
            height: 40px;
            flex: 0 0 40px;
            border-radius: 12px;
            background: var(--green-light);
            display: grid;
            place-items: center;
            font-size: 19px
        }

        .shop-benefit strong {
            display: block;
            font-size: 12px;
            color: var(--green-dark)
        }

        .shop-benefit small {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px
        }

        .shop-category-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 16px;
            margin: 32px 0 16px
        }

        .shop-category-heading h2 {
            margin: 0;
            color: var(--green-dark);
            font-size: 24px;
            letter-spacing: -.7px
        }

        .shop-category-heading p {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 12px
        }

        .shop-category-list {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding: 3px 2px 16px;
            scroll-snap-type: x proximity;
            scrollbar-width: thin;
            scrollbar-color: #d8e3d6 transparent
        }

        .shop-category-chip {
            flex: 0 0 150px;
            min-height: 105px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            gap: 7px;
            padding: 14px;
            border: 1px solid #e7ece4;
            border-radius: 15px;
            background: linear-gradient(145deg, #fff 55%, #f7faf3);
            color: #244a30;
            white-space: normal;
            text-align: left;
            scroll-snap-align: start;
            box-shadow: 0 4px 14px rgba(27, 62, 38, .035);
            transition: .2s
        }

        .shop-category-chip:hover,
        .shop-category-chip.active {
            background: linear-gradient(145deg, #1e6b3e, #164b2d);
            color: #fff;
            border-color: #1e6b3e
        }

        .shop-category-chip .category-icon {
            font-size: 21px
        }

        .shop-category-chip .category-label {
            font-size: 12px;
            font-weight: 850
        }

        .shop-category-chip .category-subtitle {
            font-size: 10px;
            opacity: .72
        }

        .shop-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin: 24px 0 16px;
            flex-wrap: wrap
        }

        .shop-results {
            font-size: 13px;
            color: var(--muted)
        }

        .shop-results strong {
            color: var(--green-dark)
        }

        .shop-filters {
            display: flex;
            gap: 9px;
            align-items: center;
            flex-wrap: wrap
        }

        .shop-filter {
            height: 39px;
            border: 1px solid #e8e8e8;
            background: #fff;
            border-radius: 10px;
            padding: 0 12px;
            color: #465448;
            font-size: 12px;
            outline: 0
        }

        .shop-clear {
            background: transparent;
            color: var(--green);
            font-size: 12px;
            font-weight: 800;
            padding: 10px
        }

        .shop-products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            width: 100%
        }

        .shop-product {
            position: relative;
            min-width: 0;
            background: #fff;
            border: 1px solid #eeeeec;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: none;
            transition: box-shadow .22s ease, transform .22s ease
        }

        .shop-product:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08)
        }

        .shop-photo {
            position: relative;
            width: 100%;
            aspect-ratio: 1/1;
            overflow: hidden;
            background: #f7f7f6;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer
        }

        .shop-photo img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: contain;
            object-position: center;
            padding: 0;
            transition: transform .35s ease
        }

        .shop-product:hover .shop-photo img {
            transform: scale(1.025)
        }

        .shop-tag {
            position: absolute;
            top: 9px;
            left: 9px;
            z-index: 5;
            padding: 5px 9px;
            border-radius: 20px;
            background: #176b3a;
            color: #fff;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .4px
        }

        .shop-view {
            position: absolute;
            top: 9px;
            right: 9px;
            z-index: 6;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .95);
            color: #174d2b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .14)
        }

        .shop-product-content {
            padding: 10px 12px 12px
        }

        .shop-product-name {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.35;
            color: #151515;
            margin: 0 0 7px;
            min-height: 17px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .shop-price-line {
            display: flex;
            align-items: baseline;
            gap: 6px;
            flex-wrap: wrap;
            margin-bottom: 9px
        }

        .shop-price {
            font-size: 13px;
            color: #d71920;
            font-weight: 600
        }

        .shop-old-price {
            font-size: 11px;
            color: #777;
            text-decoration: line-through
        }

        .shop-variant {
            display: block;
            width: 100%;
            height: 43px;
            padding: 0 12px;
            margin: 0 0 8px;
            border: 1px solid #d2d2d2;
            border-radius: 17px;
            background: #fff;
            color: #333;
            font-size: 11px;
            outline: none
        }

        .shop-qty {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 43px;
            margin-bottom: 8px;
            border: 1px solid #d0d0d0;
            border-radius: 17px;
            overflow: hidden;
            background: #f7f7f7
        }

        .shop-qty button {
            width: 42px;
            height: 100%;
            flex: 0 0 42px;
            background: transparent;
            color: #111;
            font-size: 16px
        }

        .shop-qty span {
            flex: 1;
            text-align: center;
            font-size: 12px;
            color: #222
        }

        .shop-add {
            display: block;
            width: 100%;
            min-height: 43px;
            border: none;
            border-radius: 24px;
            background: #050505;
            color: #fff;
            padding: 10px 12px;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
            transition: background .2s, transform .2s
        }

        .shop-add:hover {
            background: #246b45;
            transform: translateY(-1px)
        }

        .shop-empty {
            grid-column: 1/-1;
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
            border: 1px dashed #e4e9e2;
            border-radius: 12px
        }

        .shop-empty div {
            font-size: 44px;
            margin-bottom: 10px
        }

        .shop-empty h3 {
            color: var(--green-dark);
            margin: 8px
        }

        .shop-empty p {
            font-size: 13px
        }

        .shop-empty button {
            background: var(--green);
            color: #fff;
            border: 0;
            border-radius: 10px;
            padding: 11px 16px;
            font-weight: 800
        }

        .shop-footer {
            background: #122a1d;
            color: #fff;
            padding: 48px 20px 22px
        }

        .shop-footer-inner {
            max-width: 1250px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap: 40px
        }

        .shop-footer h3,
        .shop-footer h4 {
            margin: 0 0 12px
        }

        .shop-footer p,
        .shop-footer a {
            color: rgba(255, 255, 255, .65);
            font-size: 12px;
            line-height: 1.9
        }

        .shop-footer a {
            display: block
        }

        .shop-footer a:hover {
            color: #fff
        }

        .shop-footer-bottom {
            max-width: 1250px;
            margin: 30px auto 0;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, .08);
            color: rgba(255, 255, 255, .45);
            font-size: 11px;
            text-align: center
        }

        .shop-toast {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 5000;
            background: #173c28;
            color: #fff;
            padding: 13px 17px;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .2);
            font-size: 13px;
            font-weight: 700;
            opacity: 0;
            transform: translateY(30px);
            pointer-events: none;
            transition: .3s
        }

        .shop-toast.show {
            opacity: 1;
            transform: translateY(0)
        }

        .cart-fly-image {
            position: fixed;
            z-index: 5000;
            object-fit: contain;
            border-radius: 12px;
            pointer-events: none;
            transition: all .65s cubic-bezier(.2, .75, .25, 1);
            box-shadow: 0 8px 25px #0002
        }

        @media(max-width:1100px) {
            .shop-products {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 15px
            }

            .shop-benefits {
                grid-template-columns: repeat(2, 1fr)
            }
        }

        @media(max-width:760px) {
            .shop-page-wrap {
                padding: 22px 15px 48px
            }

            .shop-intro {
                padding: 22px 18px
            }

            .shop-intro-art {
                font-size: 48px;
                min-width: 50px
            }

            .shop-intro p {
                font-size: 12px
            }

            .shop-products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px
            }

            .shop-product-content {
                padding: 9px
            }

            .shop-variant {
                height: 40px;
                padding: 0 8px;
                font-size: 10px
            }

            .shop-qty {
                height: 40px
            }

            .shop-qty button {
                width: 34px;
                flex-basis: 34px
            }

            .shop-add {
                min-height: 40px;
                font-size: 11px
            }

            .shop-toolbar {
                align-items: flex-start
            }

            .shop-filters {
                width: 100%
            }

            .shop-filter {
                flex: 1;
                min-width: 0
            }

            .shop-footer-inner {
                grid-template-columns: 1fr;
                gap: 22px
            }
        }

        @media(max-width:480px) {
            .shop-intro-art {
                display: none
            }

            .shop-benefits {
                gap: 8px
            }

            .shop-benefit {
                padding: 10px;
                gap: 8px
            }

            .shop-benefit-icon {
                width: 32px;
                height: 32px;
                flex-basis: 32px;
                font-size: 15px
            }

            .shop-benefit strong {
                font-size: 10px
            }

            .shop-benefit small {
                font-size: 9px
            }

            .shop-category-chip {
                flex-basis: 132px;
                min-height: 96px;
                padding: 12px
            }

            .shop-product-name {
                font-size: 11px
            }

            .shop-price {
                font-size: 12px
            }

            .shop-qty button {
                width: 29px;
                flex-basis: 29px
            }

            .shop-add {
                font-size: 10px;
                padding: 8px 5px
            }
        }

        /* Combo Offers page — matched to Satvik Foods storefront */
        .combo-page {
            max-width: 1250px;
            margin: 0 auto;
            padding: 28px 20px 70px
        }

        .combo-breadcrumb {
            font-size: 12px;
            color: #7a857b;
            margin-bottom: 20px
        }

        .combo-breadcrumb a {
            color: var(--green);
            font-weight: 800
        }

        .combo-hero {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding: 38px 42px;
            border: 1px solid #e7eee4;
            border-radius: 18px;
            background: linear-gradient(115deg, #f0f7eb 0%, #fffaf0 100%);
            margin-bottom: 24px
        }

        .combo-hero:after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border: 28px solid rgba(36, 107, 69, .06);
            border-radius: 50%;
            right: 8%;
            top: -115px;
            pointer-events: none
        }

        .combo-eyebrow {
            display: block;
            color: #bb702c;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.8px;
            margin-bottom: 9px
        }

        .combo-hero h1 {
            font-size: clamp(30px, 4vw, 48px);
            line-height: 1.05;
            letter-spacing: -1.8px;
            color: var(--green-dark);
            max-width: 690px
        }

        .combo-hero p {
            max-width: 650px;
            margin-top: 13px;
            color: #68766b;
            font-size: 14px;
            line-height: 1.7
        }

        .combo-hero-art {
            font-size: 74px;
            white-space: nowrap;
            z-index: 1
        }

        .combo-benefits {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-bottom: 34px
        }

        .combo-benefit {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            border: 1px solid #e8eee6;
            border-radius: 13px;
            background: #fff
        }

        .combo-benefit-icon {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            flex: 0 0 40px;
            background: #edf5e9;
            border-radius: 12px;
            font-size: 19px
        }

        .combo-benefit strong {
            display: block;
            color: #244a30;
            font-size: 12px
        }

        .combo-benefit small {
            display: block;
            margin-top: 3px;
            color: #7b857b;
            font-size: 10px
        }

        .combo-section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 18px;
            margin: 30px 0 16px
        }

        .combo-section-heading h2 {
            font-size: 27px;
            letter-spacing: -.8px;
            color: var(--green-dark)
        }

        .combo-section-heading p {
            font-size: 12px;
            color: #788278;
            margin-top: 6px
        }

        .combo-count {
            font-size: 11px;
            color: #718071;
            white-space: nowrap
        }

        .combo-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px
        }

        .combo-card {
            min-width: 0;
            border: 1px solid #e7ece4;
            border-radius: 15px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 16px rgba(27, 62, 38, .035);
            transition: transform .2s, box-shadow .2s
        }

        .combo-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(27, 62, 38, .09)
        }

        .combo-card-top {
            padding: 19px 19px 14px;
            background: linear-gradient(145deg, #f3f8ef, #fffaf0);
            border-bottom: 1px solid #edf0e9
        }

        .combo-label {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #e3f0df;
            color: #205d38;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: .5px;
            text-transform: uppercase
        }

        .combo-card h3 {
            font-size: 19px;
            line-height: 1.25;
            color: #183f29;
            margin: 12px 0 5px
        }

        .combo-card-top p {
            font-size: 11px;
            color: #778177;
            line-height: 1.5
        }

        .combo-items {
            padding: 5px 18px
        }

        .combo-item {
            display: grid;
            grid-template-columns: 48px minmax(0, 1fr) auto;
            align-items: center;
            gap: 10px;
            padding: 12px 0;
            border-bottom: 1px solid #f0f2ee
        }

        .combo-item:last-child {
            border-bottom: 0
        }

        .combo-item-image {
            width: 48px;
            height: 48px;
            background: #f7f7f4;
            border-radius: 9px;
            overflow: hidden;
            display: grid;
            place-items: center
        }

        .combo-item-image img {
            width: 100%;
            height: 100%;
            object-fit: contain
        }

        .combo-item-name {
            font-size: 11px;
            font-weight: 800;
            color: #26392b;
            line-height: 1.35
        }

        .combo-item-weight {
            font-size: 10px;
            color: #818981;
            margin-top: 4px
        }

        .combo-item-price {
            font-size: 11px;
            font-weight: 800;
            color: #344b38;
            white-space: nowrap
        }


        .combo-regular-price {
            color: #7a827b !important;
            text-decoration: line-through;
            font-size: 14px !important;
        }

        .combo-savings {
            color: #176b3a !important;
        }

        .combo-expiry {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin: 8px 0;
            font-size: 11px;
            color: #6e776f;
        }

        .combo-expiry strong {
            color: #174b31;
            text-align: right;
        }

        .combo-card-bottom {
            padding: 15px 18px 18px;
            background: #fcfdfb;
            border-top: 1px solid #eef1eb
        }

        .combo-total {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px
        }

        .combo-total span {
            font-size: 11px;
            color: #748074
        }

        .combo-total strong {
            font-size: 21px;
            color: #173e29
        }

        .combo-add {
            width: 100%;
            min-height: 43px;
            border-radius: 10px;
            background: #17663a;
            color: #fff;
            font-size: 12px;
            font-weight: 850;
            transition: background .2s, transform .2s
        }

        .combo-add:hover {
            background: #12472a;
            transform: translateY(-1px)
        }

        .combo-add:disabled {
            opacity: .5;
            cursor: not-allowed
        }

        .combo-note {
            margin-top: 22px;
            padding: 14px 16px;
            border: 1px solid #eee7d7;
            border-radius: 12px;
            background: #fffaf0;
            color: #756643;
            font-size: 11px;
            line-height: 1.65
        }

        .combo-loading {
            grid-column: 1/-1;
            padding: 45px 20px;
            text-align: center;
            border: 1px dashed #e0e8dd;
            border-radius: 14px;
            color: #778177
        }

        .combo-loading strong {
            display: block;
            margin: 8px 0;
            color: var(--green-dark)
        }

        @media(max-width:900px) {
            .combo-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }

            .combo-hero {
                padding: 30px
            }

            .combo-hero-art {
                font-size: 58px
            }
        }

        @media(max-width:650px) {
            .combo-page {
                padding: 20px 14px 48px
            }

            .combo-hero {
                padding: 24px 19px
            }

            .combo-hero-art {
                display: none
            }

            .combo-hero p {
                font-size: 12px
            }

            .combo-benefits {
                grid-template-columns: 1fr;
                gap: 8px
            }

            .combo-benefit {
                padding: 11px
            }

            .combo-section-heading {
                align-items: flex-start
            }

            .combo-section-heading h2 {
                font-size: 23px
            }

            .combo-grid {
                grid-template-columns: 1fr;
                gap: 14px
            }

            .combo-card h3 {
                font-size: 18px
            }
        }
    </style>
</head>

<body ng-controller="ComboOffersController" ng-cloak>
    <div class="announcement">🌿 <span>Good food. Good life.</span> — wholesome favourites for your everyday kitchen
    </div>
    <header class="header food-header">
        <div class="header-inner food-header-main single-navbar">
            <a href="{{ url('/') }}" class="logo food-logo" aria-label="Satvik Foods home">
                <div class="logo-icon"><img src="{{ asset('img/logo.png') }}" alt="Satvik Foods Logo"></div>
                <div class="logo-text"><strong>Satvik Foods</strong><small>Pure • Natural • Healthy</small></div>
            </a>
            <nav class="main-nav food-nav" aria-label="Main navigation">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/shop-all') }}">Shop All</a>
                <a class="nav-home" href="{{ url('/combo-offers') }}">Combo Offers <span
                        class="nav-pill">SAVE</span></a>
                <a href="{{ url('/special-offers') }}">Special Offers</a>
                <a href="{{ url('/#contact-us') }}">Contact Us</a>
            </nav>
            <div class="search-box food-search"><input type="text" ng-model="searchText"
                    placeholder="Search foods..." aria-label="Search products"><span class="search-icon"
                    aria-hidden="true">⌕</span></div>
            <div class="header-actions food-actions"><button class="icon-button food-cart-button" type="button"
                    ng-click="goToCart()" title="Shopping Bag" aria-label="Open shopping bag"><span
                        aria-hidden="true">🛍</span><span class="cart-badge"
                        ng-if="cartCount() > 0">@{{ cartCount() }}</span></button></div>
        </div>
    </header>

    <main class="combo-page">
        <div class="combo-breadcrumb"><a href="{{ url('/') }}">Home</a> &nbsp;›&nbsp; Combo Offers</div>
        <section class="combo-hero">
            <div><span class="combo-eyebrow">MORE FAVOURITES, ONE EASY BAG</span>
                <h1>Everyday favourites,<br>bundled for your home.</h1>
                <p>Explore thoughtfully grouped Satvik Foods products. Pick a combo, review what's inside, and add the
                    whole set to your shopping bag in one click.</p>
            </div>
            <div class="combo-hero-art" aria-hidden="true">🌾 🥜 🌿</div>
        </section>
        <section class="combo-benefits" aria-label="Combo shopping benefits">
            <div class="combo-benefit">
                <div class="combo-benefit-icon">🧺</div>
                <div><strong>Easy bundle shopping</strong><small>Several favourites in one click</small></div>
            </div>
            <div class="combo-benefit">
                <div class="combo-benefit-icon">🌱</div>
                <div><strong>Everyday pantry picks</strong><small>Products from our current range</small></div>
            </div>
            <div class="combo-benefit">
                <div class="combo-benefit-icon">🛍️</div>
                <div><strong>One simple bag</strong><small>Review your items before checkout</small></div>
            </div>
        </section>
        <section>
            <div class="combo-section-heading">
                <div>
                    <span class="combo-eyebrow">CURATED FOR YOUR KITCHEN</span>
                    <h2>Available Combo Offers</h2>
                    <p>Specially prepared bundles published by Satvik Foods.</p>
                </div>
                <span class="combo-count" ng-if="!loading">
                    @{{ combos.length }} active offers
                </span>
            </div>

            <div class="combo-grid">
                <article class="combo-card" ng-repeat="combo in combos track by combo.id">
                    <div class="combo-card-top">
                        <span class="combo-label">LIMITED-TIME COMBO</span>
                        <h3>@{{ combo.name }}</h3>
                        <p>@{{ combo.description || 'A special Satvik Foods combo offer.' }}</p>
                    </div>

                    <div class="combo-items">
                        <div class="combo-item" ng-repeat="product in combo.products track by product.key">
                            <div class="combo-item-image">
                                <img ng-if="product.image"
                                     ng-src="@{{ imageUrl(product.image) }}"
                                     alt="@{{ product.name }}"
                                     loading="lazy"
                                     onerror="this.style.opacity='.15'">
                                <span ng-if="!product.image">🌿</span>
                            </div>
                            <div>
                                <div class="combo-item-name">@{{ product.name }}</div>
                                <div class="combo-item-weight">
                                    @{{ product.weight || 'Satvik Foods item' }}
                                    · Qty: @{{ product.quantity }}
                                </div>
                            </div>
                            <div class="combo-item-price">
                                ₹@{{ (product.base_price * product.quantity) | number:2 }}
                            </div>
                        </div>
                    </div>

                    <div class="combo-card-bottom">
                        <div class="combo-total">
                            <span>Regular price</span>
                            <strong class="combo-regular-price">₹@{{ combo.regular_price | number:2 }}</strong>
                        </div>
                        <div class="combo-total">
                            <span>Combo offer price</span>
                            <strong>₹@{{ combo.offer_price | number:2 }}</strong>
                        </div>
                        <div class="combo-total" ng-if="combo.savings > 0">
                            <span>You save</span>
                            <strong class="combo-savings">₹@{{ combo.savings | number:2 }}</strong>
                        </div>
                        <div class="combo-expiry">
                            <span>Offer ends:</span>
                            <strong>@{{ combo.ends_at_display }}</strong>
                        </div>
                        <div class="combo-expiry" ng-if="combo.countdown">
                            <span>Time remaining:</span>
                            <strong>@{{ combo.countdown }}</strong>
                        </div>
                        <button type="button"
                                class="combo-add"
                                ng-click="addCombo(combo)"
                                ng-disabled="!combo.products.length || combo.expired">
                            ＋ Add combo items to bag
                        </button>
                    </div>
                </article>

                <div class="combo-loading" ng-if="loading">
                    <div style="font-size:32px">🌿</div>
                    <strong>Loading combo offers…</strong>
                    <span>Fetching current offers from Satvik Foods.</span>
                </div>

                <div class="combo-loading" ng-if="!loading && combos.length === 0">
                    <div style="font-size:32px">🧺</div>
                    <strong>No active combo offers right now</strong>
                    <span>Please check back later for new Satvik Foods bundles.</span>
                </div>

                <div class="combo-loading" ng-if="!loading && loadError">
                    <div style="font-size:32px">⚠️</div>
                    <strong>Combo offers could not be loaded</strong>
                    <span>Please refresh the page or try again later.</span>
                </div>
            </div>

            <div class="combo-note">
                <strong>Offer details:</strong>
                Prices, products, quantities and expiry dates are taken from the offers configured by the Satvik Foods admin.
                Offers are displayed only while active and within their scheduled dates.
            </div>
        </section>
    </main>
    <footer class="shop-footer">
        <div class="shop-footer-inner">
            <div>
                <h3>Satvik Foods 🌿</h3>
                <p>Good food for good living. Explore everyday pantry favourites and wholesome foods for your family.
                </p>
            </div>
            <div>
                <h4>Shop</h4><a href="{{ url('/shop-all') }}">Shop All Products</a><a
                    href="{{ url('/combo-offers') }}">Combo Offers</a><a href="{{ url('/#special-offers') }}">Special
                    Offers</a><a href="{{ url('/#products') }}">Browse Categories</a>
            </div>
            <div>
                <h4>Customer care</h4><a href="{{ url('/privacy-policy') }}">Privacy Policy</a><a
                    href="{{ url('/shipping-policy') }}">Shipping & Delivery</a><a
                    href="{{ url('/refund-policy') }}">Returns & Refunds</a><a
                    href="{{ url('/terms-and-conditions') }}">Terms & Conditions</a>
            </div>
            <div>
                <h4>Need help?</h4>
                <p>For product, order or delivery questions, please contact our customer support team.</p><a
                    href="{{ url('/#contact-us') }}">Contact Us</a><a
                    href="mailto:{{ config('mail.from.address') }}">Email customer support</a>
            </div>
        </div>
        <div class="shop-footer-bottom"><span>© {{ date('Y') }} Satvik Foods. All rights
                reserved.</span><span>Made with care for your everyday kitchen.</span></div>
    </footer>
    <div class="shop-toast" ng-class="{show:toastVisible}">@{{ toastMessage }}</div>
    <script>
        (function () {
            'use strict';

            angular.module('SatvikComboOffers', [])
                .controller('ComboOffersController', [
                    '$scope', '$http', '$window', '$timeout', '$interval',
                    function ($scope, $http, $window, $timeout, $interval) {

                        $scope.products = [];
                        $scope.combos = [];
                        $scope.loading = true;
                        $scope.loadError = false;
                        $scope.toastVisible = false;
                        $scope.toastMessage = '';

                        try {
                            $scope.cart = JSON.parse(localStorage.getItem('Satvik_cart') || '[]');
                            if (!Array.isArray($scope.cart)) $scope.cart = [];
                        } catch (e) {
                            $scope.cart = [];
                        }

                        $scope.cartCount = function () {
                            return $scope.cart.reduce(function (total, item) {
                                return total + Number(item.quantity || 0);
                            }, 0);
                        };

                        $scope.imageUrl = function (image) {
                            if (!image) return '';
                            if (/^(https?:)?\/\//i.test(image) || image.charAt(0) === '/') {
                                return image;
                            }
                            return '{{ asset('') }}' + image.replace(/^\/+/, '');
                        };

                        function normaliseList(response) {
                            if (Array.isArray(response)) return response;
                            if (response && Array.isArray(response.data)) return response.data;
                            return [];
                        }

                        function parseDate(value) {
                            if (!value) return null;
                            var date = new Date(value);
                            if (!isNaN(date.getTime())) return date;

                            // Fallback for MySQL datetime strings.
                            date = new Date(String(value).replace(' ', 'T'));
                            return isNaN(date.getTime()) ? null : date;
                        }

                        function formatDate(value) {
                            var date = parseDate(value);
                            if (!date) return 'Not specified';
                            return date.toLocaleString([], {
                                day: '2-digit',
                                month: 'short',
                                year: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit'
                            });
                        }

                        function makeCombo(offer, productLookup) {
                            var storedItems = Array.isArray(offer.items) ? offer.items : [];

                            var items = storedItems.map(function (item, index) {
                                var product = item.product_id
                                    ? productLookup[String(item.product_id)]
                                    : null;

                                return {
                                    key: String(item.product_id || ('custom-' + index)) + '-' + index,
                                    product_id: item.product_id || null,
                                    name: item.name || (product ? product.name : 'Combo item'),
                                    image: product ? product.image : (offer.image || null),
                                    weight: item.weight || (product ? product.weight : ''),
                                    quantity: Number(item.quantity || 1),
                                    base_price: Number(item.base_price || 0),
                                    kind: item.kind || (item.product_id ? 'product' : 'custom')
                                };
                            });

                            var endsAt = parseDate(offer.ends_at);

                            return {
                                id: offer.id,
                                name: offer.name || 'Satvik Combo Offer',
                                description: offer.description || '',
                                image: offer.image || null,
                                products: items,
                                regular_price: Number(offer.regular_price || 0),
                                offer_price: Number(offer.offer_price || 0),
                                savings: Math.max(
                                    0,
                                    Number(offer.regular_price || 0) - Number(offer.offer_price || 0)
                                ),
                                starts_at: offer.starts_at,
                                ends_at: offer.ends_at,
                                ends_at_date: endsAt,
                                ends_at_display: formatDate(offer.ends_at),
                                countdown: '',
                                expired: false
                            };
                        }

                        function updateCountdowns() {
                            var now = new Date().getTime();

                            $scope.combos.forEach(function (combo) {
                                if (!combo.ends_at_date) {
                                    combo.countdown = '';
                                    return;
                                }

                                var remaining = combo.ends_at_date.getTime() - now;

                                if (remaining <= 0) {
                                    combo.countdown = 'Expired';
                                    combo.expired = true;
                                    return;
                                }

                                var seconds = Math.floor(remaining / 1000);
                                var days = Math.floor(seconds / 86400);
                                var hours = Math.floor((seconds % 86400) / 3600);
                                var minutes = Math.floor((seconds % 3600) / 60);
                                var secs = seconds % 60;

                                combo.countdown = days + 'd ' +
                                    String(hours).padStart(2, '0') + 'h ' +
                                    String(minutes).padStart(2, '0') + 'm ' +
                                    String(secs).padStart(2, '0') + 's';
                            });
                        }

                        $scope.loadCombos = function () {
                            $scope.loading = true;
                            $scope.loadError = false;

                            $http.get('/api/offers/combo')
                                .then(function (offersResponse) {
                                    var offers = normaliseList(offersResponse.data);

                                    // Product API is used only to enrich database offer items
                                    // with their saved product image and current product metadata.
                                    return $http.get('/api/products')
                                        .then(function (productsResponse) {
                                            var products = normaliseList(productsResponse.data);
                                            var lookup = {};

                                            products.forEach(function (product) {
                                                if (product && product.id !== undefined) {
                                                    lookup[String(product.id)] = product;
                                                }
                                            });

                                            $scope.products = products;
                                            $scope.combos = offers.map(function (offer) {
                                                return makeCombo(offer, lookup);
                                            }).filter(function (combo) {
                                                return combo.products.length > 0;
                                            });

                                            updateCountdowns();
                                        })
                                        .catch(function (error) {
                                            console.warn('Product details could not be loaded; showing saved offer item details.', error);

                                            $scope.combos = offers.map(function (offer) {
                                                return makeCombo(offer, {});
                                            }).filter(function (combo) {
                                                return combo.products.length > 0;
                                            });

                                            updateCountdowns();
                                        });
                                })
                                .catch(function (error) {
                                    console.error('Combo offers failed to load:', error);
                                    $scope.combos = [];
                                    $scope.loadError = true;
                                })
                                .finally(function () {
                                    $scope.loading = false;
                                });
                        };

                        function saveCart() {
                            localStorage.setItem('Satvik_cart', JSON.stringify($scope.cart));
                        }

                        function animateToCart() {
                            var target = document.querySelector('.food-cart-button');
                            if (!target || !target.animate) return;

                            try {
                                target.animate(
                                    [
                                        { transform: 'scale(1)' },
                                        { transform: 'scale(1.12)' },
                                        { transform: 'scale(1)' }
                                    ],
                                    { duration: 350 }
                                );
                            } catch (e) {}
                        }

                        $scope.addCombo = function (combo) {
                            if (!combo || combo.expired || !combo.products || !combo.products.length) {
                                return;
                            }

                            // Store one offer line. The server rechecks offer availability
                            // and uses the database offer_price during checkout.
                            var cartId = 'offer-' + combo.id;
                            var existing = $scope.cart.find(function (item) {
                                return String(item.id) === cartId || Number(item.offerId) === Number(combo.id);
                            });

                            if (existing) {
                                existing.quantity = Number(existing.quantity || 1) + 1;
                            } else {
                                var firstProduct = combo.products[0] || {};
                                $scope.cart.push({
                                    id: cartId,
                                    offerId: combo.id,
                                    name: combo.name,
                                    weight: 'Combo Offer',
                                    price: Number(combo.offer_price || 0),
                                    regularPrice: Number(combo.regular_price || 0),
                                    image: firstProduct.image || combo.image || '',
                                    bundleItems: combo.products.map(function (product) {
                                        return {
                                            product_id: product.product_id,
                                            name: product.name,
                                            weight: product.weight || '',
                                            quantity: Number(product.quantity || 1),
                                            base_price: Number(product.base_price || 0)
                                        };
                                    }),
                                    quantity: 1
                                });
                            }

                            saveCart();
                            animateToCart();

                            $scope.toastMessage = combo.name + ' added to your bag at ₹' + Number(combo.offer_price || 0).toFixed(2);
                            $scope.toastVisible = true;

                            $timeout(function () {
                                $scope.toastVisible = false;
                            }, 2400);
                        };

                        $scope.goToCart = function () {
                            $window.location.href = '{{ url('/') }}#cart';
                        };

                        var countdownTimer = $interval(updateCountdowns, 1000);

                        $scope.$on('$destroy', function () {
                            $interval.cancel(countdownTimer);
                        });

                        $scope.loadCombos();
                    }
                ]);
        })();
    </script>
</body>

</html>
