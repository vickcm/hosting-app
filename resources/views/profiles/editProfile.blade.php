@extends('layouts.main')

@section('title', 'Editar Perfil :: Nube web')

@section('main')
    <h1 class="text-center mb-5 mt-5 blog">Editar Perfil</h1>
    <div class="row mb-5 justify-content-md-center align-items-md-center form-register">
        <div class="col-12 col-md-5">
            <picture>
                <source srcset="{{ url('img/perfil-desktop.jpg') }}" media="(min-width:768px)">
                <img class="img-fluid" alt="chica trabajando" src="{{ url('img/perfil-mobile.jpg') }}">
            </picture>
        </div>
        <div class="col-12 col-md-6">
            <form action="{{ route('profiles.editProfile', ['id' => $profile->profile_id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="full_name" class="form-label">Nombre Completo</label>
                    <input type="text" id="full_name" name="full_name" class="form-control"
                        @error('full_name')
                        aria-describedby="error-full_name" 
                        @enderror
                        value="{{ old('full_name', $profile->full_name) }}">
                    @error('full_name')
                        <div class="text-danger mt-1 bg-light p-2" id="error-full_name">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" id="address" name="address" class="form-control"
                        @error('address')
                        aria-describedby="error-address" 
                        @enderror
                        value="{{ old('address', $profile->address) }}">
                    @error('address')
                        <div class="text-danger mt-1 bg-light p-2" id="error-address">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone_number">Número de Celular</label>
                    <input type="tel" id="phone_number" name="phone_number" class="form-control"
                        @error('phone_number')
                        aria-describedby="error-phone_number" 
                        @enderror
                        value="{{ old('phone_number', $profile->phone_number) }}">
                    @error('phone_number')
                        <div class="text-danger mt-1 bg-light p-2" id="error-phone_number">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="birth_date">Fecha de Nacimiento</label>
                    <input type="date" id="birth_date" name="birth_date" class="form-control"
                        @error('birth_date')
                        aria-describedby="error-birth_date" 
                        @enderror
                        value="{{ old('birth_date', $profile->birth_date) }}">
                    @error('birth_date')
                        <div class="text-danger mt-1 bg-light p-2" id="error-birth_date">
                            <i class="bi bi-exclamation-triangle" title="error"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning me-3">Editar</button>
                </div>
            </form>
        </div>
    </div>
@endsection