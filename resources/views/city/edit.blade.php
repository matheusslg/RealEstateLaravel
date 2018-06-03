@extends('layouts.app')
 
@section('content')
   <div class="container">
       <h1 class="page-header">Cidades</h1>
       <div class="table-responsive">
           <form method="post" action="{{ route('city.update', $city) }}">
               {{ csrf_field() }}
               {{ method_field('PUT') }}
               <div class="form-group">
                   <label for="text">Cidade</label>
                   <input type="text" name="nome" class="form-control" placeholder="Nome da cidade" value="{{ $city->nome }}">
               </div>
               <div class="form-group">
                    <label for="text">Estado</label>
                    <input type="text" name="estado" class="form-control" placeholder="Estado da cidade" value="{{ $city->estado }}">
                </div>
               <button class="btn btn-info">Editar</button>
           </form>
       </div>
   </div>
@endsection
