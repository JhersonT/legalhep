<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Editar Sub Categoria</h3></div>
      <form v-on:submit.prevent="CreatePrograma()">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Nombre de Sub Categoria</label>
            <input type="text" class="form-control" v-model="subcategoria" />
          </div>
        </div>
        <div class="form-group ">
        <label>Categorias</label>
        <select class="custom-select" v-model="cate">
        <option value="">Seleccionar</option>
        <option :value="cat.id" v-for="cat in Categoria" :key="cat.id">{{cat.name}}</option>
        </select>
        </div>
        <div class="form-group ">
        <label>Requisitos</label>
        <div>
        <input type="hidden" id="requisitos" >
        <trix-editor input="requisitos" class="form-control" id="textarea"> </trix-editor>
         </div>
         </div>
        <div class="form-group">
          <label>Imagen de la Sub Categoria</label
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
          subcategoria:"",
          img_categoria:"",
          Categoria:{},
          cate:"",
          id: this.$route.params.id,
        }
    },
    mounted(){
      this.getCategorias()
      this.getSubcategoria()
    }
    ,
    methods:{
        getSubcategoria()
        {
            axios.get("/api/edit/subcategoria/"+ this.id)
            .then(res=>{
                this.subcategoria = res.data.name
                this.cate = res.data.categori.id
                document.querySelector("trix-editor").editor.insertHTML(res.data.requisitos)

            })
        },
      getCategorias(){
        axios.get("/api/show/subcategorias/categoria").
        then(res=>{
          this.Categoria = res.data
        })
      },
        image(e){
            let file = e.target.files[0];
            this.img_categoria = file
        },
        CreatePrograma()
        {
            console.log("funciona")
          this.validacion()
        },
        limpiar()
        {

        document.querySelector("#imagecat").value =""
        this.subcategoria=""
        this.cate =""
        document.querySelector("#requisitos").value=""
        document.querySelector("#textarea").value=""
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
          if(this.subcategoria === "")
            message.push("Debe ingresar el nombre de la subcategoria.")
          
          if(message.length>0)
          {
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{

              var requisitos = document.querySelector("#requisitos").value

             const config = { headers: { "content-type": "multipart/form-data" } };
            var data = new FormData();
            data.append("subcategoria",this.subcategoria);
            data.append("image",this.img_categoria);
            data.append("categoria",this.cate);
            data.append("requisitos",requisitos);

            axios.post("/update/subcategoria/"+this.id,data,config)
            .then(res=>{
                this.AlertSuccess()
                this.$router.push({ path: "/admin/show/subcategorias" });
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