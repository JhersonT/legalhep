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
            <div class="contenido-miabogado" style="flex-direction: column;">
                <img src="{{asset("img/logo.png")}}" alt="">
            <h2 style="margin-top: .5rem;margin-bottom:.5rem;">Documentos en línea</h2>

            <form action="{{ route('logout') }}" method="POST" style="height: 2rem" class="form-session">
                @csrf
                <button type="submit" style="border:none;cursor: pointer; font-family: 'Sarala', sans-serif !important;" class="btn btn-cerrar-sesion">Cerrar
                    Sesión</button>
            </form>
            </div>
            <div class="borde">
                <p class="sub-titulo"><a href="{{ route("emergencia.tipoPago",["consulta"=>$consult->numeroConsulta]) }}" class="links">Tipo Pago </a> > <a href="{{route("emergencia.cuentas",["consulta"=>$consult->numeroConsulta])}}" class="links">Depósito Bancario </a> > <a href="#" class="links">Envio Voucher </a></p>
            </div>
            
        </div>
        <div class="body-miabogado">
            <h4 class="titulo-tipo-consulta">Depósito Bancario</h4>

            <div class="contenido-detalle-pago">
                <h5>Costo del Legal Help {{$consult->modalidad}}: <span>S/ {{$consult->precio}}</span></h5>
                <h5>Código de solicitud: <span> {{$consult->numeroConsulta}}</span></h5>
            </div>
            <p class="detalle-archivo">Su solicitud se ha registrado con éxito, para completarla debe enviarnos el comprobante del depósito bancario. (JPG, PNG O PDF máximo 5 MB)</p>
            <form action="{{route("digital.save.voucher")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="contenido-archivo-pago" style="display: flex;flex-direction:column;justify-content:center;align-items:center">
                    <input type="file" name="voucher" id="">
                    @error('voucher')
                        <p class="message-error">{{$message}}</p>
                    @enderror

                    <input type="hidden" value="{{$consult->numeroConsulta}}"  name="codigo_consulta">
                </div>
                <button type="submit" class="btn-consultas" style="margin-top: 1rem;cursor: pointer;margin-bottom: 1.5rem;">Enviar <img src="{{asset("img/flecha.svg")}}" alt=""></button>

                <div class="cotenido-mensaje-pago" >
                    <h5>Puedes continuar el proceso más tarde </h5>
                    <h5>desde "Seguimiento LegalHelp"</h5>
                </div>
            </form>

            <a href="" class="btn-consultas">Seguir Después <img src="{{asset("img/flecha.svg")}}" alt=""></a>

            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img src="{{asset("img/regresar.png")}}" alt=""> Regresar</a>
            </div>
    </div>
    <script src="{{asset("js/scripts.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>
</body>
</html>