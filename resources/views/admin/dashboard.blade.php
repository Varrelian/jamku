<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-tachometer-alt"></i> Dashboard Admin</h2>
        <hr>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['total_products'] }}</h4>
                        <p>Total Produk</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['pending_topups'] }}</h4>
                        <p>Top Up Pending</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-money-bill-wave fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['pending_services'] }}</h4>
                        <p>Servis Pending</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-tools fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['total_users'] }}</h4>
                        <p>Total User</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-history"></i> Aktivitas Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach($stats['recent_transactions'] as $transaction)
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">{{ $transaction->user->name }}</h6>
                            <small>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</small>
                        </div>
                        <p class="mb-1">{{ $transaction->description }}</p>
                        <small class="text-muted">{{ $transaction->created_at->diffForHumans() }}</small>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-cogs"></i> Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-boxes"></i> Kelola Produk
                    </a>
                    <a href="{{ route('admin.topup.index') }}" class="btn btn-outline-warning">
                        <i class="fas fa-money-bill-wave"></i> Kelola Top Up
                    </a>
                    <a href="{{ route('admin.service.index') }}" class="btn btn-outline-info">
                        <i class="fas fa-tools"></i> Kelola Servis
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection