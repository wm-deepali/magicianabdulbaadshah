@extends('layouts.admin-app')

@section('content')

<style>
    body{
        background: linear-gradient(90deg, #eef2ff 0%, #fff5f7 100%);
        min-height: 100vh;
    }

    .login-page-wrapper{
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 15px;
    }

    .login-card{
        width: 100%;
        max-width: 1050px;
        background: #ffffff;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
    }

    .login-left{
        background: linear-gradient(180deg, #eef2ff 0%, #fff4f0 100%);
        padding: 80px 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        min-height: 520px;
    }

    .brand-logo-box{
        width: 180px;
        height: 110px;
        background: #fff;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }

    .brand-logo-box img{
        max-width: 120px;
        max-height: 80px;
        object-fit: contain;
    }

    .brand-title{
        font-size: 40px;
        font-weight: 700;
        color: #1d3f91;
        margin-bottom: 12px;
    }

    .brand-subtitle{
        font-size: 18px;
        color: #8c8fa3;
        text-align: center;
    }

    .login-right{
        padding: 70px 60px;
        background: #fff;
    }

    .login-heading{
        font-size: 42px;
        font-weight: 700;
        color: #1d3f91;
        margin-bottom: 40px;
    }

    .custom-label{
        font-size: 18px;
        font-weight: 500;
        color: #222;
        margin-bottom: 12px;
    }

    .custom-input{
        height: 64px;
        border-radius: 18px;
        border: 1px solid #cfd8ea;
        background: #eef5ff;
        padding: 0 22px;
        font-size: 16px;
        transition: all .2s ease;
    }

    .custom-input:focus{
        border-color: #7aa7ff;
        box-shadow: none;
        background: #fff;
    }

    .remember-area{
        margin-top: 10px;
        margin-bottom: 30px;
    }

    .remember-area label{
        color: #6f7485;
        font-size: 16px;
    }

    .login-btn{
        width: 100%;
        height: 64px;
        border: none;
        border-radius: 18px;
        font-size: 18px;
        font-weight: 600;
        color: #222;
        background: linear-gradient(90deg, #8ec5ff 0%, #c5a6f6 50%, #f5b46b 100%);
        transition: .3s ease;
    }

    .login-btn:hover{
        transform: translateY(-1px);
        opacity: .95;
    }

    .alert{
        border-radius: 14px;
    }

    @media(max-width: 991px){

        .login-left{
            min-height: auto;
            padding: 50px 30px;
        }

        .login-right{
            padding: 50px 30px;
        }

        .brand-title,
        .login-heading{
            font-size: 32px;
        }
    }
</style>

<div class="container-fluid">
    <div class="login-page-wrapper">

        <div class="login-card">
            <div class="row g-0">

                {{-- LEFT SIDE --}}
                <div class="col-lg-5">
                    <div class="login-left">

                        <div class="brand-logo-box">

                            {{-- Replace with your logo path --}}
                            <img src="{{ asset('public/images/magician-logo.webp') }}" alt="Logo">

                        </div>

                        <h2 class="brand-title">
                            Magician Badshah
                        </h2>

                        <p class="brand-subtitle">
                            Happy Event Party Planner
                        </p>

                    </div>
                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-lg-7">
                    <div class="login-right">

                        <h2 class="login-heading">
                            Admin Login
                        </h2>

                        {{-- Session Error --}}
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin-bottom:0;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf

                            {{-- EMAIL --}}
                            <div class="mb-4">

                                <label for="email" class="custom-label">
                                    Email Address
                                </label>

                                <input
                                    id="email"
                                    type="email"
                                    class="form-control custom-input @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    placeholder="admin@example.com"
                                >

                                @error('email')
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">

                                <label for="password" class="custom-label">
                                    Password
                                </label>

                                <input
                                    id="password"
                                    type="password"
                                    class="form-control custom-input @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    placeholder="********"
                                >

                                @error('password')
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            {{-- REMEMBER --}}
                            <div class="remember-area">
                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                    >

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>

                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <button type="submit" class="login-btn">
                                Login
                            </button>

                            {{-- FORGOT PASSWORD --}}
                            @if (Route::has('password.request'))
                                <div class="text-center mt-4">
                                    <a href="{{ route('password.request') }}"
                                       class="text-decoration-none text-muted">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            @endif

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection