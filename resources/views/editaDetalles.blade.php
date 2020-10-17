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
            <a href="#" class="brand-logo">Detalles del Recolector</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/recolector">Recolectores</a></li>
                <li><a href="/puntos">Puntos de Recolección</a></li>
                <li><a href="/detalles">volver</a></li>
            </ul>
        </div>
    </nav>

    
    <div class="row">
        @if(!is_null($recolector))
        <div class="col s12"><h5>Recolector: {{$recolector->nombre}}</h5></div>
        <div class="col s6">
            <p>Puntos Asociados</p>   
            <div class="row">
                <div class="col s7">
                    <table>
                        <thead>
                            <tr>
                                <th>idPunto</th>
                                <th>Tipo de Basura</th>
                                <th>Dirección</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($recolector->getPuntos() as $p)        
                            @if(!is_null($p))
                            <tr>
                                <td>{{$p->idPunto}}</td>
                                <td>{{$p->tipo_de_basura}}</td>
                                <td>{{$p->direccion}}</td>
                                <td><a href="/detalles/elimina/{{$recolector->idRecolector}} {{$p->idPunto}}">Eliminar asociación</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        <div class="col s6">
            <p>Puntos disponibles a asociar</p>
            <div class="row">
                <div class="col s7">
                    <table>
                        <thead>
                            <tr>
                                <th>idPunto</th>
                                <th>Tipo de basura</th>
                                <th>Dirección</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        @if(!is_null($puntosSin))
                            @foreach($puntosSin as $p)
                            <tr>
                                <td>{{$p->idPunto}}</td>  
                                <td>{{$p->tipo_de_basura}} </td> 
                                <td>{{$p->direccion}}</td>
                                <td><a href="/detalles/asociar/{{$recolector->idRecolector}} {{$p->idPunto}}">Asociar</a></td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    

    <!--<div style="padding-left:10px;">
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
    </div>-->

    <!--<div>
    ----------------------------------------------------
        <p>Puntos disponibles a asociar: </p>
        @if(!is_null($puntosSin))
            @foreach($puntosSin as $p)
                Punto: {{$p->idPunto}}  <a href="/detalles/asociar/{{$recolector->idRecolector}} {{$p->idPunto}}">Asociar</a> <br>
                Tipo de Basura: {{$p->tipo_de_basura}} <br>
                Direccion: {{$p->direccion}} <br> <br>
            @endforeach
        @endif
    </div>-->


</body>
</html>