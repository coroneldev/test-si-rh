<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhTrnDatoLaboral;
use App\Models\RhTrnPersona;

class TrnDatoLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laborales = RhTrnDatoLaboral::where('vigente', '=', 'true')->with('persona', 'tipoContrato', 'estructuraOrganizacional', 'horario', 'puesto', 'organismoFinanciador', 'categoriaViaje', 'clasificacion', 'identificador')->get();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de datos laborales recuperados exitosamente',
            'data'      => $laborales
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
        $laboral = new RhTrnDatoLaboral();
        $laboral->persona_id                            = $request->persona_id;
        $laboral->tipo_contrato_id                      = $request->tipo_contrato_id;
        $laboral->estructura_organizacional_id          = $request->estructura_organizacional_id;
        $laboral->horario_id                            = $request->horario_id;
        $laboral->puesto_id                             = $request->puesto_id;
        $laboral->organismo_financiador_id              = $request->organismo_financiador_id;
        $laboral->categoria_viaje_id                    = $request->categoria_viaje_id;
        $laboral->clasificacion_id                      = $request->clasificacion_id;
        $laboral->insumo_id                             = $request->insumo_id;
        $laboral->identificador_id                      = $request->identificador_id;
        $laboral->fecha_inicio                          = $request->fecha_inicio;
        $laboral->fecha_fin                             = $request->fecha_fin;
        $laboral->motivo_desvinculacion                 = $request->motivo_desvinculacion;
        $laboral->nro_contrato                          = $request->nro_contrato;
        $laboral->nro_item                              = $request->nro_item;
        $laboral->cas                                   = $request->cas;
        $laboral->nombre_banco                          = $request->nombre_banco;
        $laboral->nro_cuenta_bancaria                   = $request->nro_cuenta_bancaria;
        $laboral->vigente                               = $request->vigente;
        $laboral->save();

        $persona = RhTrnPersona::find($request->persona_id);
        if (is_null($persona)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }
        $persona->identificador_dato_laboral            = 'TRUE';

        $persona->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de dato laboral creado exitosamente',
            'data'      => $laboral
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
        $laboral = RhTrnDatoLaboral::where('id', $id)->first();
        if (is_null($laboral)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 204);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $laboral
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
        $laboral = RhTrnDatoLaboral::find($id);

        if (is_null($laboral)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 204);
        }

        $laboral->persona_id                            = $request->persona_id;
        $laboral->tipo_contrato_id                      = $request->tipo_contrato_id;
        $laboral->estructura_organizacional_id          = $request->estructura_organizacional_id;
        $laboral->horario_id                            = $request->horario_id;
        $laboral->puesto_id                             = $request->puesto_id;
        $laboral->organismo_financiador_id              = $request->organismo_financiador_id;
        $laboral->categoria_viaje_id                    = $request->categoria_viaje_id;
        $laboral->clasificacion_id                      = $request->clasificacion_id;
        $laboral->insumo_id                             = $request->insumo_id;
        $laboral->identificador_id                      = $request->identificador_id;
        $laboral->fecha_inicio                          = $request->fecha_inicio;
        $laboral->fecha_fin                             = $request->fecha_fin;
        $laboral->motivo_desvinculacion                 = $request->motivo_desvinculacion;
        $laboral->nro_contrato                          = $request->nro_contrato;
        $laboral->nro_item                              = $request->nro_item;
        $laboral->cas                                   = $request->cas;
        $laboral->nombre_banco                          = $request->nombre_banco;
        $laboral->nro_cuenta_bancaria                   = $request->nro_cuenta_bancaria;
        $laboral->vigente                               = $request->vigente;
        $laboral->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $laboral
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

    public function datoLaboralPersonaId($id)
    {
        $laboral = RhTrnDatoLaboral::find($id)->where('persona_id', $id)->where('vigente', '=', 'true')->get();
        if (is_null($laboral)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $laboral
        ], 200);
    }
}
