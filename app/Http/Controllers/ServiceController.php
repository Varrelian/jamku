<?php
// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = auth()->user()->serviceRequests()->latest()->get();
        return view('service.index', compact('services'));
    }

    public function create()
    {
        return view('service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'watch_name' => 'required|string|max:255',
            'issue_description' => 'required|string',
            'replacement_request' => 'nullable|string',
        ]);

        $user = auth()->user();
        $deposit = 50000;

        // Check balance for deposit
        if (!$user->hasSufficientBalance($deposit)) {
            return back()->with('error', 'Insufficient balance for service deposit (Rp 50,000). Please top up your AlifPay account.');
        }

        DB::transaction(function () use ($user, $validated, $deposit) {
            // Deduct deposit
            $user->decrement('balance', $deposit);

            // Create service request
            $service = $user->serviceRequests()->create([
                'watch_name' => $validated['watch_name'],
                'issue_description' => $validated['issue_description'],
                'replacement_request' => $validated['replacement_request'],
                'deposit' => $deposit,
            ]);

            // Create transaction record
            Transaction::create([
                'user_id' => $user->id,
                'amount' => $deposit,
                'type' => 'service',
                'status' => 'completed',
                'description' => 'Service deposit for: ' . $validated['watch_name'],
            ]);
        });

        return redirect()->route('service.index')->with('success', 'Service request submitted successfully. Deposit of Rp 50,000 has been deducted.');
    }

    // Admin methods
    public function adminIndex()
    {
        $this->checkAdmin();
        $services = ServiceRequest::with('user')->latest()->get();
        return view('admin.service.index', compact('services'));
    }

    public function updateStatus(Request $request, ServiceRequest $service)
    {
        $this->checkAdmin();
        
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed,failed',
            'admin_notes' => 'nullable|string',
        ]);

        $service->updateStatus($request->status, $request->admin_notes);

        return back()->with('success', 'Service status updated successfully.');
    }

    private function checkAdmin()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access.');
        }
    }
}