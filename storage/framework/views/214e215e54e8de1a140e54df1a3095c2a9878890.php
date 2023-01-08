<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarala:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo e(asset("css/styles.css")); ?>">
</head>
<body>
    <div class="content">
        <div class="contenido-logo w-50">
            <div class="content-text">
                <img src="<?php echo e(asset("img/logo.png")); ?>" alt="">
                <h1>Los servicios legales nunca <br> se vieron tan sencillos.</h1>
            </div>
            <div class="borde">
                
            </div>
        </div>
        <div class="contenido-text">
            <div class="contenido-botones">
                <a href="<?php echo e(route("login")); ?>" class="btn">Ya tengo una cuenta</a>
                <a href="<?php echo e(route("register")); ?>" class="btn">Registrarme</a>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/inicio.blade.php ENDPATH**/ ?>