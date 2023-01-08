<template>
  <input type="text" class="search" placeholder="Ingresa el código del documento solicitado" v-model="buscador"
              @keyup="buscarLibros">
<table class="table">
  <thead >
    <tr class="content-thead" >
      <th class="title-table" style="text-align:center;" ><p class="text-title"> <img :src="`/img/pendientes.png`" alt="" class="img-pendientes"> Documentos Pendientes</p></th>
      <th class="title-table"></th>
      <th class="title-table"></th>
      <th class="title-table text-historial"> <img :src="`/img/historial.png`" alt="" class="img-historial"> Historial</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="cons in Consultas.data" :key="cons.id">
      <th scope="row"><p class="acto">Acto Solicitado : {{cons.modalidad}}</p> <p class="acto">COD: <span>{{cons.numeroConsulta}}</span></p></th>
      <th v-for="li in Link" :key="li.id" ><a :href="li.link" v-if="cons.estado == 'Pagado' " class="td-resumen"> <img :src="`/img/operador.png`" alt="" class="img-resumen"> Consultar</a></th>
      <th v-if="cons.tipo_pago === null && cons.pagado === null"><a @click="Pendiente('tipo-pagado',cons.numeroConsulta)"  class="link-p"><img :src="`/img/reloj.png`" alt="" class="img-estado">Pendiente</a> </th>
      <th v-if="cons.pagado !== null"><a  @click="Pendiente('pagado',cons.numeroConsulta)" class="link-p" ><img :src="`/img/aceptar.png`" alt="" class="img-estado">Pagado</a></th>
      <th v-if="cons.tipo_pago === 'tarjeta' && cons.pagado === null "><a @click="Pendiente('pago-tarjeta',cons.numeroConsulta)"  class="link-p"><img :src="`/img/reloj.png`" alt="" class="img-estado">Pendiente</a></th>
      <th v-if="cons.tipo_pago === 'deposito' && cons.pagado === null "><a  @click="Pendiente('envio-voucher',cons.numeroConsulta)"  class="link-p"><img :src="`/img/reloj.png`" alt="" class="img-estado">Pendiente</a></th>
      <td > <a :href="`/detalles/consulta/${cons.numeroConsulta}`" class="td-resumen"> <img :src="`/img/resumen.png`" alt="" class="img-resumen"> Resumen </a></td>
      <th></th>
    </tr>

  </tbody>
</table>

<Pagination
            :data="Consultas"
            @pagination-change-page="getConsultas"
            class="paginacion"
          />
</template>

<script>
export default {
  props:["id"],
  data(){
    return{
      id:this.id,
      Consultas:{},
      buscador: "",
      timeBuscador: "",
      Link:{}
    }
  },
  mounted()
  {
    this.getConsultas()
    this.getNumero()
  },methods:{
    getNumero()
    {
      axios.get("/api/traer/link")
      .then(res=>{
        this.Link =res.data
      })
    },
      getConsultas(page=1){
        axios.get("/api/consultas/client/"+this.id+"/?page="+page,{params:{buscador:this.buscador}})
        .then(res=>{
            this.Consultas = res.data 
            
        })
      },
    buscarLibros() {
      clearTimeout(this.timeBuscador);
      this.timeBuscador = setTimeout(this.getConsultas, 360);
    },
    Pendiente(tipo,consulta)
    {
     
        if(tipo === "tipo-pagado")
        window.location.href = "/tipo/pago/"+consulta
        
         if(tipo === "pago-tarjeta")
        window.location.href = "/pago/tarjeta/"+consulta
        
         if(tipo === "envio-voucher")
        window.location.href = "/envio/voucher/"+consulta
      
    }
  },

}
</script>

<style scoped>

.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
}

table {
    border-collapse: collapse;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
th {
    text-align: inherit;
}
.search{
  margin-bottom: 3rem;
  margin-top: 1rem;;
  padding: .4rem;
  border: 2px solid black;
  width: 80%;
   box-shadow: 0px 6px 16px -5px rgba(0,0,0,0.75);
-webkit-box-shadow: 0px 6px 16px -5px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 6px 16px -5px rgba(0,0,0,0.75);
}
.content-thead{
  background: #084068;
  width: 100%;
  border-radius: 10px;
}

.title-table .text-title{
  width: 90%;
  margin: 0;
  background: white;
  color: #75797D;
  border-radius: 2px;
  padding: .1rem;
  position: relative;
  text-align: right;
padding-right: 2rem;
}

.text-title .img-pendientes{
  position: absolute;
  width: 3.5rem;
  top:-100%;
  left:10%;
}
.text-historial{
  position: relative;
}
.img-historial{
  width: 3.5rem;
  position: absolute;
  left: -30%;
  top: -20%;
}
.text-historial{
  color: white !important;
}
.acto{
  font-size: .9rem;
  color: #157DC3;
}
.img-resumen{
  width: 3rem;
}

.td-resumen{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-decoration: none;
  color: #75797D;
}
@media (max-width:768px)
{
  .text-title .img-pendientes{
  top:0%;
  }

  .img-historial{

  top: -5%;
}
}
.img-estado{
  width: 50px;
}
.link-p{
  display:flex;
  justify-content:center;
  flex-direction:column;
  cursor: pointer;
   text-decoration: none;
  color: #75797D;
  font-weight: 400;
}
.btn-consultar{

}
</style>