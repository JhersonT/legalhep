<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset("css/styles.css")); ?>">
</head>
<body>
    <div class="contenido-password">
        <div class="container">
            <img src="<?php echo e(asset("img/logo.png")); ?>" alt="">
            <h2>Recuperar Contraseña</h2>
            <?php if(session('status')): ?>
            <div class="message-verification">
                <?php echo e(__('Se le envio un link a su correo para poder cambiar la contraseña')); ?>

            </div>
        <?php endif; ?>
            <p class="texto">Ingresa tu correo electrónico <br>registrado en tu cuenta LegalHelp</p>
            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?>
                <div class="content-input">
                <input type="text" placeholder="Correo" class="correo" name="email" style="border:none;outline:none;">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-verification"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="contenido-botones">
                    <button type="submit" class="btn" style="cursor:pointer;border:none;">Continuar</button>
                    <a href="<?php echo e(route("inicio")); ?>" class="btn">Regresar</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>