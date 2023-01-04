<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use App\Models\RhTrnParentesco;
use Illuminate\Http\Request;

class TrnParentescoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentescos = RhTrnParentesco::all();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de personas recuperadas exitosamente',
            'data'      => $parentescos
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
        $parentesco = new RhTrnParentesco();
        $parentesco->persona_id                  = $request->persona_id;
        $parentesco->parentesco_id               = $request->parentesco_id;
        $parentesco->expedido_ci_id              = $request->expedido_ci_id;
        $parentesco->nombres                     = $request->nombres;
        $parentesco->apellidos                   = $request->apellidos;
        $parentesco->cedula_identidad            = $request->cedula_identidad;
        $parentesco->direccion_laboral           = $request->direccion_laboral;
        $parentesco->direccion_parentesco        = $request->direccion_parentesco;
        $parentesco->correo_personal             = $request->correo_personal;
        $parentesco->telefono                    = $request->telefono;
        $parentesco->vigente                     = $request->vigente;
        $parentesco->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de parentesco creado exitosamente',
            'data'      => $parentesco
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
        $parentesco = RhTrnParentesco::find($id);
        if (is_null($parentesco)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $parentesco
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
        $parentesco = RhTrnParentesco::find($id);

        if (is_null($parentesco)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 200);
        }
        $parentesco->persona_id                  = $request->persona_id;
        $parentesco->parentesco_id               = $request->parentesco_id;
        $parentesco->expedido_ci_id              = $request->expedido_ci_id;
        $parentesco->nombres                     = $request->nombres;
        $parentesco->apellidos                   = $request->apellidos;
        $parentesco->cedula_identidad            = $request->cedula_identidad;
        $parentesco->direccion_laboral           = $request->direccion_laboral;
        $parentesco->direccion_parentesco        = $request->direccion_parentesco;
        $parentesco->telefono                    = $request->telefono;
        $parentesco->vigente                     = $request->vigente;
        $parentesco->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $parentesco
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
        $parentesco = RhTrnParentesco::find($id);

        if (is_null($parentesco)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud no encontrado'
            ], 200);
        }
        $parentesco->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud eliminado exitosamente',
            'data'      => $parentesco
        ], 200);
    }

    public function parentescoPersonaId($id)
    {
        $parentetsco = RhTrnParentesco::where('persona_id', $id)->with('persona', 'parentesco', 'expedido')->first();
        if (is_null($parentetsco)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de parentescos recuperados exitosamente',
            'data'      => $parentetsco
        ], 200);
    }
}
