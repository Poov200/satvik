<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Add Product - Satvik Foods Admin</title>

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


        /* =========================================================
           LOGO
        ========================================================= */

        .brand {

            height: 72px;

            padding: 0 20px;

            display: flex;
            align-items: center;

            border-bottom:
                1px solid rgba(255,255,255,.07);
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
            line-height: 20px;
        }

        .brand-text span {

            display: block;

            color: #7f9387;

            font-size: 11px;

            margin-top: 2px;
        }


        /* =========================================================
           NAVIGATION
        ========================================================= */

        .side-nav {

            padding: 14px 12px 20px;

            flex: 1;

            min-height: 0;

            overflow-y: auto;
            overflow-x: hidden;

            scrollbar-width: thin;
            scrollbar-color: #355443 #0e1b14;
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
                1px solid rgba(255,255,255,.06);

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

            border: 1px solid rgba(255,255,255,.08);

            background: transparent;

            color: #aab9b0;

            padding: 9px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 12px;

            transition: .2s;
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

            border-bottom: 1px solid var(--border);

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

            max-width: 1350px;

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


        .back-btn {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 10px 15px;

            background: white;

            border: 1px solid var(--border);

            border-radius: 9px;

            color: var(--text);

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition: .2s;
        }

        .back-btn:hover {

            border-color: var(--green);

            color: var(--green);
        }


        /* =========================================================
           GRID
        ========================================================= */

        .form-grid {

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                360px;

            gap: 22px;

            align-items: start;
        }


        /* =========================================================
           CARD
        ========================================================= */

        .card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            margin-bottom: 22px;

            overflow: hidden;
        }

        .card-header {

            padding: 18px 20px;

            border-bottom: 1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .card-title {

            font-size: 15px;

            font-weight: 700;
        }

        .card-description {

            font-size: 11px;

            color: var(--muted);

            margin-top: 3px;
        }

        .card-body {

            padding: 22px;
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-row {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 17px;

            margin-bottom: 17px;
        }

        .form-group {

            margin-bottom: 17px;
        }

        .form-row .form-group {

            margin-bottom: 0;
        }

        label {

            display: block;

            font-size: 12px;

            font-weight: 650;

            margin-bottom: 7px;

            color: #34433b;
        }

        .required {

            color: var(--danger);
        }

        input,
        select,
        textarea {

            width: 100%;

            border: 1px solid #dce4df;

            background: white;

            color: var(--text);

            border-radius: 8px;

            padding: 11px 12px;

            font-family: inherit;

            font-size: 13px;

            outline: none;

            transition: .2s;
        }

        input:focus,
        select:focus,
        textarea:focus {

            border-color: var(--green);

            box-shadow:
                0 0 0 3px rgba(31,122,69,.08);
        }

        textarea {

            min-height: 120px;

            resize: vertical;
        }

        .input-hint {

            font-size: 10px;

            color: var(--muted);

            margin-top: 5px;
        }


        /* =========================================================
           IMAGE UPLOAD
        ========================================================= */

        .image-upload {

            border: 2px dashed #cddbd2;

            border-radius: 12px;

            padding: 16px;

            background: #fbfdfc;

            text-align: center;

            transition: .2s;
        }

        .image-upload.dragging {

            border-color: var(--green);

            background: var(--green-light);
        }

        .image-preview {

            width: 100%;

            height: 250px;

            border-radius: 10px;

            background: #f2f5f3;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            margin-bottom: 13px;
        }

        .image-preview img {

            width: 100%;

            height: 100%;

            object-fit: contain;

            display: none;
        }

        .upload-placeholder {

            color: #94a39a;

            font-size: 12px;
        }

        .upload-icon {

            width: 50px;

            height: 50px;

            border-radius: 50%;

            background: var(--green-light);

            color: var(--green);

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 10px;

            font-size: 23px;
        }

        .choose-image {

            display: inline-block;

            padding: 9px 15px;

            background: var(--green);

            color: white;

            border-radius: 8px;

            cursor: pointer;

            font-size: 12px;

            font-weight: 600;

            margin-top: 5px;
        }

        .choose-image:hover {

            background: var(--green-dark);
        }

        #image {

            display: none;
        }


        /* =========================================================
           VARIANTS
        ========================================================= */

        .variant-list {

            display: flex;

            flex-direction: column;

            gap: 10px;
        }

        .variant-row {

            display: grid;

            grid-template-columns:
                1fr 1fr
                40px;

            gap: 8px;

            align-items: end;
        }

        .variant-row .form-group {

            margin-bottom: 0;
        }

        .remove-variant {

            height: 39px;

            border: 1px solid #f0c9cd;

            background: #fff5f6;

            color: var(--danger);

            border-radius: 8px;

            cursor: pointer;

            font-size: 16px;
        }

        .remove-variant:hover {

            background: #ffe5e8;
        }

        .add-variant {

            margin-top: 12px;

            border: 1px dashed #a9c8b5;

            background: var(--green-light);

            color: var(--green);

            padding: 10px 14px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 12px;

            font-weight: 650;

            width: 100%;
        }

        .add-variant:hover {

            background: #dff2e6;
        }


        /* =========================================================
           BADGE
        ========================================================= */

        .badge-options {

            display: flex;

            flex-wrap: wrap;

            gap: 8px;

            margin-top: 8px;
        }

        .badge-option {

            padding: 6px 10px;

            border-radius: 20px;

            background: #f3f5f4;

            border: 1px solid var(--border);

            font-size: 10px;

            cursor: pointer;

            color: #536159;
        }

        .badge-option:hover {

            border-color: var(--green);

            color: var(--green);
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status-box {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 13px;

            border-radius: 9px;

            background: #f7faf8;

            border: 1px solid var(--border);
        }

        .status-info strong {

            display: block;

            font-size: 12px;
        }

        .status-info span {

            display: block;

            font-size: 10px;

            color: var(--muted);

            margin-top: 2px;
        }


        .switch {

            position: relative;

            width: 44px;

            height: 24px;
        }

        .switch input {

            opacity: 0;

            width: 0;

            height: 0;
        }

        .slider {

            position: absolute;

            cursor: pointer;

            inset: 0;

            background: #c8d2cc;

            border-radius: 30px;

            transition: .2s;
        }

        .slider:before {

            content: "";

            position: absolute;

            width: 18px;

            height: 18px;

            left: 3px;

            top: 3px;

            background: white;

            border-radius: 50%;

            transition: .2s;

            box-shadow: 0 1px 3px rgba(0,0,0,.15);
        }

        .switch input:checked + .slider {

            background: var(--green);
        }

        .switch input:checked + .slider:before {

            transform: translateX(20px);
        }


        /* =========================================================
           SAVE BUTTON
        ========================================================= */

        .form-actions {

            display: flex;

            justify-content: flex-end;

            gap: 10px;

            padding-top: 5px;
        }

        .btn {

            border: 0;

            border-radius: 9px;

            padding: 11px 18px;

            font-size: 12px;

            font-weight: 650;

            cursor: pointer;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            transition: .2s;
        }

        .btn-cancel {

            background: white;

            border: 1px solid var(--border);

            color: #536159;
        }

        .btn-cancel:hover {

            border-color: #b8c5bd;
        }

        .btn-primary {

            background: var(--green);

            color: white;

            min-width: 130px;
        }

        .btn-primary:hover {

            background: var(--green-dark);
        }

        .btn-primary:disabled {

            opacity: .6;

            cursor: not-allowed;
        }


        /* =========================================================
           TOAST
        ========================================================= */

        .toast {

            position: fixed;

            right: 25px;

            bottom: 25px;

            background: #173323;

            color: white;

            padding: 13px 17px;

            border-radius: 9px;

            font-size: 12px;

            box-shadow: 0 10px 30px rgba(0,0,0,.2);

            transform: translateY(100px);

            opacity: 0;

            pointer-events: none;

            transition: .3s;

            z-index: 1000;
        }

        .toast.show {

            transform: translateY(0);

            opacity: 1;
        }

        .toast.error {

            background: #9e2935;
        }


        /* =========================================================
           MOBILE
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

            .form-grid {

                grid-template-columns: 1fr;
            }

            .right-column {

                order: -1;
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

                gap: 15px;

                flex-direction: column;
            }

            .form-row {

                grid-template-columns: 1fr;
            }

            .variant-row {

                grid-template-columns:
                    1fr 1fr 40px;
            }

            .card-body {

                padding: 16px;
            }
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

            <strong>Satvik Foods</strong>

            <span>Admin Panel</span>

        </div>

    </div>


    <nav class="side-nav">

        <div class="nav-title">
            Main
        </div>

        <a href="{{ route('admin.orders') }}" class="nav-link">

            <span class="nav-icon">📊</span>

            <span>Dashboard</span>

        </a>


        <div class="nav-title">
            Store
        </div>


        <a href="{{ route('admin.orders') }}" class="nav-link">

            <span class="nav-icon">🛒</span>

            <span>Orders</span>

        </a>


        <a href="{{ url('/admin/products') }}" class="nav-link active">

            <span class="nav-icon">📦</span>

            <span>Products</span>

        </a>


        <a href="#" class="nav-link">

            <span class="nav-icon">🏷️</span>

            <span>Categories</span>

        </a>


        <div class="nav-title">
            Management
        </div>


        <a href="#" class="nav-link">

            <span class="nav-icon">👥</span>

            <span>Customers</span>

        </a>


        <a href="#" class="nav-link">

            <span class="nav-icon">📈</span>

            <span>Reports</span>

        </a>

    </nav>


    <div class="side-footer">

        <div class="admin-user">

            <div class="admin-avatar">
                A
            </div>

            <div class="admin-info">

                <strong>Administrator</strong>

                <span>
                    {{ session('admin_email') }}
                </span>

            </div>

        </div>


        <form
            method="POST"
            action="{{ route('admin.logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="logout-btn"
            >
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

            <button
                class="menu-toggle"
                id="menuToggle"
            >
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


        <!-- BREADCRUMB -->

        <div class="breadcrumb">

            <a href="{{ route('admin.orders') }}">
                Dashboard
            </a>

            <span>›</span>

            <a href="{{ url('/admin/products') }}">
                Products
            </a>

            <span>›</span>

            <span>Add Product</span>

        </div>



        <!-- HEADER -->

        <div class="page-header">

            <div>

                <h1>
                    Add New Product
                </h1>

                <p>
                    Add a new product to your Satvik Foods store.
                </p>

            </div>


            <a
                href="{{ url('/admin/products') }}"
                class="back-btn"
            >
                ← Back to Products
            </a>

        </div>



        <!-- FORM GRID -->

        <form
            id="productForm"
            enctype="multipart/form-data"
        >

            <div class="form-grid">


                <!-- =================================================
                     LEFT COLUMN
                ================================================== -->

                <div>


                    <!-- BASIC INFORMATION -->

                    <div class="card">

                        <div class="card-header">

                            <div>

                                <div class="card-title">
                                    Basic Information
                                </div>

                                <div class="card-description">
                                    Product name, category and pricing
                                </div>

                            </div>

                        </div>


                        <div class="card-body">


                            <div class="form-group">

                                <label>
                                    Product Name
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    placeholder="Example: ABC Malt"
                                    required
                                >

                            </div>


                            <div class="form-row">


                                <div class="form-group">

                                    <label>
                                        Category
                                        <span class="required">*</span>
                                    </label>

                                    <select
                                        name="category"
                                        required
                                    >

                                        <option value="">
                                            Select Category
                                        </option>

                                        <option value="Health Drinks">
                                            Health Drinks
                                        </option>

                                        <option value="Sweets">
                                            Sweets
                                        </option>

                                        <option value="Snacks">
                                            Snacks
                                        </option>

                                        <option value="Podi">
                                            Podi
                                        </option>

                                        <option value="Laddu">
                                            Laddu
                                        </option>

                                        <option value="Other">
                                            Other
                                        </option>

                                    </select>

                                </div>


                                <div class="form-group">

                                    <label>
                                        Weight
                                    </label>

                                    <input
                                        type="text"
                                        name="weight"
                                        placeholder="Example: 200g"
                                    >

                                </div>

                            </div>


                            <div class="form-row">


                                <div class="form-group">

                                    <label>
                                        Base Price
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        name="price"
                                        step="0.01"
                                        min="0"
                                        placeholder="250"
                                        required
                                    >

                                    <div class="input-hint">
                                        Enter the default product price.
                                    </div>

                                </div>


                                <div class="form-group">

                                    <label>
                                        Rating
                                    </label>

                                    <input
                                        type="number"
                                        name="rating"
                                        step="0.1"
                                        min="0"
                                        max="5"
                                        value="0"
                                        placeholder="4.8"
                                    >

                                </div>

                            </div>


                        </div>

                    </div>



                    <!-- PRODUCT DESCRIPTION -->

                    <div class="card">

                        <div class="card-header">

                            <div>

                                <div class="card-title">
                                    Product Description
                                </div>

                                <div class="card-description">
                                    Tell customers about this product
                                </div>

                            </div>

                        </div>


                        <div class="card-body">

                            <div class="form-group">

                                <label>
                                    Description
                                </label>

                                <textarea
                                    name="description"
                                    placeholder="Example: Homemade ABC Malt prepared with natural ingredients for nutritious everyday consumption."
                                ></textarea>

                            </div>

                        </div>

                    </div>



                    <!-- PRODUCT VARIANTS -->

                    <div class="card">

                        <div class="card-header">

                            <div>

                                <div class="card-title">
                                    Product Variants
                                </div>

                                <div class="card-description">
                                    Add different weights and prices
                                </div>

                            </div>

                        </div>


                        <div class="card-body">


                            <div
                                id="variantList"
                                class="variant-list"
                            >

                                <div class="variant-row">


                                    <div class="form-group">

                                        <label>
                                            Weight
                                        </label>

                                        <input
                                            type="text"
                                            class="variant-weight"
                                            placeholder="200g"
                                        >

                                    </div>


                                    <div class="form-group">

                                        <label>
                                            Price
                                        </label>

                                        <input
                                            type="number"
                                            class="variant-price"
                                            step="0.01"
                                            placeholder="250"
                                        >

                                    </div>


                                    <button
                                        type="button"
                                        class="remove-variant"
                                        onclick="removeVariant(this)"
                                        title="Remove"
                                    >
                                        ×
                                    </button>

                                </div>

                            </div>


                            <button
                                type="button"
                                class="add-variant"
                                onclick="addVariant()"
                            >
                                + Add Another Variant
                            </button>

                        </div>

                    </div>


                </div>



                <!-- =================================================
                     RIGHT COLUMN
                ================================================== -->

                <div class="right-column">


                    <!-- IMAGE -->

                    <div class="card">

                        <div class="card-header">

                            <div>

                                <div class="card-title">
                                    Product Image
                                </div>

                                <div class="card-description">
                                    Upload your product photo
                                </div>

                            </div>

                        </div>


                        <div class="card-body">


                            <div
                                class="image-upload"
                                id="imageUpload"
                            >

                                <div class="image-preview">

                                    <img
                                        id="imagePreview"
                                        alt="Product Preview"
                                    >

                                    <div
                                        class="upload-placeholder"
                                        id="uploadPlaceholder"
                                    >

                                        <div class="upload-icon">
                                            ↑
                                        </div>

                                        <div>
                                            No image selected
                                        </div>

                                    </div>

                                </div>


                                <label
                                    for="image"
                                    class="choose-image"
                                >
                                    Choose Image
                                </label>


                                <input
                                    type="file"
                                    id="image"
                                    name="image"
                                    accept="image/png,image/jpeg,image/webp"
                                    required
                                >


                                <div class="input-hint">
                                    JPG, PNG or WEBP · Maximum 5MB
                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- BADGE -->

                    <div class="card">

                        <div class="card-header">

                            <div>

                                <div class="card-title">
                                    Product Badge
                                </div>

                                <div class="card-description">
                                    Highlight important products
                                </div>

                            </div>

                        </div>


                        <div class="card-body">

                            <div class="form-group">

                                <label>
                                    Badge
                                </label>

                                <input
                                    type="text"
                                    id="badge"
                                    name="badge"
                                    placeholder="Popular"
                                >


                                <div class="badge-options">

                                    <button
                                        type="button"
                                        class="badge-option"
                                        onclick="setBadge('Popular')"
                                    >
                                        Popular
                                    </button>

                                    <button
                                        type="button"
                                        class="badge-option"
                                        onclick="setBadge('Best Seller')"
                                    >
                                        Best Seller
                                    </button>

                                    <button
                                        type="button"
                                        class="badge-option"
                                        onclick="setBadge('New')"
                                    >
                                        New
                                    </button>

                                    <button
                                        type="button"
                                        class="badge-option"
                                        onclick="setBadge('Offer')"
                                    >
                                        Offer
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- STATUS -->

                    <div class="card">

                        <div class="card-header">

                            <div>

                                <div class="card-title">
                                    Product Status
                                </div>

                                <div class="card-description">
                                    Control product visibility
                                </div>

                            </div>

                        </div>


                        <div class="card-body">

                            <div class="status-box">

                                <div class="status-info">

                                    <strong>
                                        Active Product
                                    </strong>

                                    <span>
                                        Show this product on the website
                                    </span>

                                </div>


                                <label class="switch">

                                    <input
                                        type="checkbox"
                                        id="status"
                                        checked
                                    >

                                    <span class="slider"></span>

                                </label>

                            </div>

                        </div>

                    </div>



                    <!-- ACTIONS -->

                    <div class="form-actions">

                        <a
                            href="{{ url('/admin/products') }}"
                            class="btn btn-cancel"
                        >
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="btn btn-primary"
                            id="saveBtn"
                        >
                            <span id="saveText">
                                Save Product
                            </span>
                        </button>

                    </div>


                </div>

            </div>

        </form>

    </div>

</main>



<!-- TOAST -->

<div
    class="toast"
    id="toast"
></div>



<script>


/* =========================================================
   SIDEBAR
========================================================= */

document
    .getElementById('menuToggle')
    .addEventListener('click', function () {

        document
            .getElementById('sidebar')
            .classList.toggle('open');

    });



/* =========================================================
   IMAGE PREVIEW
========================================================= */

document
    .getElementById('image')
    .addEventListener('change', function (event) {

        const file = event.target.files[0];

        const preview =
            document.getElementById('imagePreview');

        const placeholder =
            document.getElementById('uploadPlaceholder');


        if (!file) {

            preview.style.display = 'none';

            placeholder.style.display = 'block';

            return;
        }


        if (file.size > 5 * 1024 * 1024) {

            showToast(
                'Image must be less than 5MB.',
                true
            );

            event.target.value = '';

            return;
        }


        const reader = new FileReader();


        reader.onload = function (e) {

            preview.src = e.target.result;

            preview.style.display = 'block';

            placeholder.style.display = 'none';

        };


        reader.readAsDataURL(file);

    });



/* =========================================================
   DRAG & DROP IMAGE
========================================================= */

const imageUpload =
    document.getElementById('imageUpload');

const imageInput =
    document.getElementById('image');


imageUpload.addEventListener(
    'dragover',
    function (e) {

        e.preventDefault();

        imageUpload.classList.add('dragging');

    }
);


imageUpload.addEventListener(
    'dragleave',
    function () {

        imageUpload.classList.remove('dragging');

    }
);


imageUpload.addEventListener(
    'drop',
    function (e) {

        e.preventDefault();

        imageUpload.classList.remove('dragging');

        const files = e.dataTransfer.files;

        if (files.length > 0) {

            imageInput.files = files;

            imageInput.dispatchEvent(
                new Event('change')
            );

        }

    }
);



/* =========================================================
   VARIANTS
========================================================= */

function addVariant() {

    const list =
        document.getElementById('variantList');


    const row =
        document.createElement('div');

    row.className = 'variant-row';


    row.innerHTML = `

        <div class="form-group">

            <label>Weight</label>

            <input
                type="text"
                class="variant-weight"
                placeholder="500g"
            >

        </div>


        <div class="form-group">

            <label>Price</label>

            <input
                type="number"
                class="variant-price"
                step="0.01"
                placeholder="550"
            >

        </div>


        <button
            type="button"
            class="remove-variant"
            onclick="removeVariant(this)"
            title="Remove"
        >
            ×
        </button>

    `;


    list.appendChild(row);

}


function removeVariant(button) {

    const list =
        document.getElementById('variantList');

    const rows =
        list.querySelectorAll('.variant-row');


    if (rows.length <= 1) {

        showToast(
            'At least one variant is required.',
            true
        );

        return;
    }


    button
        .closest('.variant-row')
        .remove();

}



/* =========================================================
   BADGE
========================================================= */

function setBadge(value) {

    document
        .getElementById('badge')
        .value = value;

}



/* =========================================================
   TOAST
========================================================= */

function showToast(message, error = false) {

    const toast =
        document.getElementById('toast');

    toast.textContent = message;

    toast.classList.toggle(
        'error',
        error
    );

    toast.classList.add('show');


    setTimeout(function () {

        toast.classList.remove('show');

    }, 3500);

}



/* =========================================================
   SUBMIT PRODUCT
========================================================= */

document
    .getElementById('productForm')
    .addEventListener('submit', async function (e) {

        e.preventDefault();


        const form = this;

        const saveBtn =
            document.getElementById('saveBtn');

        const saveText =
            document.getElementById('saveText');


        /*
        ---------------------------------------------------------
        Collect variants
        ---------------------------------------------------------
        */

        const variants = [];


        document
            .querySelectorAll('.variant-row')
            .forEach(function (row) {

                const weight =
                    row
                    .querySelector('.variant-weight')
                    .value
                    .trim();

                const price =
                    row
                    .querySelector('.variant-price')
                    .value
                    .trim();


                if (weight && price) {

                    variants.push({

                        weight: weight,

                        price: parseFloat(price)

                    });

                }

            });


        /*
        ---------------------------------------------------------
        Form data
        ---------------------------------------------------------
        */

        const formData =
            new FormData(form);


        formData.append(
            'variants',
            JSON.stringify(variants)
        );


        /*
        ---------------------------------------------------------
        Status
        ---------------------------------------------------------
        */

        formData.append(
            'status',
            document
                .getElementById('status')
                .checked ? '1' : '0'
        );


        /*
        ---------------------------------------------------------
        Loading
        ---------------------------------------------------------
        */

        saveBtn.disabled = true;

        saveText.textContent =
            'Saving...';


        try {


            const response =
                await fetch(
                    "{{ route('admin.products.store') }}",
                    {

                        method: 'POST',

                        headers: {

                            'X-CSRF-TOKEN':
                                document
                                .querySelector(
                                    'meta[name="csrf-token"]'
                                )
                                .getAttribute('content'),

                            'Accept':
                                'application/json'

                        },

                        body: formData

                    }
                );


            const data =
                await response.json();


            if (!response.ok) {

                if (data.errors) {

                    const firstError =
                        Object.values(data.errors)[0][0];

                    throw new Error(firstError);

                }

                throw new Error(
                    data.message ||
                    'Unable to save product.'
                );

            }


            showToast(
                'Product added successfully.'
            );


            /*
            -----------------------------------------------------
            Reset form
            -----------------------------------------------------
            */

            form.reset();


            document
                .getElementById('status')
                .checked = true;


            document
                .getElementById('imagePreview')
                .style.display = 'none';


            document
                .getElementById('uploadPlaceholder')
                .style.display = 'block';


            document
                .getElementById('variantList')
                .innerHTML = `

                    <div class="variant-row">

                        <div class="form-group">

                            <label>Weight</label>

                            <input
                                type="text"
                                class="variant-weight"
                                placeholder="200g"
                            >

                        </div>


                        <div class="form-group">

                            <label>Price</label>

                            <input
                                type="number"
                                class="variant-price"
                                step="0.01"
                                placeholder="250"
                            >

                        </div>


                        <button
                            type="button"
                            class="remove-variant"
                            onclick="removeVariant(this)"
                        >
                            ×
                        </button>

                    </div>

                `;


        } catch (error) {


            console.error(error);


            showToast(
                error.message,
                true
            );


        } finally {

            saveBtn.disabled = false;

            saveText.textContent =
                'Save Product';

        }

    });

</script>

</body>
</html>