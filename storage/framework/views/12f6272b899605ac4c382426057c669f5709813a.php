<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset("/admin/css/style.css")); ?>">
</head>
<body>

  <main class="container-login">
            <div class="login">
                <?php if(session('mensaje')): ?>
            <div class="alerta" role="alert">
                <p class="error"><?php echo e(session('mensaje')); ?></p>
            </div>
                 <?php endif; ?>
                <img src="<?php echo e(asset("/admin/img/legal.png")); ?>" alt="logo shaca" class="logo">
                <form action="<?php echo e(route('login.admin')); ?>" method="POST">
                    <?php echo method_field("POST"); ?>
                    <?php echo csrf_field(); ?>
                    <div class="container-input">
                        <input type="text" placeholder="Usuario" name="email" value="<?php echo e(old('email')); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="err"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="container-input">
                        <input type="password" placeholder="Contraseña" name="password">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="err"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <input type="submit" value="Ingresar" class="boton">
                </form>

            </div>
  </main>
    
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>