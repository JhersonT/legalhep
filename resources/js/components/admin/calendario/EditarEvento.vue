
<template>

 <div class="container col-sm-8">
  
    <div class="card">
      <div class="card-header"><h3>Editar Evento</h3></div>
      <form v-on:submit.prevent="CreateExpediente()">
        <div class="card-body">

        <div class="form-row ">
            <div class="form-group  col-md-6">
        <label for="inputState">Abogado Asignado</label>
        <select class="form-control" v-model="abogado">
            <option value="">Seleccionar</option>
            <option :value="abo.id" v-for="abo in Abogados" :key="abo.id">{{abo.nombre+" "+ abo.apellido}}</option>
            </select>
            </div>
            <div class="form-group col-md-6">
            <label for="inputState">Fecha de Consulta</label>
            <input type="date" class="form-control" v-model="fecha">
          </div>
        </div>
        <div class="form-row ">
            <div class="form-group  col-md-6">
        <label for="inputState">Titulo</label>
        <input type="text" class="form-control" v-model="titulo" />
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
  props:["id"],
    data()
    {
        return{
            id:this.$route.params.id,
            Abogados:{},
            abogado:"",
            fecha:"",
            titulo:""

        }
    },mounted()
    {
        this.getDatosConsulta()
        this.getAbogados()
    },
    methods:{

        getAbogados()
        {
            axios.get("/api/traer/abogados/expedientes")
            .then(res=>{
                this.Abogados = res.data
                this.numero = res.data.last_page;
            })
        },
        getDatosConsulta()
        {

            axios.get("/api/evento/"+this.id)
            .then(res=>{
                this.abogado = res.data.abogado_id
                this.fecha = res.data.fecha
                this.titulo = res.data.titulo
            })
        }
        ,CreateExpediente()
        { 
          this.Validacion()
          
        },Validacion(){
          var message=[]
          if(this.abogado == "" || this.abogado == null)
            message.push("Debe asignar un abogado.")

          if(this.fecha == "" || this.fecha == null)
            message.push("Debe ingresar una fecha.")
        
        if(this.titulo == "" || this.titulo == null)
            message.push("Debe ingresar el titulo del evento.")

            if(message.length>0)
          {
            console.log("Entra menssage")
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{
            
           const config = { headers: { "content-type": "multipart/form-data" } };
            var data = new FormData();

            data.append("abogado",this.abogado);
            data.append("fecha",this.fecha);
            data.append("titulo",this.titulo);

          axios.post("/update/evento/"+this.id,data,config)
          .then(res=>{

            Swal.fire("Actualizado", "Se actualizó correctamente", "success");
          })
          }
        },
        AlertSuccess(){
          Swal.fire(
      '¡Correcto!',
      'Se guardo correctamente',
      'success'
             )
        }
        

    }
}
</script>

<style scoped>
  .text-fecha{
    color: #6c757d;
    font-weight: 700;
  }
</style>