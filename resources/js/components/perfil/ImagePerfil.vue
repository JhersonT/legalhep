<template>
    <div class="image-upload">
  <label for="file-input">
    <img :src="url" class="img-perfil" />
    <img :src="`/img/camara.svg`" alt="" class="icono-perfil">
  </label>
  <input id="file-input" type="file" @change="perfil" />
</div>
</template>

<script>
export default {
 props: ['id'],
 data(){
    return{
        id:this.id,
         url:`/img/avatar.png`,
         img_perfil:''
    }
 },
 mounted(){
   this.getPerfil()
 },
 methods:{
   perfil(e){
        let file = e.target.files[0];
        this.url = URL.createObjectURL(file);
            
      const config = { headers: { "content-type": "multipart/form-data" } };

      let data = new FormData();
      data.append('img_perfil',file);
      data.append('id',this.id);

      axios.post("/update/imagen/perfil",data,config)
      .then(res =>{
         this.AlertSuccess()
      })

      },
      getPerfil(){
         axios.get("/api/show/image/perfil",{params:{id:this.id}})
         .then(res=>{
               if(res.data !== false)
               {
                this.url= `/perfil/${res.data}`
               }
         })
      },
        AlertSuccess()
        {
            Swal.fire(
                '¡Correcto!',
                'Su imagen se actualizó correctamente',
                'success'
)
        }
 }
}
</script>

<style>

</style>