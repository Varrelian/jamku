<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart ?? new Cart();
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        $user = auth()->user();
        
        // Get or create user's cart
        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);
        
        // Check if product is already in cart
        $existingItem = $cart->items()->where('product_id', $product->id)->first();
        
        if ($existingItem) {
            $newQuantity = $existingItem->quantity + $request->quantity;
            if ($newQuantity > $product->stock) {
                return back()->with('error', 'Not enough stock available.');
            }
            $existingItem->update(['quantity' => $newQuantity]);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return back()->with('success', 'Product added to cart successfully.');
    }

    public function update(Request $request, $itemId)
    {
        $cart = auth()->user()->cart;
        $item = $cart->items()->findOrFail($itemId);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $item->product->stock,
        ]);

        $item->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Cart updated successfully.');
    }

    public function remove($itemId)
    {
        $cart = auth()->user()->cart;
        $item = $cart->items()->findOrFail($itemId);
        $item->delete();

        return back()->with('success', 'Item removed from cart.');
    }

    public function clear()
    {
        $cart = auth()->user()->cart;
        $cart->items()->delete();

        return back()->with('success', 'Cart cleared successfully.');
    }
}