@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Painel Administrativo</h1>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('home.begin') }}">
        {{ csrf_field() }}
        <h2 class="card-title">Seja <strong>bem-vindo</strong> ao seu painel administrativo <strong>{{ $usuario->name }}!</strong></h2>
        <p class="card-text">Comece utilizando o menu lateral a sua esquerda ou siga o passo a passo abaixo.</p><br />

        <h6 class="card-title"><strong>Vamos começar cadastrando uma categoria...</strong></h6> 
        <div class="form-group">
            <input type="text" class="form-control" name="categoria" placeholder="Exemplo: Casa, Apartamento, Terreno, Fazenda...">
        </div>

        <h6 class="card-title"><strong>Tudo certo? Vamos continuar...</strong></h6> 
        <p class="card-text">No campo abaixo você vai digitar uma modalidade:</p>
        <div class="form-group">
            <input type="text" class="form-control" name="modalidade" placeholder="Exemplo: Aluguel, Venda">
        </div>

        <h6 class="card-title"><strong>Último passo, estamos quase lá!</strong></h6> 
        <p class="card-text">Digite agora uma localização:</p>
        <div class="form-group">
            <input type="text" class="form-control" name="localidade" placeholder="Exemplo: Urbano, Rural">
        </div>

        <h6 class="card-title"><strong>Agora é só falta clicar no botão abaixo para salvar seus dados!</strong></h6> 
        <button class="btn btn-success">Vamos nessa!</button>
        </form>
    </div>
</div>

@endsection