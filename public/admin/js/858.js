"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[858],{8240:(t,o,a)=>{a.d(o,{Z:()=>r});var e=a(3645),n=a.n(e)()((function(t){return t[1]}));n.push([t.id,".text-fecha[data-v-308e2434]{color:#6c757d;font-weight:700}",""]);const r=n},8858:(t,o,a)=>{a.r(o),a.d(o,{default:()=>A});var e=a(8253),n=function(t){return(0,e.dD)("data-v-308e2434"),t=t(),(0,e.Cn)(),t},r={class:"container col-sm-8"},i={class:"card"},s=n((function(){return(0,e._)("div",{class:"card-header"},[(0,e._)("h3",null,"Editar Evento")],-1)})),u={class:"card-body"},c={class:"form-row"},l={class:"form-group col-md-6"},d=n((function(){return(0,e._)("label",{for:"inputState"},"Abogado Asignado",-1)})),f=n((function(){return(0,e._)("option",{value:""},"Seleccionar",-1)})),h=["value"],p={class:"form-group col-md-6"},g=n((function(){return(0,e._)("label",{for:"inputState"},"Fecha de Consulta",-1)})),b={class:"form-row"},m={class:"form-group col-md-6"},v=n((function(){return(0,e._)("label",{for:"inputState"},"Titulo",-1)})),_=n((function(){return(0,e._)("div",{class:"card-footer text-center"},[(0,e._)("button",{class:"btn btn-primary mr-1",type:"submit"},"Guardar")],-1)}));const w={props:["id"],data:function(){return{id:this.$route.params.id,Abogados:{},abogado:"",fecha:"",titulo:""}},mounted:function(){this.getDatosConsulta(),this.getAbogados()},methods:{getAbogados:function(){var t=this;axios.get("/api/traer/abogados/expedientes").then((function(o){t.Abogados=o.data,t.numero=o.data.last_page}))},getDatosConsulta:function(){var t=this;axios.get("/api/evento/"+this.id).then((function(o){t.abogado=o.data.abogado_id,t.fecha=o.data.fecha,t.titulo=o.data.titulo}))},CreateExpediente:function(){this.Validacion()},Validacion:function(){var t=[];if(""!=this.abogado&&null!=this.abogado||t.push("Debe asignar un abogado."),""!=this.fecha&&null!=this.fecha||t.push("Debe ingresar una fecha."),""!=this.titulo&&null!=this.titulo||t.push("Debe ingresar el titulo del evento."),t.length>0)console.log("Entra menssage"),swal.fire({icon:"error",title:"Error al procesar los datos..",html:t.join("<br>")});else{var o=new FormData;o.append("abogado",this.abogado),o.append("fecha",this.fecha),o.append("titulo",this.titulo),axios.post("/update/evento/"+this.id,o,{headers:{"content-type":"multipart/form-data"}}).then((function(t){Swal.fire("Actualizado","Se actualizó correctamente","success")}))}},AlertSuccess:function(){Swal.fire("¡Correcto!","Se guardo correctamente","success")}}};var y=a(3379),D=a.n(y),S=a(8240),x={insert:"head",singleton:!1};D()(S.Z,x);S.Z.locals;const A=(0,a(3744).Z)(w,[["render",function(t,o,a,n,w,y){return(0,e.wg)(),(0,e.iD)("div",r,[(0,e._)("div",i,[s,(0,e._)("form",{onSubmit:o[3]||(o[3]=(0,e.iM)((function(t){return y.CreateExpediente()}),["prevent"]))},[(0,e._)("div",u,[(0,e._)("div",c,[(0,e._)("div",l,[d,(0,e.wy)((0,e._)("select",{class:"form-control","onUpdate:modelValue":o[0]||(o[0]=function(t){return w.abogado=t})},[f,((0,e.wg)(!0),(0,e.iD)(e.HY,null,(0,e.Ko)(w.Abogados,(function(t){return(0,e.wg)(),(0,e.iD)("option",{value:t.id,key:t.id},(0,e.zw)(t.nombre+" "+t.apellido),9,h)})),128))],512),[[e.bM,w.abogado]])]),(0,e._)("div",p,[g,(0,e.wy)((0,e._)("input",{type:"date",class:"form-control","onUpdate:modelValue":o[1]||(o[1]=function(t){return w.fecha=t})},null,512),[[e.nr,w.fecha]])])]),(0,e._)("div",b,[(0,e._)("div",m,[v,(0,e.wy)((0,e._)("input",{type:"text",class:"form-control","onUpdate:modelValue":o[2]||(o[2]=function(t){return w.titulo=t})},null,512),[[e.nr,w.titulo]])])])]),_],32)])])}],["__scopeId","data-v-308e2434"]])}}]);