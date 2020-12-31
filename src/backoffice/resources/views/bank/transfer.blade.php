<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    <form action="/api/bank/transfer" method="post">
        {{ csrf_field() }}
        <input type="text" name="iban" placeholder="IBAN da conta do utilizador" />
        <input type="text" name="description" placeholder="Descrição do Movimento" />
        <input type="text" name="amount"  placeholder="Valor a transferir" />
        <button type="submit">Fazer transferencia</button>
    </form>
</body>
</html>
