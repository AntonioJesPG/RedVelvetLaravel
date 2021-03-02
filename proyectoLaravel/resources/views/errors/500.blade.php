<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>500 Error custom</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body style="background-color: #303030">
<div class="container mt-5 pt-5">
    <div class="alert alert-danger text-center" style="background-color: #c2175b; color: white;">
        <h2 class="display-3">500</h2>
        <p class="display-5">Error interno de nuestros servidores pochos</p>
        <a href="{{url('/listado')}}"><button class="btn" style="background-color:#303030; color:white; margin:auto;">Volver</button></a>
    </div>
</div>
</body>

</html>