<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::paginate(10);
            return view('admin.products.index', compact('products'));
        } catch (Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'Failed to load products.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.products.create');
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('error', 'Failed to load create product form.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
            ]);

            Product::create($request->all());

            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('error', 'Failed to create product.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        try {
            return view('admin.products.show', compact('product'));
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('error', 'Failed to load product details.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        try {
            return view('admin.products.edit', compact('product'));
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('error', 'Failed to load edit product form.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
            ]);

            $product->update($request->all());

            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('error', 'Failed to update product.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('error', 'Failed to delete product.');
        }
    }
}
