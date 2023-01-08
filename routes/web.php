<?php

use App\Http\Controllers\AbogadoController;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\LegalDigitalController;
use App\Http\Controllers\AbogadoEmergenciaController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\TaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->name("inicio");

Route::get('/panel/principal', function () {
    return view('panel.principal');
})->middleware(['auth','verified'])->name('dashboard');

Route::get("/consulta/abogado",[ClientController::class,'ConsultaAbogado'])->name("consulta.abogado");
Route::post("/request/consulta/abogado",[ClientController::class,'storeConsulta']);
Route::get("/tipo/pago/{consulta}",[ClientController::class,'TipoPagoConsulta'])->middleware('auth')->name('tipo.pago');
Route::post("/request/tipo/pago",[ClientController::class,'storeTipoPago']);
Route::get("/cuentas/deposito/{consulta}",[ClientController::class,'showCuentasDeposito'])->middleware('auth');
Route::get("/pago/tarjeta/{consulta}",[ClientController::class,'showPagoTarjeta'])->middleware('auth');
Route::get("/envio/voucher/{consulta}",[ClientController::class,"showEnvioVoucher"])->name("envio.voucher")->middleware('auth');
Route::get("/confirmacion/pago/{consulta}",[ClientController::class,"showConfirmarPago"])->middleware('auth');
Route::get("/confirmacion/pago/pendiente/{consulta}",[ClientController::class,"showPagoPendiente"])->middleware('auth')->name('pago.confirmar');
Route::get("/pago/error/{consulta}",[ClientController::class,"showErrorPago"])->middleware('auth');
Route::get("/change/password",[ClientController::class,"showChangePassword"])->name('change.password')->middleware('auth');
Route::post("/update/password/{id}",[ClientController::class,"UpdatePassword"]);
//ACTUALIZAR PERFIL
Route::get("/actualizar/perfil",[ClientController::class,'ShowActualizarPerfil'])->name('edit.perfil')->middleware('auth');
Route::post("/update/perfil/usuario/{id}",[ClientController::class,'updatePerfil']);
Route::post("/update/imagen/perfil",[ImageController::class,'updateImagenPerfil']);

//Envio de voucher
Route::post("/request/enviar/voucher",[ClientController::class,'enviarVoucher'])->name('save.voucher');
//codigo cupon
Route::post("/request/cupon",[ClientController::class,'cupon']);
//MANUAL DE USUARIO
Route::get("/manual/usuario",[Controller::class,'manualView'])->name('manual.usuario')->middleware("auth");
//ENLACES
Route::get("/enlaces/interes",[Controller::class,'enlacesView'])->name('enlaces.interes')->middleware("auth");
//CALCULADORA
Route::get("/calculadora/legal",[CalculadoraController::class,'calculadoraView'])->name('calculadora.help')->middleware("auth");
Route::get("/calculadora/alcabala",[CalculadoraController::class,'alcabalaView'])->name('calculadora.alcabala')->middleware("auth");
Route::get("/calculadora/impuesto",[CalculadoraController::class,'impuestoView'])->name('calculadora.impuesto')->middleware("auth");
Route::get("/calculadora/igv",[CalculadoraController::class,'igvView'])->name('calculadora.igv')->middleware("auth");

//ABOGADO EMERGENCIA
Route::get("/emergencia/consulta",[AbogadoEmergenciaController::class,'ConsultaEmergencia'])->name('emergencia.consulta')->middleware("auth");
Route::get("/emergencia/tipo/pago",[AbogadoEmergenciaController::class,'tipoPago'])->name('emergencia.tipoPago')->middleware("auth");
Route::get("/emergencia/cuentas/deposito/{consulta}",[AbogadoEmergenciaController::class,'showCuentasDeposito'])->middleware('auth')->name("emergencia.cuentas");
Route::get("/emergencia/pago/tarjeta/{consulta}",[AbogadoEmergenciaController::class,'showPagoTarjeta'])->middleware('auth');
Route::post("/emergencia/request/tipo/pago",[AbogadoEmergenciaController::class,'storeTipoPago']);
Route::get("/emergencia/envio/voucher/{consulta}",[AbogadoEmergenciaController::class,"showEnvioVoucher"])->name("emergencia.voucher")->middleware('auth');
Route::get("/emergencia/confirmacion/pago/{consulta}",[AbogadoEmergenciaController::class,"showConfirmarPago"])->middleware('auth');
Route::get("/emergencia/confirmacion/pago/pendiente/{consulta}",[AbogadoEmergenciaController::class,"showPagoPendiente"])->middleware('auth')->name('pago.confirmar');
Route::get("/emergencia/pago/error/{consulta}",[AbogadoEmergenciaController::class,"showErrorPago"])->middleware('auth');

