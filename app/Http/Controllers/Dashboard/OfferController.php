<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Offer $offers)
    {
        $offers = Offer::all();
        return view('dashboard.offers.index', compact('offers'));
    }
    public function create(Product $products){
        $products = Product::all();
        return view('dashboard.offers.create', compact('products'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        Offer::create($data);
        return redirect()->route('offers');
    }
    public function edit(Offer $offer)
    {
        $products = Product::all();
        return view('dashboard.offers.edit', compact('offer', 'products'));
    }
    public function update(Request $request, Offer $offer){
        $data = $request->validate([
            'name' => 'required',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
        ]);
        $offer->update($data);
        return redirect()->route('offers');
    }

    public function destroy(Request $request, Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers');
    }
}
