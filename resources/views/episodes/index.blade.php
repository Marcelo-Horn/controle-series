@extends ('layout')

@section('header')
Episódios
@endsection

@section('content')
    @include('message', ['message' => $message, 'type' => 'success'])

    <ul class="list-group">
        <form action="/season/{{$season->id}}/episodes/watched" method="post">
            @csrf
            <ul class="list-group">
                @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{$episode->number}}
                <input type="checkbox" name="episodes[]" value="{{$episode->id}}" {{$episode->assistido ? 'checked' : ''}}>
                </li>
                @endforeach
            </ul>
            <button class="btn btn-primary mt-2 mb-2">Salvar</button>
        </form>
    </ul>
@endsection