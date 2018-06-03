@extends('layouts.app')
 
@section('content')
   <div class="container">
       <h1 class="page-header">Cidades</h1>
       <div class="table-responsive">
           <form method="post" action="{{ route('city.store') }}">
               {{ csrf_field() }}
               <div class="form-group">
                   <label for="text">Nome</label>
                   <input type="text" class="form-control" name="nome" placeholder="Nome da cidade">
               </div>
               <div class="form-group">
                    <label for="text">Estado</label>
                    <input type="text" class="form-control" name="estado" placeholder="Estado da cidade">
                </div>
               <button class="btn btn-info">Enviar</button>
           </form>
       </div>
   </div>
@endsection
