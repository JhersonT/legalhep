<template>
  <div class="col-8 m-0 m-auto ">
    <div class="card">
      <div class="card-header pt-0">
        <h2 class="pt-4 m-0">Gestión de Servicios Subcategorias</h2>
      </div>
      <div class="card-body">
        <div class="form-row d-flex align-items-center">
          <div class="form-group col-3">
            <input
              type="email"
              class="form-control"
              id="inputEmail4"
              placeholder="Buscador"
              @keyup="BuscadorCategorias"
              v-model="buscador"
            />
          </div>
          <div class="form-group col-md-6">
            <router-link
              to="/admin/create/subcategoria"
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
                <th class="text-center">Sub Categoria</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Ícono</th>
                <th class="text-center">Acciones</th>
              </tr>
              <tr v-for="ser in Servicio.data" :key="ser.id">
                <td class="text-center">{{ ser.subcategorie[0].name }}</td>
                <td >{{ ser.name }}</td>
                <td >{{ ser.precio }}</td>
                <td ><img :src="`/storage/servicio/subcategoria/${ser.image}`" alt=""  class="img-cat" v-if="ser.image"></td>
                <td class="accion">
                  <router-link
                    :to="`/admin/edit/subcategorias/${ser.id}`"
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
            @pagination-change-page="getSubcategoria"
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
      numero:""
    };
  },
  mounted() {
    this.getServicio();
  },
  methods: {
    getServicio(page=this.numero) {
      axios
        .get("/api/show/servicios/subcategorias?page="+page, {
          params: { buscador: this.buscador },
        })
        .then((res) => {
          this.Servicio = res.data;
          this.numero = res.data.last_page
        });
    },
    BuscadorCategorias() {
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
          this.EliminarCategoria(id);
         
        }
      });
    },
    EliminarCategoria(id)
    {
      axios.delete("/api/delete/subcategoria/"+id)
      .then(res=>{
        this.AlertaConfirmacion()
        this.getServicio(this.numero);
      })
    },
    AlertaConfirmacion()
    {
       Swal.fire(
      'Eliminado',
      'Se elimino correctamente',
      'success'
    )
    },
  },
};
</script>

<style>
.btn-pointer {
  cursor: pointer !important;
}
.img-cat{
  width: 50px;
  height: 50px;
  display: flex;
  justify-content: center;
  margin: 0 auto;
}
.accion{
  display: flex;
  justify-content: center;
  margin: 0 auto;
}
.text-center{
  text-align: center;
}
</style>