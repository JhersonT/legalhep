<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset("css/modal.css")); ?>">
</head>

<body>
    <?php echo $__env->make('miabogado.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="app">
    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-miabogado" style="flex-direction:column !important;gap:.5rem">
                <img src="<?php echo e(asset("/img/logo.png")); ?>" alt="">
                <h2 style="margin-top: .5rem;margin-bottom:.5rem;">Documentos en línea</h2>
                <form action="<?php echo e(route('logout')); ?>" method="POST" style="height: 2rem" class="form-session">
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                        Sesión</button>
                </form>
            </div>
            <div class="borde" >
                <p class="sub-titulo"> Tipo de pago</p>
            </div>
  
        </div >
        
            <tipo-digital :id="<?php echo e(auth()->user()->id); ?>" :codigo="<?php echo e($consulta); ?>" />
            
    </div>
        
</div>

<div class="modal" id="modal1" data-animation="slideInOutLeft">
    <div class="modal-dialog">
      <header style="background: #184C72" class="modal-header">
        <p></p>
        <button class="close-modal" aria-label="close modal" data-close>
          ✕  
        </button>
      </header>
      <section class="modal-content" style="padding: 2rem;">
        <img src="<?php echo e(asset("img/logo.png")); ?>" alt="" width="100px" style="display: flex;margin:0 auto;">
        <p><strong class="titulo-modal">Requisitos </strong></p>
        <ul>
          <li class="texto-modal">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
          <li class="texto-modal">Integer imperdiet orci lacinia, commodo magna vitae, imperdiet erat.</li>
          <li class="texto-modal">Integer porta urna sit amet velit fermentum laoreet.</li>
        </ul>

    </div>
  </div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset("js/modal2.js")); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/legal-digital/tipoPago.blade.php ENDPATH**/ ?>