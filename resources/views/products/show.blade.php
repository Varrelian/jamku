<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ $product->image_url }}" class="img-fluid rounded" alt="{{ $product->name }}">
    </div>
    <div class="col-md-6">
        <h2>{{ $product->name }}</h2>
        <div class="mb-3">
            <span class="badge bg-primary">{{ ucfirst($product->type) }}</span>
            <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                {{ $product->stock > 0 ? 'Stok Tersedia' : 'Stok Habis' }}
            </span>
        </div>
        
        <h3 class="text-primary mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
        
        <p class="lead">{{ $product->description }}</p>
        
        <div class="mb-4">
            <h5>Spesifikasi:</h5>
            <ul>
                <li>Jenis: {{ ucfirst($product->type) }}</li>
                <li>Stok: {{ $product->stock }} unit</li>
                <li>Garansi: 2 tahun resmi</li>
                <li>Pengiriman: Gratis ongkir</li>
            </ul>
        </div>

        @auth
            @if(!auth()->user()->isAdmin())
                @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="quantity" class="form-label">Jumlah:</label>
                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                       class="form-control" id="quantity">
                            </div>
                            <div class="col-md-8 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <button class="btn btn-secondary btn-lg w-100" disabled>
                        <i class="fas fa-times-circle"></i> Stok Habis
                    </button>
                @endif
            @else
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Produk
                    </a>
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100">
                <i class="fas fa-sign-in-alt"></i> Login untuk Membeli
            </a>
        @endauth
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <h4>Produk Lainnya</h4>
        <div class="row">
            @foreach($relatedProducts as $related)
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <img src="{{ $related->image_url }}" class="card-img-top" alt="{{ $related->name }}" style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title">{{ Str::limit($related->name, 50) }}</h6>
                        <p class="card-text text-primary fw-bold">Rp {{ number_format($related->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $related) }}" class="btn btn-outline-primary btn-sm w-100">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Update product show method to include related products
</script>
@endpush