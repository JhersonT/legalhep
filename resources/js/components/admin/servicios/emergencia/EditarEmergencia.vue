<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Editar Servicio Abogado de Emergencia</h3></div>
      <form v-on:submit.prevent="CreateCupon()">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Nombre</label>
            <input type="text" class="form-control" v-model="nombre" />
          </div>
        </div>
        <div class="form-group">
          <label>Precio</label>
          <input type="text" class="form-control" v-model="precio" id="imagecat" />
        </div>
        <div class="form-group">
          <label>Icono</label
          ><input type="file" class="form-control" @change="image" id="imagecat" />
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
          precio:"",
          img_servicio:"",
          id:this.$route.params.id
        }
    },
    mounted()
    {
        this.getServicio()
    }
    ,
    methods:{
        getServicio()
        {
            axios.get("/api/edit/servicio/abogado/"+this.id)
            .then(res=>{
                this.nombre = res.data.name
                this.precio = res.data.price
            })
        },
      image(e){
            let file = e.target.files[0];
            this.img_servicio = file
        },
        CreateCupon()
        {
          this.validacion()
        },
        limpiar()
        {
            this.nombre=""
            this.precio=""
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
            message.push("Debe ingresar el nombre del servicio.")
          
          if(this.precio === "")
            message.push("Debe ingresar el precio del servicio.")

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
            data.append("nombre",this.nombre)
            data.append("precio",this.precio)
            data.append("img",this.img_servicio)

            axios.post("/update/servicio/abogado/"+this.id,data,config)
            .then(res=>{
                this.AlertSuccess()
                this.$router.push({path: '/admin/show/servicio/emergencia'})
            })
          }
        },
        
    }

}
</script>

<style>

</style>