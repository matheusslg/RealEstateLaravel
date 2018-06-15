@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Propriedades</h1>
    <a class="btn btn-success" href="{{ route('property.create') }}">Nova Propriedade</a>
</div>
@endsection
