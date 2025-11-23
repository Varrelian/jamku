<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 fw-bold" style="color: #212121;">
                        <i class="fas fa-tachometer-alt me-3" style="color: #424242;"></i>
                        Dashboard Admin
                    </h1>
                    <p class="mb-0" style="color: #757575;">Overview sistem dan aktivitas terbaru</p>
                </div>
                <div class="text-end">
                    <span class="badge" style="background: #E0E0E0; color: #616161; padding: 8px 16px; border-radius: 20px;">
                        <i class="fas fa-circle me-2" style="color: #4CAF50; font-size: 0.7rem;"></i>
                        Online
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-5">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card h-100" 
                 style="border: none; border-radius: 15px; background: linear-gradient(135deg, #FAFAFA, #F5F5F5);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1" style="color: #212121;">{{ $stats['total_products'] }}</h3>
                            <p class="mb-0" style="color: #757575; font-weight: 500;">Total Produk</p>
                        </div>
                        <div class="stat-icon" 
                             style="width: 60px; height: 60px; background: linear-gradient(135deg, #E0E0E0, #BDBDBD); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-clock fa-lg" style="color: #424242;"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge" style="background: #E8F5E8; color: #2E7D32; padding: 4px 12px; border-radius: 12px;">
                            <i class="fas fa-trend-up me-1"></i>Active
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card h-100"
                 style="border: none; border-radius: 15px; background: linear-gradient(135deg, #FAFAFA, #F5F5F5);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1" style="color: #212121;">{{ $stats['pending_topups'] }}</h3>
                            <p class="mb-0" style="color: #757575; font-weight: 500;">Top Up Pending</p>
                        </div>
                        <div class="stat-icon"
                             style="width: 60px; height: 60px; background: linear-gradient(135deg, #FFF3E0, #FFE0B2); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-money-bill-wave fa-lg" style="color: #FF9800;"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge" style="background: #FFF3E0; color: #EF6C00; padding: 4px 12px; border-radius: 12px;">
                            <i class="fas fa-clock me-1"></i>Pending
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card h-100"
                 style="border: none; border-radius: 15px; background: linear-gradient(135deg, #FAFAFA, #F5F5F5);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1" style="color: #212121;">{{ $stats['pending_services'] }}</h3>
                            <p class="mb-0" style="color: #757575; font-weight: 500;">Servis Pending</p>
                        </div>
                        <div class="stat-icon"
                             style="width: 60px; height: 60px; background: linear-gradient(135deg, #E3F2FD, #BBDEFB); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-tools fa-lg" style="color: #2196F3;"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge" style="background: #E3F2FD; color: #1565C0; padding: 4px 12px; border-radius: 12px;">
                            <i class="fas fa-clock me-1"></i>Pending
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card h-100"
                 style="border: none; border-radius: 15px; background: linear-gradient(135deg, #FAFAFA, #F5F5F5);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1" style="color: #212121;">{{ $stats['total_users'] }}</h3>
                            <p class="mb-0" style="color: #757575; font-weight: 500;">Total User</p>
                        </div>
                        <div class="stat-icon"
                             style="width: 60px; height: 60px; background: linear-gradient(135deg, #E8F5E8, #C8E6C9); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-users fa-lg" style="color: #4CAF50;"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge" style="background: #E8F5E8; color: #2E7D32; padding: 4px 12px; border-radius: 12px;">
                            <i class="fas fa-users me-1"></i>Registered
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Recent Activities -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card h-100" style="border: none; border-radius: 15px;">
                <div class="card-header" style="background: none; border-bottom: 1px solid #EEEEEE; padding: 1.5rem;">
                    <h5 class="mb-0 fw-bold" style="color: #212121;">
                        <i class="fas fa-history me-2" style="color: #424242;"></i>
                        Aktivitas Terbaru
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($stats['recent_transactions'] as $transaction)
                        <div class="list-group-item border-0 px-4 py-3" 
                             style="border-bottom: 1px solid #F5F5F5 !important; transition: all 0.3s ease;">
                            <div class="d-flex align-items-center">
                                <div class="activity-icon me-3"
                                     style="width: 40px; height: 40px; background: #F5F5F5; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-exchange-alt" style="color: #757575;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1 fw-bold" style="color: #212121;">{{ $transaction->user->name }}</h6>
                                            <p class="mb-1" style="color: #757575; font-size: 0.9rem;">
                                                {{ $transaction->description }}
                                            </p>
                                        </div>
                                        <div class="text-end">
                                            <span class="fw-bold d-block" style="color: #424242;">
                                                Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                            </span>
                                            <small class="text-muted" style="color: #9E9E9E !important;">
                                                {{ $transaction->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card h-100" style="border: none; border-radius: 15px;">
                <div class="card-header" style="background: none; border-bottom: 1px solid #EEEEEE; padding: 1.5rem;">
                    <h5 class="mb-0 fw-bold" style="color: #212121;">
                        <i class="fas fa-cogs me-2" style="color: #424242;"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.products.index') }}" class="btn action-btn d-flex align-items-center p-3"
                           style="background: #FAFAFA; border: 1px solid #E0E0E0; border-radius: 12px; color: #424242; text-decoration: none; transition: all 0.3s ease;">
                            <div class="action-icon me-3"
                                 style="width: 40px; height: 40px; background: linear-gradient(135deg, #E0E0E0, #BDBDBD); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-boxes" style="color: #424242;"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-1 fw-bold" style="color: #212121;">Kelola Produk</h6>
                                <small style="color: #757575;">Manage produk dan stok</small>
                            </div>
                            <i class="fas fa-chevron-right ms-auto" style="color: #9E9E9E;"></i>
                        </a>
                        
                        <a href="{{ route('admin.topup.index') }}" class="btn action-btn d-flex align-items-center p-3"
                           style="background: #FAFAFA; border: 1px solid #E0E0E0; border-radius: 12px; color: #424242; text-decoration: none; transition: all 0.3s ease;">
                            <div class="action-icon me-3"
                                 style="width: 40px; height: 40px; background: linear-gradient(135deg, #FFF3E0, #FFE0B2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-money-bill-wave" style="color: #FF9800;"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-1 fw-bold" style="color: #212121;">Kelola Top Up</h6>
                                <small style="color: #757575;">Approve permintaan top up</small>
                            </div>
                            <i class="fas fa-chevron-right ms-auto" style="color: #9E9E9E;"></i>
                        </a>
                        
                        <a href="{{ route('admin.service.index') }}" class="btn action-btn d-flex align-items-center p-3"
                           style="background: #FAFAFA; border: 1px solid #E0E0E0; border-radius: 12px; color: #424242; text-decoration: none; transition: all 0.3s ease;">
                            <div class="action-icon me-3"
                                 style="width: 40px; height: 40px; background: linear-gradient(135deg, #E3F2FD, #BBDEFB); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-tools" style="color: #2196F3;"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-1 fw-bold" style="color: #212121;">Kelola Servis</h6>
                                <small style="color: #757575;">Manage servis jam</small>
                            </div>
                            <i class="fas fa-chevron-right ms-auto" style="color: #9E9E9E;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .action-btn:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        background: #FFFFFF !important;
        border-color: #BDBDBD !important;
    }
    
    .list-group-item:hover {
        background-color: #FAFAFA;
    }
</style>

<script>
    // Auto refresh stats setiap 30 detik
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(() => {
            // Di sini bisa ditambahkan AJAX untuk auto refresh data
            console.log('Auto refresh dashboard...');
        }, 30000);
    });
</script>
@endsection