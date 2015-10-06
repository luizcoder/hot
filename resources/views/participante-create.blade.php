
@extends('layouts.master')

@section('title', 'Cadastro')

@section('sidebar')
    @parent
    </br></br></br>
@endsection

@section('content')
<div class="center-block">

    <form class="col-md-6"  action="/{{Request::segment(1)}}/participante" method="POST">
      {!! csrf_field() !!}

      <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">E-mail</label>
        <input type="email" class="form-control" name="email" placeholder="E-mail">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Telefone</label>
        <input type="text" class="form-control" name="telefone" placeholder="(11) 9999-9999">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">CPF</label>
        <input type="text" class="form-control" name="cpf" placeholder="111.111.111-36">
      </div>
      <div class="form-group text-right">
        <a class="btn btn-large btn-warning" href="/{{Request::segment(1)}}"> Voltar </a>
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
</div>
@endsection