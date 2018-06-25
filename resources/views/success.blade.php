@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Painel Administrativo</h1>
</div>

<div class="card">
    <div class="card-body">
        <h2 class="card-title">Parabéns!</h2>
        <p class="card-text">Agora que todos os dados já foram cadastrados, nós podemos começar cadastrando uma nova propriedade.</p><br />
        <a class="btn btn-success" href="{{ route('property.create') }}">Cadastrar Propriedade</a>
    </div>
</div>

@endsection
