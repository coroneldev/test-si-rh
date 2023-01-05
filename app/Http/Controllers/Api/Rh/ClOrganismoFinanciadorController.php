<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhClOrganismoFinanciador;

class ClOrganismoFinanciadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organismosFinanciadores = RhClOrganismoFinanciador::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de organismos financiadores recuperados exitosamente',
            'data'      => $organismosFinanciadores
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
        $organismoFinanciador = new RhClOrganismoFinanciador();
        $organismoFinanciador->nombre        = $request->nombre;
        $organismoFinanciador->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de organismo financiador creado exitosamente',
            'data'      => $organismoFinanciador
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
        $organismoFinanciador = RhClOrganismoFinanciador::find($id);

        if (is_null($organismoFinanciador)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $organismoFinanciador
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
        $organismoFinanciador = RhClOrganismoFinanciador::find($id);

        if (is_null($organismoFinanciador)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 200);
        }

        $organismoFinanciador->nombre        = $request->nombre;
        $organismoFinanciador->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $organismoFinanciador
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
        $organismoFinanciador = RhClOrganismoFinanciador::find($id);

        if (is_null($organismoFinanciador)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud no encontrado'
            ], 200);
        }
        $organismoFinanciador->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud eliminado exitosamente',
            'data'      => $organismoFinanciador
        ], 200);
    }
}
