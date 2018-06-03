@extends('layouts.app')
 
@section('content')
   <div class="container">
       <h1 class="page-header">Editar Usuário</h1>
       <div class="table-responsive">
           <form method="post" action="{{ route('user.update', $user) }}">
               {{ csrf_field() }}
               {{ method_field('PUT') }}
               <div class="form-group">
                   <label for="text">Nome</label>
                   <input type="text" name="name" class="form-control" placeholder="Nome do usuário" value="{{ $user->name }}">
               </div>
               <div class="form-group">
                    <label for="text">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email do usuário" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="text">Senha</label>
                    <input type="text" name="password" class="form-control" placeholder="Senha do usuário" value="{{ $user->password }}">
                </div>
               <button class="btn btn-info">Editar</button>
           </form>
       </div>
   </div>
@endsection
