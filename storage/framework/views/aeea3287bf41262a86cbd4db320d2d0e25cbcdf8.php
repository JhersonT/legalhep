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
    <div class="content-register">
        <div class="contenido-login">
            <img src="<?php echo e(asset("img/logo.png")); ?>" alt="">
            <h2>Identificación</h2>
            <?php if(session('mensaje')): ?>
            <div class="alerta" role="alert">
                <p class="message-error" style="text-align: center"><?php echo e(session('mensaje')); ?></p>
            </div>
                 <?php endif; ?>
            <form action="<?php echo e(route("request.login")); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="content-input">
                <div class="input-pass">
                    <input type="text" placeholder="Correo" class="correo" name="email">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e("El Email es requerido"); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="input-pas">
                    <input type="password" placeholder="Contraseña" class="password" name="password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e("La contraseña es requerida"); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="content-check">
                    <input type="checkbox">
                    <label for="">Recordar mis datos</label>
                </div>
                <div class="contenido-botones">
                    <button type="submit" class="btn" style="cursor: pointer;border:none;font-weight:700" >Ingresar</button>
                    <a href="<?php echo e(route('password.request')); ?>" class="btn" style="font-size: .8rem;font-weight:700">Olvide mi contraseña</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/auth/login.blade.php ENDPATH**/ ?>