<template>
  <div class="col-10 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Cupónes</h2>
      </div>
      <div class="card-body">
        <div class="form-row d-flex align-items-center">
          <div class="form-group col-3">
            <input
              type="email"
              class="form-control"
              id="inputEmail4"
              placeholder="Buscador"
              @keyup="BuscadorCupones"
              v-model="buscador"
            />
          </div>
          <div class="form-group col-md-6">
            <router-link
              to="/admin/create/cupon"
              href="#"
              class="btn btn-outline-success"
              >Crear Cupón</router-link
            >
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th class="text-center">Código</th>
                <th class="text-center">Porcentaje</th>
                <th class="text-center">Usado</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="cup in Cupon.data" :key="cup.id">
                <td class="center">{{ cup.codigo }}</td>
                <td class="center">
                 {{ cup.porcentaje }}
                </td>
                <td class="center">
                <p v-if="cup.usado === 0">No</p>
                <p v-if="cup.usado === 1">Si</p>
                </td>
                <td class="center">
                  <router-link
                    :to="`/admin/edit/cupon/${cup.id}`"
                    class="btn btn-primary mr-2"
                    ><i class="fas fa-edit"></i
                  ></router-link>
                  <a
                    @click="AlertDelete(cup.id)"
                    class="btn btn-danger btn-pointer"
                    ><i class="fas fa-trash"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
          <Pagination
            :data="Cupon"
            @pagination-change-page="getCupones"
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
      Cupon: {},
      buscador: "",
      timeBuscador: "",
      numero: "",
    };
  },
  mounted() {
    this.getCupones();
  },
  methods: {
    getCupones(page = this.numero) {
      axios
        .get("/api/show/cupones?page=" + page, {
          params: { buscador: this.buscador },
        })
        .then((res) => {
          this.Cupon = res.data;
          this.numero = res.data.last_page;
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
          this.getCupones(this.numero);
        }
      });
    },
    EliminarCupon(id) {
      axios.delete("/api/delete/cupon/" + id).then((res) => {
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