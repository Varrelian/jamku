<!-- resources/views/admin/topup/index.blade.php -->
@extends('layouts.app')

@section('title', 'Kelola Top Up - Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-money-bill-wave"></i> Kelola Top Up</h2>
        <hr>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Permintaan Top Up</h5>
            </div>
            <div class="card-body">
                @if($topups->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topups as $topup)
                            <tr>
                                <td>{{ $topup->user->name }}<br><small>{{ $topup->user->email }}</small></td>
                                <td>{{ $topup->created_at->format('d/m/Y H:i') }}</td>
                                <td class="fw-bold">Rp {{ number_format($topup->amount, 0, ',', '.') }}</td>
                                <td>
                                    @if($topup->proof)
                                    <a href="{{ $topup->proof_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> Lihat Bukti
                                    </a>
                                    @else
                                    <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $topup->status == 'approved' ? 'success' : ($topup->status == 'rejected' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($topup->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($topup->status == 'pending')
                                    <div class="btn-group">
                                        <form action="{{ route('admin.topup.approve', $topup) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" 
                                                    onclick="return confirm('Approve top up ini?')">
                                                <i class="fas fa-check"></i> Approve
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-danger" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#rejectModal{{ $topup->id }}">
                                            <i class="fas fa-times"></i> Reject
                                        </button>
                                    </div>

                                    <!-- Reject Modal -->
                                    <div class="modal fade" id="rejectModal{{ $topup->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Reject Top Up</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('admin.topup.reject', $topup) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="admin_notes" class="form-label">Alasan Reject</label>
                                                            <textarea class="form-control" id="admin_notes" name="admin_notes" 
                                                                      rows="3" required placeholder="Berikan alasan penolakan..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Reject Top Up</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <span class="text-muted">Tidak ada aksi</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-money-bill-wave fa-3x text-muted mb-3"></i>
                    <h5>Tidak ada permintaan top up</h5>
                    <p class="text-muted">Semua permintaan top up telah diproses.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection