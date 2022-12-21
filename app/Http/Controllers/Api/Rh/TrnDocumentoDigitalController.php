<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\RhTrnDocumentoDigital;

class TrnDocumentoDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = RhTrnDocumentoDigital::where('vigente', '=', 'true')->get();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de documentos recuperadas exitosamente',
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

        $file_adjunto = $request->file('enlace');
        $path_adjunto = $file_adjunto->store('public');

        $documento = new RhTrnDocumentoDigital();

        $documento->tipo_documento_id             = $request->tipo_documento_id;
        $documento->persona_id                    = $request->persona_id;
        $documento->user_id                       = $request->user_id;
        $documento->id_registro_tabla             = $request->id_registro_tabla;
        $documento->enlace                        = $path_adjunto;
        $documento->nombre_archivo                = $request->nombre_archivo;
        $documento->edicion                       = $request->edicion;
        $documento->estado                        = $request->estado;
        $documento->vigente                       = $request->vigente;
        $documento->motivo_solicitud              = $request->motivo_solicitud;
        $documento->observacion                   = $request->observacion;
        $documento->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de documento creado exitosamente',
            'data'      => $documento
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
    }

    public function documentoPersonaIdTabla($id, $tipo_documento_id, $id_registro_tabla)
    {
        $documento  = RhTrnDocumentoDigital::where('persona_id', $id)->where('tipo_documento_id', $tipo_documento_id)
                                                    ->where('id_registro_tabla', $id_registro_tabla)
                                                        ->where('vigente', '=', 'true')->first();

        if (is_null($documento)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 404);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $documento
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
        $documento  = RhTrnDocumentoDigital::find($id)->where('vigente', '=', 'true')->first();
        if (is_null($documento)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 404);
        }

        $file_adjunto = $request->file('enlace');
        $path_adjunto = $file_adjunto->store('public');

        $documento->tipo_documento_id             = $request->tipo_documento_id;
        $documento->persona_id                    = $request->persona_id;
        $documento->user_id                       = $request->user_id;
        $documento->id_registro_tabla             = $request->id_registro_tabla;
        $documento->enlace                        = $path_adjunto;
        $documento->nombre_archivo                = $request->nombre_archivo;
        $documento->edicion                       = $request->edicion;
        $documento->estado                        = $request->estado;
        $documento->vigente                       = $request->vigente;
        $documento->motivo_solicitud              = $request->motivo_solicitud;
        $documento->observacion                   = $request->observacion;
        $documento->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de documento actualizado exitosamente',
            'data'      => $documento
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
