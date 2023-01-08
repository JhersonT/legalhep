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
                <img :src="`/img/job.png`" alt="">
                <h2>Mi Abogado Legal Help</h2>
                <form action="<?php echo e(route('logout')); ?>" method="POST" style="height: 2rem">
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                        Sesión</button>
                </form>
            </div>
            <div class="borde">
                <p class="sub-titulo"><a href="<?php echo e(route("consulta.abogado")); ?>" class="links">Tipo Consulta </a> > <a href="#" class="links">Tipo de Pago </a> </p>
            </div>
        </div>
        
            <tipo-pago :id="<?php echo e(auth()->user()->id); ?>" :codigo="<?php echo e($consulta); ?>" />
    </div>
</div>

    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/miabogado/TipoPago.blade.php ENDPATH**/ ?>