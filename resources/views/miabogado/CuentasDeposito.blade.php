<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet">
</head>
<body>
    @include('miabogado.menu')
    
    <div class="principal">
        <div class="principal-logo">
            <div class="contenido-miabogado">
                <img src="{{asset("img/job.png")}}" alt="">
            <h2>Mi Abogado Legal Help</h2>
            
            <form action="{{ route('logout') }}" method="POST" style="height: 2rem">
                @csrf
                <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                    Sesión</button>
            </form>
            </div>
            <div class="borde">
                <p class="sub-titulo"><a href="{{route("consulta.abogado")}}" class="links">Tipo Consulta </a> > <a href="{{route("tipo.pago",['consulta'=>$consulta])}}" class="links">Tipo de Pago </a> > <a href="#" class="links">Depósito Bancario</a></p>
            </div>
        </div>
        <div class="body-miabogado">
            <h4 class="titulo-tipo-consulta">Depósito Bancario</h4>
             <div class="contenido-titulo-deposito">
                <span class="titulo-deposito">Depositar en estas cuentas.</span>
             </div>
            
            @foreach ( $accounts as $acc)
            <div class="contenido-numero-cuenta">
                <img src="{{asset("/storage/account/".$acc->logo)}}" alt="">
                <h5>Ahorro en Soles: <span>{{$acc->cuenta}}</span></h5>
                <h5>Titular: <span>{{$acc->titular}}</span></h5>
            </div>
            @endforeach

            <a href="{{route("envio.voucher",['consulta'=>$consulta])}}" class="btn-consultas" style="margin-top: 1rem;">Continuar <img src="{{asset("img/flecha.svg")}}" alt=""></a>
            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img src="{{asset("img/regresar.png")}}" alt=""> Regresar</a>
            </div>
    </div>
    <script src="{{asset("js/scripts.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>
</body>
</html>