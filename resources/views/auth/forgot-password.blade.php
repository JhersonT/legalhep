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
            @if (session('status'))
            <div class="message-verification">
                {{ __('Se le envio un link a su correo para poder cambiar la contraseña') }}
            </div>
        @endif
            <p class="texto">Ingresa tu correo electrónico <br>registrado en tu cuenta LegalHelp</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="content-input">
                <input type="text" placeholder="Correo" class="correo" name="email" style="border:none;outline:none;">
                @error('email')
                    <p class="message-verification">{{$message}}</p>
                @enderror
                <div class="contenido-botones">
                    <button type="submit" class="btn" style="cursor:pointer;border:none;">Continuar</button>
                    <a href="{{route("inicio")}}" class="btn">Regresar</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>