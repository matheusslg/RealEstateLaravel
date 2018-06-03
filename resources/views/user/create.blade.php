@extends('layouts.app')
 
@section('content')
   <div class="container">
       <h1 class="page-header">Novo Usuário</h1>
       <div class="table-responsive">
           <form method="post" action="{{ route('user.store') }}">
               {{ csrf_field() }}
               <div class="form-group">
                   <label for="text">Nome</label>
                   <input type="text" class="form-control" name="name" placeholder="Nome do usuário">
               </div>
               <div class="form-group">
                    <label for="text">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email do usuário">
                </div>
                <div class="form-group">
                    <label for="text">Senha</label>
                    <input type="password" class="form-control" name="password" placeholder="Senha do usuário">
                </div>
               <button class="btn btn-info">Enviar</button>
           </form>
       </div>
   </div>
@endsection
