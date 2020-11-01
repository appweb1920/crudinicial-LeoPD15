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
@guest

    @if(Route::has('register'))
        <div>
            Error, necesitas <a href="{{ route('register') }}">registrarte</a>
        </div>
    @endif

    @else
    <nav>
        <div class="nav-wrapper  red darken-4">
            <a href="#" class="brand-logo">Puntos de Recolección</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/detalles">Asociaciones por recolectores</a></li>
                <li><a href="/recolector">Recolectores</a></li>
            </ul>
        </div>
    </nav>

    @if(Auth::user()->rol == 'administrador')
        <div class="row">
        <div class="col s6">
        <p>Nuevo punto de recolección:</p>
            <form action="/puntoN" method="post" >
                @csrf
                Dirección: <input type="text" name="direccion" placeholder="Direccion" size="50"><br>
                <br>Tipo de Basura:
                    
                    <select name="tipo_de_basura" >
                        <option value="Vidrio">Vídrio</option>
                        <option value="Carton">Cartón</option>
                        <option value="Plastico">Plástico</option>
                        <option value="Papel">Papel</option>
                    </select>
                    <br>
                
                <br>Hora de apertura:  <input type="time" name="hora_apertura" ><br>
                <br>Hora de cierre: <input type="time" name="hora_cierre"><br>
                <input class="btn waves-effect waves-light" type="submit" value='Registrar'>
            </form>
            </div>
        </div>
    @endif
    
    <div class="row">
        <div class="col s8 offset-s1">
        <p> <b>Puntos de recolección</b> </p>
        <table >
            <thead>
                <tr>
                    <th>id Punto</th>
                    <th>Direccion</th>
                    <th>Tipo de Reciclaje</th>
                    <th>Hora de Apertura</th>
                    <th>Hora de Cierre</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @if(!is_null($puntos))
                    @foreach($puntos as $p)
                    <tr>
                        <td>{{$p->idPunto}}</td>
                        <td>{{$p->direccion}} </td> 
                        <td> {{$p->tipo_de_basura}} </td>
                        <td> {{$p->hora_apertura}} </td>
                        <td> {{$p->hora_cierre}} </td>
                        <td><a href="/puntos/editar/{{$p->idPunto}}"> Editar </a>/
                                <a href="/puntos/eliminar/{{$p->idPunto}}"> Eliminar </a></td>
                    </tr>
                    @endforeach
                @endif    
            </tbody>

        </table>
        </div>
    </div>
@endguest
</body>
</html>