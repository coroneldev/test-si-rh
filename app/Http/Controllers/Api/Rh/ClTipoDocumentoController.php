<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhClTipoDocumento;

class ClTipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDocumentos = RhClTipoDocumento::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de tipos de documentos recuperados exitosamente',
            'data'      => $tiposDocumentos
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
        $tipoDocumento = new RhClTipoDocumento();
        $tipoDocumento->descripcion        = $request->descripcion;
        $tipoDocumento->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro creado exitosamente',
            'data'      => $tipoDocumento
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
        $tipoDocumento = RhClTipoDocumento::find($id);

        if (is_null($tipoDocumento)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $tipoDocumento
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
        $tipoDocumento = RhClTipoDocumento::find($id);

        if (is_null($tipoDocumento)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 200);
        }

        $tipoDocumento->descripcion        = $request->descripcion;
        $tipoDocumento->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $tipoDocumento
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
        $tipoDocumento = RhClTipoDocumento::find($id);

        if (is_null($tipoDocumento)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud no encontrado'
            ], 200);
        }
        $tipoDocumento->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud eliminado exitosamente',
            'data'      => $tipoDocumento
        ], 200);
    }
}
