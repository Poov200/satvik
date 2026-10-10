<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - PRODUCTS LIST
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - CREATE PRODUCT PAGE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.products.create');
    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER API
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return response()->json(
            Product::where('status', true)
                ->latest()
                ->get()
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'weight' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'badge' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'variants' => 'nullable|json',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $filename = time() . '_' . preg_replace(
                '/[^A-Za-z0-9._-]/',
                '_',
                $image->getClientOriginalName()
            );

            $image->move(
                public_path('img/products'),
                $filename
            );

            $imagePath = 'img/products/' . $filename;
        }

        $product = Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'weight' => $request->weight,
            'price' => $request->price,
            'rating' => $request->rating ?? 0,
            'badge' => $request->badge,
            'description' => $request->description,
            'image' => $imagePath,

            'variants' => $request->variants
                ? json_decode($request->variants, true)
                : [],

            'status' => $request->boolean('status'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added successfully.',
            'product' => $product,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT PRODUCT PAGE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view(
            'admin.products.edit',
            compact('product')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'weight' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'badge' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'variants' => 'nullable|json',
        ]);


        /*
        |--------------------------------------------------------------------------
        | IMAGE UPDATE
        |--------------------------------------------------------------------------
        */

        $imagePath = $product->image;

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $product->image &&
                file_exists(public_path($product->image))
            ) {
                unlink(public_path($product->image));
            }


            $image = $request->file('image');

            $filename = time() . '_' . preg_replace(
                '/[^A-Za-z0-9._-]/',
                '_',
                $image->getClientOriginalName()
            );


            $image->move(
                public_path('img/products'),
                $filename
            );


            $imagePath =
                'img/products/' . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $product->update([

            'name' => $request->name,

            'category' => $request->category,

            'weight' => $request->weight,

            'price' => $request->price,

            'rating' => $request->rating ?? 0,

            'badge' => $request->badge,

            'description' => $request->description,

            'image' => $imagePath,

            'variants' => $request->variants
                ? json_decode($request->variants, true)
                : [],

            'status' => $request->boolean('status'),

        ]);


        return redirect()
            ->route('admin.products')
            ->with(
                'success',
                'Product updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ACTIVE / INACTIVE
    |--------------------------------------------------------------------------
    */

    public function toggleStatus($id)
    {
        $product = Product::findOrFail($id);

        $product->status = !$product->status;

        $product->save();


        return response()->json([

            'success' => true,

            'status' => $product->status,

            'message' => $product->status
                ? 'Product activated successfully.'
                : 'Product deactivated successfully.',

        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $product = Product::findOrFail($id);


        if (
            $product->image &&
            file_exists(public_path($product->image))
        ) {
            unlink(public_path($product->image));
        }


        $product->delete();


        return redirect()
            ->route('admin.products')
            ->with(
                'success',
                'Product deleted successfully.'
            );
    }
}