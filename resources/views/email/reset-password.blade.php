<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Scada:wght@400;700&display=swap" rel="stylesheet"> 
</head>

<style>
    .contenido-email{
        display: flex;
        flex-direction: column;
        font-family: 'Scada', sans-serif;
        width: 50%;
        margin: 0 auto;
    }
    .contenido-logo{
        height: 35%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 100%;
        background: #004674;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #0084CA, #004674);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #0084CA, #004674);
    }
    .contenido-bienvenida{
        height: 70%;
        width: 100%;
        color: #353738;
    }
    .contenido-logo .borde-email{
        width: 100%;
        height: 1.5rem;
        background: #EDEDED;
    }
    .contenido-logo img{
        padding: 1rem 0;
    }
</style>
<body>
    <div class="contenido-email">
        <div class="contenido-logo">
            <img src="{{asset("img/logo.png")}}" alt="">
            <div class="borde-email">

            </div>
        </div>
        <div class="contenido-bienvenida">
                <h3 style="text-align: center;font-weight:400;">Bienvenido</h3>
                <p>Estimado: {{$user->name}}</p>
                <p>Hemos recibido tu solicitud de recuperación de contraseña LEGALHELP:</p>
                <p>Tu nueva contraseña es: {{$contraseña}} . Por precaución conserva tu contraseña en un lugar seguro.</p>
                <p>Si no has solicitado la recuperación de tu contraseña puedes obviar este mensaje o si prefieres, por precaución, dirígete a tu aplicación LegalHelp y modifícala inmediatamente. </p>
                <p style="text-align: center">Si tiene alguna duda sobre su registro en nuestra aplicación por favor escribanos a : soporte@legalhelp.pe</p>
        </div>
    </div>
</body>
</html>