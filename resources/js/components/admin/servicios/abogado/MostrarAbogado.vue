<template>
  <div class="col-10 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Servicios Mi abogado</h2>
      </div>
      <div class="card-body">
        <div class="form-row d-flex align-items-center">
          <div class="form-group col-3">
            <input
              type="email"
              class="form-control"
              id="inputEmail4"
              placeholder="Buscador"
              @keyup="BuscadorAbogado"
              v-model="buscador"
            />
          </div>
          <div class="form-group col-md-6">
            <router-link
              to="/admin/create/servicio/abogado"
              href="#"
              class="btn btn-outline-success"
              >Crear Servicio</router-link
            >
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Imagen</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="ser in Servicio.data" :key="ser.id">
                <td class="center">{{ ser.name }}</td>
                <td class="center">
                  <img :src="`/storage/servicio/abogado/${ser.image}`" alt="" class="img" v-if="ser.image !== '' ">
                </td>
                <td class="center">
                  {{ser.price}}
                </td>
                <td class="center">
                  <router-link
                    :to="`/admin/edit/servicio/abogado/${ser.id}`"
                    class="btn btn-primary mr-2"
                    ><i class="fas fa-edit"></i
                  ></router-link>
                  <a
                    @click="AlertDelete(ser.id)"
                    class="btn btn-danger btn-pointer"
                    ><i class="fas fa-trash"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
          <Pagination
            :data="Servicio"
            @pagination-change-page="getServicio"
            class="d-flex justify-content-center"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      Servicio: {},
      buscador: "",
      timeBuscador: "",
      numero: "",
    };
  },
  mounted() {
    this.getServicio();
  },
  methods: {
    getServicio(page = this.numero) {
      axios
        .get("/api/show/servicio/abogado?page=" + page, {
          params: { buscador: this.buscador },
        })
        .then((res) => {
          this.Servicio = res.data;
          this.numero = res.data.last_page;
        });
    },
    BuscadorAbogado() {
      clearTimeout(this.timeBuscador);
      this.timeBuscador = setTimeout(this.getServicio, 360);
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
          this.EliminarServicio(id);
          this.getServicio(this.numero);
        }
      });
    },
    EliminarServicio(id) {
      axios.delete("/api/delete/servicio/abogado/" + id).then((res) => {
        this.AlertaConfirmacion();
      });
    },
    AlertaConfirmacion() {
      Swal.fire("Eliminado", "Se elimino correctamente", "success");
    },
  },
};
</script>

<style>
.btn-pointer {
  cursor: pointer !important;
}
.img{
  width: 30px;
  height: 30px;
}
.center{
    text-align: center;
}
</style>