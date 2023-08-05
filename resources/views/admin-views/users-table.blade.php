<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $users */
?>
@extends('layouts.admin')
@section('title', 'Listado de Usuarios :: Nube web')
@section('abm-post')

<div class="card client-table">
    <div class="card-header d-flex flex-column flex-md-row justify-content-md-between align-items-center">
        <h1 class="fs-3">Listado de Usuarios</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Cantidad de Servicios Contratados</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td class="fw-semibold">{{ $user->username }}</td>
                            <td>{{ $user->products->count() }}</td>
                            <td>
                                <a href="{{ route('users.view', ['id' => $user->user_id]) }}" class="btn btn-secondary align-items-center justify-content-around">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                    Ver más
                                </a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-12 mt-2">
    <!-- Mostrar los enlaces de paginación -->
    {!! $users->links() !!}
</div>
@endsection