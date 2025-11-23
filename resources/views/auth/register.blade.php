<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('title', 'Register - Join the Elite')

@section('content')
<div class="container-fluid">
    <div class="row vh-100">
        <!-- Left Side - Animated Background -->
        <div class="col-lg-8 d-none d-lg-block p-0">
            <div class="auth-bg position-relative h-100">
                <!-- Luxury Watches Showcase -->
                <div class="watches-showcase">
                    <div class="luxury-watch watch-1" data-speed="1.2">
                        <div class="watch-body">
                            <div class="watch-dial">
                                <div class="watch-brand">ROLEX</div>
                                <div class="watch-hands">
                                    <div class="hand hour-hand"></div>
                                    <div class="hand minute-hand"></div>
                                    <div class="hand second-hand"></div>
                                </div>
                                <div class="watch-diamonds"></div>
                            </div>
                            <div class="watch-strap"></div>
                        </div>
                    </div>
                    <div class="luxury-watch watch-2" data-speed="1.8">
                        <div class="watch-body">
                            <div class="watch-dial">
                                <div class="watch-brand">OMEGA</div>
                                <div class="watch-hands">
                                    <div class="hand hour-hand"></div>
                                    <div class="hand minute-hand"></div>
                                    <div class="hand second-hand"></div>
                                </div>
                                <div class="watch-pearls"></div>
                            </div>
                            <div class="watch-strap gold"></div>
                        </div>
                    </div>
                    <div class="luxury-watch watch-3" data-speed="2.3">
                        <div class="watch-body">
                            <div class="watch-dial">
                                <div class="watch-brand">PATEK</div>
                                <div class="watch-hands">
                                    <div class="hand hour-hand"></div>
                                    <div class="hand minute-hand"></div>
                                    <div class="hand second-hand"></div>
                                </div>
                                <div class="watch-complications"></div>
                            </div>
                            <div class="watch-strap leather"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Floating Elements -->
                <div class="floating-elements">
                    <div class="element gear-1"></div>
                    <div class="element gear-2"></div>
                    <div class="element crown"></div>
                    <div class="element spring"></div>
                    <div class="element diamond"></div>
                </div>

                <!-- Background Glow -->
                <div class="bg-glow"></div>

                <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
                    <h1 class="display-3 fw-bold mb-4">YUKS  <span class="text-warning">GABUNG</span></h1>
                    <p class="fs-5 opacity-75">dimana ppun dan kapapun jamku buka 24 jam</p>
                    <div class="features-list mt-5">
                        <div class="feature-item">
                            servis jam
                        </div>
                        <div class="feature-item">
                            beli jam
                        </div>
                        <div class="feature-item">
                            semua tentang jam 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="col-lg-4 d-flex align-items-center justify-content-center bg-dark">
            <div class="w-100 px-4" style="max-width: 450px;">
                <!-- Logo & Header -->
                <div class="text-center mb-5">
                    <div class="logo-container mb-4">
                        <i class="fas fa-crown fa-3x text-warning mb-3"></i>
                        <h2 class="text-white fw-bold">JAM<span class="text-warning">KU</span></h2>
                    </div>
                    <h4 class="text-white mb-2">Create Your Account</h4>
                    <p class="text-white-50">segera gabung jamku</p>
                </div>

                <!-- Register Form -->
                <div class="card border-0 bg-transparent">
                    <div class="card-body p-0">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Please check the form below for errors
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" id="powerRegisterForm">
                            @csrf
                            
                            <!-- Name Field -->
                            <div class="form-group power-input mb-4">
                                <label class="text-white mb-2 fw-semibold">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-warning text-warning">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control bg-dark border-warning text-white power-field" 
                                           name="name" value="{{ old('name') }}" 
                                           placeholder="Enter your full name" required>
                                </div>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <div class="power-line"></div>
                            </div>

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
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
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
                                           placeholder="Create strong password" required>
                                    <button type="button" class="btn btn-outline-warning border-warning" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-strength mt-2">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar" id="passwordStrength" role="progressbar"></div>
                                    </div>
                                    <small class="text-white-50" id="passwordText">Password strength</small>
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <div class="power-line"></div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group power-input mb-4">
                                <label class="text-white mb-2 fw-semibold">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-warning text-warning">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control bg-dark border-warning text-white power-field" 
                                           name="password_confirmation" id="password_confirmation" 
                                           placeholder="Confirm your password" required>
                                    <button type="button" class="btn btn-outline-warning border-warning" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-match mt-2">
                                    <small class="text-white-50" id="passwordMatchText"></small>
                                </div>
                                <div class="power-line"></div>
                            </div>

                            <!-- Terms Agreement -->
                            <div class="form-check mb-4">
                                <input type="checkbox" class="form-check-input border-warning bg-dark" id="terms" name="terms" required>
                                <label class="form-check-label text-white" for="terms">
                                    I agree to the <a href="#" class="text-warning">Terms of Service</a> and <a href="#" class="text-warning">Privacy Policy</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-warning w-100 py-3 fw-bold power-btn mb-4" id="registerBtn">
                                <span class="btn-text">CREATE JAMKU ACCOUNT</span>
                                <div class="btn-loader d-none">
                                    <div class="spinner-border spinner-border-sm me-2"></div>
                                    Creating Your Legacy...
                                </div>
                            </button>

                            <!-- Divider -->
                            <div class="text-center mb-4">
                                <div class="divider">
                                    <span class="text-white-50">or continue with</span>
                                </div>
                            </div>

                            <!-- Social Register -->
                            <div class="d-flex justify-content-center gap-3 mb-4">
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

                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="text-white-50 mb-0">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="text-warning fw-bold text-decoration-none">
                                        Sign In
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
    background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0a0a0a 100%);
    overflow: hidden;
}

/* Luxury Watches Showcase */
.watches-showcase {
    position: absolute;
    width: 100%;
    height: 100%;
}

.luxury-watch {
    position: absolute;
    animation: float-luxury 8s ease-in-out infinite;
}

.watch-1 { top: 15%; left: 15%; animation-delay: 0s; }
.watch-2 { top: 65%; left: 75%; animation-delay: 1.5s; }
.watch-3 { top: 35%; left: 80%; animation-delay: 3s; }

.watch-body {
    position: relative;
    width: 120px;
    height: 140px;
}

.watch-dial {
    position: absolute;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #2c2c2c, #1a1a1a);
    border: 2px solid #ffc107;
    border-radius: 50%;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    box-shadow: 0 0 30px rgba(255, 193, 7, 0.3);
}

.watch-brand {
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translateX(-50%);
    color: #ffc107;
    font-size: 8px;
    font-weight: bold;
    letter-spacing: 1px;
}

.watch-strap {
    position: absolute;
    width: 70px;
    height: 60px;
    background: #8B4513;
    top: 70px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 10px;
}

.watch-strap.gold {
    background: linear-gradient(135deg, #FFD700, #D4AF37);
}

.watch-strap.leather {
    background: linear-gradient(135deg, #8B4513, #A0522D);
}

/* Watch Complications */
.watch-diamonds, .watch-pearls, .watch-complications {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
}

.watch-diamonds::before {
    content: '💎';
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 8px;
}

.watch-pearls::before {
    content: '⚪';
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 6px;
}

/* Floating Elements */
.floating-elements {
    position: absolute;
    width: 100%;
    height: 100%;
}

.element {
    position: absolute;
    background: rgba(255, 193, 7, 0.1);
    animation: element-float 10s ease-in-out infinite;
}

.gear-1 {
    width: 40px;
    height: 40px;
    background: conic-gradient(from 0deg, transparent, #ffc107, transparent);
    border-radius: 50%;
    top: 20%;
    left: 70%;
    animation-delay: 0s;
}

.gear-2 {
    width: 30px;
    height: 30px;
    background: conic-gradient(from 180deg, transparent, #ffc107, transparent);
    border-radius: 50%;
    top: 75%;
    left: 25%;
    animation-delay: 2s;
}

.crown {
    width: 20px;
    height: 25px;
    background: #ffc107;
    border-radius: 50% 50% 0 0;
    top: 50%;
    left: 15%;
    animation-delay: 4s;
}

.spring {
    width: 50px;
    height: 5px;
    background: #ffc107;
    border-radius: 2px;
    top: 30%;
    left: 60%;
    animation-delay: 6s;
}

.diamond {
    width: 15px;
    height: 15px;
    background: #ffc107;
    transform: rotate(45deg);
    top: 80%;
    left: 50%;
    animation-delay: 8s;
}

/* Background Glow */
.bg-glow {
    position: absolute;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,193,7,0.1) 0%, transparent 70%);
    animation: glow-move 20s linear infinite;
    top: -50%;
    left: -50%;
}

/* Features List */
.features-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.feature-item {
    color: #ffc107;
    font-size: 1.1rem;
    opacity: 0;
    animation: feature-fade-in 1s ease forwards;
}

.feature-item:nth-child(1) { animation-delay: 0.5s; }
.feature-item:nth-child(2) { animation-delay: 1s; }
.feature-item:nth-child(3) { animation-delay: 1.5s; }

/* Password Strength */
.password-strength .progress-bar {
    transition: all 0.3s ease;
}

/* Divider */
.divider {
    position: relative;
    text-align: center;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: rgba(255, 193, 7, 0.3);
    z-index: 1;
}

.divider span {
    background: #1a1a1a;
    padding: 0 15px;
    position: relative;
    z-index: 2;
}

/* Enhanced Animations */
@keyframes float-luxury {
    0%, 100% { 
        transform: translateY(0) rotate(0deg) scale(1);
        filter: brightness(1);
    }
    33% { 
        transform: translateY(-20px) rotate(5deg) scale(1.05);
        filter: brightness(1.2);
    }
    66% { 
        transform: translateY(-10px) rotate(-3deg) scale(1.03);
        filter: brightness(1.1);
    }
}

@keyframes element-float {
    0%, 100% { 
        transform: translateY(0) rotate(0deg);
        opacity: 0.3;
    }
    50% { 
        transform: translateY(-30px) rotate(180deg);
        opacity: 0.8;
    }
}

@keyframes glow-move {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes feature-fade-in {
    from { 
        opacity: 0;
        transform: translateX(-20px);
    }
    to { 
        opacity: 1;
        transform: translateX(0);
    }
}

/* Power Elements (reuse from login) */
.power-input, .power-field, .power-line, .power-btn, .social-btn {
    /* Same styles as login page */
}

/* Responsive */
@media (max-width: 991px) {
    .d-none.d-lg-block {
        display: none !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle Password Visibility
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');
    
    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password' ? 
            '<i class="fas fa-eye"></i>' : 
            '<i class="fas fa-eye-slash"></i>';
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmation.setAttribute('type', type);
        this.innerHTML = type === 'password' ? 
            '<i class="fas fa-eye"></i>' : 
            '<i class="fas fa-eye-slash"></i>';
    });

    // Password Strength Checker
    password.addEventListener('input', function() {
        const strengthBar = document.getElementById('passwordStrength');
        const strengthText = document.getElementById('passwordText');
        const value = this.value;
        let strength = 0;
        
        if (value.length >= 8) strength += 25;
        if (/[A-Z]/.test(value)) strength += 25;
        if (/[0-9]/.test(value)) strength += 25;
        if (/[^A-Za-z0-9]/.test(value)) strength += 25;

        strengthBar.style.width = strength + '%';
        
        if (strength < 50) {
            strengthBar.className = 'progress-bar bg-danger';
            strengthText.textContent = 'Weak password';
        } else if (strength < 75) {
            strengthBar.className = 'progress-bar bg-warning';
            strengthText.textContent = 'Good password';
        } else {
            strengthBar.className = 'progress-bar bg-success';
            strengthText.textContent = 'Strong password!';
        }
    });

    // Password Match Checker
    passwordConfirmation.addEventListener('input', function() {
        const matchText = document.getElementById('passwordMatchText');
        if (this.value === password.value && this.value !== '') {
            matchText.textContent = '✓ Passwords match';
            matchText.className = 'text-success';
        } else if (this.value !== '') {
            matchText.textContent = '✗ Passwords do not match';
            matchText.className = 'text-danger';
        } else {
            matchText.textContent = '';
        }
    });

    // Form Submission
    const powerForm = document.getElementById('powerRegisterForm');
    const registerBtn = document.getElementById('registerBtn');
    const btnText = registerBtn.querySelector('.btn-text');
    const btnLoader = registerBtn.querySelector('.btn-loader');

    powerForm.addEventListener('submit', function(e) {
        if (!document.getElementById('terms').checked) {
            e.preventDefault();
            alert('Please agree to the terms and conditions');
            return;
        }

        btnText.classList.add('d-none');
        btnLoader.classList.remove('d-none');
        registerBtn.disabled = true;
    });

    // Luxury watch animations
    const luxuryWatches = document.querySelectorAll('.luxury-watch');
    luxuryWatches.forEach(watch => {
        const speed = parseFloat(watch.dataset.speed);
        watch.style.animationDuration = (8 / speed) + 's';
    });
});
</script>
@endpush