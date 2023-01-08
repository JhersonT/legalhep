<template>
  <div class="contenido-datos-tarjeta" style="padding: .5rem .5rem">
                        <form action="" >
                            <div class="input-datos-tarjeta">
                                <label for="">Precio de compra del inmueble</label>
                                <input type="text" placeholder="S/." v-model="precioInmueble">
                            </div>
                        </form>
                    </div>

                    <div class="contenido-datos-tarjeta" style="padding: .5rem .5rem;margin-top:2rem">
                        <form action="" >
                            <div class="input-datos-tarjeta">
                                <label for="">Valor Autovaluo</label>
                                <input type="text" placeholder="S/." v-model="precioAutovaluo">
                            </div>
                        </form>
                    </div>

                    <a @click="Calcular()" class="btn-consultas" style="margin-top: 1rem;cursor:pointer">Calcular <img src="img/flecha.svg" alt=""></a>
                    <p style="text-align:center;margin-top:2rem;color:#084068;font-weight:bold">Resultado: <span class="resultado"></span> </p>
</template>

<script>
export default {
    data()
    {
        return{
            precioInmueble:"",
            precioAutovaluo:"",
            uit:43000
        }
    },
    methods:{
        Calcular()
        {
            let message = document.querySelector(".resultado")
            if(this.precioInmueble > this.precioAutovaluo)
            {
                let res  = (parseFloat(this.precioInmueble) - this.uit)*0.03

                message.innerHTML="S/."+ Math.abs(res)


            }else if(this.precioAutovaluo > this.precioInmueble)
            {
                let res  = (parseFloat(this.precioAutovaluo) - this.uit)*0.03

                message.innerHTML="S/."+ Math.abs(res)

            }
            
        }
    }
}
</script>

<style>

</style>