<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/modal.css')); ?>">
</head>

<body>
    <?php echo $__env->make('miabogado.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-miabogado estado-consultas">
                <img src="<?php echo e(asset('img/logo.png')); ?>" alt="">
                <h2 style="margin:0">Estado de Consultas</h2>

                <form action="<?php echo e(route('logout')); ?>" method="POST" style="height: 2rem">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;"
                        class="btn btn-cerrar-sesion">Cerrar
                        Sesión</button>
                </form>
            </div>
            <div class="borde">
                <p class="sub-titulo"><a href="" class="links">Consultas Pendientes </a></p>
            </div>
        </div>
        <div class="body-miabogado" style="padding-left:1rem; padding-right:1rem;">
            <h4 class="titulo-tipo-consulta">Detalles de Consulta</h4>

            <div class="contenido-detalle">
                <div class="contenido-estado">
                    <h3 class="title-datos">DATOS</h3>
                </div>
                <div class="costos-consulta">
                    <table style="width:100%" class="table-datos">
                        <tr>
                            <th style="font-weight: 400">Código de Consulta:</th>
                            <th style="font-weight: 400"><?php echo e($consulta->numeroConsulta); ?></th>
                        </tr>
                        <tr>
                            <td>Fecha y Hora de Ingreso:</td>
                            <td><?php echo e($consulta->created_at); ?></td>
                        </tr>
                        <tr>
                            <td>Departamento:</td>
                            <td><?php echo e($consulta->client[0]->departamento); ?></td>

                        </tr>
                        <tr>
                            <td>Ciente: </td>
                            <td><?php echo e($consulta->client[0]->nombres . ' ' . $consulta->client[0]->apellidos); ?></td>
                        </tr>
                        <tr>
                            <td>Acto: </td>
                            <td><?php echo e($consulta->modalidad); ?></td>
                        </tr>
                        <tr>
                            <td>Metodo de Pago: </td>
                            <td><?php echo e(ucfirst($consulta->tipo_pago)); ?></td>
                        </tr>
                        <tr>
                            <td>Precio: </td>
                            <td>S/ <?php echo e($consulta->precio); ?></td>
                        </tr>
                        <tr>
                            <td>Abogado Responsable: </td>
                            <td><?php echo e($consulta->abogado ? $consulta->abogado->nombre . ' ' . $consulta->abogado->apellido : ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>Especialidad: </td>
                            <td><?php echo e($consulta->especialidad); ?></td>
                        </tr>
                        <?php if($consulta->documento): ?>
                        <tr>
                            <td class="titulo">Documento:</td>
                            <td class="btn-descargar"><a href="<?php echo e(asset("storage/expediente/documento/".$consulta->documento)); ?>" download="<?php echo e($consulta->numeroConsulta.".pdf"); ?>" >Descargar</a></td>
                          </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="contenido-estado">
                    <h3 class="title-datos">SEGUIMIENTO</h3>
                </div>
                <?php if($consulta->abogado): ?>

                    <div class="costos-consulta" style="margin-bottom: 1rem">
                        <?php $__currentLoopData = $obs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <table style="width:100%" class="table-datos">
                                <tr>
                                    <th style="font-weight: 400">Detalle Seguimiento:</th>
                                    <th style="font-weight: 400"><?php echo e($consulta->servicio); ?></th>
                                </tr>
                                <tr>
                                    <td>Fecha:</td>
                                    <td><?php echo e($date::parse(substr($obser->created_at, 0, -8))->format('d/m/Y')); ?></td>
                                </tr>
                                <tr>
                                    <td>Hora:</td>
                                    <td><?php echo e(substr($obser->created_at, 10)); ?> p.m </td>
                                </tr>
                                <tr>
                                    <td>Estado:</td>
                                    <td><?php echo e($obser->estado); ?></td>

                                </tr>
                                <?php if($obser->observacion !== 'Sin Observaciones' || $obser->observacion !== 'Sin Observación'): ?>
                                    <tr>
                                        <td>Observaciones: </td>
                                        <td><button style="border-radius:10px;color:#184C72" class="open-modal"
                                                data-open="modal1">Ver Observación</button></td>
                                    </tr>
                                <?php endif; ?>

                            </table>
                            <div class="modal" id="modal1" data-animation="slideInOutLeft">
                                <div class="modal-dialog" style="width:40%">
                                    <header style="background: #184C72" class="modal-header">
                                        <p class="titulo-modal">Observación</p>
                                        <button class="close-modal" aria-label="close modal" data-close>
                                            ✕
                                        </button>
                                    </header>
                                    <section class="modal-content" style="padding:2rem 2rem;height:18rem !important;">
                                        <div class="contenido-modal">
                                            <div class="contenido-texto">
                                                <?php echo $obser->observacion; ?>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <div style="display: flex;justify-content:center">
                <?php echo e($obs->links('vendor.pagination.bootstrap-4')); ?>

            </div>
            <?php endif; ?>

            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img src="<?php echo e(asset('img/regresar.png')); ?>" alt=""
                        style="width: 50px">
                    Regresar</a>
            </div>
        </div>
        <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <script src="<?php echo e(asset('js/modal.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/seguimiento/resumen.blade.php ENDPATH**/ ?>