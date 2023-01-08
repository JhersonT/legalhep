<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Editar Cliente</h3></div>
      <form v-on:submit.prevent="updateCliente()">
        <div class="card-body ">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Nombre</label>
            <input type="text" class="form-control" v-model="nombre" />
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Apellido</label>
            <input type="text" class="form-control" v-model="apellido" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Tipo documento</label>
            <input type="text" class="form-control" v-model="tipo_doc" />
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">N° Documento</label>
            <input type="text" class="form-control" v-model="n_doc" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Departamento</label>
            <select class="form-control" v-model="departamento">
                        <option>Seleccionar</option>
                        <option :value="depa.nombre" v-for="depa in Departamentos" :key="depa.id">{{depa.nombre}}</option>
                      </select>
          </div>
              <div class="form-group col-md-6">
            <label for="inputState">Celular</label>
            <input type="text" class="form-control" v-model="celular" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Email</label>
            <input type="text" class="form-control" v-model="email" />
            <div class="invalid-feedback"></div>
          </div>
            <div class="form-group col-md-6">
            <label for="inputState">Password</label>
            <input type="text" class="form-control" v-model="password" />
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
          id:this.$route.params.id,
          n_doc:"",
          tipo_doc:""
        }
    },
    mounted()
    {
      this.getDepartamentos()
      this.getDatosClientes()
    },
    methods:{
        getDatosClientes()
        {
            axios.get("/api/edit/cliente/"+this.id)
            .then(res=>{
                this.nombre = res.data.nombres
                this.apellido = res.data.apellidos
                this.n_doc = res.data.n_doc
                this.tipo_doc = res.data.tipo_doc
                this.departamento = res.data.departamento 
                this.celular = res.data.celular
                this.email = res.data.user.email
                this.password = res.data.pass
            })
        },
        getDepartamentos()
        {
            axios.get("/api/show/departamentos")
            .then(res=>{
                this.Departamentos = res.data
            })
        },
        updateCliente()
        {
          this.validacion()
        },
        limpiar()
        {
        this.nombre=""
        this.apellido = ""
        this.email = ""
        this.departamento = ""
        this.password = ""
        this.celular = ""
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
            data.append("n_doc",this.n_doc);
            data.append("tipo_doc",this.tipo_doc);

            axios.post("/update/cliente/"+this.id,data,config)
            .then(res=>{
                this.limpiar()
              this.$router.push('/admin/show/clientes')
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