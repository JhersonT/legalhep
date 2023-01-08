<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

  <main class="container-password">
       <div class="password">
        <h4>Ingresa el email registrado en nuestro sistema para iniciar el proceso </h4>
       <h4>Enviaremos un correo para que puedas recuperar tu contraseña</h4>     
       <div class="container-input">
        <input type="text" placeholder="Usuario" name="password" class="input-password">
        </div>
        <input type="submit" value="Resetear Contraseña" class="boton">
       </div>
  </main>
    
</body>
</html>