<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 

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
            <a href="#" class="brand-logo">Puntos asociados por recolector</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/recolector">Recolectores</a></li>
                <li><a href="/puntos">Puntos de Recolección</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{Auth::user()->name}}
                        <i class="material-icons right"></i></a></li>
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
            <br>{{$r->idRecolector}} - 
            @if(Auth::user()->rol == 'administrador')<a href="/detalles/editar/{{$r->idRecolector}}">Editar</a> @endif
            {{$r->nombre}}, {{$r->dias}} <br>
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
@endguest
</body>
</html>