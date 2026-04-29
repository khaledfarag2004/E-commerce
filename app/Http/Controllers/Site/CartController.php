<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }

        $cart = Cart::where('user_id', auth()->id())
            ->with('items.product')
            ->first();

        return view('site.cart.index', [
            'carts' => $cart ? $cart->items : collect([])
        ]);
    }

    public function add(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to add products to cart.');
        }
        $product = Product::findOrFail($id);

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $item = $cart->items()->where('product_id', $id)->first();

        if ($item) {
            $item->quantity++;
            $item->price = $product->price;
            $item->save();

        } else {
            $cart->items()->create([
                'product_id' => $id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
      if (!auth()->check()) {
      return redirect()->route('login')->with('error', 'Please login to add products to cart.');}

        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed successfully!');
    }

}
