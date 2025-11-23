<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Jamtanganku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background: linear-gradient(135deg, #FAFAFA 0%, #F5F5F5 100%);
            border-bottom: 1px solid #EEEEEE;
            transition: all 0.3s ease;
        }
        
        .navbar-scrolled {
            background: rgba(250, 250, 250, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }
        
        .nav-link-custom {
            color: #424242 !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .nav-link-custom:hover {
            color: #212121 !important;
            background-color: #EEEEEE;
            transform: translateY(-1px);
        }
        
        .nav-link-custom.active {
            color: #212121 !important;
            background-color: #E0E0E0;
        }
        
        .brand-custom {
            color: #212121 !important;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .brand-custom i {
            color: #424242;
            margin-right: 0.5rem;
        }
        
        .badge-custom {
            background: linear-gradient(135deg, #616161, #424242);
            font-size: 0.7rem;
        }
        
        .balance-badge {
            background: linear-gradient(135deg, #757575, #616161);
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }
        
        .dropdown-custom {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: 0.75rem;
            margin-top: 0.5rem;
        }
        
        .dropdown-item-custom {
            color: #424242;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
        }
        
        .dropdown-item-custom:hover {
            background-color: #F5F5F5;
            color: #212121;
            transform: translateX(5px);
        }
        
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: linear-gradient(135deg, #BDBDBD, #9E9E9E);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .nav-cart-wrapper {
            position: relative;
        }
    </style>
    @stack('styles')
</head>
<body style="background-color: #FAFAFA;">
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand brand-custom" href="/">
                <i class="fas fa-clock"></i> Jamtanganku
            </a>
            
            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="color: #424242;">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
            
            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Left Menu -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}" 
                           href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('products.*') ? 'active' : '' }}" 
                           href="{{ route('products.index') }}">
                            <i class="fas fa-shopping-bag me-1"></i> Produk
                        </a>
                    </li>
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link nav-link-custom {{ request()->routeIs('admin.*') ? 'active' : '' }}" 
                                   href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-1"></i> Dashboard Admin
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
                
                <!-- Right Menu -->
                <ul class="navbar-nav align-items-center">
                    @auth
                        <!-- Cart (Non-Admin) -->
                        @if(!auth()->user()->isAdmin())
                            <li class="nav-item me-3">
                                <a class="nav-link nav-link-custom nav-cart-wrapper position-relative" 
                                   href="{{ route('cart.index') }}">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="cart-badge" id="cart-count">
                                        {{ auth()->user()->cart->total_items ?? 0 }}
                                    </span>
                                </a>
                            </li>
                            
                            <!-- Transaction History -->
                            <li class="nav-item me-3">
                                <a class="nav-link nav-link-custom {{ request()->routeIs('transactions.*') ? 'active' : '' }}" 
                                   href="{{ route('transactions.index') }}">
                                    <i class="fas fa-history me-1"></i> Riwayat
                                </a>
                            </li>
                        @endif
                        
                        <!-- User Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle d-flex align-items-center" 
                               href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-2"></i>
                                <span class="me-2">{{ auth()->user()->name }}</span>
                                @if(!auth()->user()->isAdmin())
                                    <span class="balance-badge badge">
                                        Rp {{ number_format(auth()->user()->balance, 0, ',', '.') }}
                                    </span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-custom">
                                @if(!auth()->user()->isAdmin())
                                    <li>
                                        <a class="dropdown-item dropdown-item-custom" href="{{ route('topup.index') }}">
                                            <i class="fas fa-wallet me-2"></i> Top Up Saldo
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item dropdown-item-custom" href="{{ route('service.index') }}">
                                            <i class="fas fa-tools me-2"></i> Servis Jam
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item dropdown-item-custom w-100 text-start">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- Guest Menu -->
                        <li class="nav-item me-2">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('login') ? 'active' : '' }}" 
                               href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('register') ? 'active' : '' }}" 
                               href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i> Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="margin-top: 76px;">
        <div class="container">
            <!-- Notifications -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" 
                     style="border: none; border-radius: 0.75rem; background: linear-gradient(135deg, #E8F5E8, #C8E6C9);">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                     style="border: none; border-radius: 0.75rem; background: linear-gradient(135deg, #FFEBEE, #FFCDD2);">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Navbar scroll effect
        $(window).scroll(function() {
            if ($(window).scrollTop() > 50) {
                $('#mainNavbar').addClass('navbar-scrolled');
            } else {
                $('#mainNavbar').removeClass('navbar-scrolled');
            }
        });

        // Active state management
        $(document).ready(function() {
            const currentPath = window.location.pathname;
            $('.nav-link-custom').each(function() {
                const linkPath = $(this).attr('href');
                if (currentPath === linkPath || (linkPath !== '/' && currentPath.startsWith(linkPath))) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>