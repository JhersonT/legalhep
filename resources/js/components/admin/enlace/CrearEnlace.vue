<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Crear Enlace</h3></div>
      <form v-on:submit.prevent="CreatePrograma()">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Nombre</label>
            <input type="text" class="form-control" v-model="nombre" />
          </div>
        </div>
        <div class="form-group">
          <label>Insertar Enlace</label
          ><input type="text" class="form-control" v-model="enlace" />
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
props: ['user_id'],
    data(){
        return{
          nombre:"",
          enlace:""
        }
    },mounted()
    {

    },
    methods:{
        CreatePrograma()
        {
          this.validacion()
            
        },
        limpiar()
        {

            this.nombre=""
            this.enlace=""
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
            message.push("Debe ingresar el nombre del Link.")
          
          if(this.enlace === "")
            message.push("Debe ingresar el enlace.")
          

          if(message.length>0)
          {
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{
            axios.post("/api/create/enlace",{nombre:this.nombre,enlace:this.enlace})
            .then(res=>{
                this.limpiar()
                this.AlertSuccess()
            })
          }
        },
        
    }

}
</script>

<style>

</style>