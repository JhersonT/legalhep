<template>
  <div class="col-10 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Cuentas Bancarias</h2>
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
              >Agregar Cuenta Bancaria</router-link
            >
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th class="text-center">N° de Cuenta</th>
                <th class="text-center">Titular</th>
                <th class="text-center">Logo</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="acc in Accounts.data" :key="acc.id">
                <td class="center">{{ acc.cuenta }}</td>
                <td class="center">
                 {{ acc.titular }}
                </td>
                <td class="center">
                    <img :src="`/storage/account/${acc.logo}`" alt="" v-if="acc.logo">
                </td> 
                <td class="center">
                  <router-link
                    :to="`/admin/edit/cuenta/${acc.id}`"
                    class="btn btn-primary mr-2"
                    ><i class="fas fa-edit"></i
                  ></router-link>
                  <a
                    @click="AlertDelete(acc.id)"
                    class="btn btn-danger btn-pointer"
                    ><i class="fas fa-trash"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
          <Pagination
            :data="Accounts"
            @pagination-change-page="getAccounts"
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
      Accounts: {},
      buscador: "",
      timeBuscador: "",
      numero: "",
    };
  },
  mounted() {
    this.getAccounts();
  },
  methods: {
    getAccounts(page = this.numero) {
      axios
        .get("/api/show/accounts?page=" + page, {
          params: { buscador: this.buscador },
        })
        .then((res) => {
          this.Accounts = res.data;
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