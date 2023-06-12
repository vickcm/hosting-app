@extends('layouts.main')

@section('main')
    <h1 class="text-center mb-5 mt-5 blog">Crear una cuenta</h1>
    <div class="row mb-5 justify-content-md-center align-items-md-center form-register">
        <div class="col-12 col-md-5">
            <picture>
                <source srcset="{{ url('img/form-registrer-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="equipos de personas trabajando" src="{{ url('img/form-registrer-mobile.jpg') }}">
            </picture>
        </div>
        <div class="col-12 col-md-6">
            <form action="{{ route('auth.processRegister') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario<span class="text-danger">*</span> <span
                            class="form-aclaracion">Campo obligatorio</span> </label>
                    <input type="text" name="username" id="username" class="form-control"
                        @error('username')
                    aria-describedby="error-username" 
                    @enderror
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="text-danger mt-1 bg-light p-2" id="error-username">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span> <span
                            class="form-aclaracion">Campo obligatorio</span> </label>
                    <input type="email" name="email" id="email" class="form-control"
                        @error('email')
                    aria-describedby="error-email" 
                    @enderror
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger mt-1 bg-light p-2" id="error-email">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span> <span
                            class="form-aclaracion">Debe contener al menos 6 caracteres</span></label>
                    <input type="password" name="password" id="password" class="form-control"
                        @error('password')
                    aria-describedby="error-password" 
                    @enderror>
                    @error('password')
                        <div class="text-danger mt-1 bg-light p-2" id="error-password">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn float-end">Crear Cuenta</button>
            </form>
        </div>    
    </div>
@endsection