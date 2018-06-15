@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Modalidade</h1>
</div>
<div class="table-responsive">
    <form method="post" action="{{ route('modality.update', $modality) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="form-group">
            <label for="text">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome da modalidade" value="{{ $modality->nome }}">
        </div>
        <button class="btn btn-info">Editar</button>
    </form>
</div>
@endsection
