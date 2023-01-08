<?php

use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\AbogadoEmergenciaController;
use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\WhatsappController;
use App\Models\Subcategory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/traer/modalidades",[ApiController::class,"Modalidades"]);
Route::get("/get/modalidad/{id}",[ApiController::class,"getModalidad"]);


Route::get("/show/departamentos",[ApiController::class,'getDepartamentos']);
Route::get("/show/datos/user",[ApiController::class,'getDatosUsuario']);

Route::get("/update/datos/usuario",[ApiController::class,'updateUsuario']);
Route::get("/show/image/perfil",[ApiController::class,"getImage"]);

Route::get("/show/consulta",[ApiController::class,"getConsulta"]);

Route::get("/show/consulta/emergencia",[ApiController::class,"getConsultaEmergencia"]);

Route::get("/create/pago/consult",[ApiController::class,"StorePago"]);

Route::get("/consultas/client/{id}",[ClientController::class,"getConsulta"]);

Route::get("/traer/modalidades/emergencia",[ApiController::class,"ModalidadesEmergencia"]);
Route::get("/traer/modalidades/digital",[ApiController::class,"ModalidadesDigital"]);

//Enlaces
Route::post("/create/enlace",[LinkController::class,"store"]);
Route::get("/show/links",[LinkController::class,"index"]);
Route::get("/edit/enlace/{id}",[LinkController::class,"edit"]);
Route::post("/update/enlace/{id}",[LinkController::class,"update"]);
Route::delete("/delete/enlace/{id}",[LinkController::class,"destroy"]);

//Categorias
Route::get("/show/categorias",[CategoryController::class,"index"]);
Route::get("/edit/categoria/{id}",[CategoryController::class,"edit"]);
Route::delete("/delete/categoria/{id}",[CategoryController::class,"destroy"]);

//SUB CATEGORIAS
Route::get("/show/subcategorias/categoria",[CategoryController::class,"getCategorias"]);
Route::get("/edit/subcategoria/{id}",[SubcategoriaController::class,"edit"]);
Route::delete("/delete/subcategoria/{id}",[SubcategoriaController::class,"destroy"]);


//CLIENTES
Route::get("/show/clientes",[ClientController::class,"getClientes"]);

//Cupones
Route::get("/show/cupones",[CuponController::class,"index"]);
Route::get("/edit/cupon/{id}",[CuponController::class,"edit"]);
Route::delete("/delete/cupon/{id}",[CuponController::class,"destroy"]);

//SERVICIOS ABOGADO
Route::get("/show/servicio/abogado",[AbogadoController::class,"index"]);
Route::get("/edit/servicio/abogado/{id}",[AbogadoController::class,"edit"]);
Route::delete("/delete/servicio/abogado/{id}",[AbogadoController::class,"destroy"]);

//SERVICIOS EMERGENCIA
Route::get("/show/servicio/emergencia",[AbogadoEmergenciaController::class,"index"]);

//SERVICIOS EMERGENCIA
Route::get("/show/consultas",[ConsultaController::class,"index"]);

//SERVICIOS SUBCATEGORIA
Route::get("/show/subcategorias",[SubcategoriaController::class,"index"]);

//SERVICIOS DE LA SUBCATEGORIA
Route::get("/show/get/subcategorias",[SubcategoriaController::class,"getSubcategorias"]);

//SERVICIOS WHATSAPP
Route::post("/create/whatsapp",[WhatsappController::class,"store"]);
Route::get("/show/whatsapp",[WhatsappController::class,"index"]);
Route::delete("/delete/whatsapp/{id}",[WhatsappController::class,"destroy"]);
Route::get("/edit/whatsapp/{id}",[WhatsappController::class,"edit"]);
Route::post("/update/whatsapp/{id}",[WhatsappController::class,"update"]);

//SERVICIOS SUB CATEGORIAS
Route::get("/show/servicios/subcategorias",[ServicesController::class,"index"]);
//TRAER ABOGADOS
Route::get("/show/abogados",[AbogadoController::class,"showAbogados"]);
//TRAER subcategorias
Route::get("/show/abogados/subcategorias",[AbogadoController::class,"getSubcategorias"]);
//VALIDAR DOCUMENTO
Route::get("/search/documento/{documento}",[ApiController::class,"searchDocumento"]);
//TRAER MODALIDADES
Route::get("/admin/modalidades",[ApiController::class,"getModadlidades"]);
//VALIDAR email
Route::get("/search/email/{email}",[ApiController::class,"searchEmail"]);
//TRAER TODOS LOS ABOGADOS PARA CREAR EXPEDIENTE
Route::get("/traer/abogados/expedientes",[ApiController::class,"getAbogados"]);
//TRAER LOS ESTADOS
Route::get("/traer/estados/expedientes/{user}",[ApiController::class,"getEstados"]);
Route::get("/traer/estados",[ApiController::class,"AllEstados"]);
//TRAER DATOS DE UNA CONSULTA
Route::get("/traer/datos/consulta/{id}",[ApiController::class,"getDatosConsulta"]);
//TRAER DATOS DE UNA CONSULTA
Route::get("/traer/observaciones/{id}",[ApiController::class,"getObservaciones"]);
//CAMBIAR EL ESTADO DE UNA CONSULTA
Route::get("/change/estado/{id}/{estado}",[ApiController::class,"ChangeEstadoConsulta"]);
//TRAER ROL USUARIO
Route::get("/traer/rol/{id}",[ApiController::class,"getRol"]);

Route::get("/traer/link",[ApiController::class,"getLink"]);

Route::get("/traer/evento/user/{id}",[ApiController::class,"getEvento"]);

Route::get("/evento/user/{id}",[ApiController::class,"getEventoUser"]);

Route::get("/evento/{evento}",[ApiController::class,"getDetallesEvento"]);

Route::delete("/delete/evento/{evento}",[EventController::class,"destroy"]);

Route::get("/edit/abogado/{id}",[AbogadoController::class,"editAbogado"]);

Route::get("/edit/cliente/{id}",[ClientController::class,"editCliente"]);

Route::get("/marks/notifications/{id}",[ApiController::class,"MarkNotifications"]);

Route::get("/traer/consultas/{user}",[ConsultaController::class,"getConsultasUsers"]);

Route::get("/show/taxes",[TaxController::class,"show"]);
Route::delete("/delete/taxes/{id}",[TaxController::class,"destroy"]);

Route::get("/edit/taxes/{id}",[TaxController::class,"edit"]);

Route::get("/show/accounts",[AccountController::class,"index"]);

Route::get("/edit/account/{id}",[AccountController::class,"edit"]);

Route::get("/informacion/dashboard",[ApiController::class,"InfoDashboard"]);






