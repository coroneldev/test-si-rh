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
        $declaraciones = RhTrnDeclaracionJurada::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de declaraciones juradas recuperadas exitosamente',
            'data'      => $declaraciones
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
        $declaracion = new RhTrnDeclaracionJurada();
        $declaracion->persona_id                       = $request->persona_id;
        $declaracion->declaracion_jurada               = $request->declaracion_jurada;
        $declaracion->fecha_inicio                     = $request->fecha_inicio;
        $declaracion->fecha_fin                        = $request->fecha_fin;
        $declaracion->vigente                          = $request->vigente;
        $declaracion->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de declaracion jurada creada exitosamente',
            'data'      => $declaracion
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
        $declaracion = RhTrnDeclaracionJurada::where('id', $id)->first();
        if (is_null($declaracion)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $declaracion
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
        $declaracion = RhTrnDeclaracionJurada::find($id);

        if (is_null($declaracion)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }
        $declaracion->persona_id                       = $request->persona_id;
        $declaracion->declaracion_jurada               = $request->declaracion_jurada;
        $declaracion->fecha_inicio                     = $request->fecha_inicio;
        $declaracion->fecha_fin                        = $request->fecha_fin;
        $declaracion->vigente                          = $request->vigente;
        $declaracion->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $declaracion
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

    public function declaracionJuaradaPersonaId($id)
    {
        $laboral = RhTrnDeclaracionJurada::find($id)->where('persona_id', $id)->where('vigente', '=', 'true')->get();
        if (is_null($laboral)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $laboral
        ], 200);
    }
}
