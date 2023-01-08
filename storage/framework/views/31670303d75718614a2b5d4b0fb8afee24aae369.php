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
            <div class="contenido-miabogado" style="flex-direction: column;">
                <img src="<?php echo e(asset("img/logo.png")); ?>" alt="">
            <h2 style="margin-top: .5rem;margin-bottom:.5rem;">Documentos en línea</h2>

            <form action="<?php echo e(route('logout')); ?>" method="POST" style="height: 2rem" class="form-session">
                <?php echo csrf_field(); ?>
                <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                    Sesión</button>
            </form>
            </div>
            <div class="borde">
                <p class="sub-titulo"><a href="<?php echo e(route("emergencia.tipoPago",["consulta"=>$consult->numeroConsulta])); ?>" class="links">Tipo Pago </a> > <a href="<?php echo e(route("emergencia.cuentas",["consulta"=>$consult->numeroConsulta])); ?>" class="links">Depósito Bancario </a> > <a href="#" class="links">Envio Voucher </a></p>
            </div>
            
        </div>
        <div class="body-miabogado">
            <h4 class="titulo-tipo-consulta">Depósito Bancario</h4>

            <div class="contenido-detalle-pago">
                <h5>Costo del Legal Help <?php echo e($consult->modalidad); ?>: <span>S/ <?php echo e($consult->precio); ?></span></h5>
                <h5>Código de solicitud: <span> <?php echo e($consult->numeroConsulta); ?></span></h5>
            </div>
            <p class="detalle-archivo">Su solicitud se ha registrado con éxito, para completarla debe enviarnos el comprobante del depósito bancario. (JPG, PNG O PDF máximo 5 MB)</p>
            <form action="<?php echo e(route("digital.save.voucher")); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="contenido-archivo-pago" style="display: flex;flex-direction:column;justify-content:center;align-items:center">
                    <input type="file" name="voucher" id="">
                    <?php $__errorArgs = ['voucher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="message-error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <input type="hidden" value="<?php echo e($consult->numeroConsulta); ?>"  name="codigo_consulta">
                </div>
                <button type="submit" class="btn-consultas" style="margin-top: 1rem;cursor: pointer;margin-bottom: 1.5rem;">Enviar <img src="<?php echo e(asset("img/flecha.svg")); ?>" alt=""></button>

                <div class="cotenido-mensaje-pago" >
                    <h5>Puedes continuar el proceso más tarde </h5>
                    <h5>desde "Seguimiento LegalHelp"</h5>
                </div>
            </form>

            <a href="" class="btn-consultas">Seguir Después <img src="<?php echo e(asset("img/flecha.svg")); ?>" alt=""></a>

            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img src="<?php echo e(asset("img/regresar.png")); ?>" alt=""> Regresar</a>
            </div>
    </div>
    <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
    <script src="<?php echo e(asset("js/app.js")); ?>"></script>
</body>
</html><?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/legal-digital/EnvioVoucher.blade.php ENDPATH**/ ?>