@extends('layout')

@section('header')
Adicionar Série
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/series/add" method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="name">Nome</label>
            <input class="form-control" name="name" id="name">
        </div>
        <div class="col col-2">
            <label for="number_of_seasons">Nº de temporadas</label>
            <input type="number" class="form-control" name="number_of_seasons" id="number_of_seasons">
        </div>
        <div class="col col-2">
            <label for="number_of_episodes">Ep por temporada</label>
            <input type="number" class="form-control" name="number_of_episodes" id="number_of_episodes">
        </div>
    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>

@endsection