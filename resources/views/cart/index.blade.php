<!-- resources/views/cart/index.blade.php -->
@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-shopping-cart"></i> Keranjang Belanja</h2>
        <hr>
    </div>
</div>

@if($cart && $cart->items->count() > 0)
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Item dalam Keranjang</h5>
            </div>
            <div class="card-body">
                @foreach($cart->items as $item)
                <div class="row align-items-center mb-4 pb-4 border-bottom">
                    <div class="col-md-2">
                        <img src="{{ $item->product->image_url }}" class="img-fluid rounded" alt="{{ $item->product->name }}">
                    </div>
                    <div class="col-md-4">
                        <h6>{{ $item->product->name }}</h6>
                        <small class="text-muted">{{ ucfirst($item->product->type) }}</small>
                    </div>
                    <div class="col-md-2">
                        <span class="fw-bold">Rp {{ number_format($item->product->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                   min="1" max="{{ $item->product->stock }}" 
                                   class="form-control form-control-sm">
                            <button type="submit" class="btn btn-sm btn-outline-primary ms-1">
                                <i class="fas fa-sync"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <span class="fw-bold text-primary">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="col-md-1">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
                
                <div class="d-flex justify-content-between">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i> Kosongkan Keranjang
                        </button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i> Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Ringkasan Belanja</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Total Item:</span>
                    <span>{{ $cart->total_items }} item</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal:</span>
                    <span>Rp {{ number_format($cart->total, 0, ',', '.') }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Ongkos Kirim:</span>
                    <span class="text-success">Gratis</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-3">
                    <strong>Total:</strong>
                    <strong class="text-primary">Rp {{ number_format($cart->total, 0, ',', '.') }}</strong>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Saldo AlifPay:</span>
                        <span class="fw-bold {{ auth()->user()->balance >= $cart->total ? 'text-success' : 'text-danger' }}">
                            Rp {{ number_format(auth()->user()->balance, 0, ',', '.') }}
                        </span>
                    </div>
                    @if(auth()->user()->balance < $cart->total)
                        <small class="text-danger">
                            <i class="fas fa-exclamation-triangle"></i> 
                            Saldo tidak cukup. 
                            <a href="{{ route('topup.create') }}">Top up sekarang</a>
                        </small>
                    @endif
                </div>
                
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg w-100" 
                            {{ auth()->user()->balance < $cart->total ? 'disabled' : '' }}>
                        <i class="fas fa-credit-card"></i> Checkout Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <div class="card text-center py-5">
            <div class="card-body">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                <h4>Keranjang Belanja Kosong</h4>
                <p class="text-muted">Silakan tambahkan produk ke keranjang belanja Anda.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="fas fa-shopping-bag"></i> Mulai Belanja
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection