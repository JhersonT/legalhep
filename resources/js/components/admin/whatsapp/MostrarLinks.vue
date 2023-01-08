<template>
  <div class="col-10 m-0 m-auto">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión Enlace Whatsapp</h2>
      </div>
      <div class="card-body">
        <div class="form-row d-flex align-items-center">
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">URL</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="link in Links.data" :key="link.id">
                <td>{{ link.id }}</td>
                <td>{{ link.link }}</td>
                <td class="text-center">
                  <router-link
                    :to="`/admin/edit/whatsapp/${link.id}`"
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
      numero: "",
    };
  },
  mounted() {
    this.getLinks();
  },
  methods: {
    getLinks(page = this.numero) {
      axios
        .get("/api/show/whatsapp?page=" + page, {
          params: { buscador: this.buscador },
        })
        .then((res) => {
          this.Links = res.data;
          this.numero = res.data.last_page;
        });
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