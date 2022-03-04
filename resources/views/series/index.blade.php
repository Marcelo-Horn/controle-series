@extends('layout')

@section('header')
Séries
@endsection

@section('content')

<div>
    <a href="/series/add" type="button" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item"><?= $serie; ?></li>
    @endforeach
    </ul>
</div>

@endsection
