<template>

        <div class="body-miabogado mt-2">
            <h3 style="color:#2B8FD6 !important">Abogado de Emergencia. </h3>

            <h4>Nuestros abogados atienden en tres modalidades.</h4>
            
            <form v-on:submit.prevent="ConsultaAbogado()">
                <div class="contenido-boton-consulta" v-for="mod in Modalidades.data" :key="mod.id" >
                <div class="contenido-imagen" >
                    <img :src="`/storage/servicio/abogado/${mod.image}`" alt="" class="img-consulta" v-if="mod.image !== '' ">
                    <label for="20">{{mod.name}} S/ {{mod.price}}</label>
                </div>
                <input type="radio" name="consulta" id="20" v-model="tipoConsulta" :value="mod.id" class="radio">
            </div>
            <Pagination
            :data="Modalidades"
            @pagination-change-page="getModalidades"
            class="paginacion pa"
          />
            <button type="submit" class="btn-consultas" style="border:none;cursor:pointer">Continuar <img :src="`/img/flecha.svg`" alt=""></button>
            </form>

            <img :src="`/img/chat-1.svg`" alt="" class="icono-consulta-abogado">
            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img :src="`/img/regresar.png`" alt=""> Regresar</a>
            </div>
        </div>
    
</template>

<script>
export default {
props: ['id'],
data(){
    return{
        tipoConsulta:"",
        Modalidades:{}
    }
},
mounted()
{
    this.getModalidades()
},
methods:{
    getModalidades(page=1)
    {
       axios.get("/api/traer/modalidades/emergencia/?page="+page)
       .then(res =>{
        this.Modalidades = res.data
       })
       .catch(err =>{
        console.log(err)
       })
    },
    ConsultaAbogado()
    {
        axios.post("/request/consulta/abogado",{id_user:this.id,tipoConsulta:this.tipoConsulta})
        .then(res =>{
            window.location.href = "/tipo/pago/"+res.data 
        })
    }
}
}
</script>

<style>
.radio{
    width: 20px !important;
}
</style>