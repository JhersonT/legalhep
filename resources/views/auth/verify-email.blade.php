<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Email</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Scada:wght@400;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Sarala:wght@400;700&display=swap" rel="stylesheet"> 
</head>

<body>
    <div class="contenido">
        <img src="{{ asset('img/logo.png') }}" alt="">
        <h2 class="text-white" style="color:#F5F1F1;font-size:15px">Registro de Usuarios</h2>
        <p class="sub-text" style="font-family: 'Scada', sans-serif;font-weight:400;text-align:center">Hemos enviado un mensaje de confirmación a la cuenta de correo {{auth()->user()->email}}</p>
        <div class="contenido-input-boton ">
            @if (session('status') == 'verification-link-sent')
            <div class="message-verification" style="margin-bottom: 1rem;text-align:center;">
                {{ __('Se le envio un link de confirmación a su correo') }}
            </div>
        @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button class="btn-confirmar" style="cursor: pointer;border:none;font-family: 'Sarala', sans-serif;" type="submit">Confirme su correo para ingresar al sistema <img src="{{asset("img/img-llamada.png")}}" alt=""></button>
            </form>
            <img src="{{ asset('img/pago.png') }}" alt="" class="img-confirmar">
            <div class="contenido-botones">
                <a href="{{route("inicio")}}" class="btn registrarme">Continuar</a>
                </form>
            </div>
        </div>
</body>

</html>
