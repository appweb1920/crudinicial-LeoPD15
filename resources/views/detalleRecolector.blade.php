<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detalle Recolectores</h1>
    <p><a href="/recolector">Recolectores</a></p>
    <p><a href="/puntos">Puntos de Recolección</a></p>

    <div>
        
        @if(!is_null($recolectores))
            @foreach($recolectores as $r)
            <br>{{$r->idRecolector}} - <a href="/detalles/editar/{{$r->idRecolector}}">{{$r->nombre}}</a> <br>
                Puntos de recoleccion asociados: <br>
                @foreach($r->getPuntos() as $p)
                    @if(!is_null($p))
                        Punto: {{$p->idPunto}} ; Tipo de Basura: {{$p->tipo_de_basura}} <br>
                        Direccion: {{$p->direccion}} <br><br>
                    @endif
                @endforeach

            @endforeach
        @endif
    </div>

</body>
</html>