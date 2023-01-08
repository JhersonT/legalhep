<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Coupon;
use App\Models\Consult;
use App\Models\Modality;
use App\Models\Department;
use App\Models\Whatsapp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\Consultas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{

    public function store(Request $request)
    {
        $request->validate(
            [
                'tipoDoc' => 'required',
                'documento' => 'required',
                'departamento' => 'required',
                'nombres' => 'required',
                'apellidos' => 'required',
                'email' => 'required|unique:users',
                'contraseña' => 'required',
                'confirmar' => 'required'
            ],
            [
                'tipoDoc.required' => 'El tipo de documento es requerido',
                'documento.required' => 'Su número de identificación es requerido',
                'departamento.required' => 'El departamento es requerido',
                'nombres.required' => 'Su nombre es requerido',
                'apellidos.required' => 'Su apellido es requerido',
                'email.required' => 'Su correo es requerido',
                'contraseña.required' => 'Su contraseña es requerido',
                'confirmar.required' => 'Debe aceptar los término y condiciones.'
            ]
        );

        $user = new User();

        $user->name = $request->nombres . " " . $request->apellidos;
        $user->email = $request->email;
        $user->password = Hash::make($request->contraseña);
        $user->save();


        Client::create([
            'user_id' => $user->id,
            'n_doc' => $request->documento,
            'departamento' => $request->departamento,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
        ]);

        return back()->with('mensaje', 'Se registró correctamente');
    }

    public function ConsultaAbogado()
    {
        $modalidades = Modality::all();

        return view("miabogado.ConsultaAbogado", ['modalidades' => $modalidades]);
    }
    public function storeConsulta(Request $request)
    {
        $numer = rand(10000, 99999);

        $modalidad = Modality::find($request->tipoConsulta);

        $client = Client::where("user_id", auth()->user()->id)->first();

        $consult = new Consult();
        $consult->user_id =  $request->id_user;
        $consult->client_id = $client->id;
        $consult->modalidad =  $modalidad->name;
        $consult->precio = $modalidad->price;
        $consult->numeroConsulta =  $numer;
        $consult->origen =  "mi-abogado";
        $consult->estado = "Ingresado";
        $consult->created_at =  Carbon::now();
        $consult->save();

        $users = User::role('Admin')->get();
        foreach ($users as $us) {
            $us->notify(new Consultas($consult->id, auth()->user()->name, $modalidad->name));
        }
        return response()->json($numer);
    }

    public function TipoPagoConsulta($consulta)
    {

        return view("miabogado.TipoPago", ["consulta" => $consulta]);
    }
    public function storeTipoPago(Request $request)
    {
        $consulta = Consult::where('numeroConsulta', $request->numeroConsulta)->update([
            'tipo_pago' => $request->modoPago
        ]);
        return response()->json($request->numeroConsulta);
    }
    public function showCuentasDeposito($consulta)
    {
        $acc = Account::all();
        return view("miabogado.CuentasDeposito", ['consulta' => $consulta,'accounts'=>$acc]);
    }
    public function showPagoTarjeta($consulta)
    {
        $Consulta = Consult::where('numeroConsulta', $consulta)->first();

        return view("miabogado.DatosTarjeta", ["consult" => $Consulta]);
    }
    public function showEnvioVoucher($consulta)
    {
        $consult = Consult::where("numeroConsulta", $consulta)->first();

        return view("miabogado.EnvioVoucher", ['consult' => $consult]);
    }
    public function showConfirmarPago($consulta)
    {
        $link = Whatsapp::all();
        $consult = Consult::where("numeroConsulta", $consulta)->first();
        return view("miabogado.ConfirmarPago", ['consult' => $consult, 'link' => $link]);
    }
    public function showPagoPendiente($consulta)
    {
        $consulta = Consult::where("numeroConsulta", $consulta)->first();

        return view("miabogado.PorConfirmar", ['consulta' => $consulta]);
    }
    public function showErrorPago($consulta)
    {
        $consulta = Consult::where("numeroConsulta", $consulta)->first();
        return view("miabogado.ErrorPago", ['consult' => $consulta]);
    }

    public function showResetPassword()
    {
        return view("auth.password");
    }

    public function ShowActualizarPerfil()
    {
        $departamentos = Department::all();
        return view("perfil.perfil", ["departamentos" => $departamentos]);
    }

    public function updatePerfil(Request $request, $id)
    {

        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->nombres . " " . $request->apellidos;
        $user->save();

        $client = Client::where("user_id", $id)->first();

        if ($request->hasFile("img_perfil")) {

            if ($client->img_perfil) {
                $path = public_path('\perfil') . "\\" . $client->img_perfil;
                if (file_exists($path)) {
                    unlink($path);
                }
                $nombre = Str::uuid() . "." . $request->img_perfil->getClientOriginalExtension();
                $request->img_perfil->move(public_path('/perfil'), $nombre);
            } else {
                $nombre = Str::uuid() . "." . $request->img_perfil->getClientOriginalExtension();
                $request->img_perfil->move(public_path('/perfil'), $nombre);
            }
        }

        $client->n_doc = $request->documento;
        $client->tipo_doc = $request->tipoDoc;
        $client->departamento = $request->departamento;
        $client->nombres = $request->nombres;
        $client->apellidos = $request->apellidos;
        $client->img_perfil = $request->hasFile("img_perfil") ? $nombre : $client->img_perfil;
        $client->save();
    }

    public function showChangePassword()
    {
        return view('auth.changepassword');
    }

    public function UpdatePassword(Request $request, $id)
    {
        $user = User::find($id);
        $cliente = Client::where("user_id", $id)->first();

        if (Hash::check($request->lastPassword, $user->password)) {

            $user->password = Hash::make($request->newPassword);
            $user->save();

            $cliente->pass = $request->newPassword;
            $cliente->save();
        } else {
            return response()->json(500, "Es un error");
        }
    }

    public function enviarVoucher(Request $request)
    {
        $request->validate([
            'voucher' => 'required',

        ], [
            'voucher.required' => "Suba la foto de su pago por favor."
        ]);

        if ($request->hasFile("voucher")) {
            $nombre = Str::uuid() . "." . $request->voucher->getClientOriginalExtension();
            Storage::disk('public')->put("voucher/" . $nombre,  file_get_contents($request->file('voucher')));

            $codigo = Consult::where('numeroConsulta', $request->codigo_consulta)->update([
                'voucher' => $nombre,
                'estado'=> "Pendiente"
            ]);
        }

        return redirect()->route("pago.confirmar", ['consulta' => $request->codigo_consulta]);
    }


    public function cupon(Request $request)
    {

        $cupon = Coupon::where('codigo', 'LIKE', $request->cupon)->first();

        if ($cupon) {
            if ($cupon->usado === 0) {
                $consulta = Consult::where('numeroConsulta', $request->codigo)->first();

                $descuento = (intval($consulta->precio) * (intval($cupon->porcentaje) / 100));

                $consulta->precio = intval($consulta->precio) - (intval($consulta->precio) * (intval($cupon->porcentaje) / 100));
                $consulta->save();

                $cupon->usado = true;
                $cupon->save();

                return response()->json($descuento);
            } else if ($cupon->usado === 1) {
                return response()->json(true, 500);
            }
        } else {
            return response()->json(false);
        }
    }

    public function getConsulta(Request $request, $id)
    {
        $filtro = $request->buscador;
        $consultas = Consult::where("user_id", $id)->where("numeroConsulta", "LIKE", "%" . $filtro . "%")->with(["client"])->orderBy("created_at", "desc")->paginate(3);

        return response()->json($consultas);
    }

    public function getClientes(Request $request)
    {
        $clientes = Client::where("nombres", "LIKE", "%" . $request->buscador . "%")->paginate(5);

        return response()->json($clientes);
    }

    public function editCliente($id)
    {
        $cliente = Client::where("id", $id)->with("user")->first();

        return response()->json($cliente);
    }

    public function updateCliente(Request $request, $id)
    {
        $cliente = Client::where("id", $id)->with("user")->first();

        $user = User::where("id", $cliente->user_id)->first();

        $email = User::where("email", $request->email)->first();

        if ($request->email !== $user->email) {
            if ($email) {
                return response()->json(["correo" => "El correo ya  existe"], 500);
            } else {
                $cliente->n_doc = $request->n_doc;
                $cliente->tipo_doc = $request->tipo_doc;
                $cliente->departamento = $request->departamento;
                $cliente->nombres = $request->nombre;
                if ($request->password)
                    $cliente->pass = $request->password;

                $cliente->apellidos = $request->apellido;
                $cliente->celular = $request->celular;
                $cliente->save();


                $user->email = $request->email;
                if ($request->password)
                    $user->password = Hash::make($request->password);

                $user->name = $request->nombre . " " . $request->apellido;
                $user->save();
            }
        } else {
            $cliente->n_doc = $request->n_doc;
            $cliente->tipo_doc = $request->tipo_doc;
            $cliente->departamento = $request->departamento;
            $cliente->nombres = $request->nombre;
            if ($request->password)
                $cliente->pass = $request->password;

            $cliente->apellidos = $request->apellido;
            $cliente->celular = $request->celular;
            $cliente->save();


            $user->email = $request->email;
            if ($request->password)
                $user->password = Hash::make($request->password);

            $user->name = $request->nombre . " " . $request->apellido;
            $user->save();
        }
    }
}
