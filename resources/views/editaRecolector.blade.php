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
@guest

    @if(Route::has('register'))
        <div>
            Error, necesitas <a href="{{ route('register') }}">registrarte</a>
        </div>
    @endif

    @else
    <nav>
        <div class="nav-wrapper  red darken-4">
            <a href="#" class="brand-logo">Edicion de Recolector</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/recolector">Recolectores</a></li>
                <li><a href="/detalleRecolector">Asociaciones por recolector</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col s5">
            <form action="/recolector/editar/update" method="post">
                @csrf
                <input type="hidden" name="idRecolector" value="{{$recolector->idRecolector}}">
                Nombre: <input type="text" name="nombre" value="{{$recolector->nombre}}">
                Días de Recolección: <input type="text" name="dias" value="{{$recolector->dias}}">
                <input type="submit" class="btn waves-effect waves-light" value="Actualizar">
            </form>    
        </div>
    </div>
@endguest
</body>
</html>