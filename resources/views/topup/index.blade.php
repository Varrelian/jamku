<!-- resources/views/topup/index.blade.php -->
@extends('layouts.app')

@section('title', 'Top Up AlifPay')

@section('content')
<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-wallet"></i> Top Up AlifPay</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Riwayat Top Up</h5>
            </div>
            <div class="card-body">
                @if($topups->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Catatan Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topups as $topup)
                            <tr>
                                <td>{{ $topup->created_at->format('d/m/Y H:i') }}</td>
                                <td class="fw-bold">Rp {{ number_format($topup->amount, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-{{ $topup->status == 'approved' ? 'success' : ($topup->status == 'rejected' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($topup->status) }}
                                    </span>
                                </td>
                                <td>{{ $topup->admin_notes ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-money-bill-wave fa-3x text-muted mb-3"></i>
                    <h5>Belum ada riwayat top up</h5>
                    <p class="text-muted">Top up pertama Anda akan muncul di sini.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Saldo Saat Ini</h5>
            </div>
            <div class="card-body text-center">
                <h3 class="text-primary">Rp {{ number_format(auth()->user()->balance, 0, ',', '.') }}</h3>
                <p class="text-muted">Saldo AlifPay Anda</p>
                <a href="{{ route('topup.create') }}" class="btn btn-primary w-100">
                    <i class="fas fa-plus"></i> Top Up Sekarang
                </a>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Cara Top Up</h5>
            </div>
            <div class="card-body">
                <ol>
                    <li>Transfer ke rekening BCA: <strong>1234567890 (Jamtanganku)</strong></li>
                    <li>Upload bukti transfer</li>
                    <li>Tunggu approval admin (1x24 jam)</li>
                    <li>Saldo akan ditambahkan ke akun Anda</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection