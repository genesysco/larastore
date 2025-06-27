<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::getCart();
        return view('Cart/index', compact('cart'));
    }



    public function add(Request $request, Product $product)
    {
        $cart = Cart::getCart();

        $existingItem = $cart->items()
            ->where('product_id', $product->id)
            ->first();

        if ($existingItem) {
            $existingItem->update([
                'quantity' => $existingItem->quantity + $request->quantity,
            ]);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity ?? 1,
                'price' => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }



    public function remove(Request $request, $productId)
    {
        $cart = Cart::getCart();

        $cart->items()
            ->where('product_id', $productId)
            ->delete();

        return redirect()->back();
    }



    public function update(Request $request, $productId)
    {
        $cart = Cart::getCart();

        $item = $cart->items()
            ->where('product_id', $productId)
            ->first();

        if ($item && $request->quantity > 0) {
            $item->update(['quantity' => $request->quantity]);
        }

        return redirect()->back();
    }
}