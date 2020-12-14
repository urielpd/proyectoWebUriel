<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
</head>
<body class="body-welcome p-3 center">
    <div class="welcome-foto welcome-foto_register mx-auto mt-3 mt-md-5 mt-lg-3">
    </div>
    <h2 class="text-center mt-5 mt-lg-4">Regístrate aquí</h2>
    <form class="container d-flex mt-3 mt-md-3" method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <input type="text" placeholder="Nombre Completo" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!-- Email -->
        <input type="email" placeholder="E-mail" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!-- Contraseña -->
        <input type="password" placeholder="Contraseña" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!-- Confirmar contraseña -->
        <input type="password" placeholder="Confirmar contraseña" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">

        <a href="{{url('/')}}" class="text-right text-purple form-label-link mt-2">¿Ya tienes cuenta? Inicia sesión</a>
        <input id="submit" value="Registrarme" type="submit" class="btn btn-secondary mb-4 mx-auto mt-3 mt-md-4" >
    </form>
</body>
</html>