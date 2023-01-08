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
 
            <a href="<?php echo e(route("calculadora.alcabala")); ?>">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/alcabala.png")); ?>" alt="">
                </div>
                <label style="color:#084068 !important">Alcabala</label>
            </a>
            <a href="<?php echo e(route("calculadora.impuesto")); ?>">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/impuesto.png")); ?>" alt="">
                </div>
                <label style="color:#084068 !important">Impuesto a la renta</label>
            </a>
            <a href="<?php echo e(route("calculadora.igv")); ?>">
                <div class="contenido-link">
                    <img src="<?php echo e(asset("img/igv.png")); ?>" alt="">
                </div>
                <label style="color:#084068 !important">¿Cómo calcular el IGV?
                </label>
            </a>

    
        </div>  
    </div>
    <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
    <script src="<?php echo e(asset("js/app.js")); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/calculadora/calculadora.blade.php ENDPATH**/ ?>