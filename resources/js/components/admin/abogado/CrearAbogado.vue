<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Crear Abogado</h3></div>
      <form v-on:submit.prevent="CreateAbogado()">
        <div class="card-body ">
        <div class="row ">
          <div class="form-group col-md-8">
            <label for="inputState">Nombre</label>
            <input type="text" class="form-control" v-model="nombre" />
          </div>
        </div>
        <div class="row ">
          <div class="form-group col-md-8">
            <label for="inputState">Apellido</label>
            <input type="text" class="form-control" v-model="apellido" />
          </div>
        </div>
        <div class="row ">
          <div class="form-group col-md-8">
            <label for="inputState">Departamento</label>
            <select class="form-control" v-model="departamento">
                        <option>Seleccionar</option>
                        <option :value="depa.nombre" v-for="depa in Departamentos" :key="depa.id">{{depa.nombre}}</option>
                      </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-8">
            <label for="inputState">Celular</label>
            <input type="text" class="form-control" v-model="celular" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-8">
            <label for="inputState">Email</label>
            <input type="text" class="form-control" v-model="email" />
            <div class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-8">
            <label for="inputState">Password</label>
            <input type="text" class="form-control" v-model="password" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-8">
            <label for="inputState">Estado</label>
            <select name="" id="" v-model="estado">
              <option value="">activo</option>
              <option value="">Inactivo</option>
            </select>
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
          nombre:"",
          apellido:"",
          email:"",
          password:"",
          departamento:"",
          celular:"",
          Departamentos:{},
          estado:""
        }
    },
    mounted()
    {
      this.getDepartamentos()
    },
    methods:{
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
        },
        limpiar()
        {

        var message = document.querySelector(".invalid-feedback")

        this.nombre=""
        this.apellido = ""
        this.email = ""
        this.departamento = ""
        this.password = ""
        this.celular = ""

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
          if(this.nombre === "")
            message.push("Debe ingresar el nombre .")

          if(this.apellido === "")
            message.push("Debe ingresar el apellido.")

          if(this.email === "")
            message.push("Debe ingresar el email.")
          
          if(this.departamento === "")
            message.push("Debe ingresar el departamento.")
          
          if(this.password === "")
            message.push("Debe ingresar el password.")
          
          if(this.celular === "")
            message.push("Debe ingresar el celular.")
          
          if(message.length>0)
          {
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{

            var message = document.querySelector(".invalid-feedback")

             const config = { headers: { "content-type": "multipart/form-data" } };
            var data = new FormData();
            data.append("nombre",this.nombre);
            data.append("apellido",this.apellido);
            data.append("email",this.email);
            data.append("password",this.password);
            data.append("celular",this.celular);
            data.append("departamento",this.departamento);

            axios.post("/create/abogado",data,config)
            .then(res=>{
                this.limpiar()
                this.AlertSuccess()
            })
            .catch(error =>{
              message.innerHTML="El correo ya se encuentra registrado"
              message.style.display="block"
            })
          }
        },
        
    }

}
</script>

<style>

</style>