<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Agence</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('biens.index')}}">Nos biens</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="#">option</a>
                </li>
                @endauth
            </ul>

            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                    <form action="{{route('auth.logout')}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="nav-link">Se deconnecter</button>
                    </form>
                @endauth
                <a class="nav-link " href="{{route('auth.login')}}">Se connecter</a>
                @guest

                @endguest
            </div>

        </div>
    </div>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @yield('content')
</div>
</body>
</html>
