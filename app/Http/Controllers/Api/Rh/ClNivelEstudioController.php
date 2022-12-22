<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhClNivelEstudio;

class ClNivelEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivelesEstudios = RhClNivelEstudio::all();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de niveles de estudios  recuperados exitosamente',
            'data'      => $nivelesEstudios
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
        $nivelEstudio = new RhClNivelEstudio();
        $nivelEstudio->descripcion     = $request->descripcion;
        $nivelEstudio->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro exitoso',
            'data'      => $nivelEstudio
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
        $nivelEstudio = RhClNivelEstudio::find($id);

        if (is_null($nivelEstudio)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 404);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $nivelEstudio
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
        $nivelEstudio = RhClNivelEstudio::find($id);

        if (is_null($nivelEstudio)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 404);
        }

        $nivelEstudio->descripcion     = $request->descripcion;
        $nivelEstudio->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $nivelEstudio
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
