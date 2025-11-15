<!-- resources/views/transactions/index.blade.php -->
@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-history"></i> Riwayat Transaksi</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if($transactions->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $transaction->description }}</td>
                                <td>
                                    <span class="badge bg-{{ $transaction->type == 'topup' ? 'success' : ($transaction->type == 'purchase' ? 'primary' : 'info') }}">
                                        {{ ucfirst($transaction->type) }}
                                    </span>
                                </td>
                                <td class="fw-bold {{ $transaction->type == 'topup' ? 'text-success' : 'text-danger' }}">
                                    {{ $transaction->type == 'topup' ? '+' : '-' }} 
                                    Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                </td>
                                <td>
                                    <span class="badge bg-{{ $transaction->status == 'completed' ? 'success' : 'warning' }}">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-receipt fa-3x text-muted mb-3"></i>
                    <h5>Belum ada transaksi</h5>
                    <p class="text-muted">Transaksi Anda akan muncul di sini.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection