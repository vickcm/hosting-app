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
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="d-grid gap-2 mb-2">
            <button type="submit" class="btn">Ingresar</button>
        </div>
        <a href="{{ route('auth.formRegister') }}" class="btn ps-0">¿Aún no tienes cuenta? Registrate para Iniciar Sesión.</a>
    </form>
</div>
@endsection