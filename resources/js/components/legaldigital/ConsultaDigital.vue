<template>

        <div class="body-miabogado">
            <h3 style="color:#2B8FD6 !important">Legal Digital. </h3>

            <h4>Nuestros abogados atienden estas modalidades.</h4>
            
            <form v-on:submit.prevent="ConsultaAbogado()">
                <div class="contenido-boton-consulta" v-for="mod in Modalidades" :key="mod.id" >
                <div class="contenido-imagen" >
                    <img :src="`/${mod.image}`" alt="">
                    <label for="20">{{mod.name}} S/ {{mod.price}}</label>
                </div>
                <input type="radio" name="consulta" id="20" v-model="tipoConsulta" :value="mod.id" >
            </div>

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
    getModalidades()
    {
       axios.get("/api/traer/modalidades/digital")
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

</style>