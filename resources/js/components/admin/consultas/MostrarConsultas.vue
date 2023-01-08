<template>

  <div class="col-12 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Consultas</h2>
      </div>
      <div class="card-body">
        <div class="form-row d-flex align-items-center">
          <div class="form-group col-3">
            <input
              type="email"
              class="form-control"
              id="inputEmail4"
              placeholder="Buscador"
              @keyup="BuscadorCliente"
              v-model="buscador"
            />
          </div>
          <div class="form-group col-md-6">
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th class="text-center">Cliente</th>
                <th class="text-center">Modalidad</th>
                <th class="text-center">N° Consulta</th>
                <th class="text-center">Tipo Pago</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Voucher</th>
                <th class="text-center" v-if="this.rol !=='Abogado'">Acciones</th>
              </tr>
              <tr v-for="cons in Consulta.data" :key="cons.id">
                <td>{{ cons.client[0].nombres }}</td>
                <td >{{ cons.modalidad }}</td>
                <td>{{ cons.numeroConsulta }}</td>
                <td class="modalidad">{{ cons.tipo_pago }}</td>
                <td>S/. {{ cons.precio }}</td>
                <td><select class="custom-select col-md-9" v-model="estado" :onload="MostrarEstado(cons.estado,cons.numeroConsulta)" @change="cambiarEstado(cons.id)" >
                        <option :value="est.nombre" v-for="est in Estados" :key="est.id" >{{est.nombre}}</option>
                      </select></td>
                    <td><button type="button" class="btn btn-primary" @click="donwload(cons.voucher,cons.numeroConsulta)" v-if="cons.voucher">Descargar <i class="fas fa-download"></i>
                      </button></td>
                <td class="d-flex gap-2" v-if="this.rol !=='Abogado'">
                  <router-link
                    :to="`/admin/detalle/consulta/${cons.id}`"
                    class="btn btn-primary mr-2"
                    ><i class="fas fa-clipboard-list"></i
                  ></router-link>
                </td>
              </tr>
            </tbody>
          </table>
          <Pagination
            :data="Consulta"
            @pagination-change-page="getConsulta"
            class="d-flex justify-content-center"
          />
        </div>
        
      </div>
    </div>
    
  </div>
  
</template>

<script>
export default {
  props:["id"],
  data() {
    return {
      Consulta: {},
      buscador: "",
      timeBuscador: "",
      numero: "",
      Estados:"",
      numero:"",
      estado:"",
      id:this.id,
      rol:""
    };
  },
  mounted() {
    this.getConsulta();
    this.getEstados()
    this.traerRol()
  },
  methods: {
    traerRol()
  {

    axios.get("/api/traer/rol/"+this.id)
    .then(res=>{
        this.rol =res.data
    })
  },
    getEstados()
        {
            axios.get("/api/traer/estados/expedientes/"+this.id)
            .then(res=>{
                this.Estados = res.data
            })
        },
    getConsulta(page = this.numero) {
      axios
        .get("/api/traer/consultas/"+this.id +"?page=" + page, {
          params: { buscador: this.buscador },
        })
        .then((res) => {
          this.Consulta = res.data;
          this.numero = res.data.current_page;
        });
    },
    BuscadorCliente() {
      clearTimeout(this.timeBuscador);
      this.timeBuscador = setTimeout(this.getConsulta, 360);
    },
    AlertDelete(id) {
      Swal.fire({
        title: "¿Estas seguro que deseas eliminar?",
        text: "Esta acción no se puede revertir",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          this.EliminarCliente(id);
          this.getLinks(this.numero);
        }
      });
    },
    EliminarCliente(id) {
      axios.delete("/api/delete/enlace/" + id).then((res) => {
        this.AlertaConfirmacion();
      });
    },
    AlertaConfirmacion() {
      Swal.fire("Eliminado", "Se elimino correctamente", "success");
    },
    cambiarEstado(id)
    {
      axios.get("/api/change/estado/"+id+"/"+this.estado)
      .then(res=>{
        iziToast.success({
        title: 'Correcto',
        message: 'Se actualizó correctamente el estado',
        position: 'topRight',
        timeout: 1000
        });
        this.getConsulta();
      })
    },
    MostrarEstado(estado)
    {

      if(estado == "Ingresado" || estado == "En Calificación" || estado == "Observado" || estado == "Liquidado" || estado == "Suspendido" || estado == "Culminado" || estado == "Otro" || estado =="Pendiente" || estado == "Pagado" )
                {
                  this.estado = estado
                }else{
                    this.estado =`Otro`
                }

    },
    donwload(img,consulta)
    {
      axios.get("/download/qr/"+consulta+"?image="+img, {responseType: 'blob'})
                .then(response => {
                   const url = window.URL.createObjectURL(new Blob([response.data]));
                  const link = document.createElement('a');
                  link.href = url;
                  link.setAttribute('download', img);
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

<style>
.btn-pointer {
  cursor: pointer !important;
}
.img-perfil-cliente{
    width: 50px;
    height: 50px;
}
tr td{
  text-align: center;
}
.modalidad{
  text-transform: capitalize !important;
}
</style>