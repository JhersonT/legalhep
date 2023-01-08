<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>

    @include('miabogado.menu')

    <div id="app">

        <div class="principal">

            <div class="principal-logo">
                <div class="contenido-miabogado">
                    <img src="{{asset("/img/job.png")}}" alt="">
                    <h2>Mi Abogado Legal Help </h2>
                    
                    <form action="{{ route('logout') }}" method="POST" style="height: 2rem">
                        @csrf
                        <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                            Sesión</button>
                    </form>
                </div>
                <div class="borde">
                    <p class="sub-titulo">Tipo de Consulta</p>
                </div>
            </div>
            <consulta-abogado :id="{{auth()->user()->id}}" />
        </div>
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
