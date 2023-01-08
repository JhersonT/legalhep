<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="<?php echo e(asset("css/styles.css")); ?>">
</head>
<body>
    <?php echo $__env->make('miabogado.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-logo">
            <img src="<?php echo e(asset("/img/logo.png")); ?>" alt="">
            <h2 style="color:white">Documentos en línea</h2>

            </div>
            <div class="borde">
            </div>
        </div>
        <div class="botones-principal">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route("digital.subcategoria",['categoria'=>$cat->id])); ?>" >
                <div class="contenido-link">
                    <img src="<?php echo e($cat->image? asset("storage/image/$cat->image") : asset("img/folder.png")); ?>" alt="">
                </div>
                <label style="color:#084068 !important"><?php echo e($cat->name); ?></label>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
        </div>  
    </div>
    <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
    <script src="<?php echo e(asset("js/app.js")); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/legal-digital/categorias.blade.php ENDPATH**/ ?>