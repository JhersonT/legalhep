<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Perfil</title>
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Sarala:wght@400;700&display=swap" rel="stylesheet">     
</head>
<body>
    @include('miabogado.menu')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{asset("css/modal.css")}}">
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    
</head>
<body>
    <div id="app">
        <div class="contenedor-registro" style="padding-top: 0">
            <img src="{{asset("img/logo.png")}}" alt="">
            <div class="contenido-input-registro ">
                <change-password :id={{auth()->user()->id}} />
            </div>
    </div>
    
    </div>

      <script src="{{asset("js/app.js")}}"></script>
      <script src="{{asset("js/scripts.js")}}"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>