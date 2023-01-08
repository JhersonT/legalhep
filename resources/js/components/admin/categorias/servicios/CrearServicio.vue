<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Crear Servicios Categoria</h3></div>
      <form v-on:submit.prevent="CreatePrograma()">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Nombre del Servicio</label>
            <input type="text" class="form-control" v-model="nombre" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Precio del Servicio</label>
            <input type="text" class="form-control" v-model="precio" placeholder="S/." />
          </div>
        </div>
                <div class="form-group">
          <label>Ícono Servicio</label
          ><input type="file" class="form-control" @change="image" id="imagecat" />
        </div>
        <div class="form-group ">
        <label>Sub Categorias</label>
        <select class="custom-select" v-model="cate">
        <option value="">--Seleccionar--</option>
        <option :value="cat.id" v-for="cat in Categoria" :key="cat.id">{{cat.name}}</option>
        </select>
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
          Categoria:{},
          cate:""
        }
    },
    mounted(){
      this.getCategorias()
    }
    ,
    methods:{
      getCategorias(){
        axios.get("/api/show/get/subcategorias").
        then(res=>{
          this.Categoria = res.data
        })
      },
        image(e){
            let file = e.target.files[0];
            this.img_servicio = file
        },
        CreatePrograma()
        {
          this.validacion()
        },
        limpiar()
        {

        document.querySelector("#imagecat").value =""
        this.nombre=""
        this.subcategoria=""
        this.cate =""
        this.precio =""
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
            message.push("Debe ingresar el nombre de la categoria.")
          
          if(this.precio === "")
            message.push("Debe ingresar el precio del servicio.")

          if(this.cate === "")
            message.push("Debe seleccionar a que sub categoria pertenece el servicio")

          
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
            data.append("nombre",this.nombre);
            data.append("image",this.img_servicio);
            data.append("precio",this.precio);
            data.append("subcategoria",this.cate);

            axios.post("/create/servicio/subcategoria",data,config)
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
trix-editor {
    min-height: 300px !important;
    height: auto !important;
}
</style>