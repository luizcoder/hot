
@extends('layouts.master')

@section('title', 'Cadastro de concurso')

@section('sidebar')
    @parent
    </br></br></br>
@endsection

@section('content')
<div class="center-block">

    <form class="col-md-6"  action="/admin/concurso" method="POST">
      {!! csrf_field() !!}

      <div class="form-group">
        <label for="exampleInputPassword1">Hotsite</label>
        <select class="form-control" name="hotsite_id">
            @forelse ($hotsites as $hotsite)
               <option value="{{ $hotsite->id }}">{{ $hotsite->nome }}</option>
            @empty
               <option disabled="disabled"></option>   
            @endforelse
        </select>
      </div>
        
      <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Termo URL</label>
        <input type="text" class="form-control" name="termo_url" placeholder="http://stillos.com.br/termo.pdf">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Pergunta</label>
        <input type="text" class="form-control" name="pergunta" placeholder="Pergunta?">
      </div>        
      <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <textarea class="form-control" name="descricao" placeholder="Descrição do concurso"></textarea>
      </div>
      <div class="form-group text-right">
        <a class="btn btn-large btn-warning" href="/admin/concurso"> Voltar </a>     
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
</div>
@endsection