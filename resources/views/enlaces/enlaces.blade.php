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
            <img src="{{asset("/img/logo.png")}}" alt="">
            <h2 style="color:white">Enlaces de Interés</h2>

            </div>
            <div class="borde">
            </div>
        </div>
        <div class="botones-principal">
            @foreach ($enlaces as $link)
            <a href="{{$link->url}}" target="__blank">
                <div class="contenido-link">
                    <img src="{{asset("img/enlaces-interes.png")}}" alt="">
                </div>
                <label style="color:#084068 !important">{{$link->name}}</label>
            </a>
            @endforeach
    
        </div>  
    </div>
    <script src="{{asset("js/scripts.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>