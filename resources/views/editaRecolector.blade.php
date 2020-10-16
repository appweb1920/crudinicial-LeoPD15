<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edicion de Recoletor</h1>

    <form action="/update" method="post">
        @csrf
        <input type="hidden" name="idRecolector" value="{{$recolector->idRecolector}}">
        <input type="text" name="nombre" value="{{$recolector->nombre}}">
        <input type="text" name="dias" value="{{$recolector->dias}}">
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>