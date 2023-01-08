<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="<?php echo e(asset("css/styles.css")); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
</head>
<body>
    <?php echo $__env->make('miabogado.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-miabogado">
                <img src="<?php echo e(asset("img/job.png")); ?>" alt="">
            <h2>Mi Abogado Legal Help</h2>
            
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="height: 2rem">
                <?php echo csrf_field(); ?>
                <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                    Sesión</button>
            </form>
            </div>
            <div class="borde">
                <p class="sub-titulo"><a href="<?php echo e(route("consulta.abogado")); ?>" class="links">Tipo Consulta </a> > <a href="<?php echo e(route("tipo.pago",['consulta'=>$consulta])); ?>" class="links">Tipo de Pago </a> > <a href="#" class="links">Depósito Bancario</a></p>
            </div>
        </div>
        <div class="body-miabogado">
            <h4 class="titulo-tipo-consulta">Depósito Bancario</h4>
             <div class="contenido-titulo-deposito">
                <span class="titulo-deposito">Depositar en estas cuentas.</span>
             </div>
            
            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="contenido-numero-cuenta">
                <img src="<?php echo e(asset("/storage/account/".$acc->logo)); ?>" alt="">
                <h5>Ahorro en Soles: <span><?php echo e($acc->cuenta); ?></span></h5>
                <h5>Titular: <span><?php echo e($acc->titular); ?></span></h5>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <a href="<?php echo e(route("envio.voucher",['consulta'=>$consulta])); ?>" class="btn-consultas" style="margin-top: 1rem;">Continuar <img src="<?php echo e(asset("img/flecha.svg")); ?>" alt=""></a>
            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img src="<?php echo e(asset("img/regresar.png")); ?>" alt=""> Regresar</a>
            </div>
    </div>
    <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
    <script src="<?php echo e(asset("js/app.js")); ?>"></script>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/miabogado/CuentasDeposito.blade.php ENDPATH**/ ?>