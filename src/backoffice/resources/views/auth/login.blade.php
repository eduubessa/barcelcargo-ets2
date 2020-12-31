@extends('layouts.auth')

@section('aside_content')
    <div class="container-fixed container-dark-opacity">
        teste
    </div>
@endsection

@section('main_content')
    <div class="container-steps">
        <h3 class="text-left">Iniciar sessão</h3>
        <header class="form-header">
            <div class="avatar circle-radius"></div>
        </header>
        @if($next == "step-1" or !isset($next))
            <div class="step step-first">
                <form action="/auth/login" method="post">
                    <div class="input-group">
                        {{ @csrf_field() }}
                        {{-- <label for="username">Utilizador ou E-mail</label> --}}
                        <input type="text" id="username" name="username" class="form-input" required value="{{ isset($username) ? $username : '' }}">
                        <a href="#">Esqueceu-se do email?</a>
                    </div>
                    <div class="input-group flex">
                        <div class="forgot">
                            <a href="{{ route('views.auth.register') }}">Criar conta</a>
                        </div>
                        <div class="submit">
                            <button id="sign-in" type="submit">Seguinte</button>
                        </div>
                    </div>
                </form>
            </div>
        @elseif($next == "step-2")
            <div class="step step-second">
                <form action="/auth/login" method="post">
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-input">
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection

@section('script')
    let inputUsername = document.getElementById('username');
    let inputNextStep = document.getElementById('sign-in');

    if(inputUsername.value != null)
    {
        inputNextStep.click();
    }
@endsection
