<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("/admin/css/style.css")}}">
</head>
<body>

  <main class="container-login">
            <div class="login">
                @if (session('mensaje'))
            <div class="alerta" role="alert">
                <p class="error">{{ session('mensaje') }}</p>
            </div>
                 @endif
                <img src="{{asset("/admin/img/legal.png")}}" alt="logo shaca" class="logo">
                <form action="{{route('login.admin')}}" method="POST">
                    @method("POST")
                    @csrf
                    <div class="container-input">
                        <input type="text" placeholder="Usuario" name="email" value="{{old('email')}}">
                        @error('email')
                            <p class="err">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="container-input">
                        <input type="password" placeholder="Contraseña" name="password">
                        @error('password')
                            <p class="err">{{$message}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Ingresar" class="boton">
                </form>

            </div>
  </main>
    
</body>
</html>