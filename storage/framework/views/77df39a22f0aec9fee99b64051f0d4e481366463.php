<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="<?php echo e(asset("css/styles.css")); ?>">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>
<body>
    <?php echo $__env->make('miabogado.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-logo">
               <div id="app">
                <imagen-perfil id="<?php echo e(auth()->user()->id); ?>" />
               </div>
            <h2 style="color:white"><?php echo e(auth()->user()->name); ?></h2>

            <form action="<?php echo e(route("logout")); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-cerrar-sesion" style="cursor: pointer;border:none">Cerrar Sesión</button>
            </form>
            </div>
            <div class="borde">
            </div>
        </div>
        <div class="botones-principal">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front')): ?>
            <a href="<?php echo e(route("consulta.abogado")); ?>">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/job.png")); ?>" alt="">
                </div>
                <label>Mi Abogado Legal Help</label>
            </a>
            <a href="<?php echo e(route("emergencia.consulta")); ?>">
                <div class="contenido-link" style="background: #A1B9E7">
                    <img src="<?php echo e(asset("img/alert.png")); ?>" alt="">
                </div>
                <label >Abogado de emergencia</label>
            </a>
            <a href="">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/map.png")); ?>" alt="">
                </div>
                <label>Ubica tu Institución</label>
            </a>
            <a href="<?php echo e(route("digital.categorias")); ?>">
                <div class="contenido-link" style="background: #A1B9E7">
                    <img src="<?php echo e(asset("img/submit.png")); ?>" alt="">
                </div>
                <label>Legal Digital</label>
            </a>
            <a href="<?php echo e(route("seguimiento.legal")); ?>">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/contactos.png")); ?>" alt="">
                </div>
                <label >Seguimiento LegalHelp</label>
            </a>
            <a href="<?php echo e(route("enlaces.interes")); ?>">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/link.svg")); ?>" alt="">
                </div>
                <label >Enlaces de interés</label>
            </a>
            <a href="<?php echo e(route("calculadora.help")); ?>">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/calculator.png")); ?>" alt="">
                </div>
                <label >Calculadora Legal Help</label>
            </a>
            
            <a href="<?php echo e(route("manual.usuario")); ?>">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/file.png")); ?>" alt="">
                </div>
                <label >Manual de Usuario</label>
            </a>
            <a href="https://wa.link/3sag70" target="__blank">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/manual.png")); ?>" alt="">
                </div>
                <label >Soporte Técnico</label>
            </a>
            <?php endif; ?>
        </div>  
    </div>
    <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
    <script src="<?php echo e(asset("js/app.js")); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/panel/principal.blade.php ENDPATH**/ ?>