<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
</head>

<body>

    <?php echo $__env->make('miabogado.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="app">

        <div class="principal">

            <div class="principal-logo">
                <div class="contenido-miabogado">
                    <img src="<?php echo e(asset("img/igv.png")); ?>" alt="">
                    <h2>¿Como calcular el IGV?</h2>
                </div>
                <div class="borde">
                    <p class="sub-titulo"></p>
                </div>
            </div>
            <div class="body-miabogado">
            
                <div class="content-calculo-alcabala" style="color: #353738">
                    <igv></igv>
                </div>
                <div class="contenido-boton-regresar">
                    <a href="javascript: history.go(-1)"><img src="<?php echo e(asset('img/regresar.png')); ?>" alt="">
                        Regresar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/calculadora/igv.blade.php ENDPATH**/ ?>