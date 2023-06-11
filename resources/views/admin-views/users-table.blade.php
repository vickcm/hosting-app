<?php
/** @var \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $users */
?>
@extends('layouts.admin')
@section('title', 'Listado de Entradas')
@section('abm-post')


<div class="card">
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Servicio Contratado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td class="fw-semibold">{{ $user->username }}</td>
                            <td>servicio contratado X </td>
                            
                                
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection