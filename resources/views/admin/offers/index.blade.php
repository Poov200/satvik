<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Offer Management - Satvik Foods Admin</title>
    <style>
        :root {
            --green: #1f7a45;
            --dark: #155b32;
            --light: #eaf7ef;
            --side: #10251a;
            --hover: #1c3a29;
            --bg: #f5f7f6;
            --text: #17211b;
            --muted: #718078;
            --line: #e2e8e4;
            --red: #dc3545;
            --shadow: 0 4px 20px rgba(16, 37, 26, .06)
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 240px;
            background: var(--side);
            color: #c9d4cd;
            display: flex;
            flex-direction: column;
            z-index: 200
        }

        .brand {
            height: 72px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ffffff12
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--green);
            display: grid;
            place-items: center;
            color: white;
            font-size: 20px;
            font-weight: 800;
            margin-right: 12px
        }

        .brand-text strong {
            display: block;
            color: #fff;
            font-size: 17px
        }

        .brand-text span {
            color: #7f9387;
            font-size: 11px
        }

        .side-nav {
            padding: 14px 12px;
            flex: 1;
            overflow: auto
        }

        .nav-title {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #60776a;
            padding: 12px 12px 7px;
            text-transform: uppercase
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
            font-size: 13px
        }

        .nav-link:hover {
            background: var(--hover);
            color: #fff
        }

        .nav-link.active {
            background: var(--green);
            color: #fff;
            font-weight: 600
        }

        .nav-icon {
            width: 22px;
            text-align: center
        }

        .side-footer {
            padding: 16px;
            border-top: 1px solid #ffffff10
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px
        }

        .admin-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #dcefe3;
            color: var(--green);
            display: grid;
            place-items: center;
            font-weight: 700
        }

        .admin-info strong {
            display: block;
            color: white;
            font-size: 12px
        }

        .admin-info span {
            color: #708178;
            font-size: 10px
        }

        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid #ffffff18;
            color: #aab9b0;
            padding: 9px;
            border-radius: 8px;
            cursor: pointer
        }

        .main {
            margin-left: 240px;
            min-height: 100vh
        }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid var(--line);
            display: flex;
            align-items: center;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 100
        }

        .top-title {
            font-size: 20px;
            font-weight: 700
        }

        .top-subtitle {
            font-size: 12px;
            color: var(--muted);
            margin-top: 3px
        }

        .menu-toggle {
            display: none
        }

        .page {
            padding: 28px;
            max-width: 1500px;
            margin: auto
        }

        .breadcrumb {
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 18px
        }

        .breadcrumb a {
            color: var(--green);
            text-decoration: none;
            font-weight: 600
        }

        .page-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px
        }

        .page-head h1 {
            font-size: 25px;
            margin-bottom: 5px
        }

        .page-head p {
            font-size: 13px;
            color: var(--muted)
        }

        .tabs {
            display: flex;
            gap: 7px
        }

        .tab {
            padding: 9px 13px;
            border: 1px solid var(--line);
            border-radius: 8px;
            text-decoration: none;
            color: #53645a;
            font-size: 12px;
            font-weight: 600
        }

        .tab.active {
            background: var(--light);
            border-color: #b9d9c5;
            color: var(--green)
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 20px
        }

        .stat,
        .panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: 13px;
            box-shadow: var(--shadow)
        }

        .stat {
            padding: 16px
        }

        .stat small {
            color: var(--muted);
            font-size: 11px
        }

        .stat strong {
            display: block;
            font-size: 22px;
            margin-top: 8px
        }

        .panel {
            padding: 20px;
            margin-bottom: 20px
        }

        .panel-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px
        }

        .panel-head h2 {
            font-size: 17px
        }

        .muted {
            color: var(--muted);
            font-size: 12px
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 7px
        }

        .field input,
        .field textarea,
        .field select,
        .product-search {
            width: 100%;
            padding: 10px 11px;
            border: 1px solid #dce5df;
            border-radius: 8px;
            background: white;
            font: 13px inherit;
            outline: none
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus,
        .product-search:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px #1f7a4512
        }

        .full {
            grid-column: 1/-1
        }

        .switchline {
            display: flex;
            align-items: center;
            gap: 8px;
            padding-top: 23px;
            font-size: 13px
        }

        .catalog {
            border: 1px solid var(--line);
            border-radius: 10px;
            overflow: hidden
        }

        .catalog-head {
            padding: 12px;
            background: #f8faf9;
            display: flex;
            align-items: center;
            gap: 12px;
            justify-content: space-between
        }

        .catalog-list {
            max-height: 380px;
            overflow: auto
        }

        .product-row {
            display: grid;
            grid-template-columns: minmax(190px, 1.5fr) minmax(150px, 1fr) 110px 90px;
            gap: 12px;
            align-items: center;
            padding: 12px 14px;
            border-top: 1px solid #edf1ee
        }

        .prod-name {
            font-weight: 650;
            font-size: 13px
        }

        .prod-meta {
            font-size: 10px;
            color: var(--muted);
            margin-top: 4px
        }

        .variant-select,
        .qty-input {
            width: 100%;
            padding: 8px;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: white;
            font-size: 12px
        }

        .add-product {
            border: 0;
            background: var(--light);
            color: var(--green);
            font-weight: 700;
            padding: 9px 12px;
            border-radius: 7px;
            cursor: pointer
        }

        .add-product:disabled {
            opacity: .4;
            cursor: not-allowed
        }

        .selected-list {
            display: grid;
            gap: 9px
        }

        .selected-item {
            display: grid;
            grid-template-columns: minmax(180px, 1.5fr) minmax(130px, 1fr) 85px 90px 34px;
            gap: 10px;
            align-items: center;
            padding: 10px;
            border: 1px solid var(--line);
            border-radius: 9px
        }

        .selected-item strong {
            font-size: 12px
        }

        .selected-item small {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px
        }

        .remove {
            border: 0;
            background: #fff0f1;
            color: var(--red);
            width: 30px;
            height: 30px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 17px
        }

        .totals {
            display: flex;
            justify-content: flex-end;
            gap: 25px;
            margin-top: 15px;
            padding-top: 14px;
            border-top: 1px solid var(--line);
            font-size: 13px
        }

        .totals strong {
            font-size: 15px
        }

        .btn {
            border: 0;
            background: var(--green);
            color: white;
            padding: 11px 17px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px
        }

        .btn:hover {
            background: var(--dark)
        }

        .btn.secondary {
            background: var(--light);
            color: var(--green)
        }

        .btn.gray {
            background: #eef2ef;
            color: #425349
        }

        .form-actions {
            display: flex;
            gap: 9px;
            justify-content: flex-end;
            margin-top: 18px
        }

        .notice {
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 12px
        }

        .success {
            background: #e8f7ee;
            color: #1b7a43
        }

        .error {
            background: #fff1f2;
            color: #b42332
        }

        .table-wrap {
            overflow-x: auto
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px
        }

        thead {
            background: #f8faf9
        }

        th {
            text-align: left;
            padding: 12px 14px;
            font-size: 10px;
            color: #728077;
            text-transform: uppercase
        }

        td {
            padding: 13px 14px;
            border-top: 1px solid #edf1ee;
            font-size: 12px
        }

        .offer-name {
            font-weight: 700
        }

        .badge {
            background: #f0f5f2;
            color: #4e6558;
            padding: 5px 8px;
            border-radius: 6px;
            font-size: 10px
        }

        .status {
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 10px
        }

        .status.active {
            background: #e8f7ee;
            color: #1b7a43
        }

        .status.inactive {
            background: #f4f4f4;
            color: #777
        }

        .actions {
            display: flex;
            gap: 6px;
            align-items: center
        }

        .action {
            width: 31px;
            height: 31px;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: white;
            display: grid;
            place-items: center;
            text-decoration: none;
            cursor: pointer
        }

        .action.edit {
            color: var(--green)
        }

        .action.delete {
            color: var(--red)
        }

        .empty {
            padding: 35px;
            text-align: center;
            color: var(--muted);
            font-size: 13px
        }

        @media(max-width:1100px) {
            .stats {
                grid-template-columns: repeat(2, 1fr)
            }
        }

        @media(max-width:900px) {
            .sidebar {
                transform: translateX(-100%)
            }

            .main {
                margin-left: 0
            }

            .menu-toggle {
                display: block;
                margin-right: 12px;
                border: 0;
                background: var(--light);
                color: var(--green);
                padding: 9px;
                border-radius: 7px
            }

            .sidebar.open {
                transform: translateX(0)
            }

            .product-row {
                grid-template-columns: 1fr 1fr
            }

            .selected-item {
                grid-template-columns: 1fr 1fr
            }

            .page {
                padding: 18px
            }
        }

        @media(max-width:600px) {
            .stats {
                grid-template-columns: 1fr 1fr
            }

            .page-head {
                align-items: flex-start;
                flex-direction: column
            }

            .tabs {
                width: 100%
            }

            .tab {
                flex: 1;
                text-align: center
            }

            .form-grid {
                grid-template-columns: 1fr
            }

            .full {
                grid-column: auto
            }

            .topbar {
                padding: 0 15px
            }

            .product-row {
                grid-template-columns: 1fr 1fr
            }

            .selected-item {
                grid-template-columns: 1fr 1fr
            }

            .totals {
                justify-content: space-between
            }

            .panel {
                padding: 14px
            }
        }
    </style>
