
@php
    $productsForJs = $products->map(function ($p) {
        return [
            'id' => $p->id,
            'name' => $p->name,
            'price' => (float) $p->price,
            'weight' => $p->weight,
            'variants' => $p->variants,
        ];
    })->values();

    $initialItems = old('items', $offer->items ?? []);
@endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $offer->exists ? 'Edit' : 'Create' }} {{ ucfirst($type) }} Offer</title>

    <style>
        :root {
            --g: #246b45;
            --d: #174b31;
            --line: #e1e8e2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7f5;
            font: 14px Arial;
            color: #253229;
        }

        main {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 18px;
        }

        h1 {
            color: var(--d);
            font-size: 24px;
        }

        .panel {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 22px;
            margin: 16px 0;
        }

        label {
            display: block;
            font-weight: 700;
            margin: 0 0 7px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d6dfd8;
            border-radius: 7px;
            font: inherit;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .field {
            margin-bottom: 15px;
        }

        .item {
            display: grid;
            grid-template-columns: 120px 1.4fr 1fr 90px 90px 36px;
            gap: 8px;
            align-items: end;
            margin: 12px 0;
        }

        .small {
            color: #6c786f;
            font-size: 12px;
        }

        .btn {
            background: var(--g);
            color: #fff;
            border: 0;
            padding: 11px 17px;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn.secondary {
            background: #eaf3ec;
            color: var(--d);
        }

        .remove-btn {
            background: #ffe9e7;
            color: #b42318;
            border: 0;
            padding: 10px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 18px;
        }

        .errors {
            background: #fff0ef;
            color: #a22;
            padding: 12px;
            border-radius: 8px;
            margin: 10px 0;
        }

        @media(max-width: 700px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .item {
                grid-template-columns: 1fr 1fr;
            }

            .item > * {
                min-width: 0;
            }
        }
    </style>
</head>

<body>

<main>

    <a href="{{ route('admin.offers.index', ['type' => $type]) }}"
       style="color:var(--g)">
        ← Back to {{ ucfirst($type) }} Offers
    </a>

    <h1>
        {{ $offer->exists ? 'Edit' : 'Create' }}
        {{ $type === 'combo' ? 'Combo' : 'Special' }} Offer
    </h1>

    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $e)
                <div>{{ $e }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST"
          action="{{ $offer->exists
              ? route('admin.offers.update', ['type' => $type, 'offer' => $offer->id])
              : route('admin.offers.store', ['type' => $type]) }}">

        @csrf

        @if($offer->exists)
            @method('PUT')
        @endif

        <div class="panel">

            <div class="grid">

                <div class="field">
                    <label>Offer name</label>
                    <input
                        name="name"
                        required
                        value="{{ old('name', $offer->name) }}"
                    >
                </div>

                <div class="field">
                    <label>Offer image URL (optional)</label>
                    <input
                        name="image"
                        value="{{ old('image', $offer->image) }}"
                        placeholder="img/offers/example.webp"
                    >
                </div>

                <div class="field" style="grid-column:1/-1">
                    <label>Description</label>
                    <textarea name="description" rows="2">{{ old('description', $offer->description) }}</textarea>
                </div>

                <div class="field">
                    <label>Offer price (₹)</label>
                    <input
                        type="number"
                        min="0.01"
                        step="0.01"
                        name="offer_price"
                        required
                        value="{{ old('offer_price', $offer->offer_price) }}"
                    >
                </div>

                <div class="field">
                    <label>
                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            style="width:auto"
                            {{ old('is_active', $offer->exists ? $offer->is_active : true) ? 'checked' : '' }}
                        >
                        Enable offer
                    </label>
                </div>

                <div class="field">
                    <label>Starts at</label>
                    <input
                        type="datetime-local"
                        name="starts_at"
                        required
                        value="{{ old('starts_at', $offer->starts_at ? $offer->starts_at->format('Y-m-d\TH:i') : '') }}"
                    >
                </div>

                <div class="field">
                    <label>Ends at</label>
                    <input
                        type="datetime-local"
                        name="ends_at"
                        required
                        value="{{ old('ends_at', $offer->ends_at ? $offer->ends_at->format('Y-m-d\TH:i') : '') }}"
                    >
                </div>

            </div>
        </div>

        <div class="panel">

            <h3>Offer items</h3>

            <p class="small">
                Existing products are revalidated at checkout.
                Custom items are combo-only snapshots.
            </p>

            <div id="items"></div>

            <button type="button" class="btn secondary" onclick="addItem()">
                + Add item
            </button>

        </div>

        <button class="btn" type="submit">
            Save offer
        </button>

    </form>

