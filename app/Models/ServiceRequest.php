<?php
// app/Models/ServiceRequest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'watch_name',
        'issue_description',
        'replacement_request',
        'deposit',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'deposit' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updateStatus($status, $notes = null)
    {
        $this->update([
            'status' => $status,
            'admin_notes' => $notes,
        ]);
    }
}