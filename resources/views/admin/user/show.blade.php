@extends('layouts.app') 
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Detalhes do Usuário</h1>
    <a class="btn btn-success" href="{{ route('register') }}">Novo Usuário</a>
</div>
<div class="table-responsive">
    <div class="card">
        <div class="card-body">
            <strong>Nome:</strong> {{ $user->name }}</br></br>
            <strong>E-mail:</strong> {{ $user->email }}</br></br>
        </div>
    </div>
</div>

@endsection