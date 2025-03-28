@extends('layouts.app')
@section('content')
    <style>
        /* Nuansa warna Muhammadiyah (biru) */
        :root {
            --primary-color: #0066b3;    /* Biru Muhammadiyah utama */
            --secondary-color: #004d99;  /* Biru Muhammadiyah lebih tua */
            --accent-color: #ffd700;     /* Aksen kuning emas */
            --bg-color: #f5f5f5;
            --text-color: #333;
        }
        
        body {
            background: url('https://i.pinimg.com/originals/0f/88/3e/0f883e6f5db348671c1e26a7dfd2e5f3.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Amiri', serif;
        }
        
        /* Animasi fade-in dengan scaling */
        @keyframes fadeInScale {
            from { 
                opacity: 0; 
                transform: translateY(40px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }
        
        /* Animasi untuk pola geometris Islami */
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes pulse {
            0% { opacity: 0.4; }
            50% { opacity: 0.8; }
            100% { opacity: 0.4; }
        }
        
        .login-card {
            animation: fadeInScale 0.7s ease-out;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .islamic-pattern {
            position: absolute;
            width: 600px;
            height: 600px;
            background: url('https://i.pinimg.com/originals/eb/33/53/eb33531854558338fc15eac8a6327953.png') no-repeat center center;
            background-size: contain;
            opacity: 0.1;
            top: -150px;
            right: -150px;
            z-index: -1;
            animation: rotate 120s linear infinite, pulse 15s ease-in-out infinite;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group input {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            border-bottom: 2px solid var(--primary-color);
            border-radius: 0;
            padding: 15px 15px 15px 45px;
            transition: all 0.3s ease;
            font-size: 15px;
        }
        
        .form-group input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 18px;
            transition: all 0.3s;
        }
        
        .input-icon input:focus + i {
            color: var(--accent-color);
        }
        
        .bismillah {
            width: 180px;
            margin: 0 auto 20px;
            display: block;
            opacity: 0.8;
        }
        
        .login-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 0;
            font-weight: 500;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }
        
        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .login-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .login-btn:hover::after {
            left: 100%;
        }
        
        .alert {
            border-radius: 10px;
            border-left-width: 5px;
            padding: 15px;
            margin-bottom: 25px;
            font-size: 14px;
            animation: fadeInScale 0.5s ease-out;
        }
        
        .card-title {
            color: var(--primary-color);
            font-size: 28px;
            margin-bottom: 5px;
            font-weight: 600;
            text-align: center;
        }
        
        .card-subtitle {
            color: var(--text-color);
            font-size: 16px;
            margin-bottom: 25px;
            text-align: center;
            font-style: italic;
        }
        
        /* Input focus animation */
        .form-group label {
            position: absolute;
            top: 0;
            left: 45px;
            font-size: 14px;
            color: var(--primary-color);
            font-weight: 500;
            transition: all 0.3s ease;
            pointer-events: none;
            opacity: 0;
        }
        
        .form-group input:focus + i + label {
            opacity: 1;
            top: -20px;
        }
        
        /* Dekorasi Islami pada bagian bawah kartu */
        .islamic-decoration {
            width: 100%;
            height: 30px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            position: absolute;
            bottom: 0;
            left: 0;
            opacity: 0.8;
        }
        
        .islamic-decoration::before {
            content: "";
            position: absolute;
            top: -15px;
            left: 0;
            width: 100%;
            height: 15px;
            background-image: linear-gradient(45deg, var(--primary-color) 25%, transparent 25%), 
                              linear-gradient(-45deg, var(--primary-color) 25%, transparent 25%);
            background-size: 30px 30px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card" style="margin: 80px auto; background-color: rgba(255, 255, 255, 0.95); border-radius: 15px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); padding: 40px 30px; border: none; position: relative;">
                    <div class="islamic-pattern"></div>
                    
                    <img src="/images/bismillah.png" alt="Bismillah" class="bismillah">
                    
                    <h1 class="card-title">Login Pengurus</h1>
                    <p class="card-subtitle">Masuk untuk mengelola sistem</p>
                    
                    @if(session('success'))
                        <div class="alert alert-success" style="background-color: rgba(212, 237, 218, 0.9); color: #0f5132; border-left: 5px solid #28a745;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" style="background-color: rgba(248, 215, 218, 0.9); color: #721c24; border-left: 5px solid #dc3545;">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group input-icon">
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}" 
                                required 
                                placeholder="Email"
                            >
                            <i class="fas fa-envelope"></i>
                            <label for="email">Email</label>
                        </div>
                        
                        <div class="form-group input-icon">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                required 
                                placeholder="Password"
                            >
                            <i class="fas fa-lock"></i>
                            <label for="password">Password</label>
                        </div>
                        
                        <button type="submit" class="btn login-btn btn-block">
                            Masuk
                        </button>
                    </form>
                    
                    <div class="islamic-decoration"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Google untuk tema Islami -->
    @push('styles')
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    @endpush

    <!-- Sertakan Font Awesome untuk ikon -->
    @push('scripts')
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script>
            // Animasi tambahan saat loading
            document.addEventListener('DOMContentLoaded', function() {
                const loginCard = document.querySelector('.login-card');
                loginCard.style.opacity = '0';
                
                setTimeout(function() {
                    loginCard.style.opacity = '1';
                }, 100);
                
                // Animasi fokus input
                const inputs = document.querySelectorAll('input');
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.parentNode.classList.add('focused');
                    });
                    
                    input.addEventListener('blur', function() {
                        if (this.value === '') {
                            this.parentNode.classList.remove('focused');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection