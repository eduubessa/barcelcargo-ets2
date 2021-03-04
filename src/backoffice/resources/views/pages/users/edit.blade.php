@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 bg-white">
                <h2 class="mt-3">Editar utilizador</h2>
                <form method="post" action="{{ route('views.users.update', $user->username) }}" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="txtName" class="form-label">Nome</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" id="txtName" name="name" />
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="txtUsername" class="form-label">Utilizador</label>
                        <input type="text" class="form-control" value="{{ $user->username }}" id="txtUsername" name="username" />
                        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="txtEmail" class="form-label">E-mail</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" id="txtEmail" name="email" />
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="txtPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="txtPassword" name="password" />
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="txtPasswordConfirmed" class="form-label">Confirme password</label>
                        <input type="password" class="form-control" id="txtPasswordConfirmed" name="password_confirmation" />
                        @error('password_confirm') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Editar utilizador</button>
                </form>
            </div>
        </div>
    </div>
@endsection
