<template>
     <form v-on:submit.prevent="ChangePassword()">
                <label for="">Ingresa la contraseña anterior.</label>
                <input type="text" class="input-text" placeholder="Contraseña anterior" v-model="lastPassword" >
                <label for="">Crea la nueva contraseña.</label>
                <input type="text" class="input-text" placeholder="Nueva Contraseña" v-model="newPassword" @keyup="NewPassword">

                <input type="text" class="input-text" placeholder="Repita la contraseña" v-model="repeatPassword" @keyup="RepeatPassword" >
                <label for="" class="message-validacion"></label>

                <input type="submit" value="Guardar Contraseña" class="btn btn-registrar">
            </form>
</template>

<script>
export default {
     props: ['id'],
     data(){
        return{
            id:this.id,
            lastPassword:"",
            newPassword:'',
            repeatPassword:'',
            pass1:"",
            pass2:''
        }
     },
     methods:{
        ChangePassword()
        {   
            let mess = []

            if(this.lastPassword === "")
            mess.push("Debe Ingresar la contraseña anterior")
            if(this.newPassword === "")
            mess.push("Debe Ingresar la nueva contraseña")
            if(this.repeatPassword === "")
            mess.push("Debe repetir la nueva contraseña")

            if(mess.length === 0){
                axios.post("/update/password/"+this.id,{lastPassword:this.lastPassword,newPassword:this.newPassword})
            .then(res=>{
                    this.AlertSuccess()
            }).catch(err=>{
                this.AlertError()
            })
            }else if(mess.length>0){
                 swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos..',
                html: mess.join('<br>')
              })
            }
            
        },
        NewPassword(e)
        {
            this.pass1 = e.target.value
        },
        RepeatPassword(e)
        {
             let  message = document.querySelector(".message-validacion")
             this.pass2 = e.target.value

             if(this.pass1 !== this.pass2)
             {
               message.innerHTML="Las contraseñas no coinciden"
               message.style.color="#ec7063"
             }else{
                message.innerHTML="¡Correcto!"
                message.style.color="#58d68d"
             }
        },
        AlertError()
        {
            Swal.fire({
            icon: 'error',
            title: '¡Error..!',
            text: 'La contraseña anterior no es correcta!',
})
        },
        AlertSuccess()
        {
            Swal.fire(
  '¡Correcto!',
  'Se actualizó correctamente tu contraseña',
  'success'
)
        }
     }
}
</script>

<style scoped>
    form label{
        color: white;
        font-weight: bold;
    }
    form{
            font-family: 'Sarala', sans-serif;
            
    }
</style>