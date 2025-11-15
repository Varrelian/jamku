<!-- resources/views/topup/create.blade.php -->
@extends('layouts.app')

@section('title', 'Top Up Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Top Up AlifPay</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('topup.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah Top Up</label>
                        <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                               id="amount" name="amount" value="{{ old('amount') }}" 
                               min="10000" step="1000" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Minimum top up: Rp 10.000</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="proof" class="form-label">Bukti Transfer</label>
                        <input type="file" class="form-control @error('proof') is-invalid @enderror" 
                               id="proof" name="proof" accept="image/*" required>
                        @error('proof')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Upload bukti transfer (format: JPG, PNG, maksimal 2MB)</div>
                    </div>
                    
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle"></i> Informasi Transfer:</h6>
                        <p class="mb-1"><strong>Bank:</strong> BCA</p>
                        <p class="mb-1"><strong>No. Rekening:</strong> 1234567890</p>
                        <p class="mb-0"><strong>Atas Nama:</strong> Jamtanganku Store</p>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-paper-plane"></i> Kirim Permohonan Top Up
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection