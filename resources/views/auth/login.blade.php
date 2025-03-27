@extends('layouts.app')
@section('content')
    <div class="card" style="max-width: 400px; margin: 50px auto; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 30px;">
        <h1 style="text-align: center; margin-bottom: 20px; color: #333; font-size: 24px;">Login Pengurus</h1>
        
        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; color: #555;">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}" 
                    required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"
                >
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 5px; color: #555;">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"
                >
            </div>
            <button 
                type="submit" 
                class="btn" 
                style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                onmouseover="this.style.backgroundColor='#0056b3'"
                onmouseout="this.style.backgroundColor='#007bff'"
            >
                Login
            </button>
        </form>
    </div>
@endsection