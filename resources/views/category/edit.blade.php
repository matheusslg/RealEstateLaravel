@extends('layouts.app')
 
@section('content')
   <div class="container">
       <h1 class="page-header">Categorias</h1>
       <div class="table-responsive">
           <form method="post" action="{{ route('category.update', $category) }}">
               {{ csrf_field() }}
               {{ method_field('PUT') }}
               <div class="form-group">
                   <label for="text">Categoria</label>
                   <input type="text" name="nome" class="form-control" placeholder="Nome da categoria" value="{{ $category->nome }}">
               </div>
               <button class="btn btn-info">Editar</button>
           </form>
       </div>
   </div>
@endsection
