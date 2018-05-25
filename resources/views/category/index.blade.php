@extends('layouts.app') @section('content')
<div class="container">
    <p>
        <a class="btn btn-info" href="{{ route('category.create') }}">Criar Categoria</a>
    </p>
    <h1 class="page-header">Categorias</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->nome }}</td>
                    <td>
                        <form action="{{ route('category.edit', $category->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="GET">
                            <button class="btn btn-info">
                                Editar
                            </button>
                        </form>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir a categoria {{ $category->nome }}?')">
                                Apagar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
