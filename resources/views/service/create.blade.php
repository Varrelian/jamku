<!-- resources/views/service/create.blade.php -->
@extends('layouts.app')

@section('title', 'Request Servis')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-tools"></i> Request Servis Jam Tangan</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('service.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="watch_name" class="form-label">Nama/Merk Jam</label>
                        <input type="text" class="form-control @error('watch_name') is-invalid @enderror" 
                               id="watch_name" name="watch_name" value="{{ old('watch_name') }}" required>
                        @error('watch_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="issue_description" class="form-label">Deskripsi Kerusakan</label>
                        <textarea class="form-control @error('issue_description') is-invalid @enderror" 
                                  id="issue_description" name="issue_description" rows="4" required>{{ old('issue_description') }}</textarea>
                        @error('issue_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Jelaskan secara detail masalah yang terjadi pada jam tangan Anda.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="replacement_request" class="form-label">Permintaan Penggantian Sparepart (Opsional)</label>
                        <textarea class="form-control @error('replacement_request') is-invalid @enderror" 
                                  id="replacement_request" name="replacement_request" rows="3">{{ old('replacement_request') }}</textarea>
                        @error('replacement_request')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Sebutkan sparepart yang ingin diganti jika ada.</div>
                    </div>
                    
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle"></i> Informasi Penting:</h6>
                        <ul class="mb-0">
                            <li>Deposit servis sebesar <strong>Rp 50.000</strong> akan langsung dipotong dari saldo AlifPay</li>
                            <li>Admin akan menghubungi Anda untuk konfirmasi biaya servis lebih lanjut</li>
                            <li>Proses servis membutuhkan waktu 3-14 hari tergantung kerumitan</li>
                        </ul>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Kirim Request Servis
                        </button>
                        <a href="{{ route('service.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection