@extends('layouts.app')
@section('content')
    <style>
        /* Animasi fade-in */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card {
            animation: fadeIn 0.5s ease-in-out;
        }

        .form-group input:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
            outline: none;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        .input-icon input {
            padding-left: 40px !important;
        }
    </style>

    <div class="card login-card" style="max-width: 400px; margin: 50px auto; background: linear-gradient(135deg, #f9f9f9 0%, #e9ecef 100%); border-radius: 15px; box-shadow: 0 8px 15px rgba(0,0,0,0.1); padding: 40px; border: none;">
        <h1 style="text-align: center; margin-bottom: 25px; color: #2c3e50; font-size: 28px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Login Jamaah</h1>
        
        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 8px; border-left: 5px solid #28a745; transition: all 0.3s ease;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 8px; border-left: 5px solid #dc3545; transition: all 0.3s ease;">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form action="{{ route('login.jamaah') }}" method="POST">
            @csrf
            <div class="form-group input-icon" style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Email</label>
                <i class="fas fa-envelope" style="font-size: 16px;"></i>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}" 
                    required 
                    style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 8px; box-sizing: border-box; transition: all 0.3s ease; background-color: #fff;"
                >
            </div>
            <div class="form-group input-icon" style="margin-bottom: 25px;">
                <label for="password" style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Password</label>
                <i class="fas fa-lock" style="font-size: 16px;"></i>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 8px; box-sizing: border-box; transition: all 0.3s ease; background-color: #fff;"
                >
            </div>
            <button 
                type="submit" 
                class="btn" 
                style="width: 100%; padding: 12px; background: linear-gradient(90deg, #28a745, #34d058); color: white; border: none; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; font-weight: 500; text-transform: uppercase; letter-spacing: 1px;"
                onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 5px 15px rgba(40,167,69,0.4)'"
                onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'"
            >
                Login
            </button>
        </form>
    </div>

    @push('scripts')
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    @endpush
@endsection