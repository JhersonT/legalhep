<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>
<body>
    @include('miabogado.menu')
    
    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-logo">
               <div id="app">
                <imagen-perfil id="{{auth()->user()->id}}" />
               </div>
            <h2 style="color:white">{{auth()->user()->name}}</h2>

            <form action="{{route("logout")}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-cerrar-sesion" style="cursor: pointer;border:none">Cerrar Sesión</button>
            </form>
            </div>
            <div class="borde">
            </div>
        </div>
        <div class="botones-principal">
            @can('front')
            <a href="{{route("consulta.abogado")}}">
                <div class="contenido-link">
                    <img src="{{asset("img/job.png")}}" alt="">
                </div>
                <label>Mi Abogado Legal Help</label>
            </a>
            <a href="{{route("emergencia.consulta")}}">
                <div class="contenido-link" style="background: #A1B9E7">
                    <img src="{{asset("img/alert.png")}}" alt="">
                </div>
                <label >Abogado de emergencia</label>
            </a>
            <a href="">
                <div class="contenido-link">
                    <img src="{{asset("img/map.png")}}" alt="">
                </div>
                <label>Ubica tu Institución</label>
            </a>
            <a href="{{route("digital.categorias")}}">
                <div class="contenido-link" style="background: #A1B9E7">
                    <img src="{{asset("img/submit.png")}}" alt="">
                </div>
                <label>Legal Digital</label>
            </a>
            <a href="{{route("seguimiento.legal")}}">
                <div class="contenido-link">
                    <img src="{{asset("img/contactos.png")}}" alt="">
                </div>
                <label >Seguimiento LegalHelp</label>
            </a>
            <a href="{{route("enlaces.interes")}}">
                <div class="contenido-link">
                    <img src="{{asset("img/link.svg")}}" alt="">
                </div>
                <label >Enlaces de interés</label>
            </a>
            <a href="{{route("calculadora.help")}}">
                <div class="contenido-link">
                    <img src="{{asset("img/calculator.png")}}" alt="">
                </div>
                <label >Calculadora Legal Help</label>
            </a>
            
            <a href="{{route("manual.usuario")}}">
                <div class="contenido-link">
                    <img src="{{asset("img/file.png")}}" alt="">
                </div>
                <label >Manual de Usuario</label>
            </a>
            <a href="https://wa.link/3sag70" target="__blank">
                <div class="contenido-link">
                    <img src="{{asset("img/manual.png")}}" alt="">
                </div>
                <label >Soporte Técnico</label>
            </a>
            @endcan
        </div>  
    </div>
    <script src="{{asset("js/scripts.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>