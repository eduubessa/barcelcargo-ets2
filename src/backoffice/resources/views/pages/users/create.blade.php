@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 bg-white">
                <h2 class="mt-3">Criar utilizador</h2>
                <form method="post" action="{{ route('api.users.store') }}" class="mb-3">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="txtName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="txtName" name="name" />
                    </div>
                    <div class="mb-3">
                        <label for="txtUsername" class="form-label">Utilizador</label>
                        <input type="text" class="form-control" id="txtUsername" name="username" />
                    </div>
                    <div class="mb-3">
                        <label for="txtEmail" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="txtEmail" name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="txtPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="txtPassword" name="password" />
                    </div>
                    <div class="mb-3">
                        <label for="txtPasswordConfirmed" class="form-label">Password</label>
                        <input type="password" class="form-control" id="txtPasswordConfirmed" name="password_confirmed" />
                    </div>
                    <button type="submit" class="btn btn-primary">Criar utilizador</button>
                </form>
            </div>
        </div>
    </div>
@endsection
