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
            <div class="contenido-miabogado" style="flex-direction: column">
                <img src="<?php echo e(asset("img/logo.png")); ?>" alt="">
                <h2 style="margin-top: .5rem;margin-bottom:.5rem;">Documentos en línea</h2>
            
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="height: 2rem" class="form-session">
                <?php echo csrf_field(); ?>
                <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                    Sesión</button>
            </form>
            </div>
            <div class="borde">
                <p class="sub-titulo"><a href="<?php echo e(route("emergencia.tipoPago",["consulta"=>$consulta])); ?>" class="links">Tipo Pago </a> > <a href="#" class="links">Depósito Bancario </a></p>
            </div>
        </div>
        <div class="body-miabogado">
            <h4 class="titulo-tipo-consulta">Depósito Bancario</h4>
             <div class="contenido-titulo-deposito">
                <span class="titulo-deposito">Depositar en estas cuentas.</span>
             </div>
            <div class="contenido-numero-cuenta">
                <img src="<?php echo e(asset("img/bcp.svg")); ?>" alt="">
                <h5>Ahorro en Soles: <span>2345789- 03-124</span></h5>
                <h5>Titular: <span>De la cruz Rivera, R</span></h5>
            </div>
            <div class="contenido-numero-cuenta">
                <img src="<?php echo e(asset("img/bbva.svg")); ?>" alt="">
                <h5>Ahorro en Soles: <span>2345789- 03-124</span></h5>
                <h5>Titular: <span>De la cruz Rivera, R</span></h5>
            </div>

            <a href="<?php echo e(route("digital.voucher",['consulta'=>$consulta])); ?>" class="btn-consultas" style="margin-top: 1rem;">Continuar <img src="<?php echo e(asset("img/flecha.svg")); ?>" alt=""></a>
            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img src="<?php echo e(asset("img/regresar.png")); ?>" alt=""> Regresar</a>
            </div>
    </div>
    <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
    <script src="<?php echo e(asset("js/app.js")); ?>"></script>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/legal-digital/CuentasDeposito.blade.php ENDPATH**/ ?>