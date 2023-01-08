<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Agregar UIT</h3></div>
      <form v-on:submit.prevent="CreateCupon()">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Unidad Impositiva Tributaria(UIT)</label>
            <input type="text" class="form-control" v-model="uit" />
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
          uit:""
        }
    },
    methods:{
        CreateCupon()
        {
          this.validacion()
            
        },
        limpiar()
        {

            this.uit=""
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
            message.push("Debe ingresar el monto.")
          
          if(message.length>0)
          {
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{
            axios.post("/create/taxes",{uit:this.uit})
            .then(res=>{
                this.limpiar()
                this.AlertSuccess()
            })
            .catch(err=>{
                this.ErrorAlert()
            })
          }
        },
        ErrorAlert()
        {
          Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se puede ingresar 2 registros'
})
        }
        
    }

}
</script>

<style>

</style>