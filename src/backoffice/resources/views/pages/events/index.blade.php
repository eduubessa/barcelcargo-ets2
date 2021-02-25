@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="container bg-white py-5">
                    <div class="row mb-3">
                        <a class="btn btn-success ml-auto mr-3" href="{{ route('views.event.create') }}">Criar evento</a>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Criado em</th>
                            <th scope="col">Atualizado em</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!is_null($events))
                            @foreach($events as $key => $event)
                                <tr>
                                    <td scope="row">{{ $key+1 }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->created_at }}</td>
                                    <td>{{ $event->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('views.event.show', $event->slug) }}">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
