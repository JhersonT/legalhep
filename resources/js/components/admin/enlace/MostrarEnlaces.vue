<template>
  <div class="col-10 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Enlaces</h2>
      </div>
      <div class="card-body">
        <div class="form-row d-flex align-items-center">
          <div class="form-group col-3">
            <input
              type="email"
              class="form-control"
              id="inputEmail4"
              placeholder="Buscador"
              @keyup="BuscadorLink"
              v-model="buscador"
            />
          </div>
          <div class="form-group col-md-6">
            <router-link
              to="/admin/create/enlace"
              href="#"
              class="btn btn-outline-success"
              >Crear Enlace</router-link
            >
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">URL</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="link in Links.data" :key="link.id">
                <td>{{ link.name }}</td>
                <td>
                  <a :href="`${link.url}`" target="__blank">{{ link.url }}</a>
                </td>
                <td class="d-flex gap-2">
                  <router-link
                    :to="`/admin/edit/enlace/${link.id}`"
                    class="btn btn-primary mr-2"
                    ><i class="fas fa-edit"></i
                  ></router-link>
                  <a
                    @click="AlertDelete(link.id)"
                    class="btn btn-danger btn-pointer"
                    ><i class="fas fa-trash"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
          <Pagination
            :data="Links"
            @pagination-change-page="getLinks"
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
      Links: {},
      buscador: "",
      timeBuscador: "",
      numero: "",
    };
  },
  mounted() {
    this.getLinks();
  },
  methods: {
    getLinks(page = this.numero) {
      axios
        .get("/api/show/links?page=" + page, {
          params: { buscador: this.buscador },
        })
        .then((res) => {
          this.Links = res.data;
          this.numero = res.data.last_page;
        });
    },
    BuscadorLink() {
      clearTimeout(this.timeBuscador);
      this.timeBuscador = setTimeout(this.getLinks, 360);
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
          this.EliminarLink(id);
          this.getLinks(this.numero);
        }
      });
    },
    EliminarLink(id) {
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
</style>