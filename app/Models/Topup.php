<?php
// app/Models/Topup.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'proof',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approve()
    {
        $this->user->increment('balance', $this->amount);
        $this->update(['status' => 'approved']);
        
        // Create transaction record
        Transaction::create([
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'type' => 'topup',
            'status' => 'completed',
            'description' => 'Top up saldo AlifPay',
        ]);
    }

    public function reject($notes = null)
    {
        $this->update([
            'status' => 'rejected',
            'admin_notes' => $notes,
        ]);
    }

    public function getProofUrlAttribute()
    {
        return $this->proof ? asset('storage/' . $this->proof) : null;
    }
}