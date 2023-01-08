<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Editar Enlace Whatsapp</h3></div>
      <form v-on:submit.prevent="CreatePrograma()">
        <div class="card-body">
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

    data(){
        return{
          enlace:"",
          id:this.$route.params.id
        }
    },mounted()
    {
        this.getEnlace();
    },
    methods:{
        getEnlace()
        {
            axios.get("/api/edit/whatsapp/"+this.id)
            .then(res=>{
                this.enlace = res.data.link
            })
        },
        CreatePrograma()
        {
          this.validacion()
            
        },
        limpiar()
        {
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
            message.push("Debe ingresar el link.")
          

          if(message.length>0)
          {
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{
            axios.post("/api/update/whatsapp/"+this.id,{enlace:this.enlace})
            .then(res=>{
                this.AlertSuccess()
                this.$router.push({path: '/admin/show/whatsapp'})
            })
            .catch(err=>{
              this.alertError()
            })
          }
        },
        alertError(){
          Swal.fire({
  icon: 'error',
  title: 'Incorrecto',
  text: 'No puedes crear más de 1 enlace.'
})
        }
        
    }

}
</script>

<style>

</style>