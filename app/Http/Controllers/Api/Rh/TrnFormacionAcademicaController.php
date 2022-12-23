<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhTrnFormacionAcademica;

class TrnFormacionAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formaciones = RhTrnFormacionAcademica::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de formaciones academicas recuperadas exitosamente',
            'data'      => $formaciones
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formacion = RhtrnFormacionAcademica::where('id', $id)->where('vigente', '=', 'true')->first();
        if (is_null($formacion)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 404);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $formacion
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
        $formacion = RhtrnFormacionAcademica::find($id)->where('vigente', '=', 'true');

        if (is_null($formacion)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 404);
        }

        $formacion->persona_id            = $request->persona_id;
        $formacion->pais_id               = $request->pais_id;
        $formacion->ciudad_id             = $request->ciudad_id;
        $formacion->institucion_id        = $request->institucion_id;
        $formacion->estado_id             = $request->estado_id;
        $formacion->nivel_id              = $request->nivel_id;
        $formacion->titulo                = $request->titulo;
        $formacion->fecha_inicio          = $request->fecha_inicio;
        $formacion->fecha_fin             = $request->fecha_fin;
        $formacion->provision_nacional    = $request->provision_nacional;
        $formacion->registro_profesional  = $request->registro_profesional;
        $formacion->vigente               = $request->vigente;
        $formacion->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $formacion
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

    public function formacionesPersonaId($id)
    {
        $formacion = RhtrnFormacionAcademica::where('vigente', '=', 'true')->where('persona_id', $id)->with('institucion', 'pais', 'ciudad', 'estado', 'nivelEstudio')->first();
        if (is_null($formacion)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $formacion
        ], 200);
    }
}
