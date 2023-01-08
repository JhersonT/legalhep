<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="<?php echo e(asset("css/modal.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("css/styles.css")); ?>">
    
</head>
<body>
    <div class="contenedor-registro">
            <img src="<?php echo e(asset("img/logo.png")); ?>" alt="">
            <div class="contenido-input-registro ">
              <form action="<?php echo e(route("register")); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <select name="tipoDoc" id="" class="select">
                  <option value="">--Tipo de documento--</option>
                  <option value="DNI" <?php echo e(@old("tipoDoc") === "DNI" ? 'selected' : ''); ?>>DNI</option>
                  <option value="Carnet de Extranjeria" <?php echo e(@old("tipoDoc") === "Carnet de Extranjeria" ? 'selected' : ''); ?>>Carnet de Extranjeria</option>
                  <option value="Pasaporte" <?php echo e(@old("tipoDoc") === "Pasaporte" ? 'selected' : ''); ?>>Pasaporte</option>
                </select>
                <?php $__errorArgs = ['tipoDoc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="text" class="input-text" placeholder="Número de documento" name="documento" value="<?php echo e(old("documento")); ?>">
                <?php $__errorArgs = ['documento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <select name="departamento" id="" class="select">
                  <option value="">--Departamento--</option>
                  <?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($dep->nombre); ?>" <?php echo e(@old("departamento") === $dep->nombre ? 'selected' : ''); ?> ><?php echo e($dep->nombre); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['departamento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="text" class="input-text" placeholder="Nombres" name="nombres" value="<?php echo e(old("nombres")); ?>">
                <?php $__errorArgs = ['nombres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="text" class="input-text" placeholder="Apellidos" name="apellidos" value="<?php echo e(old("apellidos")); ?>">
                <?php $__errorArgs = ['apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="text" class="input-text" placeholder="correo" name="email" value="<?php echo e(old("email")); ?>">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="password" class="input-text" placeholder="Contraseña" name="contraseña">
                <?php $__errorArgs = ['contraseña'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="content-check">
                  <input type="checkbox" id="" name="confirmar" <?php echo e(@old("confirmar") === "confirmar"? 'checked':''); ?>>
                  <a class="open-modal" data-open="modal1">He leído y acepto los Términos y condiciones.</a>
                </div>
                <?php $__errorArgs = ['confirmar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="message-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="submit" value="Registrarme" class="btn btn-registrar">
            </form>
            </div>
    </div>

    <!--MODAL-->
      
      <div class="modal" id="modal1" data-animation="slideInOutLeft">
        <div class="modal-dialog">
          <header class="modal-header">
            <p></p>
            <button class="close-modal" aria-label="close modal" data-close>
              ✕  
            </button>
          </header>
          <section class="modal-content">
            <p><strong class="titulo-modal">Términos y Condiciones de Uso</strong></p>
            <p>Los presentes Términos y Condiciones describen los derechos y responsabilidades del Usuario y de Legal Help respecto al servicio de procesamiento y gestión de datos, la plataforma electrónica a través de la cual se realizarán cualquier producto o servicio relacionado o complementario que ofrezca o pueda ofrecer Legal Help (conjuntamente, el “Servicio”).</p>
            <p>La aceptación de los Términos y Condiciones constituye un requisito previo para el registro como Usuario del Servicio y/o la utilización del mismo. Mediante la aceptación de los Términos y Condiciones, el Usuario declara haber leído, entendido y aceptado todas las condiciones establecidas en este documento y demás políticas y principios incorporados por referencia, accesibles a través de la URL incluidas en estos Términos y Condiciones.</p>
            <p> Cualquier persona que no acepte estos términos y condiciones generales, los cuales tienen un carácter obligatorio y vinculante, deberá abstenerse de utilizar los Servicios.</p>          </section>

        </div>
      </div>
      
      <div class="modal" id="modal2" data-animation="mixInAnimations">
        <div class="modal-dialog">
          <header class="modal-header">
            The header of the second modal
            <button class="close-modal" aria-label="close modal" data-close>
              ✕  
            </button>
          </header>
          <section class="modal-content">
            <p><strong>Press ✕, ESC, or click outside of the modal to close it</strong></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo repellendus reprehenderit accusamus totam ratione! Nesciunt, nemo dolorum recusandae ad ex nam similique dolorem ab perspiciatis qui. Facere, dignissimos. Nemo, ea.</p>
            <p>Nullam vitae enim vel diam elementum tincidunt a eget metus. Curabitur finibus vestibulum rutrum. Vestibulum semper tellus vitae tortor condimentum porta. Sed id ex arcu. Vestibulum eleifend tortor non purus porta dapibus</p>
          </section>
          <footer class="modal-footer">
            The footer of the second modal
          </footer>
        </div>
      </div>

      <script src="<?php echo e(asset("js/modal.js")); ?>"></script>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/auth/register.blade.php ENDPATH**/ ?>