<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Crear Cupón</h3></div>
      <form v-on:submit.prevent="CreateCupon()">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Código</label>
            <input type="text" class="form-control" v-model="codigo" />
          </div>
        </div>
        <div class="form-group">
          <label>Porcentaje</label
          ><input type="text" class="form-control" v-model="porcentaje" />
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
          codigo:"",
          porcentaje:""
        }
    },
    methods:{
        CreateCupon()
        {
          this.validacion()
            
        },
        limpiar()
        {

            this.codigo=""
            this.porcentaje=""
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
            message.push("Debe ingresar el código del cupón.")
          
          if(this.porcentaje === "")
            message.push("Debe ingresar el porcentaje.")
          

          if(message.length>0)
          {
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{
            axios.post("/create/cupons",{codigo:this.codigo,porcentaje:this.porcentaje})
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