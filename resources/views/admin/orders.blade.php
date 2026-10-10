<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Satvik Foods — Admin Orders</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --side: #0e1b14;
            --side-hover: #16281e;
            --side-active: #1d3a29;
            --accent: #2fa36b;
            --accent-soft: #e6f4ec;
            --bg: #eef1ef;
            --card: #ffffff;
            --text: #15201a;
            --muted: #76837c;
            --border: #e3e8e5;
            --radius: 16px;
            --shadow:
                0 1px 2px rgba(14, 27, 20, .05),
                0 8px 28px rgba(14, 27, 20, .07);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--bg);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text);
            -webkit-font-smoothing: antialiased;
        }

        button,
        input,
        select {
            font-family: inherit;
        }

        /* =========================================================
   SIDEBAR
========================================================= */

:root {
    --side: #0b1b13;
    --side-hover: #14291f;
    --side-active: #183c29;
    --accent: #38b978;
    --text-light: #dce8e1;
    --text-muted: #8da197;
}

.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;

    width: 250px;
    height: 100vh;

    background: var(--side);
    color: var(--text-light);

    display: flex;
    flex-direction: column;

    z-index: 1000;

    overflow-y: auto;
    overflow-x: hidden;

    border-right: 1px solid rgba(255,255,255,.06);
}

/* =========================================================
   BRAND
========================================================= */

.brand {
    padding: 22px 20px;

    display: flex;
    align-items: center;

    gap: 12px;

    border-bottom: 1px solid rgba(255,255,255,.06);
}

.brand-icon {
    width: 42px;
    height: 42px;

    border-radius: 12px;

    background: linear-gradient(
        135deg,
        #2fa36b,
        #174b31
    );

    display: grid;
    place-items: center;

    color: #fff;

    font-size: 20px;
    font-weight: 800;

    flex-shrink: 0;
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.brand-text strong {
    color: #fff;

    font-size: 16px;
    font-weight: 800;

    line-height: 1.2;
}

.brand-text span {
    margin-top: 4px;

    color: #7f9489;

    font-size: 10px;
    font-weight: 600;

    text-transform: uppercase;
    letter-spacing: 1px;
}

/* =========================================================
   NAVIGATION
========================================================= */

.side-nav {
    padding: 16px 12px 20px;

    flex: 1;

    overflow-y: auto;
}

.nav-title {
    padding: 14px 12px 8px;

    color: #5f7669;

    font-size: 10px;
    font-weight: 700;

    text-transform: uppercase;
    letter-spacing: 1.2px;
}

.nav-link {
    display: flex;
    align-items: center;

    gap: 12px;

    padding: 11px 14px;

    margin-bottom: 3px;

    border-radius: 10px;

    color: #aebfb5;

    text-decoration: none;

    font-size: 13.5px;
    font-weight: 600;

    transition: all .2s ease;
}

.nav-icon {
    width: 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;

    flex-shrink: 0;
}

.nav-link:hover {
    background: var(--side-hover);

    color: #fff;

    text-decoration: none;
}

.nav-link.active {
    background: var(--side-active);

    color: var(--accent);

    box-shadow: inset 3px 0 0 var(--accent);
}

.nav-link.active .nav-icon {
    color: var(--accent);
}

/* =========================================================
   FOOTER / ADMIN
========================================================= */

.side-footer {
    padding: 16px;

    border-top: 1px solid rgba(255,255,255,.06);

    background: var(--side);

    flex-shrink: 0;
}

.admin-user {
    display: flex;
    align-items: center;

    gap: 10px;

    margin-bottom: 14px;
}

.admin-avatar {
    width: 38px;
    height: 38px;

    border-radius: 50%;

    background: #183c29;

    color: #5dd396;

    display: grid;
    place-items: center;

    font-size: 15px;
    font-weight: 800;

    flex-shrink: 0;
}

.admin-info {
    min-width: 0;

    display: flex;
    flex-direction: column;
}

.admin-info strong {
    color: #fff;

    font-size: 13px;
    font-weight: 700;
}

.admin-info span {
    margin-top: 3px;

    color: #8da197;

    font-size: 11px;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* =========================================================
   LOGOUT
========================================================= */

.logout-btn {
    width: 100%;

    padding: 11px 14px;

    border-radius: 10px;

    border: 1px solid rgba(255,255,255,.12);

    background: rgba(255,255,255,.06);

    color: #e7efea;

    font-family: inherit;

    font-size: 13px;
    font-weight: 700;

    cursor: pointer;

    transition: all .2s ease;
}

.logout-btn:hover {
    background: #b91c1c;

    border-color: #b91c1c;

    color: #fff;
}

/* =========================================================
   MAIN CONTENT
========================================================= */

.main {
    margin-left: 250px;

    min-height: 100vh;
}

/* =========================================================
   MOBILE
========================================================= */

.menu-toggle {
    display: none;
}

@media (max-width: 1024px) {

    .sidebar {
        transform: translateX(-100%);

        transition: transform .3s ease;
    }

    .sidebar.open {
        transform: translateX(0);
    }

    .main {
        margin-left: 0;
    }

    .menu-toggle {
        display: block;
    }
}
        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            margin-left: 240px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 16px 28px;
            display: flex;
            align-items: center;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: var(--text);
        }

        .topbar h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -.4px;
        }

        .breadcrumb {
            font-size: 12.5px;
            color: var(--muted);
            font-weight: 500;
            margin-top: 2px;
        }

        .content {
            padding: 26px 28px 60px;
            max-width: 1500px;
            width: 100%;
        }

        /* =========================================================
           STATS
        ========================================================= */

        .stats {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(210px, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: var(--card);
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: 3px 3px 0 0;
        }

        .stat-card.c1::after {
            background: #2fa36b;
        }

        .stat-card.c2::after {
            background: #f59e0b;
        }

        .stat-card.c3::after {
            background: #8b5cf6;
        }

        .stat-card.c4::after {
            background: #3b82f6;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: grid;
            place-items: center;
            font-size: 18px;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.5px;
            margin-top: 12px;
            line-height: 1;
        }

        .stat-label {
            font-size: 12.5px;
            color: var(--muted);
            font-weight: 600;
            margin-top: 5px;
        }

        /* =========================================================
           TOAST
        ========================================================= */

        .toast {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #0e1b14;
            color: #fff;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 22px;
            box-shadow: 0 12px 40px rgba(14, 27, 20, .3);
            border-left: 4px solid #2fa36b;
            animation: pop .45s cubic-bezier(.2, .9, .3, 1.3);
            font-weight: 600;
            font-size: 14px;
        }

        @keyframes pop {

            from {
                opacity: 0;
                transform: translateY(-12px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }

        }

        /* =========================================================
           TABLE CARD
        ========================================================= */

        .table-card {
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .table-head {
            padding: 18px 22px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
        }

        .table-head h3 {
            margin: 0;
            font-size: 15.5px;
            font-weight: 800;
            letter-spacing: -.2px;
        }

        .table-head .sub {
            font-size: 12px;
            color: var(--muted);
            font-weight: 500;
            margin-top: 3px;
        }

        .toolbar {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 10px 14px 10px 36px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-family: inherit;
            font-size: 13px;
            width: 230px;
            outline: none;
            transition: all .2s;
        }

        .search-box input:focus {
            border-color: var(--accent);
            box-shadow:
                0 0 0 4px rgba(47, 163, 107, .12);
        }

        .search-box::before {
            content: '⌕';
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%) scale(1.4);
            color: var(--muted);
            pointer-events: none;
        }

        .filter-select {
            padding: 10px 34px 10px 13px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-family: inherit;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text);
            appearance: none;
            cursor: pointer;
            outline: none;

            background:
                #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%2376837c' stroke-width='1.5' fill='none'/%3E%3C/svg%3E") no-repeat right 12px center;

            transition: border-color .2s;
        }

        .filter-select:focus {
            border-color: var(--accent);
        }

        .btn-clear {
            font-size: 12.5px;
            font-weight: 700;
            text-decoration: none;
            color: var(--muted);
            padding: 10px 14px;
            border-radius: 10px;
            border: 1.5px dashed var(--border);
            transition: all .2s;
        }

        .btn-clear:hover {
            color: #b91c1c;
            border-color: #b91c1c;
        }

        .table-scroll {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1150px;
        }

        thead th {
            background: #f7faf8;
            color: var(--muted);
            padding: 12px 18px;
            text-align: left;
            font-size: 10.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid var(--border);
        }

        tbody td {
            padding: 17px 18px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
            font-size: 13.5px;
        }

        tbody tr {
            transition: background .15s;
        }

        tbody tr:hover {
            background: #f4f9f6;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* =========================================================
           CELLS
        ========================================================= */

        .order-number {
            font-weight: 800;
            color: var(--accent);
            font-size: 13.5px;
            letter-spacing: -.2px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .order-number .copy {
            font-size: 11px;
            color: var(--muted);
            background: none;
            border: none;
            cursor: pointer;
            padding: 2px;
        }

        .order-number .copy:hover {
            color: var(--accent);
        }

        .order-id {
            color: var(--muted);
            font-size: 11.5px;
            margin-top: 3px;
            font-weight: 600;
        }

        .customer-name {
            font-weight: 700;
            font-size: 14px;
        }

        .phone-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 5px;
            color: var(--muted);
            text-decoration: none;
            font-size: 12.5px;
            font-weight: 600;
        }

        .phone-link:hover {
            color: var(--accent);
        }

        .address {
            max-width: 190px;
            color: var(--muted);
            line-height: 1.55;
            font-size: 12.5px;
        }

        .product-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 11px;
            background: #f6f9f7;
            border-radius: 9px;
            margin-bottom: 6px;
            font-size: 12.5px;
            border: 1px solid var(--border);
            width: fit-content;
            max-width: 100%;
        }

        .product-item:last-child {
            margin-bottom: 0;
        }

        .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--accent);
            flex-shrink: 0;
        }

        .product-qty {
            color: var(--muted);
            font-weight: 600;
        }

        .total-amount {
            font-weight: 800;
            font-size: 15px;
            color: var(--text);
            white-space: nowrap;
        }

        /* =========================================================
           BADGES
        ========================================================= */

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 11px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .3px;
            white-space: nowrap;
            text-transform: uppercase;
        }

        .badge::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: currentColor;
        }

        .badge.pending {
            color: #b45309;
            background: #fef3c7;
        }

        .badge.paid {
            color: #15803d;
            background: #dcfce7;
        }

        .badge.failed {
            color: #b91c1c;
            background: #fee2e2;
        }

        .badge.confirmed {
            color: #1d4ed8;
            background: #dbeafe;
        }

        .badge.processing {
            color: #6d28d9;
            background: #ede9fe;
        }

        .badge.shipped {
            color: #0e7490;
            background: #cffafe;
        }

        .badge.delivered {
            color: #15803d;
            background: #dcfce7;
        }

        .badge.cancelled {
            color: #b91c1c;
            background: #fee2e2;
        }

        .badge.default {
            color: #475569;
            background: #e2e8f0;
        }

        .payment-method {
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 7px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .utr {
            margin-top: 7px;
            color: var(--muted);
            font-size: 11px;
            background: #f6f9f7;
            padding: 5px 9px;
            border-radius: 7px;
            display: inline-block;
            border: 1px dashed var(--border);
            font-weight: 600;
        }

        .utr strong {
            color: var(--text);
            font-family: monospace;
        }

        .date-main {
            font-weight: 700;
            font-size: 12.5px;
        }

        .date-time {
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
            font-weight: 500;
        }

        /* =========================================================
           BUTTONS
        ========================================================= */

        .status-select {
            padding: 8px 28px 8px 12px;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            appearance: none;
            color: var(--text);
            outline: none;

            background:
                #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='9' height='5'%3E%3Cpath d='M1 1l3.5 3L8 1' stroke='%2376837c' stroke-width='1.5' fill='none'/%3E%3C/svg%3E") no-repeat right 10px center;

            transition: border-color .2s;
        }

        .status-select:focus {
            border-color: var(--accent);
        }

        .status-select:disabled {
            opacity: .6;
            cursor: wait;
        }

        .btn {
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            border: none;
            border-radius: 9px;
            padding: 9px 15px;
            cursor: pointer;
            transition: all .2s;
            white-space: nowrap;
            letter-spacing: .2px;
        }

        .btn-paid {
            background: #dcfce7;
            color: #15803d;
            margin-top: 9px;
        }

        .btn-paid:hover {
            background: #15803d;
            color: #fff;
            box-shadow:
                0 4px 14px rgba(21, 128, 61, .35);
        }

        .btn-paid:disabled {
            opacity: .6;
            cursor: wait;
        }

        /* =========================================================
           LOADING
        ========================================================= */

        .loading-row {
            display: none;
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, .75);
            z-index: 20;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(2px);
        }

        .table-card.loading {
            position: relative;
        }

        .table-card.loading .loading-row {
            display: flex;
        }

        .spinner {
            width: 35px;
            height: 35px;
            border: 3px solid #dbe7df;
            border-top-color: var(--accent);
            border-radius: 50%;
            animation: spin .7s linear infinite;
        }

        @keyframes spin {

            to {
                transform: rotate(360deg);
            }

        }

        /* =========================================================
           EMPTY
        ========================================================= */

        .empty-state {
            text-align: center;
            padding: 70px 20px;
        }

        .empty-icon {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .empty-state h3 {
            margin: 0 0 6px;
            font-weight: 800;
        }

        .empty-state p {
            color: var(--muted);
            margin: 0;
            font-size: 13.5px;
        }

        /* =========================================================
           PAGINATION
        ========================================================= */

        .pagination {
            padding: 18px;
            display: flex;
            justify-content: center;
        }

        .pagination nav,
        .pagination ul {
            display: inline-flex;
            gap: 6px;
            list-style: none;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
            justify-content: center;
        }

        .pagination a,
        .pagination span {
            display: inline-grid;
            place-items: center;
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border-radius: 9px;
            font-size: 12.5px;
            font-weight: 700;
            text-decoration: none;
            color: var(--muted);
            border: 1.5px solid var(--border);
            background: #fff;
            transition: all .2s;
        }

        .pagination a:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .pagination .active span,
        .pagination span[aria-current="page"] {
            background: var(--side);
            color: #fff;
            border-color: var(--side);
        }

        .pagination .disabled span {
            opacity: .35;
        }

        /* =========================================================
           OVERLAY
        ========================================================= */

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(14, 27, 20, .5);
            z-index: 190;
        }

        .overlay.show {
            display: block;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1024px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

        }

        @media (max-width: 640px) {

            .content {
                padding: 18px 14px 50px;
            }

            .topbar {
                padding: 14px;
            }

            .search-box {
                width: 100%;
            }

            .search-box input {
                width: 100%;
            }

            .toolbar {
                width: 100%;
            }

            .filter-select {
                flex: 1;
            }

            .table-head {
                flex-direction: column;
                align-items: stretch;
            }

        }
    </style>

