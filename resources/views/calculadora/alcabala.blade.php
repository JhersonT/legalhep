<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
</head>

<body>

    @include('miabogado.menu')

    <div id="app">

        <div class="principal">

            <div class="principal-logo">
                <div class="contenido-miabogado">
                    <img src="{{asset("img/alcabala.png")}}" alt="">
                    <h2>Alcabala</h2>
                </div>
                <div class="borde">
                    <p class="sub-titulo"></p>
                </div>
            </div>
            <div class="body-miabogado">
            
                <div class="content-calculo-alcabala" style="color:#353738">
                    <p>Es un impuesto que grava las transferencias de propiedad de bienes inmuebles urbanos o rústicos a título oneroso o gratuito, cualquiera sea su forma o modalidad, inclusive las ventas con reserva de dominio. Está obligado al pago del comprador o adquiriente del inmueble.</p>
                    <p>No está al impuesto de Alcabala, el tramo comprendido por las mismas 10 UIT del valor del inmueble.</p>
                    <alcabala></alcabala>
                </div>

                <div class="contenido-boton-regresar">
                    <a href="javascript: history.go(-1)"><img src="{{ asset('img/regresar.png') }}" alt="">
                        Regresar</a>
                </div>
            </div>
            
        </div>
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>