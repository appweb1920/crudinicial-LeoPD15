<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edición Punto de Recolección</h1>


    <div>
        <form action="/puntos/editar/update" method="post">
            @csrf
            Dirección: <input type="text" name="direccion" placeholder="Direccion" size="50" value="{{$punto->direccion}}"><br>
            Tipo de Basura:
            <select name="tipo_de_basura" value="{{$punto->tipo_de_basura}}">
                <option value="Vidrio">Vídrio</option>
                <option value="Carton">Cartón</option>
                <option value="Plastico">Plástico</option>
                <option value="Papel">Papel</option>
            </select><br>
            Hora de apertura:  <input type="time" name="hora_apertura" value="{{$punto->hora_apertura}}"><br>
            Hora de cierre: <input type="time" name="hora_cierre" value="{{$punto->hora_cierre}}"><br>
            <input type="hidden" name="idPunto" value="{{$punto->idPunto}}">
            <input type="submit" value='Editar'>
        </form>
    </div>

</body>
</html>