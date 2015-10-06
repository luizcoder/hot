
@extends('layouts.master')

@section('title', 'Cadastro')

@section('sidebar')
    @parent
    </br></br></br>
@endsection

@section('content')
<div class="center-block">

<h2> Lista de participantes </h2>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Cadastro</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($participantes as $participante)
        <tr>
            <td> {{ $participante->nome }} </td>
            <td> {{ $participante->cpf }} </td>
            <td> {{ $participante->email }} </td>
            <td> {{ $participante->telefone }} </td>
            <td> {{ $participante->id }} </td>                
        </tr>
    @empty
        <tr>
            <td colspan="5"> Não há participantes cadastrados! </td>              
        </tr>    
    @endforelse
    </tbody>
</table>

@endsection