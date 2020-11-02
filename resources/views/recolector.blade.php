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
    <!--Import Google Icon Font-->
    
    <script type="text/javascript">
        $(document).ready(function(){
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

    <div>
        <ul id="dropdown1" class="dropdown-content">
            <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </li>
        </ul>
        <nav class="nav-extended ">
            <div class="nav-wrapper red darken-4">
                <a href="#" class="brand-logo">Recolectores</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/detalles">Asociaciones por recolectores</a></li>
                    <li><a href="/puntos">Puntos de Recolección</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{Auth::user()->name}}
                        <i class="material-icons right"></i></a></li>
                </ul>
            </div>
        </nav>
        
        @if(Auth::user()->rol == 'administrador')
        <div class="row">
            <div class="col s4">
            <p>Registrar recolector:</p>
                <form action="/recolector" method="POST">
                    @csrf
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <input type="text" name="dias" id="dias" placeholder="LMXJVSD">
                    <input class="btn waves-effect waves-light" type="submit" value="Registrar">
                </form>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col s7 offset-s1">
            <p> <b>Recolectores</b> </p>
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
    @endguest
</body>
</html>