</head>

<body>
    @php
        $type = ($type ?? request('type', 'combo')) === 'special' ? 'special' : 'combo';
        $offers = $offers ?? collect();
        $products = $products ?? collect();
        $editingOffer = $editingOffer ?? null;
        $activeCount = $offers->where('is_active', true)->count();
        $productData = $products->map(function ($p) {
            $variants = is_array($p->variants) ? $p->variants : (json_decode($p->variants ?? '[]', true) ?: []);
            if (!$variants) {
                $variants = [['weight' => $p->weight ?: 'Standard', 'price' => (float) $p->price]];
            }
            return [
                'id' => $p->id,
                'name' => $p->name,
                'category' => $p->category,
                'image' => $p->image,
                'variants' => array_values(
                    array_map(
                        fn($v) => [
                            'weight' => $v['weight'] ?? 'Standard',
                            'price' => (float) ($v['price'] ?? $p->price),
                        ],
                        $variants,
                    ),
                ),
            ];
        });
        $initialItems = old('items', $editingOffer->items ?? []);
    @endphp
    <aside class="sidebar" id="sidebar">
        <div class="brand">
            <div class="brand-icon">S</div>
            <div class="brand-text"><strong>Satvik Foods</strong><span>Admin Panel</span></div>
        </div>
        <nav class="side-nav">

            <div class="nav-title">Main</div>

            <a href="{{ route('admin.orders') }}" class="nav-link">
                <span class="nav-icon">📊</span>
                Dashboard
            </a>

            <div class="nav-title">Store</div>

            <a href="{{ route('admin.orders') }}" class="nav-link">
                <span class="nav-icon">🛒</span>
                Orders
            </a>

            <a href="{{ route('admin.products') }}" class="nav-link">
                <span class="nav-icon">📦</span>
                Products
            </a>

            <a href="{{ route('admin.offers.index', ['type' => 'combo']) }}"
                class="nav-link {{ request()->routeIs('admin.offers.*') ? 'active' : '' }}">
                <span class="nav-icon">🎁</span>
                Offers
            </a>

            <div class="nav-title">Management</div>

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
                <div class="admin-avatar">A</div>
                <div class="admin-info"><strong>Administrator</strong><span>{{ session('admin_email') }}</span></div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="logout-btn">↪ &nbsp;
                    Logout</button></form>
        </div>
    </aside>
    <main class="main">
        <header class="topbar"><button class="menu-toggle" id="menuToggle">☰</button>
            <div>
                <div class="top-title">Offer Management</div>
                <div class="top-subtitle">Create offers using products already available in your store</div>
            </div>
        </header>
        <div class="page">
            <div class="breadcrumb"><a href="{{ route('admin.orders') }}">Dashboard</a> › <strong>Offer
                    Management</strong></div>
            @if (session('success'))
                <div class="notice success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="notice error">Please check: @foreach ($errors->all() as $e)
                        <div>{{ $e }}</div>
                    @endforeach
                </div>
            @endif
            <div class="page-head">
                <div>
                    <h1>Offers</h1>
                    <p>Select existing products and their variants to create Combo or Special Offers.</p>
                </div>
                <div class="tabs"><a class="tab {{ $type === 'combo' ? 'active' : '' }}"
                        href="{{ route('admin.offers.index', ['type' => 'combo']) }}">🎁 Combo Offers</a><a
                        class="tab {{ $type === 'special' ? 'active' : '' }}"
                        href="{{ route('admin.offers.index', ['type' => 'special']) }}">🏷️ Special Offers</a></div>
            </div>
            <div class="stats">
                <div class="stat"><small>Total {{ ucfirst($type) }}
                        Offers</small><strong>{{ $offers->total() }}</strong></div>
                <div class="stat"><small>Active Offers</small><strong>{{ $activeCount }}</strong></div>
                <div class="stat"><small>Available Products</small><strong>{{ $products->count() }}</strong></div>
                <div class="stat"><small>Offer Rule</small><strong
                        style="font-size:17px">{{ $type === 'combo' ? 'Min. 2 products' : 'Min. 1 product' }}</strong>
                </div>
            </div>
            <form id="offerForm" method="POST"
                action="{{ $editingOffer ? route('admin.offers.update', ['type' => $type, 'offer' => $editingOffer->id]) : route('admin.offers.store', ['type' => $type]) }}">
                @csrf @if ($editingOffer)
                    @method('PUT')
                @endif
                <section class="panel">
                    <div class="panel-head">
                        <div>
                            <h2>{{ $editingOffer ? 'Edit Offer' : 'Create New Offer' }}</h2>
                            <div class="muted">All items must be selected from your existing active products.</div>
                        </div>
                        @if ($editingOffer)
                            <a class="btn gray" href="{{ route('admin.offers.index', ['type' => $type]) }}">Cancel
                                Edit</a>
                        @endif
                    </div>
                    <div class="form-grid">
                        <div class="field"><label>Offer Type *</label><select id="offerType" name="offer_type">
                                <option value="combo" {{ $type === 'combo' ? 'selected' : '' }}>Combo Offer</option>
                                <option value="special" {{ $type === 'special' ? 'selected' : '' }}>Special Offer
                                </option>
                            </select><small class="muted">Combo requires at least 2 different products.</small></div>
                        <div class="field"><label>Offer Name *</label><input name="name" required maxlength="180"
                                value="{{ old('name', $editingOffer->name ?? '') }}"
                                placeholder="e.g. Family Combo Pack"></div>
                        <div class="field full"><label>Description</label>
                            <textarea name="description" rows="2" placeholder="Offer description...">{{ old('description', $editingOffer->description ?? '') }}</textarea>
                        </div>
                        <div class="field"><label>Offer Image URL (optional)</label><input name="image"
                                value="{{ old('image', $editingOffer->image ?? '') }}"
                                placeholder="img/offers/offer.webp"></div>
                        <div class="field"><label>Offer Price (₹) *</label><input type="number" min="0.01"
                                step="0.01" name="offer_price" id="offerPrice" required
                                value="{{ old('offer_price', $editingOffer->offer_price ?? '') }}"></div>
                        <div class="field"><label>Starts At *</label><input type="datetime-local" name="starts_at"
                                required
                                value="{{ old('starts_at', $editingOffer?->starts_at?->format('Y-m-d\\TH:i') ?? '') }}">
                        </div>
                        <div class="field"><label>Ends At *</label><input type="datetime-local" name="ends_at"
                                required
                                value="{{ old('ends_at', $editingOffer?->ends_at?->format('Y-m-d\\TH:i') ?? '') }}">
                        </div>
                        <label class="switchline"><input type="checkbox" name="is_active" value="1"
                                {{ old('is_active', $editingOffer ? $editingOffer->is_active : true) ? 'checked' : '' }}>
                            Enable this offer</label>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-head">
                        <div>
                            <h2>1. Select Existing Products</h2>
                            <div class="muted">Choose a product variant and quantity, then click Add.</div>
                        </div><strong id="selectedCount">0 selected</strong>
                    </div>
                    <div class="catalog">
                        <div class="catalog-head"><strong style="font-size:12px">Available Products
                                ({{ $products->count() }})</strong><input class="product-search" id="productSearch"
                                style="max-width:300px" placeholder="Search product name or category..."></div>
                        <div class="catalog-list" id="catalogList">
                            @forelse($productData as $p)
                                <div class="product-row" data-product-id="{{ $p['id'] }}"
                                    data-search="{{ strtolower($p['name'] . ' ' . $p['category']) }}">
                                    <div>
                                        <div class="prod-name">{{ $p['name'] }}</div>
                                        <div class="prod-meta">#{{ $p['id'] }} · {{ $p['category'] }}</div>
                                    </div>
                                    <select class="variant-select" aria-label="Variant for {{ $p['name'] }}">
                                        @foreach ($p['variants'] as $v)
                                            <option value="{{ $v['weight'] }}" data-price="{{ $v['price'] }}">
                                                {{ $v['weight'] }} — ₹{{ number_format($v['price'], 2) }}</option>
                                        @endforeach
                                    </select>
                                    <input class="qty-input" type="number" min="1" max="100"
                                        value="1" aria-label="Quantity">
                                    <button type="button" class="add-product">＋ Add</button>
                                </div>
                            @empty<div class="empty">No active products found. Add products first.</div>
                            @endforelse
                        </div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-head">
                        <div>
                            <h2>2. Selected Offer Products</h2>
                            <div class="muted">Selected product variants will be saved as offer items.</div>
                        </div>
                    </div>
                    <div id="selectedItems" class="selected-list"></div>
                    <div id="selectedEmpty" class="empty">No products selected yet. Add products from the list above.
                    </div>
                    <div class="totals"><span>Regular Total: <strong id="regularTotal">₹0.00</strong></span><span>You
                            Save: <strong id="savingsTotal">₹0.00</strong></span></div>
                    <div class="form-actions"><button type="submit"
                            class="btn">{{ $editingOffer ? 'Update Offer' : 'Save Offer' }}</button></div>
                </section>
            </form>
            <section class="panel">
                <div class="panel-head">
                    <div>
                        <h2>Existing {{ ucfirst($type) }} Offers</h2>
                        <div class="muted">Edit or delete offers from this same page.</div>
                    </div>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Offer</th>
                                <th>Products</th>
                                <th>Regular Price</th>
                                <th>Offer Price</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($offers as $offer)
                                <tr>
                                    <td>
                                        <div class="offer-name">{{ $offer->name }}</div><span
                                            class="muted">#{{ $offer->id }}</span>
                                    </td>
                                    <td>{{ count($offer->items ?? []) }} items</td>
                                    <td>₹{{ number_format((float) $offer->regular_price, 2) }}</td>
                                    <td><strong>₹{{ number_format((float) $offer->offer_price, 2) }}</strong></td>
                                    <td>{{ $offer->starts_at?->format('d M Y') }} –
                                        {{ $offer->ends_at?->format('d M Y') }}</td>
                                    <td><span
                                            class="status {{ $offer->is_active ? 'active' : 'inactive' }}">{{ $offer->is_active ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td>
                                        <div class="actions"><a class="action edit" title="Edit"
                                                href="{{ route('admin.offers.edit', ['type' => $type, 'offer' => $offer->id]) }}">✎</a>
                                            <form method="POST"
                                                action="{{ route('admin.offers.destroy', ['type' => $type, 'offer' => $offer->id]) }}"
                                                onsubmit="return confirm('Delete this offer?')">@csrf
                                                @method('DELETE')<button class="action delete"
                                                    title="Delete">🗑</button></form>
                                        </div>
                                    </td>
                                </tr>
                            @empty<tr>
                                    <td colspan="7" class="empty">No {{ $type }} offers created yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div style="margin-top:14px">{{ $offers->links() }}</div>
            </section>
        </div>
    </main>
    <script>
        const products = @json($productData);
        const initialItems = @json($initialItems);
        let selected = [];
        const money = n => '₹' + Number(n || 0).toFixed(2);

        function addSelected(productId, weight, quantity = 1) {
            const p = products.find(x => String(x.id) === String(productId));
            if (!p) return;
            const v = p.variants.find(x => String(x.weight) === String(weight)) || p.variants[0];
            if (!v) return;
            const existing = selected.find(x => x.product_id === p.id && x.weight === v.weight);
            if (existing) existing.quantity = Math.min(100, existing.quantity + Number(quantity || 1));
            else selected.push({
                product_id: p.id,
                name: p.name,
                weight: v.weight,
                price: Number(v.price),
                quantity: Number(quantity || 1)
            });
            renderSelected();
        }

        function renderSelected() {
            const root = document.getElementById('selectedItems');
            root.innerHTML = '';
            document.getElementById('selectedEmpty').style.display = selected.length ? 'none' : 'block';
            selected.forEach((x, i) => {
                const row = document.createElement('div');
                row.className = 'selected-item';
                row.innerHTML =
                    `<div><strong>${escapeHtml(x.name)}</strong><small>Product ID: ${x.product_id}</small><input type="hidden" name="items[${i}][product_id]" value="${x.product_id}"></div><div><strong>${escapeHtml(x.weight)}</strong><small>${money(x.price)} per unit</small><input type="hidden" name="items[${i}][weight]" value="${escapeHtml(x.weight)}"></div><div><input class="qty-input" type="number" min="1" max="100" value="${x.quantity}" aria-label="Quantity" onchange="changeQty(${i},this.value)"><input type="hidden" name="items[${i}][quantity]" value="${x.quantity}" id="qtyHidden${i}"></div><div><strong>${money(x.price*x.quantity)}</strong></div><button type="button" class="remove" onclick="removeSelected(${i})">×</button>`;
                root.appendChild(row);
            });
            const regular = selected.reduce((s, x) => s + x.price * x.quantity, 0),
                offer = Number(document.getElementById('offerPrice').value || 0);
            document.getElementById('regularTotal').textContent = money(regular);
            document.getElementById('savingsTotal').textContent = money(Math.max(0, regular - offer));
            document.getElementById('selectedCount').textContent = selected.length + ' selected';
        }

        function changeQty(i, v) {
            selected[i].quantity = Math.max(1, Math.min(100, Number(v) || 1));
            renderSelected()
        }

        function removeSelected(i) {
            selected.splice(i, 1);
            renderSelected()
        }

        function escapeHtml(s) {
            return String(s ?? '').replace(/[&<>"']/g, c => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            } [c]))
        }
        document.querySelectorAll('.product-row').forEach(row => row.querySelector('.add-product').addEventListener('click',
            () => {
                const sel = row.querySelector('.variant-select');
                addSelected(row.dataset.productId, sel.value, row.querySelector('.qty-input').value)
            }));
        document.getElementById('productSearch').addEventListener('input', function() {
            const q = this.value.toLowerCase().trim();
            document.querySelectorAll('.product-row').forEach(r => r.style.display = r.dataset.search.includes(q) ?
                'grid' : 'none')
        });
        document.getElementById('offerPrice').addEventListener('input', renderSelected);
        document.getElementById('offerType').addEventListener('change', function() {
            const target = this.value;
            const form = document.getElementById('offerForm');
            let url = new URL(form.action, window.location.origin);
            const parts = url.pathname.split('/');
            const idx = parts.indexOf('offers');
            if (idx >= 0 && parts[idx + 1]) parts[idx + 1] = target;
            url.pathname = parts.join('/');
            form.action = url.pathname + url.search;
        });
        if (Array.isArray(initialItems)) initialItems.forEach(item => {
            if (item.product_id) addSelected(item.product_id, item.weight, item.quantity || 1)
        });
        renderSelected();
        document.getElementById('offerForm').addEventListener('submit', function(e) {
            const type = document.getElementById('offerType').value;
            const unique = new Set(selected.map(x => x.product_id));
            if (selected.length < (type === 'combo' ? 2 : 1)) {
                e.preventDefault();
                alert(type === 'combo' ? 'Combo Offer-ku minimum 2 different existing products select pannunga.' :
                    'Select at least one existing product.');
                return;
            }
            if (type === 'combo' && unique.size < 2) {
                e.preventDefault();
                alert('Combo Offer-ku minimum 2 different products select pannunga.');
                return;
            }
            const regular = selected.reduce((s, x) => s + x.price * x.quantity, 0);
            if (Number(document.getElementById('offerPrice').value) > regular) {
                e.preventDefault();
                alert('Offer price regular total-ai vida adhigama irukka koodathu.');
            }
        });
        document.getElementById('menuToggle').addEventListener('click', () => document.getElementById('sidebar').classList
            .toggle('open'));
    </script>
</body>

</html>
