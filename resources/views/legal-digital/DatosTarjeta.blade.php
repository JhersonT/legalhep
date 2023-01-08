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

    @php
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
        
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        $preference->payment_methods = [
            'excluded_payment_types' => [['id' => 'ticket'],['id'=>'bank_transfer']],
            'installments' => 1,
        ];

        
        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = $consult->modalidad;
        $item->quantity = 1;
        $item->unit_price = intval($consult->precio);
        $preference->back_urls = [
            'success' => 'http://127.0.0.1:8000/emergencia/confirmacion/pago/'.$consult->numeroConsulta."?consulta=".$consult->numeroConsulta,
            'failure' => 'http://127.0.0.1:8000/emergencia/pago/error/'.$consult->numeroConsulta."?consulta=".$consult->numeroConsulta,
            'pending' => 'http://www.tu-sitio/pending',
        ];
        $preference->auto_return = 'approved';
        $preference->items = [$item];
        $preference->save();
        
        
    @endphp

    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-miabogado" style="flex-direction: column">
                <img src="{{asset("/img/logo.png")}}" alt="">
                <h2 style="margin-top: .5rem;margin-bottom:.5rem;"> Documentos en línea.</h2>

                <form action="{{ route('logout') }}" method="POST" style="height: 2rem" class="form-session">
                    @csrf
                    <button type="submit"
                        style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;"
                        class="btn btn-cerrar-sesion">Cerrar
                        Sesión</button>
                </form>
            </div>
            <div class="borde">
                <p class="sub-titulo"><a href="{{ route("emergencia.tipoPago",["consulta"=>$consult->numeroConsulta]) }}" class="links">Tipo Pago </a> > <a
                        href="#" class="links"> Tarjeta</a></p>
            </div>
        </div>
        <div class="body-miabogado">
        
            <div class="contenido-monto-pago" style="margin-top:3rem;">
                <p>Precio Final: <span>S/.{{ $consult->precio }}</span></p>
            </div>

            <div class="contenido-datos-tarjeta">
                <div class="cho-container">

                </div>
            </div>

            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img src="{{ asset('img/regresar.png') }}" alt="">
                    Regresar</a>
            </div>
        </div>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            const mp = new MercadoPago('{{ config('services.mercadopago.key') }}', {
                locale: 'es-AR'
            });

            mp.checkout({
                preference: {
                    id: '{{ $preference->id }}'
                },
                render: {
                    container: '.cho-container',
                    label: 'Pagar',
                }
            });
        </script>
</body>

</html>
