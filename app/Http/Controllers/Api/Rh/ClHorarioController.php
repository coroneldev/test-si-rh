<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhClHorario;

class ClHorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = RhClHorario::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de horarios recuperados exitosamente',
            'data'      => $horarios
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
        $horario = new RhClHorario();
        $horario->nombre        = $request->nombre;
        $horario->hora_uno        = $request->hora_uno;
        $horario->hora_dos        = $request->hora_dos;
        $horario->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de horario creado exitosamente',
            'data'      => $horario
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
        $horario = RhClHorario::find($id);

        if (is_null($horario)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $horario
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
        $horario = RhClHorario::find($id);

        if (is_null($horario)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 200);
        }
        $horario->nombre        = $request->nombre;
        $horario->hora_uno        = $request->hora_uno;
        $horario->hora_dos        = $request->hora_dos;
        $horario->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $horario
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
        $horario = RhClHorario::find($id);

        if (is_null($horario)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud no encontrado'
            ], 200);
        }
        $horario->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud eliminado exitosamente',
            'data'      => $horario
        ], 200);
    }
}
