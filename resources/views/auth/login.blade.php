<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login - Power Mode')

@section('content')
<div class="container-fluid">
    <div class="row vh-100">
        <!-- Left Side - Animated Background -->
        <div class="col-lg-8 d-none d-lg-block p-0">
            <div class="auth-bg position-relative h-100">
                <div class="floating-watches">
                    <div class="watch watch-1" data-speed="2">
                        <div class="watch-face">
                            <div class="watch-hands">
                                <div class="hand hour-hand"></div>
                                <div class="hand minute-hand"></div>
                                <div class="hand second-hand"></div>
                            </div>
                        </div>
                    </div>
                    <div class="watch watch-2" data-speed="1.5">
                        <div class="watch-face">
                            <div class="watch-hands">
                                <div class="hand hour-hand"></div>
                                <div class="hand minute-hand"></div>
                                <div class="hand second-hand"></div>
                            </div>
                        </div>
                    </div>
                    <div class="watch watch-3" data-speed="3">
                        <div class="watch-face">
                            <div class="watch-hands">
                                <div class="hand hour-hand"></div>
                                <div class="hand minute-hand"></div>
                                <div class="hand second-hand"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-particles">
                    <div class="particle"></div>
                    <div class="particle"></div>
                    <div class="particle"></div>
                    <div class="particle"></div>
                    <div class="particle"></div>
                </div>

                <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
                    <h1 class="display-3 fw-bold mb-4">TIME <span class="text-warning">PERFECTION</span></h1>
                    <p class="fs-5 opacity-75">Every Second Counts in Style</p>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="col-lg-4 d-flex align-items-center justify-content-center bg-dark">
            <div class="w-100 px-4" style="max-width: 400px;">
                <!-- Logo & Header -->
                <div class="text-center mb-5">
                    <div class="logo-container mb-4">
                        <i class="fas fa-clock fa-3x text-warning mb-3"></i>
                        <h2 class="text-white fw-bold">CHRONO<span class="text-warning">ELITE</span></h2>
                    </div>
                    <h4 class="text-white mb-2">Welcome Back</h4>
                    <p class="text-white-50">Sign in to your account</p>
                </div>

                <!-- Login Form -->
                <div class="card border-0 bg-transparent">
                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" id="powerForm">
                            @csrf
                            
                            <!-- Email Field -->
                            <div class="form-group power-input mb-4">
                                <label class="text-white mb-2 fw-semibold">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-warning text-warning">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control bg-dark border-warning text-white power-field" 
                                           name="email" value="{{ old('email') }}" 
                                           placeholder="Enter your email" required>
                                </div>
                                <div class="power-line"></div>
                            </div>

                            <!-- Password Field -->
                            <div class="form-group power-input mb-4">
                                <label class="text-white mb-2 fw-semibold">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-warning text-warning">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control bg-dark border-warning text-white power-field" 
                                           name="password" id="password" 
                                           placeholder="Enter your password" required>
                                    <button type="button" class="btn btn-outline-warning border-warning" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="power-line"></div>
                            </div>

                            <!-- Remember & Forgot -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input border-warning bg-dark" id="remember" name="remember">
                                    <label class="form-check-label text-white" for="remember">Remember me</label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-warning text-decoration-none">
                                    Forgot Password?
                                </a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-warning w-100 py-3 fw-bold power-btn mb-4" id="loginBtn">
                                <span class="btn-text">SIGN IN</span>
                                <div class="btn-loader d-none">
                                    <div class="spinner-border spinner-border-sm me-2"></div>
                                    Authenticating...
                                </div>
                            </button>

                            <!-- Social Login -->
                            <div class="text-center mb-4">
                                <p class="text-white-50 mb-3">Or continue with</p>
                                <div class="d-flex justify-content-center gap-3">
                                    <button type="button" class="btn btn-outline-warning social-btn">
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-warning social-btn">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-warning social-btn">
                                        <i class="fab fa-apple"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="text-white-50 mb-0">
                                    Don't have an account? 
                                    <a href="{{ route('register') }}" class="text-warning fw-bold text-decoration-none">
                                        Create Account
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.auth-bg {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
    overflow: hidden;
}

/* Floating Watches Animation */
.floating-watches {
    position: absolute;
    width: 100%;
    height: 100%;
}

.watch {
    position: absolute;
    width: 80px;
    height: 80px;
    border: 2px solid rgba(255, 193, 7, 0.3);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.watch-1 { top: 20%; left: 10%; animation-delay: 0s; }
.watch-2 { top: 60%; left: 80%; animation-delay: 2s; }
.watch-3 { top: 80%; left: 20%; animation-delay: 4s; }

.watch-face {
    position: relative;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.05);
}

