
<template>

 <div class="container col-sm-8">
  
    <div class="card">
      <div class="card-header"><h3>Detalle Consulta</h3></div>
      <form v-on:submit.prevent="CreateExpediente()">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Cliente</label>
            <input type="text" class="form-control" v-model="cliente" disabled="disabled"/>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Número de Consulta</label>
            <input type="text" class="form-control" v-model="numeroConsulta" disabled="disabled" />
          </div>
        </div>
        <div class="form-row ">
            <div class="form-group  col-md-6">
                <label>Estado</label>
        <select class="custom-select" v-model="estado" id="estado">
        <option value="">Seleccionar</option>
        <option value="Ingresado">Ingresado</option>
        <option value="En Calificación">En Calificación</option>
        <option value="Observado">Observado</option>
        <option value="Liquidado">Liquidado</option>
        <option value="Suspendido">Suspendido</option>
        <option value="Culminado">Culminado</option>
        <option value="Pagado">Pagado</option>
        <option value="Pendiente">Pendiente</option>
        <option value="Otro">Otro</option>
        </select>
            </div>
            <div class="form-group col-md-6">
            <label for="inputState">Servicio</label>
            <input type="text" class="form-control" v-model="servicio" />
          </div>
        </div>
        <div class="form-row ">
            <div class="form-group  col-md-6">
        <label for="inputState">Abogado Asignado</label>
        <select class="form-control" v-model="abogado">
            <option value="">Seleccionar</option>
            <option :value="abo.id" v-for="abo in Abogados" :key="abo.id">{{abo.nombre+" "+ abo.apellido}}</option>
            </select>
            </div>
            <div class="form-group col-md-6">
            <label for="inputState">Especialidad</label>
            <input type="text" class="form-control" v-model="especialidad" />
          </div>
        </div>
        <div class="form-row ">
            <div class="form-group  col-md-6">
        <label for="inputState">Precio</label>
        <input type="text" class="form-control" v-model="precio" />
            </div>
            <div class="form-group col-md-6" v-if="transaccion">
            <label for="inputState">ID Transacción</label>
            <input type="text" class="form-control" v-model="transaccion" disabled="disabled" />
          </div>
        </div>
        <div class="form-row ">
            <div class="form-group  col-md-6">
        <label for="inputState">Archivo</label>
        <input type="file" class="custom-file" @change="subirPdf" >
            </div>
            <div class="form-group col-md-6">
            <label for="inputState">Fecha de Consulta</label>
            <input type="date" class="form-control" v-model="fecha">
          </div>
        </div>
        <div class="form-row mb-3">
            <a @click="CreateObservacion()" class="btn btn-outline-primary" style="cursor:pointer">Agregar Observación</a>
        </div>
        <div class="form-row " v-show="addObservacion === '1'">
        <div>
        <input type="hidden" id="observacion" >
        <trix-editor input="observacion" class="form-control" id="textarea"> </trix-editor>
         </div>
         </div>

      </div>
      <div class="card-footer text-center">
        <button class="btn btn-primary mr-1" type="submit">Guardar</button>
      </div>
      </form>
    </div>
  </div>
  <div class="container col-sm-8">
     <div class="card">
                  <div class="card-header">
                    <h4>Observaciones</h4>
                    <div class="card-header-action">
                      <a  class="btn btn-icon btn-info" style="cursor:pointer" @click="show"><i
                          class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show " id="mycard-collapse">
                      <div class="d-flex flex-wrap justify-content-center m-0 m-auto">
                         <div class="col-12 col-md-6 col-lg-5 "  v-for="ob in Observaciones.data" :key="ob.id">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Estado: {{ob.estado}}</h4>
                  </div>
                  <div class="card-body">
                    <p v-html="ob.observacion"></p> 
                     <p><span class="text-fecha">Fecha:</span> {{ob.created_at.slice(0,10).replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3-$2-$1')}}</p>
                  </div>
                </div>
              </div>
                      </div>
                      <Pagination
            :data="Observaciones"
            @pagination-change-page="getObservaciones"
            class="d-flex justify-content-center"
          />
                  </div>
                </div>
                
  </div>
  
</template>

<script>
export default {
  props:["id"],
    data()
    {
        return{
            id:this.$route.params.id,
            Consulta:{},
            cliente:"",
            numeroConsulta:"",
            estado:"",
            servicio:"",
            Abogados:{},
            abogado:"",
            especialidad:"",
            precio:"",
            transaccion:"",
            addObservacion:"0",
            Observaciones:{},
            numero:"",
            observacion:"",
            pdf:"",
            fecha:""
        }
    },mounted()
    {
        this.getDatosConsulta()
        this.getAbogados()
        this.getObservaciones()
    },
    methods:{
      getObservaciones(page = this.numero)
        {
            axios.get("/api/traer/observaciones/"+this.id+"?page="+page)
            .then(res=>{
                this.Observaciones = res.data
            })
        },
        getAbogados()
        {
            axios.get("/api/traer/abogados/expedientes")
            .then(res=>{
                this.Abogados = res.data
                this.numero = res.data.last_page;
            })
        },
        CreateObservacion()
        {
            this.addObservacion = "1"
        },
        getDatosConsulta()
        {

            axios.get("/api/traer/datos/consulta/"+this.id)
            .then(res=>{
                this.cliente = res.data.client[0].nombres+" "+ res.data.client[0].apellidos
                this.numeroConsulta = res.data.numeroConsulta
                this.servicio = res.data.servicio
                this.abogado = res.data.abogado_id
                this.precio = res.data.precio
                this.especialidad = res.data.especialidad
                this.transaccion = res.data.id_transaccion
                var state = res.data.estado
                this.fecha = res.data.fecha
                if(state == "Ingresado" || state == "En Calificación" || state == "Observado" || state == "Liquidado" || state == "Suspendido" || state == "Culminado" || state == "Otro" || state == "Pendiente" || state =="Pagado")
                {
                  this.estado = state
                }else{
                    const $select = document.querySelector("#estado")
                    const option = document.createElement('option')
                    option.value = state
                    option.text = state
                    $select.appendChild(option)
                    this.estado = state
                }
            })
        },
        show()
        {
            var col = document.querySelector("#mycard-collapse")
            col.classList.toggle("show")
        },
        subirPdf(e){
          let file = e.target.files[0];
          this.pdf = file
        }
        ,CreateExpediente()
        { 
          this.Validacion()
          
        },Validacion(){
          var message=[]
          if(this.abogado == "" || this.abogado == null)
            message.push("Debe asignar un abogado.")
          
          if(this.servicio == "" || this.servicio == null)
            message.push("Debe ingresar un servicio.")

          if(this.especialidad == "" || this.especialidad == null)
            message.push("Debe asignar una especialidad.")

          if(this.fecha == "" || this.fecha == null)
            message.push("Debe ingresar una fecha.")

            if(message.length>0)
          {
            console.log("Entra menssage")
            swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: message.join('<br>')
              })
          }else{
            var observacion = document.querySelector("#observacion").value

          if(observacion !== null)
            this.observacion = observacion
            
           const config = { headers: { "content-type": "multipart/form-data" } };
            var data = new FormData();
            data.append("servicio",this.servicio);
            data.append("abogado",this.abogado);
            data.append("especialidad",this.especialidad);
            data.append("precio",this.precio);
            data.append("observacion",this.observacion);
            data.append("estado",this.estado);
            data.append("pdf",this.pdf);
            data.append("fecha",this.fecha);

          axios.post("/update/expediente/"+this.id,data,config)
          .then(res=>{
            this.getObservaciones(this.numero)
            Swal.fire("Actualizado", "Se actualizó correctamente", "success");
          })
          }
        },
        AlertSuccess(){
          Swal.fire(
      '¡Correcto!',
      'Se guardo correctamente',
      'success'
             )
        }
        

    }
}
</script>

<style scoped>
  .text-fecha{
    color: #6c757d;
    font-weight: 700;
  }
</style>