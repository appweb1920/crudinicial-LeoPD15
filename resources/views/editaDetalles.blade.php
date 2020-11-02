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
            $(".dropdown-trigger").dropdown();
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
        <ul id="dropdown1" class="dropdown-content">
            <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </li>
        </ul>
        <div class="nav-wrapper  red darken-4">
            <a href="#" class="brand-logo">Detalles del Recolector</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/recolector">Recolectores</a></li>
                <li><a href="/puntos">Puntos de Recolección</a></li>
                <li><a href="/detalles">volver</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{Auth::user()->name}}
                        <i class="material-icons right"></i></a></li>
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
@endguest  
</body>
</html>