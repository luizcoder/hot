
@extends('layouts.master')

@section('title', 'Listagem de concursos')

@section('sidebar')
    @parent
    </br></br></br>
@endsection

@section('content')
<div class="center-block">
<a class="btn btn-large btn-primary" href="/admin"> Voltar </a>
<a class="btn btn-large btn-success" href="/admin/concurso/create"> Novo </a>

<h2> Lista de concursos </h2>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Pergunta</th>
            <th>Hotsite</th>                
                
        </tr>
    </thead>
    <tbody>
    @forelse ($concursos as $concurso)
        <tr>
            <td> {{ $concurso->nome }} </td>
            <td> {{ $concurso->pergunta }} </td>
            <td> {{ $concurso->hotsite->nome }} </td>           
                
        </tr>
    @empty
        <tr>
            <td colspan="5"> Não há concursos cadastrados! </td>              
        </tr>    
    @endforelse
    </tbody>
</table>

@endsection