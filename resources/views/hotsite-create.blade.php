
@extends('layouts.master')

@section('title', 'Cadastro')

@section('sidebar')
    @parent
    </br></br></br>
@endsection

@section('content')


<div class="center-block">
    <form class="col-md-6"  action="/admin/hotsite" method="POST">
      {!! csrf_field() !!}

      <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Apelido</label>
        <input type="text" class="form-control" name="apelido" placeholder="Apelido">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <textarea class="form-control" name="descricao" placeholder="Descrição do site"></textarea>
      </div>
      <div class="form-group text-right">
        <a class="btn btn-large btn-warning" href="/admin/hotsite"> Cancelar </a>
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
</div>
@endsection