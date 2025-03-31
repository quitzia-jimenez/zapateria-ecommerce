<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOMU - Inicio de sesión</title>
    <link rel="icon" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/svgs/solid/lock.svg" type="image/svg+xml">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('recursos/user/css/logins_styles.css')}}">
    @yield('css')
</head>

<body>
    
    @yield('content')

    <script src="{{asset('recursos/user/js/appPrincipal.js')}}"></script>
    @yield('js')
</body>

</html>