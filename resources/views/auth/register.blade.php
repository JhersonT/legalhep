<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{asset("css/modal.css")}}">
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    
</head>
<body>
    <div class="contenedor-registro">
            <img src="{{asset("img/logo.png")}}" alt="">
            <div class="contenido-input-registro ">
              <form action="{{route("register")}}" method="POST">
                @csrf
                <select name="tipoDoc" id="" class="select">
                  <option value="">--Tipo de documento--</option>
                  <option value="DNI" {{ @old("tipoDoc") === "DNI" ? 'selected' : ''}}>DNI</option>
                  <option value="Carnet de Extranjeria" {{ @old("tipoDoc") === "Carnet de Extranjeria" ? 'selected' : ''}}>Carnet de Extranjeria</option>
                  <option value="Pasaporte" {{ @old("tipoDoc") === "Pasaporte" ? 'selected' : ''}}>Pasaporte</option>
                </select>
                @error('tipoDoc')
                    <p class="message-error">{{$message}}</p>
                @enderror
                <input type="text" class="input-text" placeholder="Número de documento" name="documento" value="{{old("documento")}}">
                @error('documento')
                    <p class="message-error">{{$message}}</p>
                @enderror
                <select name="departamento" id="" class="select">
                  <option value="">--Departamento--</option>
                  @foreach ($departamentos as  $dep)
                    <option value="{{$dep->nombre}}" {{ @old("departamento") === $dep->nombre ? 'selected' : ''}} >{{$dep->nombre}}</option>
                  @endforeach
                </select>
                @error('departamento')
                    <p class="message-error">{{$message}}</p>
                @enderror
                <input type="text" class="input-text" placeholder="Nombres" name="nombres" value="{{old("nombres")}}">
                @error('nombres')
                    <p class="message-error">{{$message}}</p>
                @enderror
                <input type="text" class="input-text" placeholder="Apellidos" name="apellidos" value="{{old("apellidos")}}">
                @error('apellidos')
                    <p class="message-error">{{$message}}</p>
                @enderror
                <input type="text" class="input-text" placeholder="correo" name="email" value="{{old("email")}}">
                @error('email')
                    <p class="message-error">{{$message}}</p>
                @enderror
                <input type="password" class="input-text" placeholder="Contraseña" name="contraseña">
                @error('contraseña')
                    <p class="message-error">{{$message}}</p>
                @enderror
                <div class="content-check">
                  <input type="checkbox" id="" name="confirmar" {{@old("confirmar") === "confirmar"? 'checked':''}}>
                  <a class="open-modal" data-open="modal1">He leído y acepto los Términos y condiciones.</a>
                </div>
                @error('confirmar')
                    <p class="message-error">{{$message}}</p>
                @enderror
                <input type="submit" value="Registrarme" class="btn btn-registrar">
            </form>
            </div>
    </div>

    <!--MODAL-->
      
      <div class="modal" id="modal1" data-animation="slideInOutLeft">
        <div class="modal-dialog">
          <header class="modal-header">
            <p></p>
            <button class="close-modal" aria-label="close modal" data-close>
              ✕  
            </button>
          </header>
          <section class="modal-content">
            <p><strong class="titulo-modal">Términos y Condiciones de Uso</strong></p>
            <p>Los presentes Términos y Condiciones describen los derechos y responsabilidades del Usuario y de Legal Help respecto al servicio de procesamiento y gestión de datos, la plataforma electrónica a través de la cual se realizarán cualquier producto o servicio relacionado o complementario que ofrezca o pueda ofrecer Legal Help (conjuntamente, el “Servicio”).</p>
            <p>La aceptación de los Términos y Condiciones constituye un requisito previo para el registro como Usuario del Servicio y/o la utilización del mismo. Mediante la aceptación de los Términos y Condiciones, el Usuario declara haber leído, entendido y aceptado todas las condiciones establecidas en este documento y demás políticas y principios incorporados por referencia, accesibles a través de la URL incluidas en estos Términos y Condiciones.</p>
            <p> Cualquier persona que no acepte estos términos y condiciones generales, los cuales tienen un carácter obligatorio y vinculante, deberá abstenerse de utilizar los Servicios.</p>          </section>

        </div>
      </div>
      
      <div class="modal" id="modal2" data-animation="mixInAnimations">
        <div class="modal-dialog">
          <header class="modal-header">
            The header of the second modal
            <button class="close-modal" aria-label="close modal" data-close>
              ✕  
            </button>
          </header>
          <section class="modal-content">
            <p><strong>Press ✕, ESC, or click outside of the modal to close it</strong></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo repellendus reprehenderit accusamus totam ratione! Nesciunt, nemo dolorum recusandae ad ex nam similique dolorem ab perspiciatis qui. Facere, dignissimos. Nemo, ea.</p>
            <p>Nullam vitae enim vel diam elementum tincidunt a eget metus. Curabitur finibus vestibulum rutrum. Vestibulum semper tellus vitae tortor condimentum porta. Sed id ex arcu. Vestibulum eleifend tortor non purus porta dapibus</p>
          </section>
          <footer class="modal-footer">
            The footer of the second modal
          </footer>
        </div>
      </div>

      <script src="{{asset("js/modal.js")}}"></script>
</body>
</html>