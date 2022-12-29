<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhClEstructuraOrganizacional;

class ClEstructuraOrganizacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estructurasOrganizacionales = RhClEstructuraOrganizacional::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de estructuras recuperadas exitosamente',
            'data'      => $estructurasOrganizacionales
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
        $estructuraOrganizacional = new RhClEstructuraOrganizacional();
        $estructuraOrganizacional->nombre_dependencia                    = $request->nombre_dependencia;
        $estructuraOrganizacional->sigla                                 = $request->sigla;
        $estructuraOrganizacional->dependencia                           = $request->dependencia;
        $estructuraOrganizacional->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de estructura organizacional creada exitosamente',
            'data'      => $estructuraOrganizacional
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
        $estructuraOrganizacional = RhClEstructuraOrganizacional::where('id', $id)->first();
        if (is_null($estructuraOrganizacional)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $estructuraOrganizacional
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
        $estructuraOrganizacional = RhClEstructuraOrganizacional::find($id);

        if (is_null($estructuraOrganizacional)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }
        $estructuraOrganizacional->nombre_dependencia                    = $request->nombre_dependencia;
        $estructuraOrganizacional->sigla                                 = $request->sigla;
        $estructuraOrganizacional->dependencia                           = $request->dependencia;
        $estructuraOrganizacional->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $estructuraOrganizacional
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