.hand {
    position: absolute;
    background: #ffc107;
    transform-origin: bottom center;
    border-radius: 2px;
}

.hour-hand { 
    width: 3px; 
    height: 20px; 
    top: 20px; 
    left: 50%; 
    transform: translateX(-50%);
    animation: rotate-hour 360s linear infinite;
}

.minute-hand { 
    width: 2px; 
    height: 30px; 
    top: 10px; 
    left: 50%; 
    transform: translateX(-50%);
    animation: rotate-minute 60s linear infinite;
}

.second-hand { 
    width: 1px; 
    height: 35px; 
    top: 5px; 
    left: 50%; 
    transform: translateX(-50%);
    animation: rotate-second 1s linear infinite;
    background: #ff6b6b;
}

/* Background Particles */
.bg-particles {
    position: absolute;
    width: 100%;
    height: 100%;
}

.particle {
    position: absolute;
    background: rgba(255, 193, 7, 0.1);
    border-radius: 50%;
    animation: particle-float 8s ease-in-out infinite;
}

.particle:nth-child(1) { 
    width: 10px; height: 10px; top: 10%; left: 20%; 
    animation-delay: 0s; 
}
.particle:nth-child(2) { 
    width: 15px; height: 15px; top: 30%; left: 70%; 
    animation-delay: 1s; 
}
.particle:nth-child(3) { 
    width: 8px; height: 8px; top: 70%; left: 40%; 
    animation-delay: 2s; 
}
.particle:nth-child(4) { 
    width: 12px; height: 12px; top: 50%; left: 10%; 
    animation-delay: 3s; 
}
.particle:nth-child(5) { 
    width: 6px; height: 6px; top: 80%; left: 80%; 
    animation-delay: 4s; 
}

/* Power Input Effects */
.power-input {
    position: relative;
}

.power-field {
    border: 1px solid #495057;
    transition: all 0.3s ease;
}

.power-field:focus {
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
    background-color: #1a1a1a !important;
}

.power-line {
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: #ffc107;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.power-field:focus ~ .power-line {
    width: 100%;
}

/* Power Button */
.power-btn {
    position: relative;
    overflow: hidden;
    border: none;
    background: linear-gradient(45deg, #ffc107, #ff8c00);
    transition: all 0.3s ease;
}

.power-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 193, 7, 0.4);
}

.power-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s;
}

.power-btn:hover::before {
    left: 100%;
}

/* Social Buttons */
.social-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.social-btn:hover {
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
}

/* Animations */
@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(10deg); }
}

@keyframes particle-float {
    0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
    50% { transform: translateY(-20px) scale(1.2); opacity: 0.8; }
}

@keyframes rotate-hour {
    from { transform: translateX(-50%) rotate(0deg); }
    to { transform: translateX(-50%) rotate(360deg); }
}

@keyframes rotate-minute {
    from { transform: translateX(-50%) rotate(0deg); }
    to { transform: translateX(-50%) rotate(360deg); }
}

@keyframes rotate-second {
    from { transform: translateX(-50%) rotate(0deg); }
    to { transform: translateX(-50%) rotate(360deg); }
}

/* Responsive */
@media (max-width: 991px) {
    .d-none.d-lg-block {
        display: none !important;
    }
    
    .col-lg-4 {
        width: 100%;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle Password Visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    
    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password' ? 
            '<i class="fas fa-eye"></i>' : 
            '<i class="fas fa-eye-slash"></i>';
    });

    // Power Form Submission
    const powerForm = document.getElementById('powerForm');
    const loginBtn = document.getElementById('loginBtn');
    const btnText = loginBtn.querySelector('.btn-text');
    const btnLoader = loginBtn.querySelector('.btn-loader');

    powerForm.addEventListener('submit', function(e) {
        btnText.classList.add('d-none');
        btnLoader.classList.remove('d-none');
        loginBtn.disabled = true;
        
        // Simulate loading for demo
        setTimeout(() => {
            if(!e.defaultPrevented) {
                btnText.classList.remove('d-none');
                btnLoader.classList.add('d-none');
                loginBtn.disabled = false;
            }
        }, 2000);
    });

    // Input focus effects
    const powerFields = document.querySelectorAll('.power-field');
    powerFields.forEach(field => {
        field.addEventListener('focus', function() {
            this.parentElement.parentElement.classList.add('focused');
        });
        
        field.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.parentElement.classList.remove('focused');
            }
        });
    });

    // Social button animations
    const socialBtns = document.querySelectorAll('.social-btn');
    socialBtns.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.1)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
</script>
@endpush