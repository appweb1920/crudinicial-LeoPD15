<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detalles del Recolector</h1>
    <a href="/detalles">Detalles Recolectores</a>
    <a href="/recolector">Recolectores</a> 

    <div>
        @if(!is_null($recolector))
            <p>Recolector: {{$recolector->nombre}}</p>
            Puntos asociados: <br>
            @foreach($recolector->getPuntos() as $p)
                @if(!is_null($p))
                    Punto: {{$p->idPunto}} <a href="/detalles/elimina/{{$recolector->idRecolector}} {{$p->idPunto}}">Eliminar asociación</a> <br>
                    Tipo de Basura: {{$p->tipo_de_basura}} <br>
                    Direccion: {{$p->direccion}} <br><br>
                @endif
            @endforeach
        @endif
    </div>

    <div>
    ----------------------------------------------------
        <p>Puntos disponibles a asociar: </p>
        @if(!is_null($puntosSin))
            @foreach($puntosSin as $p)
                Punto: {{$p->idPunto}}  <a href="/detalles/asociar/{{$recolector->idRecolector}} {{$p->idPunto}}">Asociar</a> <br>
                Tipo de Basura: {{$p->tipo_de_basura}} <br>
                Direccion: {{$p->direccion}} <br> <br>
            @endforeach
        @endif
    </div>


</body>
</html>