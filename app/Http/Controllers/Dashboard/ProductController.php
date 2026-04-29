<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EditProductRequest;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }

    public function create(Categorie $categories)
    {
        $categories = Categorie::all();
        return view('dashboard.product.create', compact('categories'));
    }
    public function store(ProductRequest $request, Product $product, Categorie $categories) {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product', 'public');
            $data['image'] = $path;
        }

        Product::create($data);
        return redirect()->route('products')->with('success', 'Product created successfully');
    }

    public function edit(Product $product, Categorie $categories)
    {
        $categories = Categorie::all();
        return view('dashboard.product.edit', compact('product', 'categories'));
    }
    public function update(EditProductRequest $request, Product $product){
        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($product->avatar && Storage::disk('public')->exists($product->avatar)) {
                Storage::disk('public')->delete($product->image);
            }

            $path = $request->file('image')->store('product', 'public');

            $data['image'] = $path;
        }

        $product->update($data);
        return redirect()->route('products')->with('success', 'Product updated successfully');
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        return redirect()->route('products')->with('success', 'Product deleted successfully');
    }
}
