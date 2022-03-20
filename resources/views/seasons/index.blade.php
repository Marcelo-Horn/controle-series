@extends ('layout')

@section('header')
{{$serie->__get('name')}}
@endsection

@section('content')

<ul class="list-group">
    @foreach ($seasons as $season)
    <li class="list-group-item d-flex justify-content-between align-items-center">
       <a href="/season/{{ $season->id }}/episodes">Temporada {{$season->__get('number')}}</a>
       <span class="badge badge-secondary">
           {{ $season->getWatchedEpisodes()->count()}} / {{ $season->episodes->count()}}
       </span>
    </li>
    @endforeach
</ul>
@endsection