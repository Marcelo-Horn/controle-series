@extends('layout')

@section('header')
Adicionar Série
@endsection

@section('content')

<form action="" method="post">
    <div class="form-group">
        <label for="name">Nome</label>
        <input class="form-control" id="name">
        <button type="button" class="btn btn-primary mt-2">Adicionar</button>
    </div>
</form>

@endsection