<template>
  <div class="col-10 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Clientes</h2>
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
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellidos</th>
                <th class="text-center">Tipo Documento</th>
                <th class="text-center">N° Documento</th>
                <th class="text-center">Departamento</th>
                <th class="text-center">Perfil</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="cli in Clientes.data" :key="cli.id">
                <td>{{ cli.nombres }}</td>
                <td>{{ cli.apellidos }}</td>
                <td>{{ cli.tipo_doc }}</td>
                <td>{{ cli.n_doc }}</td>
                <td>{{ cli.departamento }}</td>
                <td><img :src="`/perfil/${cli.img_perfil}`" alt="" srcset="" class="img-perfil-cliente"></td>

                <td class="d-flex gap-2">
                  <router-link
                    :to="`/admin/edit/clientes/${cli.id}`"
                    class="btn btn-primary mr-2"
                    ><i class="fas fa-clipboard-list"></i
                  ></router-link>
                </td>
              </tr>
            </tbody>
          </table>
          <Pagination
            :data="Clientes"
            @pagination-change-page="getClientes"
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
      Clientes: {},
      buscador: "",
      timeBuscador: "",
      numero: "",
    };
  },
  mounted() {
    this.getClientes();
  },
  methods: {
    getClientes(page = this.numero) {
      axios
        .get("/api/show/clientes?page=" + page, {
          params: { buscador: this.buscador },
        })
        .then((res) => {
          this.Clientes = res.data;
          this.numero = res.data.last_page;
        });
    },
    BuscadorCliente() {
      clearTimeout(this.timeBuscador);
      this.timeBuscador = setTimeout(this.getClientes, 360);
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
  },
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
</style>