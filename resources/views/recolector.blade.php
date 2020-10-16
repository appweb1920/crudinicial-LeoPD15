<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>-Recolectores-</h1>
        <a href="/detalles">Detalles recolectores</a>

        <p>Registrar recolector:</p>

        <form action="/recolector" method="POST">
            @csrf
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <input type="text" name="dias" id="dias" placeholder="LMXJVSD">
            <input type="submit" value="Registrar">
        </form>

        @if(!is_null($recolectores))
            @foreach($recolectores as $r)
                <p>Nombre: {{$r->nombre}} <a href="/recolector/editar/{{$r->idRecolector}}">Modificar</a> 
                                            <a href="/recolector/eliminar/{{$r->idRecolector}}">Eliminar</a>
                <br> Días de recolección: {{$r->dias}} </p>
            @endforeach
        @endif

    </div>
</body>
</html>