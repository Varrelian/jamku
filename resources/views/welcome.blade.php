<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-fluid px-0">
    <!-- Hero Section -->
    <div class="hero-section" style="background: linear-gradient(135deg, #FAFAFA 0%, #EEEEEE 100%); padding: 120px 0 80px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold mb-4" style="color: #212121;">
                            <i class="fas fa-clock me-3" style="color: #424242;"></i>
                            Selamat Datang di <span style="color: #424242;">Jamtanganku</span>
                        </h1>
                        <p class="lead mb-4" style="color: #616161; font-size: 1.25rem;">
                            Temukan koleksi jam tangan eksklusif dengan kualitas terbaik dan layanan servis profesional dari teknisi berpengalaman.
                        </p>
                        <div class="hero-buttons">
                            <a href="{{ route('products.index') }}" class="btn btn-primary me-3 mb-3" 
                               style="background: linear-gradient(135deg, #424242, #616161); border: none; padding: 12px 30px; font-weight: 600;">
                                <i class="fas fa-shopping-bag me-2"></i>Belanja Sekarang
                            </a>
                            <a href="{{ route('service.index') }}" class="btn btn-outline-secondary mb-3"
                               style="border-color: #BDBDBD; color: #616161; padding: 12px 30px; font-weight: 600;">
                                <i class="fas fa-tools me-2"></i>Servis Jam
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center">
                        <div style="background: linear-gradient(135deg, #E0E0E0, #F5F5F5); border-radius: 20px; padding: 40px; display: inline-block;">
                            <i class="fas fa-clock" style="font-size: 8rem; color: #757575;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section py-5" style="background-color: #FFFFFF;">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card text-center p-4 h-100" 
                         style="border-radius: 15px; background: #FAFAFA; border: 1px solid #EEEEEE; transition: all 0.3s ease;">
                        <div class="feature-icon mb-3">
                            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #E0E0E0, #F5F5F5); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="fas fa-shipping-fast fa-2x" style="color: #616161;"></i>
                            </div>
                        </div>
                        <h5 style="color: #424242; font-weight: 600;">Gratis Ongkir</h5>
                        <p style="color: #757575; margin: 0;">Gratis pengiriman untuk pembelian di atas Rp 500.000</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center p-4 h-100"
                         style="border-radius: 15px; background: #FAFAFA; border: 1px solid #EEEEEE; transition: all 0.3s ease;">
                        <div class="feature-icon mb-3">
                            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #E0E0E0, #F5F5F5); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="fas fa-shield-alt fa-2x" style="color: #616161;"></i>
                            </div>
                        </div>
                        <h5 style="color: #424242; font-weight: 600;">Garansi Resmi</h5>
                        <p style="color: #757575; margin: 0;">Semua produk dilengkapi dengan garansi resmi 1-2 tahun</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center p-4 h-100"
                         style="border-radius: 15px; background: #FAFAFA; border: 1px solid #EEEEEE; transition: all 0.3s ease;">
                        <div class="feature-icon mb-3">
                            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #E0E0E0, #F5F5F5); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="fas fa-tools fa-2x" style="color: #616161;"></i>
                            </div>
                        </div>
                        <h5 style="color: #424242; font-weight: 600;">Servis Profesional</h5>
                        <p style="color: #757575; margin: 0;">Layanan servis jam tangan oleh teknisi berpengalaman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    @if(isset($products) && $products->count() > 0)
    <div class="products-section py-5" style="background: linear-gradient(135deg, #F5F5F5 0%, #FAFAFA 100%);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="display-5 fw-bold" style="color: #212121;">Produk Terbaru</h2>
                    <p class="lead" style="color: #616161;">Temukan koleksi jam tangan terbaru kami</p>
                </div>
            </div>
            
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="product-card h-100" 
                         style="background: #FFFFFF; border-radius: 15px; border: 1px solid #EEEEEE; overflow: hidden; transition: all 0.3s ease;">
                        <div class="product-image position-relative">
                            <img src="{{ $product->image_url }}" class="w-100" alt="{{ $product->name }}" 
                                 style="height: 220px; object-fit: cover; background-color: #FAFAFA;">
                            <div class="product-badge position-absolute top-0 end-0 m-3">
                                <span class="badge" 
                                      style="background: linear-gradient(135deg, #616161, #424242); color: white; padding: 8px 12px; border-radius: 20px;">
                                    {{ ucfirst($product->type) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="product-content p-4">
                            <h5 class="fw-bold mb-2" style="color: #212121;">{{ $product->name }}</h5>
                            <p class="mb-3" style="color: #757575; font-size: 0.9rem;">
                                {{ Str::limit($product->description, 80) }}
                            </p>
                            
                            <div class="product-meta d-flex justify-content-between align-items-center mb-3">
                                <span class="h5 fw-bold" style="color: #424242; margin: 0;">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                <small class="text-muted" style="color: #9E9E9E !important;">
                                    Stok: {{ $product->stock }}
                                </small>
                            </div>
                            
                            <div class="product-actions">
                                @auth
                                    @if(!auth()->user()->isAdmin())
                                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                            @csrf
                                            <div class="input-group">
                                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                                       class="form-control" style="border-color: #E0E0E0; border-radius: 8px 0 0 8px;">
                                                <button type="submit" class="btn" 
                                                        style="background: linear-gradient(135deg, #424242, #616161); border: none; color: white; border-radius: 0 8px 8px 0;">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <button class="btn w-100" disabled
                                                style="background: #E0E0E0; color: #9E9E9E; border: none; border-radius: 8px;">
                                            Admin Mode
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn w-100" 
                                       style="background: linear-gradient(135deg, #BDBDBD, #9E9E9E); border: none; color: white; border-radius: 8px;">
                                        Login untuk Beli
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-5">
                <a href="{{ route('products.index') }}" class="btn btn-lg"
                   style="background: linear-gradient(135deg, #424242, #616161); border: none; color: white; padding: 12px 40px; font-weight: 600; border-radius: 10px;">
                    <i class="fas fa-eye me-2"></i>Lihat Semua Produk
                </a>
            </div>
        </div>
    </div>
    @else
    <div class="no-products py-5" style="background-color: #FAFAFA;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center py-5">
                    <div class="no-products-icon mb-4">
                        <i class="fas fa-clock" style="font-size: 4rem; color: #BDBDBD;"></i>
                    </div>
                    <h4 style="color: #616161;">Belum ada produk tersedia</h4>
                    <p style="color: #9E9E9E;">Silakan hubungi administrator untuk menambahkan produk.</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border-color: #E0E0E0;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
</style>

<script>
    // Smooth scroll untuk anchor links
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
@endsection