<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Pago</title>
    <link rel="stylesheet" href="<?php echo e(asset("css/styles.css")); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
</head>
<body>
    <?php echo $__env->make('miabogado.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        <div class="contenido-confirmar-pago">
            <img src="<?php echo e(asset("img/logo.png")); ?>" alt="">
            <div class="detalle-pago">
                <h3>Tipo Consulta: <?php echo e($consulta->modalidad); ?></h3>
                <h5>Costo del servicio: <span> S/ <?php echo e($consulta->precio); ?></span>
                <h5>Código de solicitud : <span> <?php echo e($consulta->numeroConsulta); ?></span>
                </h5>
            </div>
            <div>
             <h3 class="message-pago" style="font-family: 'Sarala', sans-serif;background:white;color:#1080D0;display:flex;justify-content:center;align-items:center;padding:.7rem 1rem;position: relative;" >¡Su pago se a realizado con éxito! <img src="<?php echo e(asset("img/img-llamada.png")); ?>" alt="" style="position: absolute;left:95%;"></h3>
            </div>
            <img src="<?php echo e(asset("img/pago.png")); ?>" alt="">

            <div class="contenido-botones-pago">
                <a href="" class="btn-pago">Iniciar Consulta</a>
            <a href="<?php echo e(route('dashboard')); ?>" class="btn-pago">Consultar más tarde</a>
            </div>

        </div>
        <script src="<?php echo e(asset("js/DatosPago.js")); ?>"></script>
        <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
        <script src="<?php echo e(asset("js/app.js")); ?>"></script>
        
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/abogado-emergencia/ConfirmarPago.blade.php ENDPATH**/ ?>