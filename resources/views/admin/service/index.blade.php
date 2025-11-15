<!-- resources/views/admin/service/index.blade.php -->
@extends('layouts.app')

@section('title', 'Kelola Servis - Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-tools"></i> Kelola Servis Jam</h2>
        <hr>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Permintaan Servis</h5>
            </div>
            <div class="card-body">
                @if($services->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Nama Jam</th>
                                <th>Kerusakan</th>
                                <th>Penggantian</th>
                                <th>Deposit</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>
                                    {{ $service->user->name }}<br>
                                    <small>{{ $service->user->email }}</small>
                                </td>
                                <td>{{ $service->watch_name }}</td>
                                <td>{{ Str::limit($service->issue_description, 50) }}</td>
                                <td>{{ $service->replacement_request ?: '-' }}</td>
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
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#statusModal{{ $service->id }}">
                                        <i class="fas fa-edit"></i> Update Status
                                    </button>

                                    <!-- Status Modal -->
                                    <div class="modal fade" id="statusModal{{ $service->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Status Servis</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('admin.service.update-status', $service) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select class="form-select" id="status" name="status" required>
                                                                <option value="pending" {{ $service->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                <option value="in_progress" {{ $service->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                                <option value="completed" {{ $service->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                                <option value="failed" {{ $service->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="admin_notes" class="form-label">Catatan Admin</label>
                                                            <textarea class="form-control" id="admin_notes" name="admin_notes" 
                                                                      rows="3" placeholder="Berikan update progress servis...">{{ old('admin_notes', $service->admin_notes) }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Update Status</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-tools fa-3x text-muted mb-3"></i>
                    <h5>Tidak ada permintaan servis</h5>
                    <p class="text-muted">Semua permintaan servis telah diproses.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection