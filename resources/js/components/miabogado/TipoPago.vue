<template>

        <div class="body-miabogado">
            <h3>Consulta tipo : {{Consulta.modalidad}}</h3>
            <h5 class="sub-texto">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) .</h5>
            <p class="text-documento">Costo de documento: <span>S/ 20.00</span></p>

            <h4 class="titulo-codigo-descuento">Ingresa tu código de descuento.</h4>
            <form v-on:submit.prevent="saveCupon()">
                <div class="contenido-input-cupon">
                    <input type="text" v-model="codigoCupon">
                <button type="submit" class="btn-cupon">Aplicar Código</button>
                <p class="message-cupon"></p>
            </div>
            </form>

            <p class="text-documento">Precio total <span>S/ {{Consulta.precio}}</span></p>

            <h4 class="titulo-codigo-descuento">¿Como quieres pagar?</h4>
            <form v-on:submit.prevent="tipoPago()">
                <div class="contenido-boton-pago">
                <div class="contenido-imagen-tarjeta">
                    <img :src="`/img/tarjeta.svg`" alt="">
                    <div class="contenido-texto-tarjeta">
                        <label for="presencial">Pago con tarjeta </label>
                <span>Débito o Crédito</span>
                    </div>
                </div>
                <input type="radio" name="" id="presencial" class="input-tajeta" value="tarjeta" v-model="modoPago">
            </div>
            <div class="contenido-boton-consulta">
                <div class="contenido-imagen">
                    <img :src="`/img/banco.png`" alt="">
                <label for="presencial">Depósito Bancario</label>
                </div>
                <input type="radio" name="" id="presencial" class="input-tajeta" value="deposito" v-model="modoPago">
            </div>

            <button type="submit" class="btn-consultas" style="borde:none;cursor:pointer">Continuar <img :src="`/img/flecha.svg`" alt=""></button>
            </form>
            
            <div class="contenido-boton-regresar">
                <a href="javascript: history.go(-1)"><img :src="`/img/regresar.png`" alt=""> Regresar</a>
            </div>
    </div>

</template>

<script>
export default {
    props: ['id','codigo'],
    data(){
        return{
            modoPago:"",
            numeroConsulta:this.codigo,
            consulta:this.consulta,
            codigoCupon:'',
            Cupon:{},
            Consulta:{}
        }
    },
    mounted()
    {

        this.getConsulta()
    }
    ,
    methods:{
        tipoPago(){
            axios.post("/request/tipo/pago",{numeroConsulta:this.numeroConsulta,modoPago:this.modoPago})
            .then((result) => {
             if(this.modoPago === "tarjeta")  {
                window.location.href = "/pago/tarjeta/"+this.codigo
             }else if(this.modoPago === "deposito"){
                window.location.href = "/cuentas/deposito/"+this.codigo
             }
            }).catch((err) => {
                
            });
        },saveCupon()
        {
            if(this.codigoCupon !== "")
            {
                axios.post("/request/cupon",{cupon:this.codigoCupon,codigo:this.codigo})
            .then(res=>{
                if(res.data !== false)
                {

                this.AlertSuccess(res.data);
                this.codigoCupon=""
                this.getConsulta()

                }else if(res.data === false)
                {
                    this.AlertError(this.codigoCupon)
                    this.codigoCupon=""
                }
            }).catch(err=>{
                    this.AlertUsado(this.codigoCupon)
                    this.codigoCupon=""
            })
            }else{
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Debe Ingresar el código.`,
        })
            }
        },AlertError(cupon)
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `El Cupón ${cupon} no es válido.`,
        })
        },AlertSuccess(descuento)
        {
            Swal.fire(
            '¡Correcto!',
            `Se activo tu cupón, se te hizo un descuento de S/ ${descuento}`,
            'success'
)
        },getConsulta()
        {
            axios.get("/api/show/consulta",{params:{codigo:this.codigo}})
            .then(res=>{
                this.Consulta = res.data
            })
        },AlertUsado(cupon)
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `El Cupón ${cupon} ya ah sido utilizado.`,
        })

    }

    }
};
</script>

<style>
</style>