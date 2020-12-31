<!doctype html>
<html lang="pt">
<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="Eduardo Bessa // Creative Team" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta name="keywords" content="ets2, euro, truck, simulator, eduubessa, eduardo, bessa, barcel, cargo, trcuckers, trucks, simulator" />
    <!-- links -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/authentication.css') }}" media="all" />
    <title>::: BarcelCargo ::: Autenticação</title>
</head>
<body>
    <div id="app">
        <aside class="sidebar">
            @yield('aside_content')
        </aside>
        <main class="main">
           @yield('main_content')
        </main>
    </div>
    <script type="text/javascript">
        @yield('script')
    </script>
</body>
</html>
