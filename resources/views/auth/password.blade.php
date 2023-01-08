<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
</head>
<body>
    <div class="contenido-password">
        <div class="container">
            <img src="{{asset("img/logo.png")}}" alt="">
            <h2>Recuperar Contraseña</h2>
            <p class="texto">Ingresa tu correo electrónico <br>registrado en tu cuenta LegalHelp</p>
            <form action="">
                <div class="content-input">
                <input type="text" placeholder="Correo" class="correo">
                <div class="contenido-botones">
                    <a href="" class="btn">Continuar</a>
                    <a href="{{route("inicio")}}" class="btn">Regresar</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>