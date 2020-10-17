<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select').formSelect();
        })
    </script>
</head>
<body>
    <h1>Puntos de Recolección</h1>
    <a href="/detalles">Detalles recolectores</a>
    <p>-Nuevo punto-</p>

    <div style="padding:40px;">
        <form action="/puntoN" method="post" >
            @csrf
            Dirección: <input type="text" name="direccion" placeholder="Direccion" size="50"><br>
            <br>Tipo de Basura:
                <div class="input-field col s12">
                <select name="tipo_de_basura" >
                    <option value="Vidrio">Vídrio</option>
                    <option value="Carton">Cartón</option>
                    <option value="Plastico">Plástico</option>
                    <option value="Papel">Papel</option>
                </select>
                </div><br>
            
            <br>Hora de apertura:  <input type="time" name="hora_apertura" ><br>
            <br>Hora de cierre: <input type="time" name="hora_cierre"><br>
            <input type="submit" value='Registrar'>
        </form>
    </div>

    <p>-Lista de puntos-</p>
    <div class="row">
        <div class="col s8 offset-s1">
        <table >
            <thead>
                <tr>
                    <th>id Punto</th>
                    <th>Direccion</th>
                    <th>Tipo de Reciclaje</th>
                    <th>Hora de Apertura</th>
                    <th>Hora de Cierre</th>
                </tr>
            </thead>

            <tbody>
                @if(!is_null($puntos))
                    @foreach($puntos as $p)
                    <tr>
                        <td>{{$p->idPunto}} <a href="/puntos/editar/{{$p->idPunto}}"> Editar </a>
                                        / <a href="/puntos/eliminar/{{$p->idPunto}}"> Eliminar </a></td>
                        <td>{{$p->direccion}} </td> 
                        <td> {{$p->tipo_de_basura}} </td>
                        <td> {{$p->hora_apertura}} </td>
                        <td> {{$p->hora_cierre}} </td>
                    </tr>
                    @endforeach
                @endif    
            </tbody>

        </table>
        </div>
    </div>
    <!--@if(!is_null($puntos))
        @foreach($puntos as $p)
             <b>- {{$p->idPunto}} </b> <a href="/puntos/editar/{{$p->idPunto}}"> Editar </a>
                                        / <a href="/puntos/eliminar/{{$p->idPunto}}"> Eliminar </a><br>
            Direccion: {{$p->direccion}} <br>
            Tipo de Recoleccion: {{$p->tipo_de_basura}} <br>
            Hora de Apertura: {{$p->hora_apertura}} 
            Hora de Cierre: {{$p->hora_cierre}} <br>
        @endforeach
    @endif -->

</body>
</html>