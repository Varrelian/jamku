<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="jumbotron bg-primary text-white p-5 rounded mb-4">
            <h1 class="display-4"><i class="fas fa-clock"></i> Selamat Datang di Jamtanganku</h1>
            <p class="lead">Toko jam tangan terpercaya dengan koleksi terbaik dan layanan servis profesional.</p>
            <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">Belanja Sekarang</a>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i>
                <h5>Gratis Ongkir</h5>
                <p>Gratis pengiriman untuk pembelian di atas Rp 500.000</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <i class="fas fa-shield-alt fa-3x text-success mb-3"></i>
                <h5>Garansi Resmi</h5>
                <p>Semua produk dilengkapi dengan garansi resmi</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <i class="fas fa-tools fa-3x text-warning mb-3"></i>
                <h5>Servis Profesional</h5>
                <p>Layanan servis jam tangan oleh teknisi berpengalaman</p>
            </div>
        </div>
    </div>
</div>

@if(isset($products) && $products->count() > 0)
    <h2 class="mb-4">Produk Terbaru</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="badge bg-secondary">{{ ucfirst($product->type) }}</span>
                    </div>
                </div>
                <div class="card-footer">
                    @auth
                        @if(!auth()->user()->isAdmin())
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">Login untuk Beli</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="text-center mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Lihat Semua Produk</a>
    </div>
@else
    <div class="alert alert-info text-center">
        <h4>Belum ada produk tersedia</h4>
        <p>Silakan hubungi administrator untuk menambahkan produk.</p>
    </div>
@endif
@endsection