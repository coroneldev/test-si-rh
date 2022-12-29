<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhClTipoContrato;

class ClTipoContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoContratos = RhClTipoContrato::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de tipos de contratos recuperados exitosamente',
            'data'      => $tipoContratos
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
        $tipoContrato = new RhClTipoContrato();
        $tipoContrato->descripcion                    = $request->descripcion;
        $tipoContrato->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de tipo de contrato creado exitosamente',
            'data'      => $tipoContrato
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
        $tipoContrato = RhClTipoContrato::where('id', $id)->first();
        if (is_null($tipoContrato)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $tipoContrato
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
        $tipoContrato = RhClTipoContrato::find($id);

        if (is_null($tipoContrato)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }
        $tipoContrato->descripcion                    = $request->persona_id;
        $tipoContrato->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $tipoContrato
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
        //
    }
}
