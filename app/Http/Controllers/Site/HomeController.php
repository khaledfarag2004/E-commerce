<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(User $user)
    {
        $user = User::all();
        $categories = Categorie::latest()->take(5)->get();
        $products = Product::all()->shuffle();
        $offers = Offer::inRandomOrder()->take(1)->get();
        $ProductsWithReview = Review::all()->shuffle();
        $reviews = Review::all()->shuffle();
        return view('site.index', compact('user', 'categories', 'products', 'offers', 'ProductsWithReview', 'reviews'));
    }



        public function search(Request $request)
    {
        $query = $request->input('q');

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('site.index', compact('products', 'query'));

    }

}
