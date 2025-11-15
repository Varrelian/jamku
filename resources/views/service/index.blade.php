<!-- resources/views/service/index.blade.php -->
@extends('layouts.app')

@section('title', 'Servis Jam Tangan')

@section('content')
<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-tools"></i> Servis Jam Tangan</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Riwayat Servis</h5>
                <a href="{{ route('service.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Request Servis Baru
                </a>
            </div>
            <div class="card-body">
                @if($services->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Jam</th>
                                <th>Kerusakan</th>
                                <th>Deposit</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->created_at->format('d/m/Y') }}</td>
                                <td>{{ $service->watch_name }}</td>
                                <td>{{ Str::limit($service->issue_description, 50) }}</td>
                                <td>Rp {{ number_format($service->deposit, 0, ',', '.') }}</td>
                                <td>
                                    @php
                                        $statusColors = [
                                            'pending' => 'warning',
                                            'in_progress' => 'info', 
                                            'completed' => 'success',
                                            'failed' => 'danger'
                                        ];
                                    @endphp
                                    <span class="badge bg-{{ $statusColors[$service->status] }}">
                                        {{ ucfirst(str_replace('_', ' ', $service->status)) }}
                                    </span>
                                </td>
                                <td>{{ $service->admin_notes ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-tools fa-3x text-muted mb-3"></i>
                    <h5>Belum ada riwayat servis</h5>
                    <p class="text-muted">Request servis pertama Anda akan muncul di sini.</p>
                    <a href="{{ route('service.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Request Servis
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Servis</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6><i class="fas fa-info-circle text-primary"></i> Biaya Servis</h6>
                    <ul class="list-unstyled">
                        <li>• Deposit: Rp 50.000</li>
                        <li>• Service ringan: Rp 100.000 - 300.000</li>
                        <li>• Service berat: Rp 300.000 - 1.000.000</li>
                        <li>• Ganti sparepart: Menyesuaikan</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-clock text-primary"></i> Waktu Pengerjaan</h6>
                    <ul class="list-unstyled">
                        <li>• Service ringan: 3-5 hari</li>
                        <li>• Service berat: 7-14 hari</li>
                        <li>• Dengan sparepart: 14-21 hari</li>
                    </ul>
                </div>
                
                <div class="alert alert-warning">
                    <small>
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Perhatian:</strong> Deposit akan digunakan sebagai biaya servis awal dan tidak dapat dikembalikan.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection