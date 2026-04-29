<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::all();
        return view('site.product.index', compact('product', 'reviews'));
    }
    public function create(Request $request){
        $categories = Categorie::all();
        return view('site.product.create', compact('categories'));
    }
    public function store(ProductRequest $request){
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product', 'public');
            $data['image'] = $path;
        }

        Product::create($data);
        return redirect()->route('products.user.create')->with('success', 'Product created successfully');
    }

        public function rating(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Successfully rated product');

    }
}
