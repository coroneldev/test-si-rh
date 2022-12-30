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
        $idiomasPersonas = RhTrnIdioma::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de idiomas recuperadas exitosamente',
            'data'      => $idiomasPersonas
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
        $idiomaPersona = new RhTrnIdioma();
        $idiomaPersona->persona_id                    = $request->persona_id;
        $idiomaPersona->idioma_id                     = $request->idioma_id;
        $idiomaPersona->estado_id                     = $request->estado_id;
        $idiomaPersona->vigente                       = $request->vigente;
        $idiomaPersona->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de declaracion jurada creada exitosamente',
            'data'      => $idiomaPersona
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
        $idiomaPersona = RhTrnIdioma::where('id', $id)->first();
        if (is_null($idiomaPersona)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $idiomaPersona
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
        $idiomaPersona = RhTrnIdioma::find($id);

        if (is_null($idiomaPersona)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }
        $idiomaPersona->persona_id                    = $request->persona_id;
        $idiomaPersona->idioma_id                     = $request->idioma_id;
        $idiomaPersona->estado_id                     = $request->estado_id;
        $idiomaPersona->vigente                       = $request->vigente;
        $idiomaPersona->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $idiomaPersona
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
        $idiomaPersona = RhTrnIdioma::where('persona_id', $id)->with('persona', 'idioma', 'estado')->get();
        if (is_null($idiomaPersona)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $idiomaPersona
        ], 200);
    }
}
