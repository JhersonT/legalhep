<template>
  <div class="contenido-datos-tarjeta" style="padding: .5rem .5rem">
                        <form action="" >
                            <div class="input-datos-tarjeta">
                                <label for="">Monto Base.</label>
                                <input type="text" placeholder="S/." v-model="montoBase">
                            </div>
                        </form>
                    </div>

                    <div class="contenido-datos-tarjeta" style="padding: .5rem .5rem;margin-top:2rem">
                        <form action="" >
                            <div class="input-datos-tarjeta">
                                <label for="">IGV.</label>
                                <input type="text" placeholder="S/." v-model="Igv">
                            </div>
                        </form>
                    </div>

                    <a @click="Calcular()" class="btn-consultas" style="margin-top: 1rem;cursor:pointer">Calcular <img src="img/flecha.svg" alt=""></a>
                    <p style="text-align:center;margin-top:2rem;color:#084068;font-weight:bold">Total: <span class="resultado"></span> </p>
</template>

<script>
export default {
    data()
    {
        return{
            montoBase:"",
            Igv:"",
        }
    },
    methods:{
        Calcular()
        {
            let message = document.querySelector(".resultado")
            
            let res = (parseFloat(this.montoBase) * 0.18)

            this.Igv = res
            var total = (parseFloat(this.montoBase)+ res)

            message.innerHTML="S/."+Math.abs(total)
        }
    }
}
</script>

<style>

</style>