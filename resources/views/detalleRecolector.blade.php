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
    <nav>
        <div class="nav-wrapper  red darken-4">
            <a href="#" class="brand-logo">Puntos asociados por recolector</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/recolector">Recolectores</a></li>
                <li><a href="/puntos">Puntos de Recolección</a></li>
            </ul>
        </div>
    </nav>


    <div class="row">
        <div class="col s10">

        </div>
    </div>


    <div style="padding:10px;">
        @if(!is_null($recolectores))
            @foreach($recolectores as $r)
            <br>{{$r->idRecolector}} - <a href="/detalles/editar/{{$r->idRecolector}}">{{$r->nombre}}</a> <br>
            <div class="row">
                <div class="col s6">
                    <table>
                        <thead>
                            <tr>
                            <th>idPunto</th>
                            <th>Tipo de Basura</th>
                            <th>Direccion</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            @foreach($r->getPuntos() as $p)            
                            @if(!is_null($p))
                            <tr>
                                <td>{{$p->idPunto}}</td>
                                <td>{{$p->tipo_de_basura}}</td>
                                <td>{{$p->direccion}}</td>
                            </tr>
                            @endif
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>    
            </div>
            @endforeach
        @endif
    </div>

</body>
</html>