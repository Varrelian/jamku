<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Topup;
use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // HAPUS CONSTRUCTOR INI
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->checkAdmin();
    // }

    public function dashboard()
    {
        $this->checkAdmin(); // Pindahkan check ke setiap method
        
        $stats = [
            'total_products' => Product::count(),
            'pending_topups' => Topup::where('status', 'pending')->count(),
            'pending_services' => ServiceRequest::where('status', 'pending')->count(),
            'total_users' => User::where('role', 'user')->count(),
            'recent_transactions' => Transaction::with('user')->latest()->take(10)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function products()
    {
        $this->checkAdmin(); // Pindahkan check ke setiap method
        
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    private function checkAdmin()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access.');
        }
    }
} 