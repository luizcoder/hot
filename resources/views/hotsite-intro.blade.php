
@extends('layouts.master')

@section('title', 'Cadastro')

@section('sidebar')
    @parent
    </br></br></br>
@endsection

@section('content')


<div class="center-block">
<h1>Intro - {{ $hotsite['nome'] }}</h1>
    <a href="/{{ Request::segment(1) }}/participante/create"> Cadastro </a>
</div>
@endsection