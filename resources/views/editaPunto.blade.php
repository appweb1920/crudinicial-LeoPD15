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
        <div class="nav-wrapper red darken-4">
            <a href="#" class="brand-logo">Edición Punto de Recolección</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/puntos">Puntos de Recolección</a></li>
                <li><a href="/detalleRecolector">Asociaciones por recolector</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{Auth::user()->name}}
                        <i class="material-icons right"></i></a></li>
            </ul>
        </div>
    </nav>


    <div class="row">
        <div class="col s6">
        <form action="/puntos/editar/update" method="post">
            @csrf
            Dirección: <input type="text" name="direccion" placeholder="Direccion" size="50" value="{{$punto->direccion}}">
            Tipo de Basura:
            <select name="tipo_de_basura" value="{{$punto->tipo_de_basura}}">
                <option value="Vidrio">Vídrio</option>
                <option value="Carton">Cartón</option>
                <option value="Plastico">Plástico</option>
                <option value="Papel">Papel</option>
            </select><br>
            Hora de apertura:  <input type="time" name="hora_apertura" value="{{$punto->hora_apertura}}">
            Hora de cierre: <input type="time" name="hora_cierre" value="{{$punto->hora_cierre}}">
            <input type="hidden" name="idPunto" value="{{$punto->idPunto}}">
            <input type="submit" value='Editar'>
        </form>
        </div>
    </div>
@endguest
</body>
</html>