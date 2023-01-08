<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Email</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Scada:wght@400;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Sarala:wght@400;700&display=swap" rel="stylesheet"> 
</head>

<body>
    <div class="contenido">
        <img src="<?php echo e(asset('img/logo.png')); ?>" alt="">
        <h2 class="text-white" style="color:#F5F1F1;font-size:15px">Registro de Usuarios</h2>
        <p class="sub-text" style="font-family: 'Scada', sans-serif;font-weight:400;text-align:center">Hemos enviado un mensaje de confirmación a la cuenta de correo <?php echo e(auth()->user()->email); ?></p>
        <div class="contenido-input-boton ">
            <?php if(session('status') == 'verification-link-sent'): ?>
            <div class="message-verification" style="margin-bottom: 1rem;text-align:center;">
                <?php echo e(__('Se le envio un link de confirmación a su correo')); ?>

            </div>
        <?php endif; ?>

            <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                <?php echo csrf_field(); ?>
                <button class="btn-confirmar" style="cursor: pointer;border:none;font-family: 'Sarala', sans-serif;" type="submit">Confirme su correo para ingresar al sistema <img src="<?php echo e(asset("img/img-llamada.png")); ?>" alt=""></button>
            </form>
            <img src="<?php echo e(asset('img/pago.png')); ?>" alt="" class="img-confirmar">
            <div class="contenido-botones">
                <a href="<?php echo e(route("inicio")); ?>" class="btn registrarme">Continuar</a>
                </form>
            </div>
        </div>
</body>

</html>
<?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>