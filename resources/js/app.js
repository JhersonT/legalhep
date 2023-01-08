require('./bootstrap');

import VueAxios from 'vue-axios';
import {createApp} from 'vue'
import {router} from './router/router'
import Dropzone from 'dropzone';
import vSelect from 'vue-select'
import Permissions from './mixins/Permissions';


import 'vue-search-select/dist/VueSearchSelect.css'
import ConsultaAbogado from './components/miabogado/ConsultaAbogado.vue'
import TipoPago from './components/miabogado/TipoPago.vue'
import ImagenPerfil from './components/perfil/ImagePerfil.vue'
import MiPerfil from './components/perfil/MiPerfil.vue'
import ChangePassword from './components/perfil/ChangePassword.vue'
import Alcabala from './components/calculadora/Alcabala.vue'
import Impuesto from './components/calculadora/Impuesto.vue'
import Igv from './components/calculadora/Igv.vue'
import TipoEmergencia from './components/emergencia/TipoPago.vue'
import TipoDigital from './components/legaldigital/TipoPago.vue'
import SeguimientoTable from './components/seguimiento/Table.vue'
import ConsultaEmergencia from './components/emergencia/ConsultaEmergencia.vue'
import ConsultaDigital from './components/legaldigital/ConsultaDigital.vue'

import CrearEnlace from './components/admin/enlace/CrearEnlace.vue'
import MostrarEnlaces from './components/admin/enlace/MostrarEnlaces.vue'
import EditarEnlace from './components/admin/enlace/EditarEnlace.vue'
import CrearCategoria from './components/admin/categorias/categorias/CrearCategoria.vue'
import EditarCategorias from './components/admin/categorias/categorias/EditarCategorias.vue'
import MostrarCategorias from './components/admin/categorias/categorias/MostrarCategorias.vue'
import CrearSubcategorias from './components/admin/categorias/subcategorias/CrearSubcategoria.vue'
import EditarSubcategoria from './components/admin/categorias/subcategorias/EditarSubcategoria.vue'
import MostrarSubcategorias from './components/admin/categorias/subcategorias/MostrarSubcategorias.vue'
import RegistroClientes from './components/admin/clientes/MostrarClientes.vue'
import EditarClientes from './components/admin/clientes/EditarClientes.vue'
import CrearCupon from './components/admin/servicios/cupones/CrearCupon.vue'
import MostrarCupones from './components/admin/servicios/cupones/MostrarCupones.vue'
import EditarCupon from './components/admin/servicios/cupones/EditarCupon.vue'

import CrearAbogado from './components/admin/servicios/abogado/CrearAbogado.vue'
import MostrarAbogado from './components/admin/servicios/abogado/MostrarAbogado.vue'
import EditarAbogado from './components/admin/servicios/abogado/EditarAbogado.vue'

import CrearEmergencia from './components/admin/servicios/emergencia/CrearEmergencia.vue'
import MostrarEmergencia from './components/admin/servicios/emergencia/MostrarEmergencia.vue'
import EditarEmergencia from './components/admin/servicios/emergencia/EditarEmergencia.vue'

import CrearLink from './components/admin/whatsapp/CrearLink.vue'
import MostrarLinks from './components/admin/whatsapp/MostrarLinks.vue'
import EditarLink from './components/admin/whatsapp/EditarLink.vue'

import CrearServicio from './components/admin/categorias/servicios/CrearServicio.vue'
import MostrarServicios from './components/admin/categorias/servicios/MostrarServicios.vue'
import EditarServicio from './components/admin/categorias/servicios/EditarServicio.vue'

import MostrarConsultas from './components/admin/consultas/MostrarConsultas.vue'
import DetalleConsultas from './components/admin/consultas/DetalleConsultas.vue'


import CreaAbogado from './components/admin/abogado/CrearAbogado.vue'
import MostraAbogado from './components/admin/abogado/MostrarAbogado.vue'
import EditaAbogado from './components/admin/abogado/EditarAbogado.vue'

import CrearExpediente from './components/admin/expediente/CrearExpediente.vue'
import MostrarExpediente from './components/admin/expediente/MostrarExpediente.vue'

import MostrarCalendario from './components/admin/calendario/MostrarCalendario.vue'
import CrearEvento from './components/admin/calendario/CrearEvento.vue'

