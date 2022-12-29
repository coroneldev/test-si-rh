<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhClCategoriaViaje;

class ClCategoriaViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaViajes = RhClCategoriaViaje::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de categoria de viajes recuperadas exitosamente',
            'data'      => $categoriaViajes
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
        $categoriaViaje = new RhClCategoriaViaje();
        $categoriaViaje->descripcion        = $request->descripcion;
        $categoriaViaje->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de categoria de viaje creado exitosamente',
            'data'      => $categoriaViaje
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
        $categoriaViaje = RhClCategoriaViaje::where('id', $id)->first();
        if (is_null($categoriaViaje)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $categoriaViaje
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
        $categoriaViaje = RhClCategoriaViaje::find($id);

        if (is_null($categoriaViaje)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }
        $categoriaViaje->descripcion        = $request->descripcion;
        $categoriaViaje->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $categoriaViaje
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
