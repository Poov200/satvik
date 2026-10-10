<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Products - Satvik Foods Admin</title>


    <style>
        /* =========================================================
           ROOT
        ========================================================= */

        :root {

            --green: #1f7a45;
            --green-dark: #155b32;
            --green-light: #eaf7ef;

            --side: #10251a;
            --side-hover: #1c3a29;

            --bg: #f5f7f6;
            --white: #ffffff;

            --text: #17211b;
            --muted: #718078;

            --border: #e2e8e4;

            --danger: #dc3545;

            --shadow:
                0 4px 20px rgba(16, 37, 26, 0.06);
        }


        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: var(--bg);

            color: var(--text);

            min-height: 100vh;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;

            width: 240px;
            height: 100vh;

            background: var(--side);

            color: #c9d4cd;

            display: flex;
            flex-direction: column;

            z-index: 200;

            overflow: hidden;

            transition: transform .3s ease;
        }


        .brand {

            height: 72px;

            padding: 0 20px;

            display: flex;
            align-items: center;

            border-bottom:
                1px solid rgba(255, 255, 255, .07);
        }


        .brand-icon {

            width: 40px;
            height: 40px;

            border-radius: 12px;

            background: var(--green);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
            font-weight: 800;

            color: white;

            margin-right: 12px;
        }


        .brand-text strong {

            display: block;

            color: white;

            font-size: 17px;
        }


        .brand-text span {

            display: block;

            color: #7f9387;

            font-size: 11px;

            margin-top: 2px;
        }


        /* =========================================================
           SIDE NAV
        ========================================================= */

        .side-nav {

            padding: 14px 12px 20px;

            flex: 1;

            min-height: 0;

            overflow-y: auto;

            overflow-x: hidden;

            scrollbar-width: thin;

            scrollbar-color:
                #355443 #0e1b14;
        }


        .side-nav::-webkit-scrollbar {
            width: 5px;
        }


        .side-nav::-webkit-scrollbar-track {
            background: #0e1b14;
        }


        .side-nav::-webkit-scrollbar-thumb {

            background: #355443;

            border-radius: 10px;
        }


        .nav-title {

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1px;

            color: #60776a;

            padding: 12px 12px 7px;

            text-transform: uppercase;
        }


        .nav-link {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 12px;

            margin-bottom: 4px;

            border-radius: 9px;

            color: #b7c5bd;

            text-decoration: none;

            font-size: 13px;

            transition: .2s;
        }


        .nav-link:hover {

            background: var(--side-hover);

            color: white;
        }


        .nav-link.active {

            background: var(--green);

            color: white;

            font-weight: 600;
        }


        .nav-icon {

            width: 22px;

            text-align: center;

            font-size: 16px;
        }


        /* =========================================================
           SIDEBAR FOOTER
        ========================================================= */

        .side-footer {

            padding: 16px;

            flex-shrink: 0;

            border-top:
                1px solid rgba(255, 255, 255, .06);

            background: var(--side);
        }


        .admin-user {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 12px;
        }


        .admin-avatar {

            width: 36px;
            height: 36px;

            border-radius: 50%;

            background: #dcefe3;

            color: var(--green);

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 700;
        }


        .admin-info {

            min-width: 0;
        }


        .admin-info strong {

            display: block;

            color: white;

            font-size: 12px;
        }


        .admin-info span {

            display: block;

            color: #708178;

            font-size: 10px;

            overflow: hidden;

            white-space: nowrap;

            text-overflow: ellipsis;
        }


        .logout-btn {

            width: 100%;

            border:
                1px solid rgba(255, 255, 255, .08);

            background: transparent;

            color: #aab9b0;

            padding: 9px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 12px;
        }


        .logout-btn:hover {

            background: #30191b;

            color: #ff9b9b;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .main {

            margin-left: 240px;

            min-height: 100vh;
        }


        /* =========================================================
           TOP BAR
        ========================================================= */

        .topbar {

            height: 72px;

            background: white;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .top-left {

            display: flex;

            align-items: center;

            gap: 15px;
        }


        .top-title {

            font-size: 20px;

            font-weight: 700;
        }


        .top-subtitle {

            font-size: 12px;

            color: var(--muted);

            margin-top: 3px;
        }


        .menu-toggle {

            display: none;

            border: 0;

            background: var(--green-light);

            color: var(--green);

            width: 38px;

            height: 38px;

            border-radius: 8px;

            font-size: 20px;

            cursor: pointer;
        }


        /* =========================================================
           PAGE
        ========================================================= */

        .page {

            padding: 30px;

            max-width: 1450px;

            margin: auto;
        }


        /* =========================================================
           BREADCRUMB
        ========================================================= */

        .breadcrumb {

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 12px;

            color: var(--muted);

            margin-bottom: 20px;
        }


        .breadcrumb a {

            color: var(--green);

            text-decoration: none;

            font-weight: 600;
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .page-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;

            gap: 20px;
        }


        .page-header h1 {

            font-size: 25px;

            font-weight: 750;

            margin-bottom: 5px;
        }


        .page-header p {

            color: var(--muted);

            font-size: 13px;
        }


        .add-product-btn {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 11px 17px;

            background: var(--green);

            color: white;

            border-radius: 9px;

            text-decoration: none;

            font-size: 12px;

            font-weight: 650;

            white-space: nowrap;

            transition: .2s;
        }


        .add-product-btn:hover {

            background: var(--green-dark);

            transform: translateY(-1px);
        }


        /* =========================================================
           STAT CARDS
        ========================================================= */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 15px;

            margin-bottom: 22px;
        }


        .stat-card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 12px;

            padding: 17px;

            box-shadow: var(--shadow);
        }


        .stat-top {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 10px;
        }


        .stat-label {

            font-size: 11px;

            color: var(--muted);
        }


        .stat-icon {

            width: 32px;

            height: 32px;

            border-radius: 8px;

            background: var(--green-light);

            color: var(--green);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 15px;
        }


        .stat-value {

            font-size: 22px;

            font-weight: 750;
        }


        /* =========================================================
           PRODUCTS CARD
        ========================================================= */

        .products-card {

            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            overflow: hidden;
        }


        .products-toolbar {

            padding: 17px 20px;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;
        }


        .search-box {

            position: relative;

            width: 300px;
        }


        .search-box input {

            width: 100%;

            padding:
                10px 12px 10px 37px;

            border:
                1px solid var(--border);

            border-radius: 8px;

            outline: none;

            font-size: 12px;
        }


        .search-box input:focus {

            border-color:
                var(--green);

            box-shadow:
                0 0 0 3px rgba(31, 122, 69, .08);
        }


        .search-icon {

            position: absolute;

            left: 12px;

            top: 50%;

            transform:
                translateY(-50%);

            color: #89978f;

            font-size: 14px;
        }


        .category-filter {

            padding: 10px 12px;

            border:
                1px solid var(--border);

            border-radius: 8px;

            font-size: 12px;

            outline: none;

            background: white;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .table-wrapper {

            width: 100%;

            overflow-x: auto;
        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 900px;
        }


        thead {

            background: #f8faf9;
        }


        th {

            padding:
                12px 18px;

            text-align: left;

            font-size: 10px;

            color: #728077;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .4px;

            white-space: nowrap;
        }


        td {

            padding:
                13px 18px;

            border-top:
                1px solid #edf1ee;

            font-size: 12px;

            vertical-align: middle;
        }


        tbody tr:hover {

            background: #fbfdfc;
        }


        /* =========================================================
           PRODUCT CELL
        ========================================================= */

        .product-info {

            display: flex;

            align-items: center;

            gap: 12px;

            min-width: 220px;
        }


        .product-image {

            width: 50px;

            height: 50px;

            border-radius: 9px;

            background: #f1f5f2;

            border:
                1px solid #e6ece8;

            object-fit: cover;

            flex-shrink: 0;
        }


        .no-image {

            width: 50px;

            height: 50px;

            border-radius: 9px;

            background: var(--green-light);

            color: var(--green);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;

            flex-shrink: 0;
        }


        .product-name {

            font-weight: 650;

            color: var(--text);

            margin-bottom: 3px;
        }


        .product-id {

            color: #8a9790;

            font-size: 10px;
        }


        /* =========================================================
           CATEGORY
        ========================================================= */

        .category-badge {

            display: inline-block;

            background: #f0f5f2;

            color: #4e6558;

            padding: 5px 8px;

            border-radius: 6px;

            font-size: 10px;

            font-weight: 600;
        }


        /* =========================================================
           PRICE
        ========================================================= */

        .price {

            font-weight: 700;

            color: var(--text);

            white-space: nowrap;
        }


        /* =========================================================
           RATING
        ========================================================= */

        .rating {

            color: #c88918;

            font-weight: 600;

            white-space: nowrap;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding: 5px 8px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 650;
        }


        .status.active {

            background: #e8f7ee;

            color: #1b7a43;
        }


        .status.inactive {

            background: #f4f4f4;

            color: #777;
        }


        .status-dot {

            width: 5px;

            height: 5px;

            border-radius: 50%;

            background: currentColor;
        }


        /* =========================================================
           ACTIONS
        ========================================================= */

        .actions {

            display: flex;

            gap: 6px;
        }


        .action-btn {

            width: 32px;

            height: 32px;

            border-radius: 7px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 1px solid var(--border);

            background: white;

            cursor: pointer;

            text-decoration: none;

            font-size: 13px;

            transition: .2s;
        }


        .action-btn.edit {

            color: var(--green);
        }


        .action-btn.edit:hover {

            background: var(--green-light);

            border-color: #b9d9c5;
        }


        .action-btn.delete {

            color: var(--danger);
        }


        .action-btn.delete:hover {

            background: #fff1f2;

            border-color: #f2c5ca;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty {

            text-align: center;

            padding: 70px 20px;
        }


        .empty-icon {

            width: 60px;

            height: 60px;

            background: var(--green-light);

            color: var(--green);

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 15px;

            font-size: 25px;
        }


        .empty h3 {

            font-size: 16px;

            margin-bottom: 5px;
        }


        .empty p {

            color: var(--muted);

            font-size: 12px;

            margin-bottom: 18px;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1100px) {

            .stats {

                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 1024px) {

            .sidebar {

                transform:
                    translateX(-100%);
            }


            .sidebar.open {

                transform:
                    translateX(0);
            }


            .main {

                margin-left: 0;
            }


            .menu-toggle {

                display: block;
            }

        }


        @media (max-width: 700px) {

            .topbar {

                padding: 0 16px;
            }


            .page {

                padding: 20px 14px;
            }


            .page-header {

                align-items: flex-start;

                flex-direction: column;
            }


            .add-product-btn {

                width: 100%;
            }


            .stats {

                grid-template-columns: 1fr;
            }


            .products-toolbar {

                align-items: stretch;

                flex-direction: column;
            }


            .search-box {

                width: 100%;
            }

        }

        .product-status-toggle {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            cursor: pointer;

            user-select: none;
        }


        .toggle-track {

            width: 38px;

            height: 21px;

            border-radius: 30px;

            background: #c8d2cc;

            padding: 2px;

            transition: .2s;
        }


        .toggle-circle {

            width: 17px;

            height: 17px;

            background: white;

            border-radius: 50%;

            box-shadow:
                0 1px 3px rgba(0, 0, 0, .15);

            transition: .2s;
        }


        .product-status-toggle.is-active .toggle-track {

            background: #1f7a45;
        }


        .product-status-toggle.is-active .toggle-circle {

            transform:
                translateX(17px);
        }


        .toggle-label {

            font-size: 10px;

            font-weight: 650;

            color: #77847d;
        }


        .product-status-toggle.is-active .toggle-label {

            color: #1f7a45;
        }
    </style>

</head>


<body>


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


            <a href="{{ route('admin.orders') }}" class="nav-link">

                <span class="nav-icon">
                    🛒
                </span>

                <span>
                    Orders
                </span>

            </a>


            <a href="{{ route('admin.products') }}" class="nav-link active">

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

    <main class="main">


        <!-- TOPBAR -->

        <header class="topbar">


            <div class="top-left">


                <button class="menu-toggle" id="menuToggle">
                    ☰
                </button>


                <div>

                    <div class="top-title">
                        Products
                    </div>

                    <div class="top-subtitle">
                        Manage your Satvik Foods products
                    </div>

                </div>


            </div>


        </header>



        <!-- PAGE -->

        <div class="page">


            <!-- =====================================================
             BREADCRUMB
        ====================================================== -->

            <div class="breadcrumb">

                <a href="{{ route('admin.orders') }}">
                    Dashboard
                </a>

                <span>
                    ›
                </span>

                <strong>
                    Products
                </strong>

            </div>



            <!-- =====================================================
             PAGE HEADER
        ====================================================== -->

            <div class="page-header">


                <div>

                    <h1>
                        Products
                    </h1>

                    <p>
                        Manage products available on your Satvik Foods store.
                    </p>

                </div>


                <a href="{{ route('admin.products.create') }}" class="add-product-btn">

                    <span>
                        +
                    </span>

                    Add Product

                </a>


            </div>



            <!-- =====================================================
             STATISTICS
        ====================================================== -->

            <div class="stats">


                <div class="stat-card">

                    <div class="stat-top">

                        <span class="stat-label">
                            Total Products
                        </span>

                        <div class="stat-icon">
                            📦
                        </div>

                    </div>

                    <div class="stat-value">
                        {{ $products->count() }}
                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-top">

                        <span class="stat-label">
                            Active Products
                        </span>

                        <div class="stat-icon">
                            ✓
                        </div>

                    </div>

                    <div class="stat-value">

                        {{ $products->where('status', true)->count() }}

                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-top">

                        <span class="stat-label">
                            Categories
                        </span>

                        <div class="stat-icon">
                            🏷️
                        </div>

                    </div>

                    <div class="stat-value">

                        {{ $products->pluck('category')->unique()->count() }}

                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-top">

                        <span class="stat-label">
                            Inactive Products
                        </span>

                        <div class="stat-icon">
                            ◯
                        </div>

                    </div>

                    <div class="stat-value">

                        {{ $products->where('status', false)->count() }}

                    </div>

                </div>


            </div>



            <!-- =====================================================
             PRODUCTS CARD
        ====================================================== -->

            <div class="products-card">


                <!-- TOOLBAR -->

                <div class="products-toolbar">


                    <div class="search-box">

                        <span class="search-icon">
                            🔍
                        </span>

                        <input type="text" id="searchInput" placeholder="Search products...">

                    </div>


                    <select id="categoryFilter" class="category-filter">

                        <option value="">
                            All Categories
                        </option>

                        @foreach ($products->pluck('category')->unique()->sort() as $category)
                            <option value="{{ strtolower($category) }}">
                                {{ $category }}
                            </option>
                        @endforeach

                    </select>


                </div>



                <!-- TABLE -->

                <div class="table-wrapper">


                    @if ($products->count())


                        <table id="productsTable">


                            <thead>

                                <tr>

                                    <th>
                                        Product
                                    </th>

                                    <th>
                                        Category
                                    </th>

                                    <th>
                                        Weight
                                    </th>

                                    <th>
                                        Price
                                    </th>

                                    <th>
                                        Rating
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Actions
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @foreach ($products as $product)
                                    <tr class="product-row" data-category="{{ strtolower($product->category) }}">


                                        <!-- PRODUCT -->

                                        <td>


                                            <div class="product-info">


                                                @if ($product->image)
                                                    <img src="{{ asset($product->image) }}" class="product-image"
                                                        alt="{{ $product->name }}">
                                                @else
                                                    <div class="no-image">
                                                        📦
                                                    </div>
                                                @endif


                                                <div>

                                                    <div class="product-name">

                                                        {{ $product->name }}

                                                    </div>

                                                    <div class="product-id">

                                                        #{{ $product->id }}

                                                    </div>

                                                </div>


                                            </div>


                                        </td>



                                        <!-- CATEGORY -->

                                        <td>

                                            <span class="category-badge">

                                                {{ $product->category }}

                                            </span>

                                        </td>



                                        <!-- WEIGHT -->

                                        <td>

                                            {{ $product->weight ?: '—' }}

                                        </td>



                                        <!-- PRICE -->

                                        <td>

                                            <span class="price">

                                                ₹{{ number_format((float) $product->price, 2) }}

                                            </span>

                                        </td>



                                        <!-- RATING -->

                                        <td>

                                            <span class="rating">

                                                ★ {{ number_format((float) $product->rating, 1) }}

                                            </span>

                                        </td>



                                        <!-- STATUS -->

                                        <td>

                                            <div class="product-status-toggle
        {{ $product->status ? 'is-active' : '' }}"
                                                onclick="toggleProductStatus({{ $product->id }}, this)">

                                                <div class="toggle-track">

                                                    <div class="toggle-circle"></div>

                                                </div>


                                                <span class="toggle-label">

                                                    {{ $product->status ? 'Active' : 'Inactive' }}

                                                </span>

                                            </div>

                                        </td>


                                        <!-- ACTIONS -->

                                        <td>


                                            <div class="actions">


                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="action-btn edit" title="Edit Product">
                                                    ✎
                                                </a>


                                                <form method="POST"
                                                    action="{{ route('admin.products.delete', $product->id) }}"
                                                    onsubmit="return confirm('Delete {{ $product->name }}?');"
                                                    style="display:inline;">

                                                    @csrf

                                                    @method('DELETE')


                                                    <button type="submit" class="action-btn delete"
                                                        title="Delete Product">
                                                        🗑
                                                    </button>

                                                </form>


                                            </div>


                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>


                        </table>
                    @else
                        <div class="empty">


                            <div class="empty-icon">
                                📦
                            </div>


                            <h3>
                                No Products Yet
                            </h3>


                            <p>
                                Start by adding your first Satvik Foods product.
                            </p>


                            <a href="{{ route('admin.products.create') }}" class="add-product-btn">
                                + Add Your First Product
                            </a>


                        </div>


                    @endif


                </div>


            </div>


        </div>


    </main>



    <script>
        /* =========================================================
               MOBILE SIDEBAR
            ========================================================= */

        document
            .getElementById('menuToggle')
            .addEventListener('click', function() {

                document
                    .getElementById('sidebar')
                    .classList.toggle('open');

            });



        /* =========================================================
           PRODUCT SEARCH
        ========================================================= */

        const searchInput =
            document.getElementById('searchInput');

        const categoryFilter =
            document.getElementById('categoryFilter');

        const rows =
            document.querySelectorAll('.product-row');


        function filterProducts() {


            const search =
                searchInput.value
                .toLowerCase()
                .trim();


            const category =
                categoryFilter.value
                .toLowerCase();


            rows.forEach(function(row) {


                const text =
                    row.innerText.toLowerCase();


                const rowCategory =
                    row.dataset.category;


                const matchesSearch =
                    text.includes(search);


                const matchesCategory = !category ||
                    rowCategory === category;


                if (
                    matchesSearch &&
                    matchesCategory
                ) {

                    row.style.display = '';

                } else {

                    row.style.display = 'none';

                }

            });

        }


        searchInput.addEventListener(
            'input',
            filterProducts
        );


        categoryFilter.addEventListener(
            'change',
            filterProducts
        );


        function toggleProductStatus(productId, element) {
            const token =
                document
                .querySelector(
                    'meta[name="csrf-token"]'
                )
                .getAttribute('content');


            fetch(
                    `/admin/products/${productId}/toggle-status`, {
                        method: 'POST',

                        headers: {

                            'X-CSRF-TOKEN': token,

                            'Accept': 'application/json',

                            'Content-Type': 'application/json'

                        }
                    }
                )
                .then(async response => {

                    const data =
                        await response.json();

                    if (!response.ok) {

                        throw new Error(
                            data.message ||
                            'Unable to update status.'
                        );
                    }

                    return data;

                })
                .then(data => {

                    /*
                    ---------------------------------------------------------
                    Update UI
                    ---------------------------------------------------------
                    */

                    if (data.status) {

                        element.classList.add(
                            'is-active'
                        );

                        element
                            .querySelector('.toggle-label')
                            .textContent = 'Active';

                    } else {

                        element.classList.remove(
                            'is-active'
                        );

                        element
                            .querySelector('.toggle-label')
                            .textContent = 'Inactive';

                    }

                })
                .catch(error => {

                    console.error(error);

                    alert(
                        'Unable to update product status.'
                    );

                });
        }
    </script>


</body>

</html>
