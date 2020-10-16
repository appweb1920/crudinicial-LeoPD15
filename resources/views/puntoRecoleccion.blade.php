<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Puntos de Recolección</h1>
    <a href="">Detalles recolectores</a>
    <p>-Nuevo punto-</p>

    <div>
        <form action="/puntoN" method="post">
            @csrf
            Dirección: <input type="text" name="direccion" placeholder="Direccion" size="50"><br>
            Tipo de Basura:
            <select name="tipo_de_basura" >
                <option value="Vidrio">Vídrio</option>
                <option value="Carton">Cartón</option>
                <option value="Plastico">Plástico</option>
                <option value="Papel">Papel</option>
            </select><br>
            Hora de apertura:  <input type="time" name="hora_apertura" ><br>
            Hora de cierre: <input type="time" name="hora_cierre"><br>
            <input type="submit" value='Registrar'>
        </form>
    </div>

    <p>-Lista de puntos-</p>

    @if(!is_null($puntos))
        @foreach($puntos as $p)
             <b>- {{$p->idPunto}} </b> <a href="/puntos/editar/{{$p->idPunto}}"> Editar </a>
                                        / <a href="/puntos/eliminar/{{$p->idPunto}}"> Eliminar </a><br>
            Direccion: {{$p->direccion}} <br>
            Tipo de Recoleccion: {{$p->tipo_de_basura}} <br>
            Hora de Apertura: {{$p->hora_apertura}} 
            Hora de Cierre: {{$p->hora_cierre}} <br>
        @endforeach
    @endif

</body>
</html>