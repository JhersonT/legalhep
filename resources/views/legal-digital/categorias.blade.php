<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
</head>
<body>
    @include('miabogado.menu')
    
    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-logo">
            <img src="{{asset("/img/logo.png")}}" alt="">
            <h2 style="color:white">Documentos en línea</h2>

            </div>
            <div class="borde">
            </div>
        </div>
        <div class="botones-principal">
            @foreach ( $categorias as $cat )
            <a href="{{route("digital.subcategoria",['categoria'=>$cat->id])}}" >
                <div class="contenido-link">
                    <img src="{{$cat->image? asset("storage/image/$cat->image") : asset("img/folder.png")}}" alt="">
                </div>
                <label style="color:#084068 !important">{{$cat->name}}</label>
            </a>
            @endforeach
    
        </div>  
    </div>
    <script src="{{asset("js/scripts.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>