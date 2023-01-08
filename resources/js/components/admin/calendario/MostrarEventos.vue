<template>
   <div class="col-10 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Eventos</h2>
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
                <th class="text-center">Abogado</th>
                <th class="text-center">Titulo</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="even in Eventos.data" :key="even.id">
                <td>{{even.abogado.nombre}}</td>
                <td>{{even.titulo}}</td>
                <td>{{even.fecha}}</td>
                <td class="d-flex gap-2">
                  <router-link
                    :to="`/admin/edit/eventos/${even.id}`"
                    class="btn btn-primary mr-2"
                    ><i class="fas fa-clipboard-list"></i
                  ></router-link>
                  <a
                   @click="eliminar(even.id)"
                    class="btn btn-danger btn-pointer"
                    ><i class="fas fa-trash"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
          <Pagination
            :data="Eventos"
            @pagination-change-page="MostrarEventos"
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

    data(){
        return{
            id_user:this.id,
            Eventos:{},
            numero:""
        }
    },
    mounted()
    {
        this.MostrarEventos()
    },
    methods:{
        MostrarEventos(page = this.numero)
        {
          axios.get("/api/evento/user/"+this.id_user+"?page="+page)
          .then(res=>{
            this.Eventos = res.data
            this.numero = res.data.last_page;
          })
        },eliminar(id)
        {
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
          this.EliminarEvento(id);
          this.MostrarEventos(this.numero);
        }
      });
        },
        EliminarEvento(id) {
      axios.delete("/api/delete/evento/" + id).then((res) => {
        this.AlertaConfirmacion();
      });
    },
    AlertaConfirmacion() {
      Swal.fire("Eliminado", "Se elimino correctamente", "success");
    }
    }
}
</script>

<style>

</style>