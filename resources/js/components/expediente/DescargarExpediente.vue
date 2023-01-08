<template>
  <tr>
    <td class="titulo">Documento:</td>
    <td class="btn-descargar"><a href="#" @click="donwload">Descargar</a></td>
  </tr>
</template>

<script>
export default {
    props:["consulta","pdf"],
    data(){
        return{

        }
    },mounted()
    {

    },methods:{
        donwload(){
            console.log("se ejecuta")
          axios.get("/download/documento/"+this.consulta+"?image="+this.pdf, {responseType: 'blob'})
                .then(response => {
                   const url = window.URL.createObjectURL(new Blob([response.data]));
                  const link = document.createElement('a');
                  link.href = url;
                  link.setAttribute('download', pdf);
                  document.body.appendChild(link);
                  link.click();
                })
                .catch(e => {
                console.log(e);
                });
        }
    }
};
</script>

<style scoped>

tr{
    display: flex;
}
.titulo{
    width: 46%;
  text-align: left;
}
.btn-descargar{
    width: 50%;
    text-align: left;
}

.btn-descargar a{
    color: white;
    background: #004A79;
    border-radius: 5px;
    padding: .2rem;
    text-decoration: none;
}

</style>