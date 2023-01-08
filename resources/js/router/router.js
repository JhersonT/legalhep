import {
    createRouter,
    createWebHistory
} from "vue-router";

const routes = [
    {
        path: '/admin/create/enlace',
        component: () => import('../components/admin/enlace/CrearEnlace.vue')
    }
    ,
    {
        path: '/admin/show/enlaces',
        component: () => import('../components/admin/enlace/MostrarEnlaces.vue')
    }
    ,
    {
        path: '/admin/edit/enlace/:id',
        component: () => import('../components/admin/enlace/EditarEnlace.vue')
    },
    {
        path: '/admin/create/categoria',
        component: () => import('../components/admin/categorias/categorias/CrearCategoria.vue')
    },
    {
        path: '/admin/show/categorias',
        component: () => import('../components/admin/categorias/categorias/MostrarCategorias.vue')
    },
    {
        path: '/admin/edit/categoria/:id',
        component: () => import('../components/admin/categorias/categorias/EditarCategorias.vue')
    },
    {
        path: '/admin/create/subcategoria',
        component: () => import('../components/admin/categorias/subcategorias/CrearSubcategoria.vue')
    },
    {
        path: '/admin/show/subcategorias',
        component: () => import('../components/admin/categorias/subcategorias/MostrarSubcategorias.vue')
    },
    {
        path: '/admin/edit/subcategorias/:id',
        component: () => import('../components/admin/categorias/subcategorias/EditarSubcategoria.vue')
    },
    {
        path: '/admin/show/clientes',
        component: () => import('../components/admin/clientes/MostrarClientes.vue')
    },
    {
        path: '/admin/create/cupon',
        component: () => import('../components/admin/servicios/cupones/CrearCupon.vue')
    },
    {
        path: '/admin/show/cupones',
        component: () => import('../components/admin/servicios/cupones/MostrarCupones.vue')
    },
    {
        path: '/admin/edit/cupon/:id',
        component: () => import('../components/admin/servicios/cupones/EditarCupon.vue')
    },
    {
        path: '/admin/create/servicio/abogado',
        component: () => import('../components/admin/servicios/abogado/CrearAbogado.vue')
    },
    {
        path: '/admin/show/servicio/abogado',
        component: () => import('../components/admin/servicios/abogado/MostrarAbogado.vue')
    },
    {
        path: '/admin/edit/servicio/abogado/:id',
        component: () => import('../components/admin/servicios/abogado/EditarAbogado.vue')
    },
    {
        path: '/admin/create/servicio/emergencia',
        component: () => import('../components/admin/servicios/emergencia/CrearEmergencia.vue')
    },
    {
        path: '/admin/show/servicio/emergencia',
        component: () => import('../components/admin/servicios/emergencia/MostrarEmergencia.vue')
    },
    {
        path: '/admin/edit/servicio/emergencia/:id',
        component: () => import('../components/admin/servicios/emergencia/EditarEmergencia.vue')
    },
    {
        path: '/admin/show/consultas',
        component: () => import('../components/admin/consultas/MostrarConsultas.vue')
    },
    {
        path: '/admin/detalle/consulta/:id',
        component: () => import('../components/admin/consultas/DetalleConsultas.vue')
    },
    {
        path: '/admin/create/whatsapp',
        component: () => import('../components/admin/whatsapp/CrearLink.vue')
    },
    {
        path: '/admin/show/whatsapp',
        component: () => import('../components/admin/whatsapp/MostrarLinks.vue')
    },
    {
        path: '/admin/edit/whatsapp/:id',
        component: () => import('../components/admin/whatsapp/EditarLink.vue')
    },
    {
        path: '/admin/create/categoria/servicio',
        component: () => import('../components/admin/categorias/servicios/CrearServicio.vue')
    },
    {
        path: '/admin/show/categoria/servicios',
        component: () => import('../components/admin/categorias/servicios/MostrarServicios.vue')
    },
    {
        path: '/admin/show/categoria/servicio/:id',
        component: () => import('../components/admin/categorias/servicios/EditarServicio.vue')
    },
    {
        path: '/admin/create/abogado',
        component: () => import('../components/admin/abogado/CrearAbogado.vue')
    },
    {
        path: '/admin/show/abogados',
        component: () => import('../components/admin/abogado/MostrarAbogado.vue')
    },
    {
        path: '/admin/edit/abogado/:id',
        component: () => import('../components/admin/abogado/EditarAbogado.vue')
    },
    {
        path: '/admin/create/expediente',
        component: () => import('../components/admin/expediente/CrearExpediente.vue')
    },
    {
        path: '/admin/show/expediente/',
        component: () => import('../components/admin/expediente/MostrarExpediente.vue')
    },
    {
        path: '/admin/show/calendario',
        component: () => import('../components/admin/calendario/MostrarCalendario.vue')
    },
    {
        path: '/admin/create/evento/',
        component: () => import('../components/admin/calendario/CrearEvento.vue')
    },
    {
        path: '/admin/show/eventos/',
        component: () => import('../components/admin/calendario/MostrarEventos.vue')
    },
    {
        path: '/admin/edit/eventos/:id',
        component: () => import('../components/admin/calendario/EditarEvento.vue')
    },
    {
        path: '/admin/edit/clientes/:id',
        component: () => import('../components/admin/clientes/EditarClientes.vue')
    },
    {
        path: '/admin/create/cuenta',
        component: () => import('../components/admin/cuentas/CrearCuentas.vue')
    },
    {
        path: '/admin/show/cuentas',
        component: () => import('../components/admin/cuentas/MostrarCuentas.vue')
    },
    {
        path: '/admin/edit/cuenta/:id',
        component: () => import('../components/admin/cuentas/EditarCuenta.vue')
    },
    {
        path: '/admin/create/impuesto',
        component: () => import('../components/admin/uit/CrearUit.vue')
    },
    {
        path: '/admin/show/impuesto',
        component: () => import('../components/admin/uit/MostrarUit.vue')
    },
    {
        path: '/admin/edit/taxes/:id',
        component: () => import('../components/admin/uit/EditarUit.vue')
    },
    {
        path: '/admin/clientes',
        component: () => import('../components/admin/dashboard/InicioDashboard.vue')
    }

]

export const router = createRouter({
    history: createWebHistory(),
    routes
})
