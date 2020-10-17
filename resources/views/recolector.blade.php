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
</head>
<body>
    <div>
        <nav>
            <div class="nav-wrapper  red darken-4">
                <a href="#" class="brand-logo">Recolectores</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/detalles">Asociaciones por recolectores</a></li>
                </ul>
            </div>
        </nav>
        
        <p>Registrar recolector:</p>
        <div class="row">
            <div class="col s4">
                <form action="/recolector" method="POST">
                    @csrf
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <input type="text" name="dias" id="dias" placeholder="LMXJVSD">
                    <input class="btn waves-effect waves-light" type="submit" value="Registrar">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col s8 offset-s1">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Días de Recolección</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    @if(!is_null($recolectores))
                        @foreach($recolectores as $r)
                        <tr>
                            <td>{{$r->nombre}}</td>
                            <td>{{$r->dias}}</td>
                            <td><a href="/recolector/editar/{{$r->idRecolector}}">Modificar</a>/
                            <a href="/recolector/eliminar/{{$r->idRecolector}}">Eliminar</a> </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>