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
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!is_null($mails))
                            @foreach($mails as $key => $mail)
                                <tr>
                                    <td scope="row">{{ $key+1 }}</td>
                                    <td>{{ $mail->from }}</td>
                                    <td>{{ $mail->to }}</td>
                                    <td>{{ $mail->subject }}</td>
                                    <td>{{ $mail->created_at }}</td>
                                    <td>{{ $mail->updated_at }}</td>
                                    <td>{{ $mail->status }}</td>
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
