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
            <img src="<?php echo e(asset("/img/logo.png")); ?>" alt="">
            <h2 style="color:white">Enlaces de Interés</h2>

            </div>
            <div class="borde">
            </div>
        </div>
        <div class="botones-principal">
            <?php $__currentLoopData = $enlaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($link->url); ?>" target="__blank">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/enlaces-interes.png")); ?>" alt="">
                </div>
                <label style="color:#084068 !important"><?php echo e($link->name); ?></label>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
        </div>  
    </div>
    <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
    <script src="<?php echo e(asset("js/app.js")); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/enlaces/enlaces.blade.php ENDPATH**/ ?>