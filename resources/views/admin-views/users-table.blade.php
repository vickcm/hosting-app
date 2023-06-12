<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $users */
?>
@extends('layouts.admin')
@section('title', 'Listado de Entradas')
@section('abm-post')

<div class="card client-table">
    <div class="card-header d-flex flex-column flex-md-row justify-content-md-between align-items-center">
        <h1 class="fs-3">Usuarios Registrados</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Cantidad de Servicios Contratados</th>
                        <th scope="col">Servicios Contratados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td class="fw-semibold">{{ $user->username }}</td>
                            <td>{{ $user->products->count() }}</td>
                            <td>
                                @if ($user->products->isNotEmpty())
                                    {{ implode(', ', $user->products->pluck('title')->toArray()) }}
                                @else
                                    Sin servicio contratado
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection