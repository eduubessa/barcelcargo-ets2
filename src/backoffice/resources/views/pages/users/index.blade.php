@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11">
            <div class="container bg-white py-5">
                <div class="row mb-3">
                    <a class="btn btn-success ml-auto mr-3" href="{{ route('views.user.create') }}">Criar user</a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Utilizador</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Última sessão</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(!is_null($users))
                            @foreach($users as $key => $user)
                                <tr>
                                      <td scope="row">{{ $key+1 }}</td>
                                      <td>{{ $user->name }}</td>
                                      <td>{{ $user->username }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td></td>
                                      <td>
                                          <button class="btn btn-success">Ver</button>
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
