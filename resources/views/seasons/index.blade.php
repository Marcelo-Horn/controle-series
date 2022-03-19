@extends ('layout')

@section('header')
{{$serie->__get('name')}}
@endsection

@section('content')

<ul class="list-group">
    @foreach ($seasons as $season)
    <li class="list-group-item">
       Temporada {{$season->__get('number')}}
    </li>
    @endforeach
</ul>
@endsection