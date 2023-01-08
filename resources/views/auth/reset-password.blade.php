<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="contenido-password" style="padding: 3rem 0">
        <div class="container">
            <img src="{{ asset('img/logo.png') }}" alt="">
            <h2>Recuperar Contraseña</h2>
            <p class="texto">Ingresa tu nueva contraseña</p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="content-input">
                    <div class="contenido-input-password">
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        @error('token')
                            <p class="message-error" style="text-align: left;margin-top:.3rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="contenido-input-password">
                        <input type="text" placeholder="Correo" class="input-reset-password"
                            value="{{ old('email', $request->email) }}" name="email">
                        @error('email')
                            <p class="message-error" style="text-align: left;margin-top:.3rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="contenido-input-password">
                        <input type="password" placeholder="Contraseña" class="input-reset-password" type="password"
                            name="password">
                        @error('password')
                            <p class="message-error" style="text-align: left;margin-top:.3rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="contenido-input-password">
                        <input type="password" placeholder="Confirmar Contraseña" class="input-reset-password"
                            name="password_confirmation">
                        @error('password_confirmation')
                            <p class="message-error" style="text-align: left;margin-top:.3rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="contenido-botones-reset-password">
                        <button type="submit" class="btn" style="cursor: pointer">Continuar</button>
                        <a href="{{ route('inicio') }}" class="btn">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
