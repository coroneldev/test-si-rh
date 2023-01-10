<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhTrnDeclaracionJurada;

class TrnDeclaracionJuradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $declaracionesJuradas = RhTrnDeclaracionJurada::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de declaraciones juradas recuperadas exitosamente',
            'data'      => $declaracionesJuradas
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
        $declaracionJurada = new RhTrnDeclaracionJurada();
        $declaracionJurada->persona_id                       = $request->persona_id;
        $declaracionJurada->declaracion_jurada               = $request->declaracion_jurada;
        $declaracionJurada->fecha_inicio                     = $request->fecha_inicio;
        $declaracionJurada->fecha_fin                        = $request->fecha_fin;
        $declaracionJurada->vigente                          = $request->vigente;
        $declaracionJurada->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro creado exitosamente',
            'data'      => $declaracionJurada
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
        $declaracionJurada = RhTrnDeclaracionJurada::find($id);
        
        if (is_null($declaracionJurada)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $declaracionJurada
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
        $declaracionJurada = RhTrnDeclaracionJurada::find($id);

        if (is_null($declaracionJurada)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 200);
        }
        $declaracionJurada->persona_id                       = $request->persona_id;
        $declaracionJurada->declaracion_jurada               = $request->declaracion_jurada;
        $declaracionJurada->fecha_inicio                     = $request->fecha_inicio;
        $declaracionJurada->fecha_fin                        = $request->fecha_fin;
        $declaracionJurada->vigente                          = $request->vigente;
        $declaracionJurada->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $declaracionJurada
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
        $declaracionJurada = RhTrnDeclaracionJurada::find($id);

        if (is_null($declaracionJurada)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud no encontrado'
            ], 200);
        }
        $declaracionJurada->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud eliminado exitosamente',
            'data'      => $declaracionJurada
        ], 200);
    }

    public function declaracionJuaradaPersonaId($persona_id)
    {
        $declaracionJurada = RhTrnDeclaracionJurada::where('persona_id', $persona_id)->get();
        
        if (is_null($declaracionJurada)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $declaracionJurada
        ], 200);
    }
}