import MostrarEventos from './components/admin/calendario/MostrarEventos.vue'

import DescargarExpediente from './components/expediente/DescargarExpediente.vue'

import MostrarNotificaciones from './components/admin/notificaciones/MostrarNotificaciones.vue'

import CrearCuenta from './components/admin/cuentas/CrearCuentas.vue'
import MostrarCuenta from './components/admin/cuentas/MostrarCuentas.vue'
import EditarCuenta from './components/admin/cuentas/EditarCuenta.vue'

import InicioDashboard from './components/admin/dashboard/InicioDashboard.vue'


import CrearUit from './components/admin/uit/CrearUit.vue'
import MostrarUit from './components/admin/uit/MostrarUit.vue'
import EditarUit from './components/admin/uit/EditarUit.vue'


import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs'


import 'vue-select/dist/vue-select.css';

import LaravelVuePagination from 'laravel-vue-pagination';

const app = createApp({})

app.use(router)
app.use(VueAxios,axios)
app.use(LaravelPermissionToVueJS)


app.component('Pagination', LaravelVuePagination)
app.component('ConsultaAbogado', ConsultaAbogado)
app.component('ImagenPerfil', ImagenPerfil)
app.component('MiPerfil', MiPerfil)
app.component('ChangePassword', ChangePassword)
app.component('TipoPago', TipoPago)
app.component('Alcabala', Alcabala)
app.component('Impuesto', Impuesto)
app.component('Igv', Igv)
app.component('TipoEmergencia', TipoEmergencia)
app.component('TipoDigital', TipoDigital)
app.component('SeguimientoTable', SeguimientoTable)
app.component('ConsultaEmergencia', ConsultaEmergencia)
app.component('ConsultaDigital', ConsultaDigital)

app.component('CrearEnlace', CrearEnlace)
app.component('MostrarEnlaces', MostrarEnlaces)
app.component('EditarEnlace', EditarEnlace)
app.component('CrearCategoria', CrearCategoria)
app.component('EditarCategorias', EditarCategorias)
app.component('MostrarCategorias', MostrarCategorias)
app.component('CrearSubcategorias', CrearSubcategorias)
app.component('MostrarSubcategorias', MostrarSubcategorias)
app.component('EditarSubcategoria', EditarSubcategoria)
app.component('RegistroClientes', RegistroClientes)

app.component('CrearCupon', CrearCupon)
app.component('MostrarCupones', MostrarCupones)
app.component('EditarCupon', EditarCupon)

app.component('CrearAbogado', CrearAbogado)
app.component('MostrarAbogado', MostrarAbogado)
app.component('EditarAbogado', EditarAbogado)

app.component('CrearEmergencia', CrearEmergencia)
app.component('MostrarEmergencia', MostrarEmergencia)
app.component('EditarEmergencia', EditarEmergencia)

app.component('CrearLink', CrearLink)
app.component('MostrarLinks', MostrarLinks)
app.component('EditarLink', EditarLink)

app.component('CrearServicio', CrearServicio)
app.component('EditarServicio', EditarServicio)
app.component('MostrarServicios', MostrarServicios)

app.component('MostrarConsultas', MostrarConsultas)
app.component('DetalleConsultas', DetalleConsultas)


app.component('CreaAbogado', CreaAbogado)
app.component('EditaAbogado', EditaAbogado)
app.component('MostraAbogado', MostraAbogado)

app.component('CrearExpediente', CrearExpediente)
app.component('MostrarExpediente', MostrarExpediente)

app.component('MostrarCalendario', MostrarCalendario)
app.component('CrearEvento', CrearEvento)
app.component('MostrarEventos', MostrarEventos)
app.component('DescargarExpediente', DescargarExpediente)
app.component('EditarClientes', EditarClientes)

app.component('MostrarNotificaciones', MostrarNotificaciones)

app.component('CrearCuenta', CrearCuenta)
app.component('MostrarCuenta', MostrarCuenta)
app.component('EditarCuenta', EditarCuenta)

app.component('CrearUit', CrearUit)
app.component('MostrarUit', MostrarUit)
app.component('EditarUit', EditarUit)

app.component('InicioDashboard', InicioDashboard)

app.component('v-select', vSelect)

app.mount('#app')

