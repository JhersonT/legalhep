<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Crear Expediente</h3></div>
      <form v-on:submit.prevent="CreateAbogado()">
        <div class="card-body ">
          <div class="row ">
          <div class="form-group col-md-8">
            <label for="inputState">N° Documento</label>
            <input type="text" class="form-control" v-model="n_documento" @keyup="ValidarDocumento" />
          </div>
        </div>
        <div class="row ">
        <div class="form-group col-md-8">
        <label for="inputState">Tipo Documento</label>
        <select class="form-control" v-model="tipo_documento">
            <option value="">Seleccionar</option>
            <option value="DNI">DNI</option>
            <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
            <option value="Pasaporte">Pasaporte</option>
            </select>
          </div>
        </div>
        <div class="row">
        <div class="form-group col-md-8">
        <label for="inputState">Departamento</label>
        <select class="form-control" v-model="departamento">
            <option value="">Seleccionar</option>
            <option :value="depa.nombre" v-for="depa in Departamentos" :key="depa.id">{{depa.nombre}}</option>
            </select>
          </div>
        </div>
        <div class="row ">
          <div class="form-group col-md-8">
            <label for="inputState">Nombres</label>
            <input type="text" class="form-control" v-model="nombres"/>
          </div>
        </div>
        <div class="row ">
          <div class="form-group col-md-8">
            <label for="inputState">Apellidos</label>
            <input type="text" class="form-control" v-model="apellidos"/>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-8">
            <label for="inputState">Celular</label>
            <input type="text" class="form-control" v-model="celular"/>
          </div>
        </div>
        <div class="row correo">
          <div class="form-group col-md-8">
            <label for="inputState">Email</label>
            <input type="text" class="form-control" v-model="email" @keyup="ValidarEmail" />
            <div class="invalid-feedback email">El email ya se encuentra registrado.</div>
          </div>
        </div>
        <div class="row password">
          <div class="form-group col-md-8">
            <label for="inputState">Password</label>
            <input type="text" class="form-control" v-model="password" />
          </div>
          <div class="form-group col-md-8">
              <a class="btn btn-primary btn-pass" @click="generarPassword()" id="btn-password">Generar Password</a>
          </div>
        </div>
        <div class="row">
        <div class="form-group col-md-8">
        <label for="inputState">Acto</label>
        <select class="form-control" v-model="accion">
            <option value="">Seleccionar</option>
            <option :value="sub.id" v-for="sub in Subcategorias" :key="sub.id">{{sub.name}}</option>
            <option value="0">Otro</option>
            </select>
          </div>
        </div>
          <div class="row" v-if="accion === '0'">
          <div class="form-group col-md-8">
            <label for="inputState">Nombre Servicio</label>
            <input type="text" class="form-control" v-model="nombre_servicio" />
          </div>
        </div>
          <div class="row" v-if="accion === '0'">
          <div class="form-group col-md-8">
            <label for="inputState">Precio</label>
            <input type="text" class="form-control" v-model="precio" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-8">
            <label for="inputState">Especialidad</label>
            <input type="text" class="form-control" v-model="especialidad" />
          </div>
        </div>
        <div class="row">
        <div class="form-group col-md-8">
        <label for="inputState">Abogado Asignado</label>
        <select class="form-control" v-model="abogado">
            <option value="">Seleccionar</option>
            <option :value="abo.id" v-for="abo in Abogados" :key="abo.id">{{abo.nombre+" "+ abo.apellido}}</option>
            </select>
          </div>
        </div>
         <div class="row">
        <div class="form-group col-md-8">
        <label for="inputState">Estado</label>
        <select class="form-control" v-model="estado">
            <option value="">Seleccionar</option>
            <option :value="est.nombre" v-for="est in Estados" :key="est.id">{{est.nombre}}</option>
            </select>
          </div>
        </div>
        <div class="row" v-if="estado === 'Otro'">
          <div class="form-group col-md-8">
            <label for="inputState">Ingrese un estado</label>
            <input type="text" class="form-control" v-model="new_estado" />
          </div>
        </div>
        <div class="row">
        <div class="form-group col-md-10">
        <label for="inputState">Observaciones </label>
          <div>
        <input type="hidden" id="observaciones" >
        <trix-editor input="observaciones" class="form-control" id="textarea"> </trix-editor>
         </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-center">
        <button class="btn btn-primary mr-1" type="submit">Guardar</button>
      </div>
      </form>

    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
          nombres:"",
          apellidos:"",
          email:"",
          password:"",
          departamento:"",
          celular:"",
          Departamentos:{},
          Subcategorias:{},
          accion:"",
          timeBuscador:"",
          n_documento:"",
          Modalidad:{},
          modalidad:"",
          tipo_documento:"",
          correcto:"",
          nombre_servicio:"",
          precio:"",
          abogado:"",
          Abogados:{},
          Estados:{},
          estado:"",
          new_estado:"",
          especialidad:""
        }
    },
    mounted()
    {
      this.getDepartamentos()
      this.getSubcategorias()
      this.getModalidades()
      this.getAbogados()
      this.getEstados()
    },
    methods:{
      getEstados()
        {
            axios.get("/api/traer/estados")
            .then(res=>{
                this.Estados = res.data
            })
        },
      getAbogados()
        {
            axios.get("/api/traer/abogados/expedientes")
            .then(res=>{
                this.Abogados = res.data
            })
        },
      getModalidades()
        {
            axios.get("/api/admin/modalidades")
            .then(res=>{
                this.Modalidad = res.data
            })
        },
        getSubcategorias()
        {
            axios.get("/api/show/abogados/subcategorias")
            .then(res=>{
                this.Subcategorias = res.data
            })
        },
        getDepartamentos()
        {
            axios.get("/api/show/departamentos")
            .then(res=>{
                this.Departamentos = res.data
            })
        },
        CreateAbogado()
        {
          this.validacion()
          this.getSubcategorias()
        },
        limpiar()
        {

        var message = document.querySelector(".invalid-feedback")
        document.querySelector("#observaciones").value =""

        this.nombres=""
        this.apellidos = ""
        this.email = ""
        this.departamento = ""
        this.password = ""
        this.celular = ""
        this.n_documento =""
        this.tipo_documento =""
        this.accion =""
        this.nombre_servicio =""
        this.precio =""
        this.abogado =""
        this.especialidad=""
        this.estado=""
        this.new_estado=""

       message.style.display="none"

        },
        AlertSuccess(){
          Swal.fire(
      '¡Correcto!',
      'Se guardo correctamente',
      'success'
             )
        }, validacion()
        {
          var message=[]

          if(this.n_documento === "")
            message.push("Debe ingresar el número de documento .")

          if(this.nombres === "")
            message.push("Debe ingresar el nombre .")

          if(this.apellidos === "")
            message.push("Debe ingresar el apellido.")

          if(this.email === "" && this.correcto === false)
            message.push("Debe ingresar el email.")
          
          if(this.email === "")
            message.push("Debe ingresar el email.")
          
          if(this.tipo_documento === "" && this.correcto === false)
            message.push("Debe seleccionar el tipo de documento.")

          if(this.tipo_documento === "")
            message.push("Debe seleccionar el tipo de documento.")
          
          if(this.password === "" && this.correcto === false)
            message.push("Debe ingresar el password.")
          
          if(this.departamento === "")
            message.push("Debe ingresar el departamento.")
          
          if(this.accion === "")
            message.push("Debe seleccionar un acto.")
          
          if(this.estado === "")
            message.push("Debe seleccionar un estado.")
          
          if(this.especialidad === "")
            message.push("Debe ingresar la especialidad.")

          
          if(message.length>0)
          {
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{

            var message = document.querySelector(".invalid-feedback")
            var observacion = document.querySelector("#observaciones").value

             const config = { headers: { "content-type": "multipart/form-data" } };
            var data = new FormData();
            data.append("nombre",this.nombres);
            data.append("apellido",this.apellidos);
            data.append("email",this.email);
            data.append("password",this.password);
            data.append("accion",this.accion);
            data.append("celular",this.celular);
            data.append("departamento",this.departamento);
            data.append("tipo_documento",this.tipo_documento);
            data.append("observaciones",observacion);
            data.append("n_documento",this.n_documento);
            data.append("abogado",this.abogado);
            data.append("nombre_servicio",this.nombre_servicio);
            data.append("precio",this.precio);
            data.append("estado",this.estado);
            data.append("new_estado",this.new_estado);
            data.append("especialidad",this.especialidad);

            axios.post("/create/expediente",data,config)
            .then(res=>{
                this.limpiar()
                this.AlertSuccess()
            })
          }
        },ValidarDocumento()
        {
          clearTimeout(this.timeBuscador);
      this.timeBuscador = setTimeout(this.ValidarDoc, 360);
        },ValidarDoc()
        { 
          var pass = document.querySelector(".password")
          var correo = document.querySelector(".correo")

          axios.get("/api/search/documento/"+this.n_documento)
          .then(res=>{
              if(res.data !== false)
              {
                  this.nombres = res.data.nombres
                  this.apellidos = res.data.apellidos
                  this.tipo_documento = res.data.tipo_doc
                  this.departamento = res.data.departamento
                  this.email = res.data.user.email
                  pass.style.display="none"
                  correo.style.display="none"
                  this.correcto = true
              }else{
                this.nombres = ""
                  this.apellidos = ""
                  this.tipo_documento = ""
                  this.departamento = ""
                  this.email = ""
                pass.style.display="block"
                correo.style.display="block"
                this.correcto = false
              }

          })
        },ValidarEmail()
        {
           clearTimeout(this.timeBuscador);
           this.timeBuscador = setTimeout(this.ValdiarCorreo, 360);
        },ValdiarCorreo()
        {
          var valEmail = document.querySelector(".email")
          axios.get("/api/search/email/"+this.email)
          .then(res=>{
              if(res.data){
                valEmail.style.display="block"
              }else{
                valEmail.style.display="none"
              }
          })
        },generarPassword()
        {

          var result           = '';
          var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          var charactersLength = characters.length;
          for ( var i = 0; i < 12; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
          }

          this.password = result
        }
        
    }

}
</script>

<style>

.email{
  display: none ;
}

.btn-pass{
  cursor: pointer;
  color:white !important;
}

</style>