<template>
  <div class="contenido-datos-tarjeta" style="padding: .5rem .5rem">
                        <form action="" >
                            <div class="input-datos-tarjeta">
                                <label for="">Precio compra del inmueble.</label>
                                <input type="text" placeholder="S/." v-model="precioCompra">
                            </div>
                        </form>
                    </div>

                    <div class="contenido-datos-tarjeta" style="padding: .5rem .5rem;margin-top:2rem">
                        <form action="" >
                            <div class="input-datos-tarjeta">
                                <label for="">Precio de Venta.</label>
                                <input type="text" placeholder="S/." v-model="precioVenta">
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
            precioCompra:"",
            precioVenta:"",
            icm:1.03
        }
    },
    methods:{
        Calcular()
        {
            let message = document.querySelector(".resultado")
            
            let res = (parseFloat(this.precioCompra) * this.icm) - this.precioVenta

            let impuesto = res*0.05
            
            message.innerHTML="S/."+Math.abs(impuesto)
        }
    }
}
</script>

<style>

</style>