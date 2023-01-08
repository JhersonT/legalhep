<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
</head>

<body>

    @include('miabogado.menu')

    <div id="app">

        <div class="principal">

            <div class="principal-logo">
                <div class="contenido-miabogado">
                    <img src="{{asset("img/file.png")}}" alt="">
                    <h2>Manual de Usuario.</h2>
                    <form action="{{ route('logout') }}" method="POST" style="height: 2rem">
                        @csrf
                        <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                            Sesión</button>
                    </form>
                </div>
                <div class="borde">
                    <p class="sub-titulo"></p>
                </div>
            </div>
            <div class="body-miabogado">
            
                <div class="content-video">
                    <h2>{{$manual->titulo}}</h2>
                    <iframe  src="{{$manual->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>