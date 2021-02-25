@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="container bg-white py-5">
                    <div class="row mb-3">
                        <a class="btn btn-success ml-auto mr-3" href="{{ route('views.access_tokens.create') }}">Criar token</a>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Utilizador</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Token</th>
                            <th scope="col">Criado em</th>
                            <th scope="col">Atualizado em</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!is_null($access_tokens))
                            @foreach($access_tokens as $key => $access_token)
                                <tr>
                                    <td scope="row">{{ $key+1 }}</td>
                                    <td>{{ $access_token->user->name }}</td>
                                    <td>{{ $access_token->name }}</td>
                                    <td>{{ $access_token->token }}</td>
                                    <td>{{ $access_token->created_at }}</td>
                                    <td>{{ $access_token->updated_at }}</td>
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
