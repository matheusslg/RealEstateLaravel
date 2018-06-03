@extends('layouts.app')
 
@section('content')
   <div class="container">
       <h1 class="page-header">Nova Modalidade</h1>
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
   </div>
@endsection
