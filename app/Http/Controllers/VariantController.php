<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variants = Variant::all();
        return view('variants.index', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('variants.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id', // Make sure the product exists
        ]);
    
        Variant::create($validatedData);
    
        return redirect()->route('products.edit', $request->input('product_id'))
                         ->with('success', 'Variant has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $variant = Variant::findOrFail($id);
        return view('variants.show', compact('variant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variant = Variant::findOrFail($id);
        $products = Product::all();
        return view('variants.edit', compact('variant', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $variant = Variant::findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);
    
        $variant->update([
            'name' => $request->input('name'),
        ]);
    
        return redirect()->route('products.edit', $variant->product_id)
                         ->with('success', 'Variant has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = Variant::findOrFail($id);
        $product_id = $variant->product_id;
        $variant->delete();

        return redirect()->route('products.edit', $product_id)
                        ->with('success', 'Variant has been deleted successfully.');
    }
}
