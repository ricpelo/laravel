<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        <p>El usuario está autenticado</p>
    @endauth
    @guest
        <p>El usuario no está autenticado</p>
    @endguest

    {{ $titulo }}
</body>
</html>
