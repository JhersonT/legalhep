<template>
  <div class="container col-sm-7">
    <div class="card">
      <div class="card-header"><h3>Crear Categoria</h3></div>
      <form v-on:submit.prevent="CreatePrograma()">
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputState">Nombre de Categoria</label>
              <input type="text" class="form-control" v-model="nombre" />
            </div>
          </div>
          <div class="form-group">
            <label>Imagen de la Categoria</label
            ><input
              type="file"
              class="form-control"
              @change="image"
              id="imagecat"
            />
          </div>
        </div>
        <div class="card-footer text-center">
          <button class="btn btn-primary mr-1" type="submit">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      nombre: "",
      img_categoria: "",
      id: this.$route.params.id,
    };
  },
  mounted() {
    this.getCategoria();
  },
  methods: {
    image(e) {
      let file = e.target.files[0];
      this.img_categoria = file;
    },
    CreatePrograma() {
      this.validacion();
    },
    limpiar() {
      document.querySelector("#imagecat").value = "";
      this.nombre = "";
    },
    AlertSuccess() {
      Swal.fire("¡Correcto!", "Se guardo correctamente", "success");
    },
    validacion() {
      var message = [];
      if (this.nombre === "")
        message.push("Debe ingresar el nombre de la categoria.");

      if (message.length > 0) {
        swal.fire({
          icon: "error",
          title: "Error al procesar los datos..",
          html: message.join("<br>"),
        });
      } else {
        const config = { headers: { "content-type": "multipart/form-data" } };
        var data = new FormData();
        data.append("nombre", this.nombre);
        data.append("image", this.img_categoria);

        axios.post("/update/categoria/" + this.id, data, config).then((res) => {
          this.AlertSuccess();
          this.$router.push({ path: "/admin/show/categorias" });
        });
      }
    },
    getCategoria() {
      axios.get("/api/edit/categoria/" + this.id).then((res) => {
        this.nombre = res.data.name;
      });
    },
  },
};
</script>

<style>
</style>