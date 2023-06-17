@extends('layouts.main')

@section('main')
    <h1 class="text-center mb-5 mt-5 blog">Iniciar Sesión</h1>
    <div class="login mb-5">
        <form action="{{ route('auth.processLogin') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3 password-input">
                <label for="password" class="form-label">Password</label>
                <div class="password-input-group">
                    <input type="password" name="password" id="password" class="form-control">
                    <span class="password-toggle" onclick="togglePasswordVisibility()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"
                            style="width: 20px; height: 20px;">
                            <path
                                d="M22 12s-2-3.5-10-3.5S2 12 2 12s2 3.5 10 3.5S22 12 22 12zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="d-grid gap-2 mb-2">
                <button type="submit" class="btn">Ingresar</button>
            </div>
            <a href="{{ route('auth.formRegister') }}" class="btn ps-0">¿Aún no tienes cuenta? Regístrate para Iniciar
                Sesión.</a>
        </form>
    </div>
@endsection
