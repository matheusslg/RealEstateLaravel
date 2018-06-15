@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Nova Modalidade</h1>
</div>
<div class="table-responsive">
    <form method="post" action="{{ route('modality.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="text">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome da modalidade">
        </div>
        <button class="btn btn-info">Enviar</button>
    </form>
</div>
@endsection