</main>

<script>
    // Product data safely converted by Laravel.
    const products = {{ Illuminate\Support\Js::from($productsForJs) }};

    // Existing offer items or old form input.
    let initial = {{ Illuminate\Support\Js::from($initialItems) }};

    function addItem(v = {
        kind: 'product',
        product_id: '',
        name: '',
        weight: '',
        quantity: 1,
        base_price: 0
    }) {

        const i = document.querySelectorAll('.item').length;

        const row = document.createElement('div');

        row.className = 'item';

        row.innerHTML = `
            <div>
                <label>Type</label>

                <select
                    name="items[${i}][kind]"
                    onchange="toggleRow(this)"
                >
                    <option value="product">Existing product</option>
                    <option value="custom">Custom item</option>
                </select>
            </div>

            <div class="prod">
                <label>Product</label>

                <select
                    name="items[${i}][product_id]"
                    onchange="syncProduct(this)"
                >
                    <option value="">Choose product</option>

                    ${products.map(p => `
                        <option value="${p.id}">
                            ${p.name} (#${p.id})
                        </option>
                    `).join('')}
                </select>
            </div>

            <div class="custom" style="display:none">
                <label>Custom item name</label>

                <input
                    name="items[${i}][name]"
                    placeholder="Item name"
                >
            </div>

            <div>
                <label>Weight / variant</label>

                <input
                    name="items[${i}][weight]"
                    placeholder="e.g. 500g"
                >
            </div>

            <div>
                <label>Qty</label>

                <input
                    type="number"
                    min="1"
                    max="100"
                    name="items[${i}][quantity]"
                    value="1"
                >
            </div>

            <div>
                <label>Base ₹</label>

                <input
                    type="number"
                    min="0"
                    step="0.01"
                    name="items[${i}][base_price]"
                    value="0"
                >
            </div>

            <button
                type="button"
                class="remove-btn"
                onclick="removeItem(this)"
                title="Remove item"
            >
                ×
            </button>
        `;

        document.getElementById('items').appendChild(row);

        row.querySelector(`[name="items[${i}][kind]"]`).value =
            v.kind || 'product';

        row.querySelector(`[name="items[${i}][product_id]"]`).value =
            v.product_id || '';

        row.querySelector(`[name="items[${i}][name]"]`).value =
            v.name || '';

        row.querySelector(`[name="items[${i}][weight]"]`).value =
            v.weight || '';

        row.querySelector(`[name="items[${i}][quantity]"]`).value =
            v.quantity || 1;

        row.querySelector(`[name="items[${i}][base_price]"]`).value =
            v.base_price || 0;

        toggleRow(row.querySelector('select'));

        if (v.kind === 'product' && v.product_id) {
            syncProduct(row.querySelector('.prod select'), false);
        }
    }

    function toggleRow(sel) {

        const row = sel.closest('.item');

        const custom = sel.value === 'custom';

        row.querySelector('.prod').style.display =
            custom ? 'none' : 'block';

        row.querySelector('.custom').style.display =
            custom ? 'block' : 'none';
    }

    function syncProduct(sel, overwrite = true) {

        const product = products.find(p => p.id == sel.value);

        const row = sel.closest('.item');

        if (!product) return;

        row.querySelector('.custom input').value = product.name;

        if (overwrite) {
            row.querySelector('[name$="[base_price]"]').value =
                product.price;
        }

        if (!row.querySelector('[name$="[weight]"]').value) {
            row.querySelector('[name$="[weight]"]').value =
                product.weight || '';
        }
    }

    function removeItem(button) {

        button.closest('.item').remove();

        // Re-index inputs so Laravel receives continuous array indexes.
        document.querySelectorAll('.item').forEach((row, index) => {

            row.querySelectorAll('[name]').forEach(input => {

                input.name = input.name.replace(
                    /items\[\d+\]/,
                    `items[${index}]`
                );

            });

        });
    }

    // Load existing items when editing or when validation fails.
    if (Array.isArray(initial) && initial.length) {

        initial.forEach(item => addItem(item));

    } else {

        addItem();

    }
</script>

</body>
</html>
