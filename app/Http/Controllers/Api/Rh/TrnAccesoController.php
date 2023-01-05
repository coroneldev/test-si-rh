<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhTrnAcceso;

class TrnAccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accesos = RhTrnAcceso::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de accesos recuperados exitosamente',
            'data'      => $accesos
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acceso = new RhTrnAcceso();
        $acceso->user_id        = $request->user_id;
        $acceso->sistema_id     = $request->sistema_id;
        $acceso->roles_id       = $request->roles_id;
        $acceso->vigente        = $request->vigente;
        $acceso->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro creado exitosamente',
            'data'      => $acceso
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acceso = RhTrnAcceso::find($id);

        if (is_null($acceso)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $acceso
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $acceso = RhTrnAcceso::find($id);

        if (is_null($acceso)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 200);
        }

        $acceso->user_id        = $request->user_id;
        $acceso->sistema_id     = $request->sistema_id;
        $acceso->roles_id       = $request->roles_id;
        $acceso->vigente        = $request->vigente;
        $acceso->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $acceso
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acceso = RhTrnAcceso::find($id);

        if (is_null($acceso)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud no encontrado'
            ], 200);
        }
        $acceso->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud eliminado exitosamente',
            'data'      => $acceso
        ], 200);
    }
}
