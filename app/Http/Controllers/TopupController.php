<?php
// app/Http/Controllers/TopupController.php

namespace App\Http\Controllers;

use App\Models\Topup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopupController extends Controller
{
    // User methods
    public function index()
    {
        $topups = auth()->user()->topups()->latest()->get();
        return view('topup.index', compact('topups'));
    }

    public function create()
    {
        return view('topup.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10000',
            'proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('proof')) {
            $validated['proof'] = $request->file('proof')->store('topup-proofs', 'public');
        }

        auth()->user()->topups()->create($validated);

        return redirect()->route('topup.index')->with('success', 'Top up request submitted successfully. Waiting for admin approval.');
    }

    // Admin methods
    public function adminIndex()
    {
        $this->checkAdmin();
        $topups = Topup::with('user')->latest()->get();
        return view('admin.topup.index', compact('topups'));
    }

    public function approve(Topup $topup)
    {
        $this->checkAdmin();
        $topup->approve();
        return back()->with('success', 'Top up approved successfully.');
    }

    public function reject(Request $request, Topup $topup)
    {
        $this->checkAdmin();
        
        $request->validate([
            'admin_notes' => 'required|string',
        ]);

        $topup->reject($request->admin_notes);
        return back()->with('success', 'Top up rejected successfully.');
    }

    private function checkAdmin()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access.');
        }
    }
}