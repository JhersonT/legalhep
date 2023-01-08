<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acc = Account::paginate(3);

        return response()->json($acc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile("logo")) {
            $nombre = Str::uuid() . "." . $request->logo->getClientOriginalExtension();
            Storage::disk('public')->put("account/" . $nombre,  file_get_contents($request->file('logo')));
        }else{
            $nombre ="";
        }

        $acc = new Account();
        $acc->cuenta = $request->cuenta;
        $acc->titular = $request->titular;
        $acc->logo = $nombre;
        $acc->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acc = Account::find($id);

        return response()->json($acc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $acc = Account::where("id",$id)->first();

        if ($request->hasFile("logo")) {
            if ($acc->logo == "" || $acc->logo == null) {
                $nombre = Str::uuid() . "." . $request->pdf->getClientOriginalExtension();
                Storage::disk('public')->put("account/" . $nombre,  file_get_contents($request->file('logo')));
            } else if ($acc->logo !== null || $acc->logo !== "") {
                if (Storage::disk('public')->exists("account/" . $acc->logo)) {
                    $path = public_path("\storage\\account\\" . $acc->logo);
                    unlink($path);
                    $nombre = Str::uuid() . "." . $request->logo->getClientOriginalExtension();
                    Storage::disk('public')->put("account/" . $nombre,  file_get_contents($request->file('logo')));
                } else {
                    $nombre = Str::uuid() . "." . $request->logo->getClientOriginalExtension();
                    Storage::disk('public')->put("account/" . $nombre,  file_get_contents($request->file('logo')));
                }
            }
        }

        $acc->cuenta = $request->cuenta;
        $acc->titular = $request->titular;
        $acc->logo = $request->hasFile("logo")? $nombre : $acc->logo;
        $acc->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
