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
                    <img src="{{asset("img/impuesto.png")}}" alt="">
                    <h2>Impuesto a la Renta</h2>
                </div>
                <div class="borde">
                    <p class="sub-titulo"></p>
                </div>
            </div>
            <div class="body-miabogado">
            
                <div class="content-calculo-alcabala" style="color: #353738">
                    <p>La venta de un inmueble que efectúa una persona natural sin rentas empresariales, genera ganancia de capital, la cual se considera renta de segunda categoria afecta al impuesto a la Renta.</p>
                    <p style="font-weight: bold">Casos en los cuales no pagas el impuesto:</p>
                    <p>- Inmuebles adquiridos antes del 01/01/2004.</p>
                    <p>- La venta que constituya casa habitación del vendedor.</p>
                    <p>- El costo de adquisición es mayor o igual al precio de venta.</p>
                    <impuesto></impuesto>
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