<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create([
            'name'=>"SAT",
            'url'=>"https://www.sat.gob.pe/WebSiteV9/",
        ]);

        Link::create([
            'name'=>"Papeletas Callao",
            'url'=>"https://www.pagopapeletascallao.com.pe/Consulta/Pagos",
        ]);

        Link::create([
            'name'=>"Orden de Captura Vehicular",
            'url'=>"http://www.pit.gob.pe/pit2007/Consultas.aspx",
        ]);

        Link::create([
            'name'=>"Consulta Propiedad Sunarp",
            'url'=>"https://www.sunarp.gob.pe/Consultas/consPropiedad",
        ]);

        Link::create([
            'name'=>"Consulta Vehicular Sunarp",
            'url'=>"https://www.sunarp.gob.pe/seccion/servicios/detalles/0/c3.html",
        ]);

        Link::create([
            'name'=>"Estado de Tramite Sunarp",
            'url'=>"https://siguelo.sunarp.gob.pe/siguelo/",
        ]);

        Link::create([
            'name'=>"Búsqueda Personas Jurídica Sunarp",
            'url'=>"https://www.sunarp.gob.pe/bus-personas-juridicas.asp",
        ]);

        Link::create([
            'name'=>"Consulta RUC",
            'url'=>"https://e-consultaruc.sunat.gob.pe/cl-ti-itmrconsruc/jcrS00Alias",
        ]);

        Link::create([
            'name'=>"Conoce a tu Médico",
            'url'=>"https://www.cmp.org.pe/conoce-a-tu-medico/",
        ]);

        Link::create([
            'name'=>"Consulta Expediente Judicial",
            'url'=>"https://cej.pj.gob.pe/cej/forms/busquedaform.html",
        ]);

        Link::create([
            'name'=>"Consulta Seguro de Salud",
            'url'=>"https://app1.susalud.gob.pe/registro/",
        ]);
        Link::create([
            'name'=>"Reclamo INDECOPI",
            'url'=>"https://enlinea.indecopi.gob.pe/reclamavirtual/#/",
        ]);
    }
}
