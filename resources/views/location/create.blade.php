@extends('layouts.app')
 
@section('content')
   <div class="container">
       <h1 class="page-header">Nova Localização</h1>
       <div class="table-responsive">
           <form method="post" action="{{ route('location.store') }}">
               {{ csrf_field() }}
               <div class="form-group">
                   <label for="text">Nome</label>
                   <input type="text" class="form-control" name="nome" placeholder="Nome da localização">
               </div>
               <button class="btn btn-info">Enviar</button>
           </form>
       </div>
   </div>
@endsection
