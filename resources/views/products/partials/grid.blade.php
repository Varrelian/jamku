<!-- resources/views/products/partials/grid.blade.php -->
<div class="row">
    @forelse($products as $product)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 product-card shadow-sm">
            <div class="position-relative">
                <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}" 
                     style="height: 250px; object-fit: cover;">
                <div class="position-absolute top-0 end-0 m-2">
                    <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                        {{ $product->stock > 0 ? 'Stok: ' . $product->stock : 'Stok Habis' }}
                    </span>
                </div>
                <div class="position-absolute top-0 start-0 m-2">
                    <span class="badge bg-info">{{ ucfirst($product->type) }}</span>
                </div>
            </div>
            
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ Str::limit($product->name, 50) }}</h5>
                <p class="card-text text-muted flex-grow-1">
                    {{ Str::limit($product->description, 100) }}
                </p>
                
                <div class="mt-auto">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="h5 text-primary mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-eye"></i> Detail Produk
                        </a>
                        
                        @auth
                            @if(!auth()->user()->isAdmin() && $product->stock > 0)
                                <form action="{{ route('cart.add', $product) }}" method="POST" class="d-grid">
                                    @csrf
                                    <div class="input-group input-group-sm">
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                               class="form-control" style="max-width: 80px;">
                                        <button type="submit" class="btn btn-primary flex-grow-1">
                                            <i class="fas fa-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            @elseif(auth()->user()->isAdmin())
                                <div class="btn-group w-100">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Hapus produk ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @elseif($product->stock == 0)
                                <button class="btn btn-secondary btn-sm w-100" disabled>
                                    <i class="fas fa-times-circle"></i> Stok Habis
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-sign-in-alt"></i> Login untuk Beli
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            
            <div class="card-footer bg-transparent">
                <small class="text-muted">
                    <i class="fas fa-calendar"></i> 
                    Ditambahkan: {{ $product->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4>Produk tidak ditemukan</h4>
                <p class="text-muted">Tidak ada produk yang sesuai dengan pencarian Anda.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="fas fa-redo"></i> Lihat Semua Produk
                </a>
            </div>
        </div>
    </div>
    @endforelse
</div>

@if(isset($products) && $products instanceof \Illuminate\Pagination\LengthAwarePaginator && $products->hasPages())
<div class="row mt-4">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endif

@push('styles')
<style>
.product-card {
    transition: all 0.3s ease;
    border: none;
}
.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}
.card-img-top {
    transition: transform 0.3s ease;
}
.product-card:hover .card-img-top {
    transform: scale(1.05);
}
</style>
@endpush