<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhTrnPersona;

class TrnPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = RhTrnPersona::where('identificador_dato_laboral', '=', 'false')->get();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de personas recuperadas exitosamente',
            'data'      => $personas
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
        $persona = new RhTrnPersona();
        $persona->user_id             = $request->user_id;
        $persona->estado_civil_id     = $request->estado_civil_id;
        $persona->genero_id           = $request->genero_id;
        $persona->pais_id             = $request->pais_id;
        $persona->ciudad_id           = $request->ciudad_id;
        $persona->expedido_ci_id      = $request->expedido_ci_id;
        $persona->apellido_paterno    = $request->apellido_paterno;
        $persona->apellido_materno    = $request->apellido_materno;
        $persona->nombres             = $request->nombres;
        $persona->cedula_identidad    = $request->cedula_identidad;
        $persona->complemento_ci      = $request->complemento_ci;
        $persona->fecha_nacimiento    = $request->fecha_nacimiento;
        $persona->telefono_fijo       = $request->telefono_fijo;
        $persona->telefono_movil      = $request->telefono_movil;
        $persona->correo_personal     = $request->correo_personal;
        $persona->nro_nua_afp         = $request->nro_nua_afp;
        $persona->nombre_afp          = $request->nombre_afp;
        $persona->nro_libreta_militar = $request->nro_libreta_militar;
        $persona->grupo_sanguineo     = $request->grupo_sanguineo;
        $persona->nro_nit             = $request->nro_nit;
        $persona->nombre_seguro_medico = $request->nombre_seguro_medico;
        $persona->nro_seguro_medico   = $request->nro_seguro_medico;
        $persona->licencia_conducir   = $request->licencia_conducir;
        $persona->licencia_categoria  = $request->licencia_categoria;
        $persona->domicilio           = $request->domicilio;

        $persona->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de persona creado exitosamente',
            'data'      => $persona
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
        $persona  = RhTrnPersona::where('id', $id)->where('vigente', '=', 'true')->first();

        if (is_null($persona)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $persona
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
        $persona  = RhTrnPersona::where('id', $id)->where('vigente', '=', 'true')->first();

        if (is_null($persona)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }

        $persona->user_id             = $request->user_id;
        $persona->estado_civil_id     = $request->estado_civil_id;
        $persona->genero_id           = $request->genero_id;
        $persona->pais_id             = $request->pais_id;
        $persona->ciudad_id           = $request->ciudad_id;
        $persona->expedido_ci_id      = $request->expedido_ci_id;
        $persona->apellido_paterno    = $request->apellido_paterno;
        $persona->apellido_materno    = $request->apellido_materno;
        $persona->nombres             = $request->nombres;
        $persona->cedula_identidad    = $request->cedula_identidad;
        $persona->complemento_ci      = $request->complemento_ci;
        $persona->fecha_nacimiento    = $request->fecha_nacimiento;
        $persona->telefono_fijo       = $request->telefono_fijo;
        $persona->telefono_movil      = $request->telefono_movil;
        $persona->correo_personal     = $request->correo_personal;
        $persona->nro_nua_afp         = $request->nro_nua_afp;
        $persona->nombre_afp          = $request->nombre_afp;
        $persona->nro_libreta_militar = $request->nro_libreta_militar;
        $persona->grupo_sanguineo     = $request->grupo_sanguineo;
        $persona->nro_nit             = $request->nro_nit;
        $persona->nombre_seguro_medico = $request->nombre_seguro_medico;
        $persona->nro_seguro_medico   = $request->nro_seguro_medico;
        $persona->licencia_conducir   = $request->licencia_conducir;
        $persona->licencia_categoria  = $request->licencia_categoria;
        $persona->domicilio           = $request->domicilio;

        $persona->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de persona creado exitosamente',
            'data'      => $persona
        ], 201);
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