//LEGAL- DIGITAL
Route::get("/legal/digital/consulta/{id}",[LegalDigitalController::class,'consulta'])->name('digital.consulta')->middleware("auth");
Route::get("/legal/digital/categorias",[LegalDigitalController::class,'categorias'])->name('digital.categorias')->middleware("auth");
Route::get("/legal/digital/sub-categoria/{categoria}",[LegalDigitalController::class,'subCategoria'])->name('digital.subcategoria')->middleware("auth");
Route::get("/legal/digital/tipo-pago/{sub}",[LegalDigitalController::class,'tipoPago'])->name('digital.tipoPago')->middleware("auth");
Route::get("/legal/digital/tarjeta/{consulta}",[LegalDigitalController::class,'showPagoTarjeta'])->name('digital.tarjeta')->middleware("auth");
Route::post("/legal/digital/tipo/pago",[LegalDigitalController::class,'storeTipoPago']);
Route::get("/legal/digital/deposito/{consulta}",[LegalDigitalController::class,'showCuentasDeposito'])->middleware('auth')->name("digital.cuentas");
Route::get("/legal/digital/voucher/{consulta}",[LegalDigitalController::class,"showEnvioVoucher"])->name("digital.voucher")->middleware('auth');
Route::post("/digital/request/voucher",[LegalDigitalController::class,'enviarVoucher'])->name('digital.save.voucher');

//SEGUIMIENTO LEGAL-HELP

Route::get("/seguimiento/legal",[SeguimientoController::class,'index'])->name('seguimiento.legal')->middleware("auth");

Route::get("/detalles/consulta/{consulta}",[SeguimientoController::class,'detalleConsulta'])->name('detalle.consulta')->middleware("auth");

//administrador
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name('view.login');
//LOGIN
Route::post('/login/user',[LoginController::class,'login'])->name('login.admin');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
//RECUPERAR PASSWORD
Route::get('/reset/password',[LoginController::class,'viewPassword'])->name('view.password');
//ADMIN
Route::get('/admin/clientes',[HomeController::class,'index'])->name('admin.clientes')->middleware('auth');
//CATEGORIA
Route::post("/create/categoria",[CategoryController::class,'store']);
Route::post("/update/categoria/{id}",[CategoryController::class,'update']);
//SUBCATEGORIA
Route::post("/create/subcategoria",[SubcategoriaController::class,'store']);
Route::post("/update/subcategoria/{id}",[SubcategoriaController::class,'update']);

//cupones
Route::post("/create/cupons",[CuponController::class,'store']);
Route::post("/update/cupons/{id}",[CuponController::class,'update']);

//Servicio Abogad
Route::post("/create/servicio/abogado",[AbogadoController::class,'store']);
Route::post("/update/servicio/abogado/{id}",[AbogadoController::class,'update']);

//SERVICIO ABOGADO DE EMERGENCIA
Route::post("/create/servicio/emergencia",[AbogadoEmergenciaController::class,'store']);

//SERVICIO SUBCATEGORIA
Route::post("/create/servicio/subcategoria",[ServicesController::class,'store']);

//CREAR ABOGADO
Route::post("/create/abogado",[AbogadoController::class,'createAbogado']);
Route::post("/update/abogado/{abogado}",[AbogadoController::class,'updateAbogado']);
//CREAR EXPEDIENTE
Route::post("/create/expediente",[ExpedienteController::class,'create']);
Route::post("/update/expediente/{expediente}",[ExpedienteController::class,'update']);
Route::get('/download/qr/{consulta}',[ApiController::class,'donwload']);

//EDITAR EVENTO
Route::post('/update/evento/{evento}',[EventController::class,'update']);
Route::post('/create/evento/{id}',[EventController::class,'create']);
Route::get('/download/documento/{consulta}',[EventController::class,'donwload']);

Route::post('/update/cliente/{id}',[ClientController::class,'updateCliente']);

Route::post('/create/taxes',[TaxController::class,'create']);

Route::post('/update/taxes/{id}',[TaxController::class,'update']);

Route::post('/create/account',[AccountController::class,'store']);

Route::post('/update/account/{id}',[AccountController::class,'update']);

Route::get('/admin/{any}', function () {
    return view('admin.theme.app');
})->where('any', '.*')->middleware(['auth']);

require __DIR__.'/auth.php';
