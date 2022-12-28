<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhTrnIdioma;

class TrnIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idiomas = RhTrnIdioma::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de idiomas recuperadas exitosamente',
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
        $idioma = new RhTrnIdioma();
        $idioma->persona_id                    = $request->persona_id;
        $idioma->idioma_id                     = $request->idioma_id;
        $idioma->estado_id                     = $request->estado_id;
        $idioma->vigente                       = $request->vigente;
        $idioma->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de declaracion jurada creada exitosamente',
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
        $idioma = RhTrnIdioma::where('id', $id)->first();
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
        $idioma = RhTrnIdioma::find($id);

        if (is_null($idioma)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }
        $idioma->persona_id                    = $request->persona_id;
        $idioma->idioma_id                     = $request->idioma_id;
        $idioma->estado_id                     = $request->estado_id;
        $idioma->vigente                       = $request->vigente;
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

    public function idiomaPersonaId($id)
    {
        $idioma = RhTrnIdioma::find($id)->where('persona_id', $id)->get();
        if (is_null($idioma)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $idioma
        ], 200);
    }
}
