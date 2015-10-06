
@extends('layouts.master')

@section('title', 'Cadastro')

@section('sidebar')
    @parent
    </br></br></br>
@endsection

@section('content')
<div class="center-block">
<a class="btn btn-large btn-primary" href="/admin"> Voltar </a>
<a class="btn btn-large btn-success" href="/admin/hotsite/create"> Criar hotsite </a>
<h2> Lista de hotsites </h2>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Descrição</th>
                
        </tr>
    </thead>
    <tbody>
    @forelse ($hotsites as $hotsite)
        <tr>
            <td> <a target="_BLANK" href="/{{ $hotsite->apelido }}">{{ $hotsite->nome }}</a> </td>
            <td> {{ $hotsite->apelido }} </td>
            <td> {{ $hotsite->descricao }} </td>
            <td> <a target="_BLANK" href="/{{ $hotsite->apelido }}/participante">Participantes</a> </td>
                
              
        </tr>
    @empty
        <tr>
            <td colspan="5"> Não há hotsites cadastrados! </td>              
        </tr>    
    @endforelse
    </tbody>
</table>

@endsection