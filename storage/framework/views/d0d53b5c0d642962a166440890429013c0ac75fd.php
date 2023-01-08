<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>

<body>
    <div class="contenido-password" style="padding: 3rem 0">
        <div class="container">
            <img src="<?php echo e(asset('img/logo.png')); ?>" alt="">
            <h2>Recuperar Contraseña</h2>
            <p class="texto">Ingresa tu nueva contraseña</p>
            <form method="POST" action="<?php echo e(route('password.update')); ?>">
                <?php echo csrf_field(); ?>
                <div class="content-input">
                    <div class="contenido-input-password">
                        <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">
                        <?php $__errorArgs = ['token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="message-error" style="text-align: left;margin-top:.3rem"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="contenido-input-password">
                        <input type="text" placeholder="Correo" class="input-reset-password"
                            value="<?php echo e(old('email', $request->email)); ?>" name="email">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="message-error" style="text-align: left;margin-top:.3rem"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="contenido-input-password">
                        <input type="password" placeholder="Contraseña" class="input-reset-password" type="password"
                            name="password">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="message-error" style="text-align: left;margin-top:.3rem"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="contenido-input-password">
                        <input type="password" placeholder="Confirmar Contraseña" class="input-reset-password"
                            name="password_confirmation">
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="message-error" style="text-align: left;margin-top:.3rem"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="contenido-botones-reset-password">
                        <button type="submit" class="btn" style="cursor: pointer">Continuar</button>
                        <a href="<?php echo e(route('inicio')); ?>" class="btn">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>