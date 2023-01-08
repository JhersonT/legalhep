<template>
  <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Calendario de Eventos</h4>
                  </div>
                  <div class="card-body">
                    <div class="fc-overflow">
                      <div id="myEvent"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <input type="hidden" v-model="id_user" id="id_user">
</template>

<script>

export default {
    props:["id"],

    data(){
        return{
            id_user:this.id
        }
    },
    beforeCreate()
    {
       /*  this.recargar() */
    },
    methods:{
        recargar()
        {
          location.reload()
        }
      }
}
</script>

<style>

</style>