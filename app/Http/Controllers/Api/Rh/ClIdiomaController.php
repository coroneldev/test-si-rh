<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhClIdioma;

class ClIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idiomas = RhClIdioma::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de idiomas recuperados exitosamente',
            'data'      => $idiomas
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
        $idioma = new RhClIdioma();
        $idioma->descripcion        = $request->descripcion;
        $idioma->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro exitoso',
            'data'      => $idioma
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
        $idioma = RhClIdioma::where('id', $id)->first();
        if (is_null($idioma)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $idioma
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
        $idioma = RhClIdioma::find($id);

        if (is_null($idioma)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }
        $idioma->descripcion        = $request->descripcion;
        $idioma->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $idioma
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
