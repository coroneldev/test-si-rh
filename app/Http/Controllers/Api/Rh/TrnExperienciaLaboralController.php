<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use App\Models\RhTrnExperienciaLaboral;
use Illuminate\Http\Request;

class TrnExperienciaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiencias = RhTrnExperienciaLaboral::where('vigente', '=', 'true')->with('persona')->get();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de Experiencias Laborales recuperadas exitosamente',
            'data'      => $experiencias
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
        $experiencia = new RhTrnExperienciaLaboral();
        $experiencia->persona_id                    = $request->persona_id;
        $experiencia->lugar_trabajo                 = $request->lugar_trabajo;
        $experiencia->fecha_inicio                  = $request->fecha_inicio;
        $experiencia->fecha_fin                     = $request->fecha_fin;
        $experiencia->cargo_desempeniado            = $request->cargo_desempeniado;
        $experiencia->funcion_desempeniada          = $request->funcion_desempeniada;
        $experiencia->nombre_inmediato_superior     = $request->nombre_inmediato_superior;
        $experiencia->cargo_inmediato_superior      = $request->cargo_inmediato_superior;
        $experiencia->salario_percibido             = $request->salario_percibido;
        $experiencia->motivo_desvinculacion         = $request->motivo_desvinculacion;
        $experiencia->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de experiencia laboral creada exitosamente',
            'data'      => $experiencia
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
        $experiencia = RhTrnExperienciaLaboral::where('id', $id)->first();
        if (is_null($experiencia)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $experiencia
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
        $experiencia = RhTrnExperienciaLaboral::find($id);

        if (is_null($experiencia)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }

        $experiencia->persona_id                    = $request->persona_id;
        $experiencia->lugar_trabajo                 = $request->lugar_trabajo;
        $experiencia->fecha_inicio                  = $request->fecha_inicio;
        $experiencia->fecha_fin                     = $request->fecha_fin;
        $experiencia->cargo_desempeniado             = $request->cargo_desempeniado;
        $experiencia->funcion_desempeniada           = $request->funcion_desempeniada;
        $experiencia->nombre_inmediato_superior     = $request->nombre_inmediato_superior;
        $experiencia->cargo_inmediato_superior      = $request->cargo_inmediato_superior;
        $experiencia->salario_percibido             = $request->salario_percibido;
        $experiencia->motivo_desvinculacion         = $request->motivo_desvinculacion;
        $experiencia->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $experiencia
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
    public function ExperienciaLaboralPersonaId($id)
    {
        $experiencia = RhTrnExperienciaLaboral::where('persona_id', $id)->where('vigente', '=', 'true')->get();
        if (is_null($experiencia)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $experiencia
        ], 200);
    }
}
