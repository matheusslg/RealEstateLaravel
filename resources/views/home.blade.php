@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Painel Administrativo</h1>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Bem-vindo de volta {{ $usuario->name }}!</h4>
    </div>
</div>

@endsection