</head>


<body>


    <!-- =========================================================
     MOBILE OVERLAY
========================================================= -->

    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>


    <!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="sidebar" id="sidebar">

    <div class="brand">

        <div class="brand-icon">
            S
        </div>

        <div class="brand-text">
            <strong>
                Satvik Foods
            </strong>

            <span>
                Admin Panel
            </span>
        </div>

    </div>

    <nav class="side-nav">

        <div class="nav-title">
            Main
        </div>

        <a href="{{ route('admin.orders') }}" class="nav-link">
            <span class="nav-icon">
                📊
            </span>

            <span>
                Dashboard
            </span>
        </a>

        <div class="nav-title">
            Store
        </div>

        <!-- ORDERS ACTIVE -->
        <a href="{{ route('admin.orders') }}" class="nav-link active">

            <span class="nav-icon">
                🛒
            </span>

            <span>
                Orders
            </span>

        </a>

        <!-- PRODUCTS -->
        <a href="{{ route('admin.products') }}" class="nav-link">

            <span class="nav-icon">
                📦
            </span>

            <span>
                Products
            </span>

        </a>

        <a href="#" class="nav-link">

            <span class="nav-icon">
                🏷️
            </span>

            <span>
                Categories
            </span>

        </a>

        <div class="nav-title">
            Management
        </div>

        <a href="#" class="nav-link">

            <span class="nav-icon">
                👥
            </span>

            <span>
                Customers
            </span>

        </a>

        <a href="#" class="nav-link">

            <span class="nav-icon">
                📈
            </span>

            <span>
                Reports
            </span>

        </a>

    </nav>

    <div class="side-footer">

        <div class="admin-user">

            <div class="admin-avatar">
                A
            </div>

            <div class="admin-info">

                <strong>
                    Administrator
                </strong>

                <span>
                    {{ session('admin_email') }}
                </span>

            </div>

        </div>

        <form method="POST" action="{{ route('admin.logout') }}">

            @csrf

            <button type="submit" class="logout-btn">
                ↪ &nbsp; Logout
            </button>

        </form>

    </div>

</aside>


    <!-- =========================================================
     MAIN
========================================================= -->

    <div class="main">


        <!-- TOPBAR -->

        <div class="topbar">

            <button class="menu-toggle" onclick="toggleSidebar()" type="button">
                ☰
            </button>

            <div>

                <h2>
                    Orders
                </h2>

                <div class="breadcrumb">
                    Home / Orders / All
                </div>

            </div>

        </div>


        <!-- CONTENT -->

        <div class="content">


            <!-- =====================================================
             STATS
        ====================================================== -->

            <div class="stats" id="statsContainer">

                <div class="stat-card c1">

                    <div class="stat-top">

                        <div class="stat-icon" style="background:#e6f4ec;color:#2fa36b">
                            📦
                        </div>

                    </div>

                    <div class="stat-value" id="statTotal">
                        {{ $stats['total'] ?? $orders->total() }}
                    </div>

                    <div class="stat-label">
                        Total Orders
                    </div>

                </div>


                <div class="stat-card c2">

                    <div class="stat-top">

                        <div class="stat-icon" style="background:#fef3c7;color:#b45309">
                            ⏳
                        </div>

                    </div>

                    <div class="stat-value" id="statPending">
                        {{ $stats['pending'] ?? 0 }}
                    </div>

                    <div class="stat-label">
                        Pending Orders
                    </div>

                </div>


                <div class="stat-card c3">

                    <div class="stat-top">

                        <div class="stat-icon" style="background:#ede9fe;color:#6d28d9">
                            ⚙️
                        </div>

                    </div>

                    <div class="stat-value" id="statProcessing">
                        {{ $stats['processing'] ?? 0 }}
                    </div>

                    <div class="stat-label">
                        Processing Orders
                    </div>

                </div>


                <div class="stat-card c4">

                    <div class="stat-top">

                        <div class="stat-icon" style="background:#fee2e2;color:#b91c1c">
                            ⚠️
                        </div>

                    </div>

                    <div class="stat-value" id="statPaymentPending">
                        {{ ($stats['payment_pending'] ?? 0) + ($stats['payment_failed'] ?? 0) }}
                    </div>

                    <div class="stat-label">
                        Payments to Verify
                    </div>

                </div>


                <div class="stat-card c1">

                    <div class="stat-top">

                        <div class="stat-icon" style="background:#dcfce7;color:#15803d">
                            ✅
                        </div>

                    </div>

                    <div class="stat-value" id="statRevenue">
                        ₹{{ number_format($stats['revenue'] ?? 0, 0) }}
                    </div>

                    <div class="stat-label">
                        Collected Revenue
                    </div>

                </div>

            </div>


            <!-- =====================================================
             TOAST FROM LARAVEL
        ====================================================== -->

            @if (session('success'))
                <div class="toast" id="toast">
                    ✅ {{ session('success') }}
                </div>
            @endif


            <!-- =====================================================
             TABLE CARD
        ====================================================== -->

            <div class="table-card" id="ordersTableCard">


                <!-- AJAX LOADING -->

                <div class="loading-row">

                    <div class="spinner"></div>

                </div>


                <!-- TABLE HEADER -->

                <div class="table-head">


                    <div>

                        <h3>
                            Order List
                        </h3>

                        <div class="sub" id="orderSummary">
                            Showing
                            {{ $orders->count() }}
                            of
                            {{ $orders->total() }}
                            orders
                        </div>

                    </div>


                    <!-- FILTERS -->

                    <form method="GET" class="toolbar" id="filterForm" onsubmit="return false;">


                        <!-- SEARCH -->

                        <div class="search-box">

                            <input type="text" name="search" id="searchInput"
                                placeholder="Search order / name / phone…" value="{{ request('search') }}"
                                autocomplete="off">

                        </div>


                        <!-- STATUS -->

                        <select name="status" id="statusFilter" class="filter-select">

                            <option value="">
                                All Statuses
                            </option>

                            @foreach (['Pending', 'Confirmed', 'Processing', 'Shipped', 'Delivered', 'Cancelled'] as $s)
                                <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>
                                    {{ $s }}
                                </option>
                            @endforeach

                        </select>


                        <!-- PAYMENT -->

                        <select name="payment" id="paymentFilter" class="filter-select">

                            <option value="">
                                All Payments
                            </option>

                            <option value="Paid" {{ request('payment') === 'Paid' ? 'selected' : '' }}>
                                ✅ Paid
                            </option>

                            <option value="Pending" {{ request('payment') === 'Pending' ? 'selected' : '' }}>
                                ⏳ Pending
                            </option>

                            <option value="Failed" {{ request('payment') === 'Failed' ? 'selected' : '' }}>
                                ⚠️ Failed
                            </option>

                            <option value="UPI" {{ request('payment') === 'UPI' ? 'selected' : '' }}>
                                💳 UPI
                            </option>

                            <option value="COD" {{ request('payment') === 'COD' ? 'selected' : '' }}>
                                🚚 COD
                            </option>

                        </select>


                        <!-- CLEAR -->

                        <a href="{{ route('admin.orders') }}" class="btn-clear" id="clearFilters">
                            ✕ Clear
                        </a>

                    </form>

                </div>


                <!-- =================================================
                 TABLE
            ================================================== -->

                <div class="table-scroll">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Order
                                </th>

                                <th>
                                    Customer
                                </th>

                                <th>
                                    Address
                                </th>

                                <th>
                                    Products
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Payment
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Date
                                </th>

                            </tr>

                        </thead>


                        <tbody id="ordersBody">


                            @forelse($orders as $order)

                                <tr id="order-row-{{ $order->id }}" data-order-id="{{ $order->id }}">


                                    <!-- ORDER -->

                                    <td>

                                        <div class="order-number">

                                            {{ $order->order_number }}

                                            <button type="button" class="copy" title="Copy"
                                                onclick="copyText('{{ $order->order_number }}')">
                                                ⧉
                                            </button>

                                        </div>

                                        <div class="order-id">
                                            #{{ $order->id }}
                                        </div>

                                    </td>


                                    <!-- CUSTOMER -->

                                    <td>

                                        <div class="customer-name">
                                            {{ $order->customer_name }}
                                        </div>

                                        <a href="tel:{{ $order->phone }}" class="phone-link">
                                            📞 {{ $order->phone }}
                                        </a>

                                    </td>


                                    <!-- ADDRESS -->

                                    <td>

                                        <div class="address">
                                            {{ $order->address }}
                                        </div>

                                    </td>


                                    <!-- PRODUCTS -->

                                    <td>

                                        @php

                                            $orderItems = is_array($order->items)
                                                ? $order->items
                                                : json_decode($order->items, true);

                                            $orderItems = is_array($orderItems) ? $orderItems : [];

                                        @endphp


                                        @forelse($orderItems as $item)
                                            <div class="product-item">

                                                <span class="dot"></span>

                                                <span>

                                                    <strong>
                                                        {{ $item['name'] ?? 'Product' }}
                                                    </strong>

                                                    @if (isset($item['weight']))
                                                        · {{ $item['weight'] }}
                                                    @endif

                                                    <span class="product-qty">
                                                        × {{ $item['quantity'] ?? 1 }}
                                                    </span>

                                                </span>

                                            </div>

                                        @empty

                                            <span style="color:#9ca3af;">
                                                No items
                                            </span>
                                        @endforelse

                                    </td>


                                    <!-- TOTAL -->

                                    <td>

                                        <div class="total-amount">

                                            ₹{{ number_format($order->total_amount, 2) }}

                                        </div>

                                    </td>


                                    <!-- PAYMENT -->

                                    <td>

                                        <div class="payment-method">

                                            @if ($order->payment_method === 'UPI')
                                                💳
                                            @else
                                                🚚
                                            @endif

                                            {{ $order->payment_method }}

                                        </div>


                                        <span class="badge {{ strtolower($order->payment_status) }}"
                                            id="payment-badge-{{ $order->id }}">
                                            {{ $order->payment_status }}
                                        </span>


                                        @if ($order->upi_transaction_id)
                                            <div class="utr">

                                                UTR

                                                <strong>
                                                    {{ $order->upi_transaction_id }}
                                                </strong>

                                            </div>
                                        @endif


                                        @if ($order->payment_method === 'UPI' && $order->payment_status !== 'Paid' && $order->upi_transaction_id)
                                            <button type="button" class="btn btn-paid"
                                                id="paid-button-{{ $order->id }}"
                                                data-order-id="{{ $order->id }}" onclick="markOrderPaid(this)">

                                                @if ($order->payment_status === 'Failed')
                                                    ✓ Verify & Mark Paid
                                                @else
                                                    ✓ Mark Paid
                                                @endif

                                            </button>
                                        @endif

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        <select name="order_status" class="status-select"
                                            data-order-id="{{ $order->id }}"
                                            data-old-status="{{ $order->order_status }}"
                                            onchange="updateOrderStatus(this)"
                                            id="status-select-{{ $order->id }}">

                                            @foreach (['Pending', 'Confirmed', 'Processing', 'Shipped', 'Delivered', 'Cancelled'] as $status)
                                                <option value="{{ $status }}"
                                                    {{ $order->order_status === $status ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach

                                        </select>


                                        <div style="margin-top:9px" id="status-badge-{{ $order->id }}">

                                            <span class="badge {{ strtolower($order->order_status) }}">
                                                {{ $order->order_status }}
                                            </span>

                                        </div>

                                    </td>


                                    <!-- DATE -->

                                    <td>

                                        <div class="date-main">

                                            {{ $order->created_at->format('d M Y') }}

                                        </div>

                                        <div class="date-time">

                                            {{ $order->created_at->format('h:i A') }}

                                        </div>

                                    </td>


                                </tr>


                            @empty

                                <tr>

                                    <td colspan="8">

                                        <div class="empty-state">

                                            <div class="empty-icon">
                                                🗂️
                                            </div>

                                            <h3>
                                                No orders found
                                            </h3>

                                            <p>
                                                Try different search or filter settings.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse


                        </tbody>

                    </table>

                </div>


                <!-- =================================================
                 PAGINATION
            ================================================== -->

                <div class="pagination" id="paginationContainer">

                    {{ $orders->withQueryString()->links() }}

                </div>


            </div>

        </div>

    </div>


    <script>
        /* =============================================================
       GLOBAL
    ============================================================= */

        const csrfToken =
            document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content');

        let filterTimer = null;


        /* =============================================================
           SIDEBAR
        ============================================================= */

        function toggleSidebar() {

            const sidebar =
                document.getElementById('sidebar');

            const overlay =
                document.getElementById('overlay');

            sidebar.classList.toggle('open');

            overlay.classList.toggle('show');
        }


        /* =============================================================
           COPY ORDER NUMBER
        ============================================================= */

        function copyText(text) {

            if (
                navigator.clipboard &&
                window.isSecureContext
            ) {

                navigator.clipboard
                    .writeText(text)
                    .then(() => {
                        showToast('Copied: ' + text);
                    });

                return;
            }

            const textarea =
                document.createElement('textarea');

            textarea.value = text;

            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';

            document.body.appendChild(textarea);

            textarea.select();

            document.execCommand('copy');

            textarea.remove();

            showToast('Copied: ' + text);
        }


        /* =============================================================
           TOAST
        ============================================================= */

        function showToast(
            message,
            success = true
        ) {

            const old =
                document.getElementById('ajaxToast');

            if (old) {
                old.remove();
            }

            const toast =
                document.createElement('div');

            toast.id = 'ajaxToast';

            toast.innerHTML =
                (success ? '✅ ' : '❌ ') +
                message;

            toast.style.cssText = `
        position:fixed;
        top:25px;
        right:25px;
        background:${success ? '#0e1b14' : '#991b1b'};
        color:#fff;
        padding:14px 20px;
        border-radius:10px;
        font-size:13px;
        font-weight:700;
        z-index:99999;
        box-shadow:0 10px 30px rgba(0,0,0,.25);
        transition:.3s;
    `;

            document.body.appendChild(toast);

            setTimeout(() => {

                toast.style.opacity = '0';

                setTimeout(() => {

                    if (toast.parentNode) {
                        toast.remove();
                    }

                }, 300);

            }, 2500);
        }


        /* =============================================================
           UPDATE ORDER STATUS
           NO PAGE RELOAD
        ============================================================= */

        async function updateOrderStatus(select) {

            const orderId =
                select.dataset.orderId;

            const newStatus =
                select.value;

            const oldStatus =
                select.dataset.oldStatus ||
                newStatus;


            select.disabled = true;


            try {

                const response =
                    await fetch(
                        `/admin/orders/${orderId}/status`, {
                            method: 'POST',

                            headers: {
                                'Content-Type': 'application/json',

                                'Accept': 'application/json',

                                'X-CSRF-TOKEN': csrfToken,

                                'X-Requested-With': 'XMLHttpRequest'
                            },

                            body: JSON.stringify({
                                order_status: newStatus
                            })
                        }
                    );


                const data =
                    await response.json();


                if (
                    !response.ok ||
                    !data.success
                ) {

                    throw new Error(
                        data.message ||
                        'Unable to update order status.'
                    );

                }


                /*
                Update stored old status
                */

                select.dataset.oldStatus =
                    newStatus;


                /*
                Update badge
                */

                const badgeContainer =
                    document.getElementById(
                        `status-badge-${orderId}`
                    );


                if (badgeContainer) {

                    badgeContainer.innerHTML = `
                <span class="badge ${newStatus.toLowerCase()}">
                    ${newStatus}
                </span>
            `;

                }


                /*
                Update row
                */

                const row =
                    document.getElementById(
                        `order-row-${orderId}`
                    );


                if (row) {

                    row.style.background =
                        '#eaf7ef';

                    setTimeout(() => {

                        row.style.background = '';

                    }, 900);

                }


                showToast(
                    `Order ${orderId} updated to ${newStatus}`
                );


                /*
                Refresh statistics silently
                */

                refreshStats();


            } catch (error) {

                console.error(error);


                /*
                Restore previous status
                */

                select.value =
                    oldStatus;


                showToast(
                    error.message ||
                    'Status update failed.',
                    false
                );

            } finally {

                select.disabled = false;

            }

        }


        /* =============================================================
           MARK PAYMENT PAID
           NO PAGE RELOAD
        ============================================================= */

        async function markOrderPaid(button) {

            const orderId =
                button.dataset.orderId;


            if (
                !confirm(
                    'Verify the UTR and mark this payment as PAID?'
                )
            ) {
                return;
            }


            const originalText =
                button.innerHTML;


            button.disabled = true;

            button.innerHTML =
                'Updating...';


            try {

                const response =
                    await fetch(
                        `/admin/orders/${orderId}/paid`, {
                            method: 'POST',

                            headers: {
                                'Content-Type': 'application/json',

                                'Accept': 'application/json',

                                'X-CSRF-TOKEN': csrfToken,

                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        }
                    );


                const data =
                    await response.json();


                if (
                    !response.ok ||
                    !data.success
                ) {

                    throw new Error(
                        data.message ||
                        'Payment update failed.'
                    );

                }


                /*
                Update payment badge
                */

                const badge =
                    document.getElementById(
                        `payment-badge-${orderId}`
                    );


                if (badge) {

                    badge.className =
                        'badge paid';

                    badge.innerHTML =
                        'Paid';

                }


                /*
                Remove button
                */

                button.remove();


                /*
                Highlight row
                */

                const row =
                    document.getElementById(
                        `order-row-${orderId}`
                    );


                if (row) {

                    row.style.background =
                        '#eaf7ef';

                    setTimeout(() => {

                        row.style.background = '';

                    }, 900);

                }


                showToast(
                    'Payment marked as PAID successfully.'
                );


                /*
                Refresh statistics
                */

                refreshStats();


            } catch (error) {

                console.error(error);


                button.disabled = false;

                button.innerHTML =
                    originalText;


                showToast(
                    error.message ||
                    'Payment update failed.',
                    false
                );

            }

        }


        /* =============================================================
           FILTER CHANGE
        ============================================================= */

        document
            .getElementById('statusFilter')
            .addEventListener(
                'change',
                function() {

                    loadFilteredOrders();

                }
            );


        document
            .getElementById('paymentFilter')
            .addEventListener(
                'change',
                function() {

                    loadFilteredOrders();

                }
            );


        /* =============================================================
           SEARCH
        ============================================================= */

        document
            .getElementById('searchInput')
            .addEventListener(
                'input',
                function() {

                    clearTimeout(filterTimer);


                    filterTimer =
                        setTimeout(
                            function() {

                                loadFilteredOrders();

                            },
                            500
                        );

                }
            );


        /* =============================================================
           APPLY FILTERS WITHOUT PAGE RELOAD
        ============================================================= */

        async function loadFilteredOrders(
            pageUrl = null
        ) {

            const form =
                document.getElementById(
                    'filterForm'
                );


            let url;


            if (pageUrl) {

                url = pageUrl;

            } else {

                const params =
                    new URLSearchParams(
                        new FormData(form)
                    );


                /*
                Remove empty values
                */

                for (
                    const [
                        key,
                        value
                    ] of params.entries()
                ) {

                    if (!value) {

                        params.delete(key);

                    }

                }


                /*
                Always return to page 1
                */

                params.delete('page');


                url =
                    `${window.location.pathname}?${params.toString()}`;

            }


            setLoading(true);


            try {

                const response =
                    await fetch(
                        url, {
                            method: 'GET',

                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',

                                'Accept': 'text/html'
                            }
                        }
                    );


                if (!response.ok) {

                    throw new Error(
                        'Unable to load filtered orders.'
                    );

                }


                const html =
                    await response.text();


                const parser =
                    new DOMParser();


                const doc =
                    parser.parseFromString(
                        html,
                        'text/html'
                    );


                /*
                Replace table card
                */

                const newTable =
                    doc.getElementById(
                        'ordersTableCard'
                    );


                const currentTable =
                    document.getElementById(
                        'ordersTableCard'
                    );


                if (
                    newTable &&
                    currentTable
                ) {

                    currentTable.replaceWith(
                        newTable
                    );

                }


                /*
                Replace stats
                */

                const newStats =
                    doc.getElementById(
                        'statsContainer'
                    );


                const currentStats =
                    document.getElementById(
                        'statsContainer'
                    );


                if (
                    newStats &&
                    currentStats
                ) {

                    currentStats.replaceWith(
                        newStats
                    );

                }


                /*
                Update browser URL
                */

                window.history.replaceState({},
                    '',
                    url
                );


                /*
                Rebind everything
                */

                bindDynamicEvents();


            } catch (error) {

                console.error(error);


                showToast(
                    error.message ||
                    'Filter failed.',
                    false
                );

            } finally {

                setLoading(false);

            }

        }


        /* =============================================================
           PAGINATION WITHOUT PAGE RELOAD
        ============================================================= */

        document.addEventListener(
            'click',
            function(event) {

                const link =
                    event.target.closest(
                        '#paginationContainer a'
                    );


                if (!link) {
                    return;
                }


                event.preventDefault();


                const url =
                    link.href;


                loadFilteredOrders(url);

            }
        );


        /* =============================================================
           CLEAR FILTERS WITHOUT PAGE RELOAD
        ============================================================= */

        document.addEventListener(
            'click',
            function(event) {

                const clear =
                    event.target.closest(
                        '#clearFilters'
                    );


                if (!clear) {
                    return;
                }


                event.preventDefault();


                /*
                Clear fields
                */

                const search =
                    document.getElementById(
                        'searchInput'
                    );

                const status =
                    document.getElementById(
                        'statusFilter'
                    );

                const payment =
                    document.getElementById(
                        'paymentFilter'
                    );


                if (search) {
                    search.value = '';
                }

                if (status) {
                    status.value = '';
                }

                if (payment) {
                    payment.value = '';
                }


                loadFilteredOrders(
                    clear.href
                );

            }
        );


        /* =============================================================
           LOADING STATE
        ============================================================= */

        function setLoading(
            loading
        ) {

            const card =
                document.getElementById(
                    'ordersTableCard'
                );


            if (!card) {
                return;
            }


            if (loading) {

                card.classList.add(
                    'loading'
                );

            } else {

                card.classList.remove(
                    'loading'
                );

            }

        }


        /* =============================================================
           REFRESH STATISTICS
        ============================================================= */

        async function refreshStats() {

            try {

                const response =
                    await fetch(
                        window.location.href, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        }
                    );


                if (!response.ok) {
                    return;
                }


                const html =
                    await response.text();


                const parser =
                    new DOMParser();


                const doc =
                    parser.parseFromString(
                        html,
                        'text/html'
                    );


                const newStats =
                    doc.getElementById(
                        'statsContainer'
                    );


                const currentStats =
                    document.getElementById(
                        'statsContainer'
                    );


                if (
                    newStats &&
                    currentStats
                ) {

                    currentStats.replaceWith(
                        newStats
                    );

                }


                /*
                Update sidebar count
                */

                const newCount =
                    doc.getElementById(
                        'sidebarOrderCount'
                    );


                const currentCount =
                    document.getElementById(
                        'sidebarOrderCount'
                    );


                if (
                    newCount &&
                    currentCount
                ) {

                    currentCount.textContent =
                        newCount.textContent;

                }

            } catch (error) {

                console.error(
                    'Stats refresh failed:',
                    error
                );

            }

        }


        /* =============================================================
           REBIND DYNAMIC EVENTS
        ============================================================= */

        function bindDynamicEvents() {

            /*
            Search
            */

            const search =
                document.getElementById(
                    'searchInput'
                );


            if (search) {

                search.oninput =
                    function() {

                        clearTimeout(
                            filterTimer
                        );


                        filterTimer =
                            setTimeout(
                                function() {

                                    loadFilteredOrders();

                                },
                                500
                            );

                    };

            }


            /*
            Status
            */

            const status =
                document.getElementById(
                    'statusFilter'
                );


            if (status) {

                status.onchange =
                    function() {

                        loadFilteredOrders();

                    };

            }


            /*
            Payment
            */

            const payment =
                document.getElementById(
                    'paymentFilter'
                );


            if (payment) {

                payment.onchange =
                    function() {

                        loadFilteredOrders();

                    };

            }

        }


        /* =============================================================
           TOAST AUTO CLOSE
        ============================================================= */

        const oldToast =
            document.getElementById(
                'toast'
            );


        if (oldToast) {

            setTimeout(
                function() {

                    oldToast.style.opacity =
                        '0';

                    oldToast.style.transform =
                        'translateY(-10px)';

                    oldToast.style.transition =
                        '.4s';


                    setTimeout(
                        function() {

                            if (oldToast.parentNode) {
                                oldToast.remove();
                            }

                        },
                        400
                    );

                },
                3500
            );

        }


        /* =============================================================
           INITIAL
        ============================================================= */

        bindDynamicEvents();
    </script>


</body>

</html>
