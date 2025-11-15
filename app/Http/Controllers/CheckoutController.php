<?php
// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function process()
    {
        $user = auth()->user();
        $cart = $user->cart;

        if (!$cart || $cart->items->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        $total = $cart->total;

        // Check balance
        if (!$user->hasSufficientBalance($total)) {
            return back()->with('error', 'Insufficient balance. Please top up your AlifPay account.');
        }

        // Check stock availability
        foreach ($cart->items as $item) {
            if (!$item->product->isAvailable($item->quantity)) {
                return back()->with('error', "Product {$item->product->name} is out of stock or doesn't have sufficient quantity.");
            }
        }

        // Process checkout
        DB::transaction(function () use ($user, $cart, $total) {
            // Deduct balance
            $user->decrement('balance', $total);

            // Reduce stock and clear cart
            foreach ($cart->items as $item) {
                $item->product->reduceStock($item->quantity);
            }

            // Create transaction record
            Transaction::create([
                'user_id' => $user->id,
                'amount' => $total,
                'type' => 'purchase',
                'status' => 'completed',
                'description' => 'Product purchase - ' . $cart->items->count() . ' items',
            ]);

            // Clear cart
            $cart->clear();
        });

        return redirect()->route('transactions.index')->with('success', 'Checkout successful! Thank you for your purchase.');
    }
}