@extends('layout')

@section('header')
Séries
@endsection

@section('content')
    @include('message', ['message' => $message, 'type' => 'success'])
    <div>
        <a href="{{route('form_insert_serie')}}" type="button" class="btn btn-dark mb-2">Adicionar</a>
        <ul class="list-group">
            @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="serie-name-{{$serie->id}}">{{$serie->name}}</span>

                <div class="input-group w50 mr-2" hidden id="input-serie-name-{{$serie->id}}">
                    <input type="text" class="form-control" value="{{$serie->name}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="serieUpdate({{$serie->id}})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex">
                    <button class="btn btn-info btn-sm mr-1" onclick="toogleInput({{$serie->id}})">
                        <i class="fa fa-edit " ></i>
                    </button>
                    <a href="/series/{{$serie->__get('id')}}/seasons" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form action="series/rm/{{$serie->id }}" method="post" onsubmit="return confirm('Tem certeza?')">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </span>
            </li>
            @endforeach
        </ul>
    </div>

    <script>
        function toogleInput(serieId) {
            const serieNameEl = document.getElementById(`serie-name-${serieId}`);
            const serieInputEl = document.getElementById(`input-serie-name-${serieId}`);

            if (serieNameEl.hasAttribute('hidden')) {
                serieNameEl.removeAttribute('hidden');
                serieInputEl.hidden = true;
            } else {
                serieInputEl.removeAttribute('hidden');
                serieNameEl.hidden = true
            }
        }

        function serieUpdate(serieId) {
            let formData = new FormData();
            const name = document.querySelector(`#input-serie-name-${serieId} > input`).value;
            
            const token = document.querySelector('input[name="_token"]').value;
            formData.append('name', name);
            formData.append('_token', token);

            const url = `/series/${serieId}/nameUpdate`;
            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(() => {
                toogleInput(serieId);
                document.getElementById(`serie-name-${serieId}`).textContent = name;
            });
        }
    </script>

@endsection