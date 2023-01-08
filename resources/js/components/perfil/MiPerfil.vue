<template>
    <div class="image-upload">
  <label for="file-input">
    <img :src="url" class="img-perfil" />
    <img :src="`/img/camara.svg`" alt="" class="icono-perfil">
  </label>
  <input id="file-input" type="file" @change="perfil" />
</div>
 <h1>Perfil de Usuario</h1>
            <div class="contenido-input-registro ">
              <form  v-on:submit.prevent="updatePerfil()">
             
                <select id="" class="select" v-model="tipoDoc">
                  <option value="">--Tipo de documento--</option>
                  <option value="DNI">DNI</option>
                  <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
                  <option value="Pasaporte">Pasaporte</option>
                </select>

                <input type="text" class="input-text" placeholder="Número de documento" v-model="documento">

                <select id="" class="select" v-model="departamento">
                  <option value="">--Departamentos--</option>
                    <option v-for="dep in Departamentos" :value="dep.nombre" :key="dep.id">{{dep.nombre}}</option>
                </select>

                <input type="text" class="input-text" placeholder="Nombres"   v-model="nombres">

                <input type="text" class="input-text" placeholder="Apellidos"  v-model="apellidos">

                <input type="text" class="input-text" placeholder="correo"  v-model="email">

                <input type="submit" value="Guardar Perfil" class="btn btn-registrar">
            </form>
            </div>
</template>

<script>
export default {
    props:['id'],
    data(){
        return{
            id:this.id,
            Departamentos:{},
            tipoDoc:'',
            nombres:'',
            apellidos:'',
            email:'',
            documento:'',
            departamento:'',
            url:`/img/avatar.png`,
            img_perfil:'',
            
        }
    },
    mounted()
    {
        this.traerDatosUsuario()
        this.traerDepartamentos()
    },
    methods:{
        traerDatosUsuario()
        {
            axios.get("/api/show/datos/user",{params:{id:this.id}})
            .then(res=>{
                this.tipoDoc= res.data.client.tipo_doc
                this.nombres = res.data.client.nombres
                this.apellidos = res.data.client.apellidos
                this.email = res.data.email
                this.documento =res.data.client.n_doc
                this.departamento = res.data.client.departamento
                if(res.data.client.img_perfil !== null)
                {
                    this.url=`/perfil/${res.data.client.img_perfil}`
                }
            })
        },
        traerDepartamentos()
        {
            axios.get("/api/show/departamentos")
            .then((res) => {
                this.Departamentos = res.data
            }).catch((err) => {
                
            });
        },perfil(e){
             let file = e.target.files[0];
        this.url = URL.createObjectURL(file);
             this.img_perfil = file
        },
        updatePerfil()
        {
            const config = { headers: { "content-type": "multipart/form-data" } };
            
            let data = new FormData();
            data.append("tipoDoc",this.tipoDoc)
            data.append("nombres",this.nombres)
            data.append("apellidos",this.apellidos)
            data.append("email",this.email)
            data.append("documento",this.documento)
            data.append("departamento",this.departamento)
            data.append("img_perfil",this.img_perfil)

            axios.post("/update/perfil/usuario/"+this.id,data,config)
            .then(res=>{
                this.AlertSuccess()
            })
        },
        AlertSuccess()
        {
            Swal.fire(
                '¡Correcto!',
                'Su perfil se actulizó Correctamente',
                'success'
)
        }
    }
}
</script>

<style>
    h1{
        font-family: 'Scada', sans-serif;
        color: white;
        margin-bottom: 0;
    }
    .image-upload>input {
        display: none;
    }
    .image-upload{
position: relative;
    }
    .img-perfil{
        border-radius: 50% !important;
        width: 170px !important;
        height: auto !important;
    }
    .image-upload .icono-perfil{
        position: absolute;
        right: 5%;
        bottom: 10%;
        z-index: 1;

    }
</style>