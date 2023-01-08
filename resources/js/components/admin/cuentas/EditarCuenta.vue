<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Agregar Cuenta Bancaria</h3></div>
      <form v-on:submit.prevent="CreateCupon()">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Número de Cuenta</label>
            <input type="text" class="form-control" v-model="cuenta" />
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Titular</label>
            <input type="text" class="form-control" v-model="titular" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Logo de Entidad</label>
            <input type="file" class="form-control" @change="image" id="logoBanco" />
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
          cuenta:"",
          titular:"",
          logo:"",
          id:this.$route.params.id
        }
    },
    mounted()
    {
      this.getDatos()
    },
    methods:{
        CreateCupon()
        {
          this.validacion()
            
        },
        image(e){
        let file = e.target.files[0];
        this.logo = file
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
          if(this.cuenta === "")
            message.push("Debe un número de cuenta.")
          
          if(this.titular === "")
            message.push("Debe ingresar el titular de la cuenta.")
          

          if(message.length>0)
          {
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{
                const config = { headers: { "content-type": "multipart/form-data" } };
            var data = new FormData();
            data.append("cuenta",this.cuenta);
            data.append("logo",this.logo);
            data.append("titular",this.titular);

            axios.post("/update/account/"+this.id,data,config)
            .then(res=>{
                this.AlertSuccess()
              document.querySelector("#logoBanco").value=""
            })
          }
        },
        getDatos()
        {
          axios.get("/api/edit/account/"+this.id)
          .then(res=>{
              this.cuenta = res.data.cuenta
              this.titular = res.data.titular
          })
        }
        
    }

}
</script>

<style>

</style>