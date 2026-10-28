<!DOCTYPE html>
<html lang="en" ng-app="SatvikApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Satvik Foods | Organic & Natural Foods</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <meta name="description" content="Shop premium organic, natural and healthy food products from Satvik Foods.">

    <!-- IMPORTANT:
         No app.css
         No external project CSS
    -->

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

            grid-template-columns: repeat(5, minmax(0, 1fr));

            gap: 18px;

            width: 100%;
        }


        /* =========================================
   PRODUCT CARD
========================================= */

        .product-card {
            position: relative;

            background: #fff;

            border-radius: 14px;

            overflow: hidden;

            border: 1px solid rgba(30, 80, 45, 0.10);

            box-shadow: 0 5px 18px rgba(20, 50, 30, 0.06);

            transition: all .25s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);

            box-shadow: 0 12px 28px rgba(20, 60, 35, 0.12);
        }


        /* =========================================
   SMALL PRODUCT IMAGE
========================================= */

        .product-image {
            position: relative;

            width: 100%;
            height: 260px;

            overflow: hidden;

            background: #f8f8f4;

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

            transition: transform .4s ease;
        }

        .product-card:hover .product-photo {
            transform: scale(1.03);
        }

        /* =========================================
   PRODUCT BADGE
========================================= */

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


        /* =========================================
   QUICK VIEW
========================================= */

        .quick-view {
            position: absolute;

            top: 9px;
            right: 9px;

            z-index: 6;

            width: 32px;
            height: 32px;

            border: none;

            border-radius: 50%;

            background: rgba(255, 255, 255, .95);

            color: #174d2b;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;

            cursor: pointer;

            box-shadow: 0 3px 10px rgba(0, 0, 0, .14);

            transition: .2s ease;
        }

        .quick-view:hover {
            transform: scale(1.08);
        }


        /* =========================================
   PRODUCT CONTENT
========================================= */

        .product-content {
            padding: 12px;
        }


        .rating {
            font-size: 11px;

            color: #666;

            margin-bottom: 4px;
        }

        .rating span {
            color: #f5a623;
        }


        .product-name {
            font-size: 14px;

            font-weight: 800;

            line-height: 1.25;

            color: #173c25;

            margin-bottom: 4px;

            min-height: 35px;
        }


        .product-weight {
            font-size: 11px;

            color: #777;

            margin-bottom: 10px;
        }


        /* =========================================
   PRICE + BUTTON
========================================= */

        .product-bottom {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 6px;
        }


        .price {
            display: flex;

            align-items: center;

            gap: 5px;

            flex-wrap: wrap;
        }

        .price strong {
            font-size: 15px;

            color: #145c31;
        }

        .old-price {
            font-size: 10px;

            color: #999;

            text-decoration: line-through;
        }


        /* =========================================
   ADD TO BAG
========================================= */

        .add-button {
            border: none;

            background: #176b3a;

            color: #fff;

            padding: 7px 9px;

            border-radius: 7px;

            font-size: 10px;

            font-weight: 800;

            cursor: pointer;

            white-space: nowrap;

            transition: .2s ease;
        }

        .add-button:hover {
            background: #0f512a;

            transform: translateY(-1px);
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
    </style>
</head>


<body ng-controller="ShopController" ng-cloak>


    <!-- =========================================================
         ANNOUNCEMENT
    ========================================================== -->

    <div class="announcement">

        🌿 Pure & Natural Foods
        <span>• Free delivery on orders above ₹999</span>

    </div>


    <!-- =========================================================
         HEADER
    ========================================================== -->

    <header class="header">

        <div class="header-inner">

            <a href="#" class="logo">

                <div class="logo-icon">
                    <img src="{{ asset('img/logo.png') }}" alt="Sathvik Foods Logo">
                </div>

                <div class="logo-text">

                    <strong>Satvik Foods</strong>

                    <small>
                        Pure • Natural • Healthy
                    </small>

                </div>

            </a>


            <div class="search-box">

                <input type="text" ng-model="searchText" placeholder="Search for honey, rice, spices...">

                <span class="search-icon">
                    🔍
                </span>

            </div>


            <div class="header-actions">

                <button class="icon-button" type="button" title="Wishlist">
                    ♡
                </button>


                <button class="icon-button" type="button" ng-click="openCart()" title="Shopping Bag">

                    🛍️

                    <span class="cart-badge" ng-if="getCartCount() > 0">
                        @{{ getCartCount() }}
                    </span>

                </button>

            </div>

        </div>

    </header>


    <!-- =========================================================
         HERO
    ========================================================== -->


    <section class="hero hero-image-section">
        <div class="hero-banner">
            <img src="{{ asset('img/satvik-hero-banner.png') }}" alt="Satvik Foods — Good food. Good life."
                class="hero-banner-image">
        </div>
    </section>



    <!-- =========================================================
         TRUST
    ========================================================== -->

    <div class="trust-section">

        <div class="trust-grid">

            <div class="trust-card">

                <div class="trust-icon">
                    🌱
                </div>

                <div>
                    <strong>Natural Products</strong>
                    <span>Carefully selected</span>
                </div>

            </div>


            <div class="trust-card">

                <div class="trust-icon">
                    🚚
                </div>

                <div>
                    <strong>Fast Delivery</strong>
                    <span>Safe doorstep delivery</span>
                </div>

            </div>


            <div class="trust-card">

                <div class="trust-icon">
                    🔒
                </div>

                <div>
                    <strong>Secure Shopping</strong>
                    <span>Safe ordering experience</span>
                </div>

            </div>


            <div class="trust-card">

                <div class="trust-icon">
                    💚
                </div>

                <div>
                    <strong>Healthy Choice</strong>
                    <span>Made for your family</span>
                </div>

            </div>

        </div>

    </div>


    <!-- =========================================================
         PRODUCTS
    ========================================================== -->

    <main id="products">

        <section class="section">

            <div class="section-heading">

                <div>

                    <h2>
                        Shop Our Foods
                    </h2>

                    <p>
                        Good ingredients for good living.
                    </p>

                </div>

            </div>


            <!-- CATEGORIES -->

            <div class="categories">

                <button type="button" class="category-button" ng-class="{active: selectedCategory === 'All'}"
                    ng-click="openCategory('All')">
                    All Products
                </button>


                <button type="button" class="category-button" ng-repeat="category in categories"
                    ng-class="{active: selectedCategory === category}" ng-click="openCategory(category)">
                    @{{ category }}
                </button>

            </div>


            <br>


            <!-- PRODUCT GRID -->

            <div class="products-grid">

                <article class="product-card"
                    ng-repeat="
            product in products |
            filter:searchFilter |
            filter:categoryFilter
        ">

                    <!-- PRODUCT IMAGE -->
                    <div class="product-image" ng-click="openProduct(product)">

                        <!-- POPULAR / BADGE OVERLAY -->
                        <span class="product-tag" ng-if="product.badge">
                            @{{ product.badge }}
                        </span>

                        <!-- QUICK VIEW -->
                        <button class="quick-view" type="button"
                            ng-click="$event.stopPropagation(); openProduct(product)" title="View Product">
                            👁
                        </button>

                        <!-- FULL IMAGE -->
                        <img class="product-photo" ng-src="@{{ product.image }}" alt="@{{ product.name }}"
                            loading="lazy">



                    </div>


                    <!-- PRODUCT DETAILS -->
                    <div class="product-content">

                        <div class="rating">
                            <span>★</span>
                            @{{ product.rating }}
                        </div>

                        <div class="product-name">
                            @{{ product.name }}
                        </div>

                        <div class="product-weight">
                            @{{ product.weight }}
                        </div>

                        <div class="product-bottom">

                            <div class="price">

                                <strong>
                                    ₹@{{ product.price }}
                                </strong>

                                <span class="old-price" ng-if="product.oldPrice">
                                    ₹@{{ product.oldPrice }}
                                </span>

                            </div>


                            <button class="add-button" type="button"
                                ng-click="$event.stopPropagation(); addToCart(product)">
                                + Add to Bag
                            </button>

                        </div>

                    </div>

                </article>


                <!-- EMPTY SEARCH -->
                <div class="empty-products"
                    ng-if="
            (
                products |
                filter:searchFilter |
                filter:categoryFilter
            ).length === 0
         ">

                    <div>🔎</div>

                    <strong>
                        No products found
                    </strong>

                    <p>
                        Try another search or category.
                    </p>

                </div>

            </div>

        </section>

    </main>


    <!-- =========================================================
         DEAL
    ========================================================== -->

    <section class="deal">

        <div class="deal-inner">

            <div>

                <h3>
                    🌿 Healthy Deals Are Here
                </h3>

                <p>
                    Grab your favourite products before the offer ends.
                </p>

            </div>


            <div class="timer">

                <div class="time-box">

                    <strong>
                        @{{ timer.hours }}
                    </strong>

                    <span>
                        Hours
                    </span>

                </div>


                <div class="time-box">

                    <strong>
                        @{{ timer.minutes }}
                    </strong>

                    <span>
                        Minutes
                    </span>

                </div>


                <div class="time-box">

                    <strong>
                        @{{ timer.seconds }}
                    </strong>

                    <span>
                        Seconds
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================================
         FOOTER
    ========================================================== -->

    <footer>

        <div class="footer-inner">

            <div>

                <h3>
                    🌿 Satvik Foods
                </h3>

                <p>
                    Bringing natural, wholesome and carefully selected
                    foods to your everyday table.
                </p>

            </div>


            <div>

                <h4>
                    Shop
                </h4>

                <ul>

                    <li>Organic Foods</li>
                    <li>Natural Products</li>
                    <li>Rice & Grains</li>
                    <li>Spices</li>

                </ul>

            </div>


            <div>

                <h4>
                    Contact
                </h4>

                <ul>

                    <li>📞 +91 7200095988</li>
                    <li>✉️ satvikfoods@gmail.com</li>
                    <li>📍 Velechery,Tamil Nadu, India</li>

                </ul>

            </div>

        </div>


        <div class="copyright">

            © {{ date('Y') }} Satvik Foods.
            All rights reserved.

        </div>

    </footer>


    <!-- =========================================================
         OVERLAY
    ========================================================== -->

    <div class="overlay" ng-class="{active: cartOpen}" ng-click="closeCart()"></div>


    <!-- =========================================================
         CART DRAWER
    ========================================================== -->

    <aside class="cart-drawer" ng-class="{open: cartOpen}">

        <div class="cart-header">

            <div>

                <h3>
                    Your Bag
                </h3>

                <small>
                    @{{ getCartCount() }} item(s)
                </small>

            </div>


            <button class="close-button" type="button" ng-click="closeCart()">
                ×
            </button>

        </div>


        <div class="cart-items">


            <!-- EMPTY CART -->

            <div class="empty-cart" ng-if="cart.length === 0">

                <div class="empty-cart-icon">
                    🛍️
                </div>

                <strong>
                    Your bag is empty
                </strong>

                <p>
                    Add some delicious products to continue.
                </p>

            </div>


            <!-- CART ITEMS -->

            <div class="cart-item" ng-repeat="item in cart track by item.id" ng-if="cart.length > 0">

                <div class="cart-item-image">

                    <img ng-src="@{{ item.image }}" alt="@{{ item.name }}">

                </div>


                <div>

                    <div class="cart-item-name">
                        @{{ item.name }}
                    </div>

                    <div class="cart-item-weight">
                        @{{ item.weight }}
                    </div>


                    <div class="cart-item-bottom">

                        <div>

                            <div class="quantity-control">

                                <button type="button" ng-click="decreaseQty(item)">
                                    −
                                </button>

                                <span>
                                    @{{ item.quantity }}
                                </span>

                                <button type="button" ng-click="increaseQty(item)">
                                    +
                                </button>

                            </div>


                            <button class="remove" type="button" ng-click="removeFromCart(item)">
                                Remove
                            </button>

                        </div>


                        <div class="cart-price">

                            ₹@{{ item.price * item.quantity }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="cart-footer" ng-if="cart.length > 0">

            <div class="cart-total">
                <span>Subtotal</span>
                <strong style="font-size:15px;">₹@{{ getCartSubtotal() | number: 2 }}</strong>
            </div>

            <div class="cart-total">
                <span>Delivery Charges</span>
                <strong style="font-size:15px;" ng-class="{'free-delivery': getDeliveryCharge() === 0}">
                    <span ng-if="getDeliveryCharge() > 0">₹@{{ getDeliveryCharge() }}</span>
                    <span ng-if="getDeliveryCharge() === 0">FREE</span>
                </strong>
            </div>

            <p style="font-size:11px;color:#6e776f;margin:-4px 0 14px;" ng-if="getDeliveryCharge() > 0">
                Add products worth ₹@{{ (1000 - getCartSubtotal()) | number: 2 }} more for free delivery.
            </p>

            <div class="cart-total">
                <span><strong style="font-size:14px;">Grand Total</strong></span>
                <strong>₹@{{ getCartTotal() | number: 2 }}</strong>
            </div>

            <button class="checkout-button" type="button" ng-click="openCheckout()">
                Proceed to Checkout →
            </button>

        </div>

    </aside>


    <!-- =========================================================
         PRODUCT MODAL
    ========================================================== -->

    <div class="modal" ng-class="{active: selectedProduct}" ng-click="closeProduct($event)">

        <div class="modal-box" ng-if="selectedProduct" ng-click="$event.stopPropagation()">

            <div class="modal-content">

                <div class="modal-image">

                    <img ng-src="@{{ selectedProduct.image }}" alt="@{{ selectedProduct.name }}">

                </div>


                <div class="modal-info">

                    <button class="modal-close" type="button" ng-click="closeProduct()">
                        ×
                    </button>


                    <div class="rating">
                        ★ @{{ selectedProduct.rating }}
                    </div>


                    <h2>
                        @{{ selectedProduct.name }}
                    </h2>


                    <p>
                        @{{ selectedProduct.description }}
                    </p>


                    <!-- PRODUCT VARIANTS -->
                    <div class="product-variants" ng-if="selectedProduct.variants && selectedProduct.variants.length">

                        <h4>Choose Size</h4>

                        <div class="variant-list">
                            <button type="button" class="variant-button"
                                ng-repeat="variant in selectedProduct.variants"
                                ng-class="{active: selectedVariant === variant}" ng-click="selectVariant(variant)">
                                <span class="variant-weight">@{{ variant.weight }}</span>
                                <span class="variant-price">₹@{{ variant.price }}</span>
                            </button>
                        </div>
                    </div>

                    <div class="product-weight" ng-if="!selectedProduct.variants || !selectedProduct.variants.length">
                        Pack Size: @{{ selectedProduct.weight }}
                    </div>

                    <div class="modal-price">
                        ₹@{{ selectedVariant ? selectedVariant.price : selectedProduct.price }}
                    </div>

                    <button class="primary-button" type="button"
                        ng-click="addToCart(selectedProduct, selectedVariant); closeProduct();">
                        Add to Bag
                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================================================
         CHECKOUT MODAL
    ========================================================== -->

    <div class="modal" ng-class="{active: checkoutOpen}" ng-click="closeCheckout()">

        <div class="checkout-box" ng-click="$event.stopPropagation()">

            <button class="modal-close" type="button" ng-click="closeCheckout()" aria-label="Close checkout">
                ×
            </button>

            <h2>Complete Your Order</h2>

            <p>Enter your delivery details to place your order.</p>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" ng-model="customer.name" placeholder="Enter your name" autocomplete="name">
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" ng-model="customer.phone" placeholder="Enter mobile number" maxlength="15"
                    autocomplete="tel">
            </div>

            <div class="form-group">
                <label>Delivery Address</label>
                <textarea ng-model="customer.address" placeholder="Enter complete delivery address" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label>Payment Method</label>
                <select ng-model="customer.payment" disabled>
                    <option value="UPI">Online Payment (UPI)</option>
                </select>
                <small style="display:block;margin-top:6px;color:#6e776f;">
                    Online payment only. Pay using a UPI app or scan the QR code.
                </small>
            </div>

            <div style="background:#f4f8f3;border-radius:13px;padding:15px;margin:18px 0;">
                <div style="display:flex;justify-content:space-between;font-size:13px;">
                    <span>Items</span>
                    <strong>@{{ getCartCount() }}</strong>
                </div>

                <div style="display:flex;justify-content:space-between;margin-top:10px;font-size:13px;">
                    <span>Subtotal</span>
                    <strong>₹@{{ getCartSubtotal() | number: 2 }}</strong>
                </div>

                <div style="display:flex;justify-content:space-between;margin-top:8px;font-size:13px;">
                    <span>Delivery Charges</span>
                    <strong>
                        <span ng-if="getDeliveryCharge() > 0">₹@{{ getDeliveryCharge() }}</span>
                        <span ng-if="getDeliveryCharge() === 0" style="color:#246b45;">FREE</span>
                    </strong>
                </div>

                <div
                    style="display:flex;justify-content:space-between;margin-top:12px;padding-top:10px;border-top:1px solid #dce7de;color:#246b45;">
                    <strong>Grand Total</strong>
                    <strong>₹@{{ getCartTotal() | number: 2 }}</strong>
                </div>
            </div>

            <button class="checkout-button" type="button" ng-click="placeOrder()" ng-disabled="placingOrder">
                <span ng-if="!placingOrder">Place Order →</span>
                <span ng-if="placingOrder">Creating Order...</span>
            </button>

        </div>
    </div>


    <!-- =========================================================
         UPI PAYMENT MODAL
    ========================================================== -->

    <div class="modal" ng-class="{active: paymentOpen}" ng-click="closePayment()">

        <div class="checkout-box" ng-click="$event.stopPropagation()">

            <button class="modal-close" type="button" ng-click="closePayment()" aria-label="Close payment">
                ×
            </button>

            <div style="text-align:center;">
                <div style="font-size:45px;margin-bottom:8px;">💳</div>
                <h2>Complete Payment</h2>
                <p>Order No: <strong>@{{ createdOrder.order_number }}</strong></p>
            </div>

            <div class="payment-amount">
                <small>Amount to Pay</small>
                <strong>₹@{{ createdOrder.amount }}</strong>
            </div>

            <a class="checkout-button" ng-href="@{{ upiUrl }}"
                style="display:block;text-align:center;text-decoration:none;">
                📱 Pay with UPI App
            </a>

            <div class="payment-upi-id">
                UPI ID: @{{ upiId }}
            </div>

            <div class="payment-divider">OR</div>

            <button class="checkout-button" type="button" ng-click="generateQr()">
                📷 Show UPI QR
            </button>

            <div class="upi-qr-wrap" ng-if="showQr">
                <h3>Scan to Pay</h3>
                <p style="font-size:12px;color:#777;margin-top:5px;">
                    Scan using Google Pay, PhonePe, Paytm or another UPI app.
                </p>

                <div id="upiQrCode" class="upi-qr"></div>

                <strong>₹@{{ createdOrder.amount }}</strong>
            </div>

            <div class="upi-note">
                <strong>After payment:</strong><br>
                Enter the UPI transaction ID / UTR number below.
                Your payment will be verified before the order is confirmed.
            </div>

            <div class="form-group">
                <label>UPI Transaction ID / UTR</label>
                <input type="text" ng-model="paymentData.utr" placeholder="Enter UTR / Transaction ID"
                    autocomplete="off">
            </div>

            <button class="checkout-button" type="button" ng-click="submitPayment()"
                ng-disabled="submittingPayment">
                <span ng-if="!submittingPayment">Submit Payment Details</span>
                <span ng-if="submittingPayment">Submitting...</span>
            </button>

        </div>
    </div>


    <!-- =========================================================
         ORDER SUCCESS MODAL
    ========================================================== -->

    <div class="modal" ng-class="{active: orderSuccess}">

        <div class="checkout-box">

            <div style="text-align:center;">
                <div style="font-size:55px;margin-bottom:10px;">✅</div>

                <h2>Order Placed Successfully</h2>

                <p>Thank you for ordering from Satvik Foods.</p>

                <div style="background:#f4f8f3;border-radius:12px;padding:15px;margin:20px 0;">
                    <small>Order Number</small>
                    <h3 style="margin:5px 0;">@{{ createdOrder.order_number }}</h3>
                </div>

                <p ng-if="createdOrder.payment_method === 'UPI'">
                    Your payment details have been submitted. We will verify the payment and confirm your order.
                </p>

                <p ng-if="createdOrder.payment_method === 'COD'">
                    Your order has been received. Please complete your online payment.
                </p>

                <button class="checkout-button" type="button" ng-click="closeSuccess()">
                    Continue Shopping
                </button>
            </div>

        </div>
    </div>


    <!-- =========================================================
         TOAST
    ========================================================== -->

    <div class="toast" ng-class="{show: toastVisible}">
        @{{ toastMessage }}
    </div>


    <!-- =========================================================
         ANGULARJS
         IMPORTANT:
         AngularJS library comes BEFORE SatvikApp definition.
    ========================================================== -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>


    <script>
        /* =========================================================
                                                                   ANGULAR MODULE
                                                                ========================================================== */

        var app = angular.module(
            'SatvikApp',
            []
        );


        /* =========================================================
           CONTROLLER
        ========================================================== */

        app.controller(
            'ShopController',
            function($scope, $interval, $http) {


                /* =================================================
                   CONFIGURATION
                ================================================= */

                $scope.whatsappNumber =
                    '919344258671';


                /* =================================================
                   UPI CONFIG FROM LARAVEL .ENV
                ================================================= */

                $scope.upiId =
                    @json(config('services.sathvik_upi.id'));

                $scope.upiName =
                    @json(config('services.sathvik_upi.name', 'Satvik Foods'));

                $scope.paymentOpen = false;

                $scope.orderSuccess = false;

                $scope.createdOrder = null;

                $scope.upiUrl = '';

                $scope.showQr = false;

                $scope.placingOrder = false;

                $scope.submittingPayment = false;

                $scope.paymentData = {
                    utr: ''
                };


                /* =================================================
                   PRODUCTS
                ================================================= */

                /* =========================================================
                   Satvik FOODS - COMPLETE PRODUCT LIST
                   35 PRODUCTS
                ========================================================= */

                $scope.products = [];

                $http.get('/api/products')
                    .then(function(response) {

                        $scope.products = response.data;

                    })
                    .catch(function(error) {

                        console.error('Failed to load products:', error);

                    });


                /* =========================================================
                   PRODUCT CATEGORIES
                ========================================================= */

                $scope.categories = [

                    'Health Drinks',

                    'Batter',

                    'Health Mixes',

                    'Podi & Premix',

                    'Thokku & Chutney',

                    'Idli Podi'

                ];




                $scope.selectedCategory =
                    'All';


                $scope.searchText =
                    '';


                /* =================================================
                   CART
                ================================================= */

                $scope.cart = [];


                $scope.cartOpen =
                    false;


                /* =================================================
                   CUSTOMER
                ================================================= */

                $scope.customer = {

                    name: '',

                    phone: '',

                    address: '',

                    payment: 'UPI'

                };


                $scope.checkoutOpen =
                    false;


                $scope.selectedProduct =
                    null;

                $scope.selectedVariant =
                    null;


                /* =================================================
                   LOAD CART
                ================================================= */

                try {

                    var savedCart =
                        localStorage.getItem(
                            'Satvik_cart'
                        );

                    if (savedCart) {

                        $scope.cart =
                            JSON.parse(savedCart);

                    }

                } catch (error) {

                    console.log(
                        'Cart loading error',
                        error
                    );

                    $scope.cart = [];

                }


                /* =================================================
                   SAVE CART
                ================================================= */

                function saveCart() {

                    try {

                        localStorage.setItem(
                            'Satvik_cart',
                            JSON.stringify(
                                $scope.cart
                            )
                        );

                    } catch (error) {

                        console.log(
                            'Cart saving error',
                            error
                        );

                    }

                }


                /* =================================================
                   CART COUNT
                ================================================= */

                $scope.getCartCount =
                    function() {

                        return $scope.cart.reduce(
                            function(total, item) {

                                return total +
                                    Number(item.quantity || 0);

                            },
                            0
                        );

                    };


                /* =================================================
                   ADD TO CART
                ================================================= */

                $scope.addToCart =
                    function(product, variant) {

                        if (!variant && product.variants && product.variants.length) {
                            variant = product.variants[0];
                        }

                        var variantWeight = variant && variant.weight ?
                            variant.weight :
                            product.weight;

                        var variantPrice = variant && variant.price !== undefined ?
                            Number(variant.price) :
                            Number(product.price);

                        var cartId = product.id + '-' + variantWeight;

                        var existing = $scope.cart.find(function(item) {
                            return item.id === cartId;
                        });

                        if (existing) {
                            existing.quantity++;
                        } else {
                            $scope.cart.push({
                                id: cartId,
                                productId: product.id,
                                name: product.name,
                                weight: variantWeight,
                                price: variantPrice,
                                image: product.image,
                                quantity: 1
                            });
                        }

                        saveCart();

                        showToast(
                            product.name + ' (' + variantWeight + ') added to your bag'
                        );

                    };


                /* =================================================
                   INCREASE
                ================================================= */

                $scope.increaseQty =
                    function(item) {

                        item.quantity++;

                        saveCart();

                    };


                /* =================================================
                   DECREASE
                ================================================= */

                $scope.decreaseQty =
                    function(item) {

                        if (
                            item.quantity > 1
                        ) {

                            item.quantity--;

                        } else {

                            $scope.removeFromCart(
                                item
                            );

                            return;

                        }

                        saveCart();

                    };


                /* =================================================
                   REMOVE
                ================================================= */

                $scope.removeFromCart =
                    function(item) {

                        var index =
                            $scope.cart.indexOf(
                                item
                            );


                        if (index !== -1) {

                            $scope.cart.splice(
                                index,
                                1
                            );

                        }


                        saveCart();

                    };


                /* =================================================
                   CART SUBTOTAL + DELIVERY + GRAND TOTAL
                ================================================= */

                $scope.getCartSubtotal = function() {
                    return $scope.cart.reduce(function(total, item) {
                        return total +
                            (Number(item.price) * Number(item.quantity));
                    }, 0);
                };

                // Delivery is free only when the item subtotal is above ₹999.
                // At ₹999 or below, delivery costs ₹69.
                $scope.getDeliveryCharge = function() {
                    return $scope.getCartSubtotal() > 999 ? 0 : 69;
                };

                $scope.getCartTotal = function() {
                    if ($scope.cart.length === 0) {
                        return 0;
                    }

                    return $scope.getCartSubtotal() + $scope.getDeliveryCharge();
                };


                /* =================================================
                   OPEN CART
                ================================================= */

                $scope.openCart =
                    function() {

                        $scope.cartOpen =
                            true;

                    };


                /* =================================================
                   CLOSE CART
                ================================================= */

                $scope.closeCart =
                    function() {

                        $scope.cartOpen =
                            false;

                    };


                /* =================================================
                   CATEGORY
                ================================================= */

                $scope.openCategory =
                    function(category) {

                        $scope.selectedCategory =
                            category;

                        setTimeout(
                            function() {

                                var element =
                                    document.getElementById(
                                        'products'
                                    );

                                if (element) {

                                    element.scrollIntoView({
                                        behavior: 'smooth'
                                    });

                                }

                            },
                            50
                        );

                    };


                /* =================================================
                   CATEGORY FILTER
                ================================================= */

                $scope.categoryFilter =
                    function(product) {

                        if (
                            $scope.selectedCategory ===
                            'All'
                        ) {

                            return true;

                        }

                        return product.category ===
                            $scope.selectedCategory;

                    };


                /* =================================================
                   SEARCH FILTER
                ================================================= */

                $scope.searchFilter =
                    function(product) {

                        if (
                            !$scope.searchText
                        ) {

                            return true;

                        }


                        var search =
                            $scope.searchText
                            .toLowerCase();


                        return (
                                product.name
                                .toLowerCase()
                                .indexOf(search) !== -1
                            )

                            ||

                            (
                                product.category
                                .toLowerCase()
                                .indexOf(search) !== -1
                            );

                    };


                /* =================================================
                   PRODUCT MODAL
                ================================================= */

                $scope.openProduct =
                    function(product) {

                        $scope.selectedProduct =
                            product;

                        if (product.variants && product.variants.length) {
                            $scope.selectedVariant = product.variants[0];
                        } else {
                            $scope.selectedVariant = null;
                        }

                    };


                $scope.selectVariant =
                    function(variant) {

                        $scope.selectedVariant = variant;

                    };


                $scope.closeProduct =
                    function(event) {

                        if (
                            event &&
                            event.target !==
                            event.currentTarget
                        ) {

                            return;

                        }

                        $scope.selectedProduct =
                            null;

                        $scope.selectedVariant =
                            null;

                    };


                /* =================================================
                   SCROLL PRODUCTS
                ================================================= */

                $scope.scrollToProducts =
                    function() {

                        var element =
                            document.getElementById(
                                'products'
                            );

                        if (element) {

                            element.scrollIntoView({
                                behavior: 'smooth'
                            });

                        }

                    };


                /* =================================================
                   CHECKOUT
                ================================================= */

                $scope.openCheckout =
                    function() {

                        if (
                            $scope.cart.length === 0
                        ) {

                            showToast(
                                'Your bag is empty'
                            );

                            return;

                        }

                        $scope.cartOpen =
                            false;

                        $scope.checkoutOpen =
                            true;

                    };


                $scope.closeCheckout =
                    function() {

                        $scope.checkoutOpen =
                            false;

                    };


                /* =================================================
                   WHATSAPP ORDER
                ================================================= */

                /* =================================================
                   CREATE ORDER + PAYMENT
                ================================================= */

                $scope.placeOrder =
                    function() {

                        if ($scope.placingOrder) {
                            return;
                        }

                        if (!$scope.customer.name) {
                            showToast('Please enter your name');
                            return;
                        }

                        if (!$scope.customer.phone) {
                            showToast('Please enter your phone number');
                            return;
                        }

                        if (!$scope.customer.address) {
                            showToast('Please enter your delivery address');
                            return;
                        }

                        if ($scope.cart.length === 0) {
                            showToast('Your bag is empty');
                            return;
                        }

                        $scope.placingOrder = true;

                        var orderData = {
                            name: $scope.customer.name,
                            phone: $scope.customer.phone,
                            address: $scope.customer.address,
                            payment: $scope.customer.payment,
                            items: $scope.cart,
                            subtotal: $scope.getCartSubtotal(),
                            delivery_charge: $scope.getDeliveryCharge(),
                            total: $scope.getCartTotal()
                        };

                        fetch(
                                '{{ route('orders.store') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify(orderData)
                                }
                            )
                            .then(function(response) {
                                if (!response.ok) {
                                    return response.json().then(function(errorData) {
                                        throw errorData;
                                    });
                                }
                                return response.json();
                            })
                            .then(function(data) {
                                $scope.$apply(function() {
                                    $scope.placingOrder = false;

                                    if (!data.success) {
                                        showToast('Unable to create order');
                                        return;
                                    }

                                    $scope.createdOrder = data;
                                    $scope.checkoutOpen = false;

                                    if (data.payment_method === 'UPI') {
                                        $scope.createUpiPayment();
                                        $scope.paymentOpen = true;
                                    } else {
                                        $scope.orderSuccess = true;

                                        // Order was successfully created: clear the cart for COD.
                                        $scope.cart = [];
                                        localStorage.removeItem('Satvik_cart');
                                    }
                                });
                            })
                            .catch(function(error) {
                                console.error('Order error:', error);

                                $scope.$apply(function() {
                                    $scope.placingOrder = false;

                                    if (error && error.errors) {
                                        var firstError = Object.keys(error.errors)[0];
                                        if (firstError && error.errors[firstError][0]) {
                                            showToast(error.errors[firstError][0]);
                                            return;
                                        }
                                    }

                                    showToast('Unable to create order. Please try again.');
                                });
                            });
                    };


                /* =================================================
                   UPI PAYMENT
                ================================================= */

                $scope.createUpiPayment =
                    function() {

                        var amount =
                            Number($scope.createdOrder.amount).toFixed(2);

                        var orderNumber =
                            $scope.createdOrder.order_number;

                        $scope.upiUrl =
                            'upi://pay' +
                            '?pa=' + encodeURIComponent($scope.upiId) +
                            '&pn=' + encodeURIComponent($scope.upiName) +
                            '&am=' + amount +
                            '&cu=INR' +
                            '&tn=' + encodeURIComponent(orderNumber);

                        $scope.showQr = false;
                    };


                $scope.generateQr =
                    function() {

                        $scope.showQr = true;

                        setTimeout(function() {

                            var container =
                                document.getElementById('upiQrCode');

                            if (!container) {
                                return;
                            }

                            container.innerHTML = '';

                            if (typeof QRCode === 'undefined') {
                                showToast('QR library could not be loaded');
                                return;
                            }

                            new QRCode(
                                container, {
                                    text: $scope.upiUrl,
                                    width: 250,
                                    height: 250,
                                    correctLevel: QRCode.CorrectLevel.H
                                }
                            );

                        }, 100);
                    };


                $scope.submitPayment =
                    function() {

                        if ($scope.submittingPayment) {
                            return;
                        }

                        if (
                            !$scope.paymentData.utr ||
                            !$scope.paymentData.utr.trim()
                        ) {
                            showToast('Please enter UTR / Transaction ID');
                            return;
                        }

                        $scope.submittingPayment = true;

                        fetch(
                                '/orders/' +
                                $scope.createdOrder.order_id +
                                '/payment', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        upi_transaction_id: $scope.paymentData.utr.trim()
                                    })
                                }
                            )
                            .then(function(response) {
                                if (!response.ok) {
                                    return response.json().then(function(errorData) {
                                        throw errorData;
                                    });
                                }
                                return response.json();
                            })
                            .then(function(data) {
                                $scope.$apply(function() {
                                    $scope.submittingPayment = false;

                                    if (!data.success) {
                                        showToast('Unable to submit payment details');
                                        return;
                                    }

                                    $scope.paymentOpen = false;
                                    $scope.orderSuccess = true;
                                    $scope.cart = [];

                                    localStorage.removeItem('Satvik_cart');

                                    $scope.paymentData.utr = '';
                                });
                            })
                            .catch(function(error) {
                                console.error('Payment submission error:', error);

                                $scope.$apply(function() {
                                    $scope.submittingPayment = false;
                                    showToast('Unable to submit payment details');
                                });
                            });
                    };


                $scope.closePayment =
                    function() {
                        $scope.paymentOpen = false;
                    };


                $scope.closeSuccess =
                    function() {
                        $scope.orderSuccess = false;
                        $scope.createdOrder = null;
                    };


                /* =================================================
                   TOAST
                ================================================= */

                $scope.toastVisible =
                    false;

                $scope.toastMessage =
                    '';


                function showToast(message) {

                    $scope.toastMessage =
                        message;

                    $scope.toastVisible =
                        true;


                    setTimeout(
                        function() {

                            $scope.$apply(
                                function() {

                                    $scope.toastVisible =
                                        false;

                                }
                            );

                        },
                        2200
                    );

                }


                /* =================================================
                   COUNTDOWN TIMER
                ================================================= */

                var totalSeconds =
                    (
                        7 * 60 * 60
                    ) +
                    (
                        42 * 60
                    ) +
                    18;


                $scope.timer = {

                    hours: '07',

                    minutes: '42',

                    seconds: '18'

                };


                function updateTimer() {

                    if (
                        totalSeconds <= 0
                    ) {

                        totalSeconds =
                            24 * 60 * 60;

                    }


                    totalSeconds--;


                    var hours =
                        Math.floor(
                            totalSeconds / 3600
                        );


                    var minutes =
                        Math.floor(
                            (
                                totalSeconds %
                                3600
                            ) / 60
                        );


                    var seconds =
                        totalSeconds % 60;


                    $scope.timer.hours =
                        String(hours)
                        .padStart(2, '0');


                    $scope.timer.minutes =
                        String(minutes)
                        .padStart(2, '0');


                    $scope.timer.seconds =
                        String(seconds)
                        .padStart(2, '0');

                }


                $interval(
                    updateTimer,
                    1000
                );


            }
        );
    </script>


</body>

</html>
