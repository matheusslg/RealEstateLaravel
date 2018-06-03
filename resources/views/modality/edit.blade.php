@extends('layouts.app')
 
@section('content')
   <div class="container">
       <h1 class="page-header">Editar Modalidade</h1>
       <div class="table-responsive">
           <form method="post" action="{{ route('modality.update', $modality) }}">
               {{ csrf_field() }}
               {{ method_field('PUT') }}
               <div class="form-group">
                   <label for="text">Nome</label>
                   <input type="text" name="nome" class="form-control" placeholder="Nome da modalidade" value="{{ $modality->nome }}">
               </div>
               <button class="btn btn-info">Editar</button>
           </form>
       </div>
   </div>
@endsection
