<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarala:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
</head>
<body>
    <div class="content-register">
        <div class="contenido-login">
            <img src="{{asset("img/logo.png")}}" alt="">
            <h2>Identificación</h2>
            @if (session('mensaje'))
            <div class="alerta" role="alert">
                <p class="message-error" style="text-align: center">{{ session('mensaje') }}</p>
            </div>
                 @endif
            <form action="{{route("request.login")}}" method="POST">
                @csrf
                <div class="content-input">
                <div class="input-pass">
                    <input type="text" placeholder="Correo" class="correo" name="email">
                @error('email')
                    <p class="message-error">{{"El Email es requerido"}}</p>
                @enderror
                </div>
                <div class="input-pas">
                    <input type="password" placeholder="Contraseña" class="password" name="password">
                    @error('password')
                    <p class="message-error">{{"La contraseña es requerida"}}</p>
                @enderror
                </div>
                <div class="content-check">
                    <input type="checkbox">
                    <label for="">Recordar mis datos</label>
                </div>
                <div class="contenido-botones">
                    <button type="submit" class="btn" style="cursor: pointer;border:none;font-weight:700" >Ingresar</button>
                    <a href="{{route('password.request')}}" class="btn" style="font-size: .8rem;font-weight:700">Olvide mi contraseña</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>