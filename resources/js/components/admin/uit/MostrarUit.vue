<template>
  <div class="col-10 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Impuesto</h2>
      </div>
      <div class="card-body">
        <div class="form-row d-flex align-items-center">
          <div class="form-group col-md-6">
            <router-link
              to="/admin/create/impuesto"
              href="#"
              class="btn btn-outline-success"
              >Crear Impuesto</router-link
            >
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th class="text-center">IMPUESTO</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="imp in Impuesto" :key="imp.id">

                <td class="center">{{imp.impuesto}}
                </td>
                <td class="center">
                  <router-link
                    :to="`/admin/edit/taxes/${imp.id}`"
                    class="btn btn-primary mr-2"
                    ><i class="fas fa-edit"></i
                  ></router-link>
                  <a
                    @click="AlertDelete(imp.id)"
                    class="btn btn-danger btn-pointer"
                    ><i class="fas fa-trash"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      Impuesto: {},
    };
  },
  mounted() {
    this.getImpuesto();
  },
  methods: {
    getImpuesto() {
      axios
        .get("/api/show/taxes")
        .then((res) => {
            this.Impuesto = res.data
            console.log(this.Impuesto)
        });
    },
    BuscadorCupones() {
      clearTimeout(this.timeBuscador);
      this.timeBuscador = setTimeout(this.getCupones, 360);
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
          this.EliminarCupon(id);
          this.getImpuesto();
        }
      });
    },
    EliminarCupon(id) {
      axios.delete("/api/delete/taxes/" + id).then((res) => {
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

.center{
    text-align: center;
}
</style>