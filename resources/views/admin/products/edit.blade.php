<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit Product - Satvik Foods</title>


    <style>
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
        }


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
        }


        /* SIDEBAR */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;

            width: 240px;

            height: 100vh;

            background: var(--side);

            display: flex;

            flex-direction: column;

            z-index: 200;

            overflow: hidden;
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

            color: white;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 800;

            margin-right: 12px;
        }


        .brand-text strong {

            color: white;

            display: block;

            font-size: 17px;
        }


        .brand-text span {

            color: #7f9387;

            display: block;

            font-size: 11px;
        }


        .side-nav {

            flex: 1;

            min-height: 0;

            overflow-y: auto;

            padding: 14px 12px 20px;
        }


        .nav-title {

            font-size: 10px;

            color: #60776a;

            font-weight: 700;

            letter-spacing: 1px;

            padding: 12px;
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
        }


        .nav-link:hover {

            background: var(--side-hover);

            color: white;
        }


        .nav-link.active {

            background: var(--green);

            color: white;
        }


        .nav-icon {

            width: 22px;

            text-align: center;
        }


        .side-footer {

            padding: 16px;

            flex-shrink: 0;

            border-top:
                1px solid rgba(255, 255, 255, .06);
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


        .admin-info strong {

            display: block;

            color: white;

            font-size: 12px;
        }


        .admin-info span {

            display: block;

            color: #708178;

            font-size: 10px;

            max-width: 150px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        .logout-btn {

            width: 100%;

            padding: 9px;

            background: transparent;

            border: 1px solid rgba(255, 255, 255, .08);

            border-radius: 8px;

            color: #aab9b0;

            cursor: pointer;
        }


        /* MAIN */

        .main {

            margin-left: 240px;

            min-height: 100vh;
        }


        .topbar {

            height: 72px;

            background: white;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;

            padding: 0 30px;
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


        .page {

            max-width: 1350px;

            margin: auto;

            padding: 30px;
        }


        /* BREADCRUMB */

        .breadcrumb {

            display: flex;

            gap: 8px;

            align-items: center;

            font-size: 12px;

            color: var(--muted);

            margin-bottom: 20px;
        }


        .breadcrumb a {

            color: var(--green);

            text-decoration: none;

            font-weight: 600;
        }


        /* HEADER */

        .page-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }


        .page-header h1 {

            font-size: 25px;

            margin-bottom: 5px;
        }


        .page-header p {

            font-size: 13px;

            color: var(--muted);
        }


        .back-btn {

            padding: 10px 15px;

            background: white;

            border: 1px solid var(--border);

            border-radius: 8px;

            color: var(--text);

            text-decoration: none;

            font-size: 12px;
        }


        /* GRID */

        .form-grid {

            display: grid;

            grid-template-columns:
                minmax(0, 1fr) 360px;

            gap: 22px;
        }


        /* CARD */

        .card {

            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            margin-bottom: 22px;

            overflow: hidden;

            box-shadow:
                0 4px 20px rgba(16, 37, 26, .06);
        }


        .card-header {

            padding: 18px 20px;

            border-bottom:
                1px solid var(--border);
        }


        .card-title {

            font-size: 15px;

            font-weight: 700;
        }


        .card-description {

            color: var(--muted);

            font-size: 11px;

            margin-top: 3px;
        }


        .card-body {

            padding: 22px;
        }


        /* FORM */

        .form-row {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 17px;

            margin-bottom: 17px;
        }


        .form-group {

            margin-bottom: 17px;
        }


        label {

            display: block;

            font-size: 12px;

            font-weight: 650;

            margin-bottom: 7px;
        }


        input,
        select,
        textarea {

            width: 100%;

            padding: 11px 12px;

            border:
                1px solid #dce4df;

            border-radius: 8px;

            font-family: inherit;

            font-size: 13px;

            outline: none;
        }


        input:focus,
        select:focus,
        textarea:focus {

            border-color: var(--green);

            box-shadow:
                0 0 0 3px rgba(31, 122, 69, .08);
        }


        textarea {

            min-height: 120px;

            resize: vertical;
        }


        /* IMAGE */

        .current-image {

            width: 100%;

            height: 240px;

            background: #f3f6f4;

            border-radius: 10px;

            overflow: hidden;

            margin-bottom: 12px;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .current-image img {

            width: 100%;

            height: 100%;

            object-fit: contain;
        }


        .file-input {

            border: 1px dashed #b8cfc0;

            padding: 12px;

            border-radius: 8px;

            background: #fbfdfc;
        }


        /* VARIANTS */

        .variant-row {

            display: grid;

            grid-template-columns:
                1fr 1fr 40px;

            gap: 8px;

            align-items: end;

            margin-bottom: 10px;
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


        .add-variant {

            width: 100%;

            padding: 10px;

            margin-top: 8px;

            border: 1px dashed #a9c8b5;

            background: var(--green-light);

            color: var(--green);

            border-radius: 8px;

            cursor: pointer;

            font-weight: 650;
        }


        /* STATUS */

        .status-box {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 14px;

            border: 1px solid var(--border);

            border-radius: 9px;

            background: #f7faf8;
        }


        .status-title {

            font-size: 12px;

            font-weight: 700;
        }


        .status-description {

            font-size: 10px;

            color: var(--muted);

            margin-top: 3px;
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

            inset: 0;

            background: #c8d2cc;

            border-radius: 30px;

            cursor: pointer;

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
        }


        .switch input:checked+.slider {

            background: var(--green);
        }


        .switch input:checked+.slider:before {

            transform:
                translateX(20px);
        }


        /* ACTIONS */

        .actions {

            display: flex;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 5px;
        }


        .btn {

            padding: 11px 18px;

            border-radius: 8px;

            font-size: 12px;

            font-weight: 650;

            cursor: pointer;

            text-decoration: none;

            border: 0;
        }


        .btn-cancel {

            background: white;

            border: 1px solid var(--border);

            color: #536159;
        }


        .btn-save {

            background: var(--green);

            color: white;
        }


        .btn-save:hover {

            background: var(--green-dark);
        }


        @media(max-width:1024px) {

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

            .form-grid {

                grid-template-columns: 1fr;
            }
        }


        @media(max-width:700px) {

            .page {

                padding: 20px 14px;
            }

            .page-header {

                flex-direction: column;

                align-items: flex-start;
            }

            .form-row {

                grid-template-columns: 1fr;
            }

        }
    </style>

</head>


<body>


    <!-- SIDEBAR -->

    <aside class="sidebar">


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
                <span class="nav-icon">📊</span>
                Dashboard
            </a>


            <div class="nav-title">
                Store
            </div>


            <a href="{{ route('admin.orders') }}" class="nav-link">
                <span class="nav-icon">🛒</span>
                Orders
            </a>


            <a href="{{ route('admin.products') }}" class="nav-link active">
                <span class="nav-icon">📦</span>
                Products
            </a>


            <div class="nav-title">
                Management
            </div>


            <a href="#" class="nav-link">
                <span class="nav-icon">👥</span>
                Customers
            </a>


            <a href="#" class="nav-link">
                <span class="nav-icon">📈</span>
                Reports
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

                <button class="logout-btn">
                    ↪ Logout
                </button>

            </form>


        </div>

    </aside>



    <!-- MAIN -->

    <main class="main">


        <header class="topbar">

            <div>

                <div class="top-title">
                    Products
                </div>

                <div class="top-subtitle">
                    Manage Satvik Foods products
                </div>

            </div>

        </header>



        <div class="page">


            <!-- BREADCRUMB -->

            <div class="breadcrumb">

                <a href="{{ route('admin.orders') }}">
                    Dashboard
                </a>

                <span>›</span>

                <a href="{{ route('admin.products') }}">
                    Products
                </a>

                <span>›</span>

                <strong>
                    Edit Product
                </strong>

            </div>



            <!-- HEADER -->

            <div class="page-header">

                <div>

                    <h1>
                        Edit Product
                    </h1>

                    <p>
                        Update product information and availability.
                    </p>

                </div>


                <a href="{{ route('admin.products') }}" class="back-btn">
                    ← Back to Products
                </a>

            </div>



            <!-- FORM -->

            <form method="POST" action="{{ route('admin.products.update', $product->id) }}"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="form-grid">


                    <!-- LEFT -->

                    <div>


                        <!-- BASIC -->

                        <div class="card">

                            <div class="card-header">

                                <div class="card-title">
                                    Basic Information
                                </div>

                                <div class="card-description">
                                    Update product details
                                </div>

                            </div>


                            <div class="card-body">


                                <div class="form-group">

                                    <label>
                                        Product Name *
                                    </label>

                                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                        required>

                                </div>


                                <div class="form-row">


                                    <div class="form-group">

                                        <label>
                                            Category *
                                        </label>

                                        <select name="category" required>

                                            @foreach (['Health Drinks', 'Batter', 'Health Mixes', 'Podi & Premix', 'Thokku & Chutney', 'Idli Podi', 'Sweets', 'Snacks', 'Laddu', 'Other'] as $category)
                                                <option value="{{ $category }}" @selected(old('category', $product->category) === $category)>
                                                    {{ $category }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>


                                    <div class="form-group">

                                        <label>
                                            Weight
                                        </label>

                                        <input type="text" name="weight"
                                            value="{{ old('weight', $product->weight) }}" placeholder="200g">

                                    </div>


                                </div>


                                <div class="form-row">


                                    <div class="form-group">

                                        <label>
                                            Price *
                                        </label>

                                        <input type="number" name="price" step="0.01" min="0"
                                            value="{{ old('price', $product->price) }}" required>

                                    </div>


                                    <div class="form-group">

                                        <label>
                                            Rating
                                        </label>

                                        <input type="number" name="rating" step="0.1" min="0"
                                            max="5" value="{{ old('rating', $product->rating) }}">

                                    </div>


                                </div>


                                <div class="form-group">

                                    <label>
                                        Badge
                                    </label>

                                    <input type="text" name="badge" value="{{ old('badge', $product->badge) }}"
                                        placeholder="Popular">

                                </div>


                            </div>

                        </div>



                        <!-- DESCRIPTION -->

                        <div class="card">

                            <div class="card-header">

                                <div class="card-title">
                                    Product Description
                                </div>

                            </div>


                            <div class="card-body">

                                <textarea name="description" placeholder="Product description...">{{ old('description', $product->description) }}</textarea>

                            </div>

                        </div>



                        <!-- VARIANTS -->

                        <div class="card">

                            <div class="card-header">

                                <div class="card-title">
                                    Product Variants
                                </div>

                                <div class="card-description">
                                    Manage different weights and prices
                                </div>

                            </div>


                            <div class="card-body">


                                <div id="variantList">


                                    @php

                                        $variants = $product->variants ?? [];

                                        if (is_string($variants)) {
                                            $variants = json_decode($variants, true) ?? [];
                                        }

                                    @endphp


                                    @forelse($variants as $variant)
                                        <div class="variant-row">


                                            <div class="form-group">

                                                <label>
                                                    Weight
                                                </label>

                                                <input type="text" class="variant-weight"
                                                    value="{{ $variant['weight'] ?? '' }}">

                                            </div>


                                            <div class="form-group">

                                                <label>
                                                    Price
                                                </label>

                                                <input type="number" step="0.01" class="variant-price"
                                                    value="{{ $variant['price'] ?? '' }}">

                                            </div>


                                            <button type="button" class="remove-variant"
                                                onclick="removeVariant(this)">
                                                ×
                                            </button>


                                        </div>


                                    @empty


                                        <div class="variant-row">

                                            <div class="form-group">

                                                <label>
                                                    Weight
                                                </label>

                                                <input type="text" class="variant-weight" placeholder="200g">

                                            </div>


                                            <div class="form-group">

                                                <label>
                                                    Price
                                                </label>

                                                <input type="number" class="variant-price" step="0.01"
                                                    placeholder="250">

                                            </div>


                                            <button type="button" class="remove-variant"
                                                onclick="removeVariant(this)">
                                                ×
                                            </button>

                                        </div>
                                    @endforelse


                                </div>


                                <button type="button" class="add-variant" onclick="addVariant()">
                                    + Add Another Variant
                                </button>


                            </div>

                        </div>


                    </div>



                    <!-- RIGHT -->

                    <div>


                        <!-- IMAGE -->

                        <div class="card">

                            <div class="card-header">

                                <div class="card-title">
                                    Product Image
                                </div>

                            </div>


                            <div class="card-body">


                                <div class="current-image">


                                    @if ($product->image)
                                        <img id="imagePreview" src="{{ asset($product->image) }}"
                                            alt="{{ $product->name }}">
                                    @else
                                        <span>
                                            📦 No Image
                                        </span>
                                    @endif


                                </div>


                                <div class="form-group">

                                    <label>
                                        Replace Image
                                    </label>

                                    <input class="file-input" type="file" name="image"
                                        accept="image/png,image/jpeg,image/webp" onchange="previewImage(this)">

                                    <small>
                                        JPG, PNG or WEBP. Maximum 5MB.
                                    </small>

                                </div>


                            </div>

                        </div>



                        <!-- STATUS -->

                        <div class="card">

                            <div class="card-header">

                                <div class="card-title">
                                    Product Availability
                                </div>

                            </div>


                            <div class="card-body">


                                <div class="status-box">


                                    <div>

                                        <div class="status-title">
                                            Product Active
                                        </div>

                                        <div class="status-description">
                                            Active products appear on the customer website.
                                        </div>

                                    </div>


                                    <label class="switch">

                                        <input type="checkbox" name="status" value="1"
                                            @checked($product->status)>

                                        <span class="slider"></span>

                                    </label>


                                </div>


                            </div>

                        </div>


                        <!-- ACTIONS -->

                        <div class="actions">

                            <a href="{{ route('admin.products') }}" class="btn btn-cancel">
                                Cancel
                            </a>


                            <button type="submit" class="btn btn-save">
                                ✓ Update Product
                            </button>

                        </div>


                    </div>


                </div>


                <!-- HIDDEN VARIANTS -->

                <input type="hidden" name="variants" id="variantsInput">


            </form>


        </div>

    </main>



    <script>
        /*
        |--------------------------------------------------------------------------
        | IMAGE PREVIEW
        |--------------------------------------------------------------------------
        */

        function previewImage(input) {
            if (!input.files || !input.files[0]) {
                return;
            }

            const file = input.files[0];

            if (file.size > 5 * 1024 * 1024) {

                alert('Image must be less than 5MB.');

                input.value = '';

                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {

                let preview =
                    document.getElementById('imagePreview');

                if (!preview) {

                    preview =
                        document.createElement('img');

                    preview.id =
                        'imagePreview';

                    preview.style.width =
                        '100%';

                    preview.style.height =
                        '100%';

                    preview.style.objectFit =
                        'contain';

                    document
                        .querySelector('.current-image')
                        .innerHTML = '';

                    document
                        .querySelector('.current-image')
                        .appendChild(preview);
                }

                preview.src =
                    e.target.result;
            };

            reader.readAsDataURL(file);
        }


        /*
        |--------------------------------------------------------------------------
        | ADD VARIANT
        |--------------------------------------------------------------------------
        */

        function addVariant() {
            const list =
                document.getElementById('variantList');

            const row =
                document.createElement('div');

            row.className =
                'variant-row';

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
                step="0.01"
                class="variant-price"
                placeholder="550"
            >

        </div>


        <button
            type="button"
            class="remove-variant"
            onclick="removeVariant(this)"
        >
            ×
        </button>

    `;

            list.appendChild(row);
        }


        /*
        |--------------------------------------------------------------------------
        | REMOVE VARIANT
        |--------------------------------------------------------------------------
        */

        function removeVariant(button) {
            const rows =
                document.querySelectorAll(
                    '.variant-row'
                );

            if (rows.length <= 1) {

                alert(
                    'At least one variant is required.'
                );

                return;
            }

            button
                .closest('.variant-row')
                .remove();
        }


        /*
        |--------------------------------------------------------------------------
        | PREPARE VARIANTS BEFORE SUBMIT
        |--------------------------------------------------------------------------
        */

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector(
                'form[action*="/admin/products/"]'
            );

            if (!form) return;

            form.addEventListener('submit', function() {
                const variants = [];

                form.querySelectorAll('.variant-row').forEach(function(row) {
                    const weight = row.querySelector('.variant-weight').value.trim();
                    const price = row.querySelector('.variant-price').value.trim();

                    if (weight !== '' && price !== '' && !isNaN(Number(price))) {
                        variants.push({
                            weight: weight,
                            price: Number(price)
                        });
                    }
                });

                form.querySelector('#variantsInput').value =
                    JSON.stringify(variants);
            });
        });
 </script>


</body>

</html>
