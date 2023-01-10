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
        $datosLaborales = RhTrnDatoLaboral::where('vigente', '=', 'true')->with('persona', 'tipoContrato', 'estructuraOrganizacional', 'horario', 'puesto', 'organismoFinanciador', 'categoriaViaje', 'clasificacion', 'identificador')->get();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de datos laborales recuperados exitosamente',
            'data'      => $datosLaborales
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
        $datoLaboral = new RhTrnDatoLaboral();
        $datoLaboral->persona_id                            = $request->persona_id;

        $funcionario = RhTrnDatoLaboral::find($request->persona_id);
        if (is_null($funcionario)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro de funcionario no encontrado'
            ], 200);
        }
        $funcionario->vigente                               = 'FALSE';
        $funcionario->save();


        $datoLaboral->tipo_contrato_id                      = $request->tipo_contrato_id;
        $datoLaboral->estructura_organizacional_id          = $request->estructura_organizacional_id;
        $datoLaboral->horario_id                            = $request->horario_id;
        $datoLaboral->puesto_id                             = $request->puesto_id;
        $datoLaboral->organismo_financiador_id              = $request->organismo_financiador_id;
        $datoLaboral->categoria_viaje_id                    = $request->categoria_viaje_id;
        $datoLaboral->clasificacion_id                      = $request->clasificacion_id;
        $datoLaboral->insumo                                = $request->insumo;
        $datoLaboral->insumo_devuelto                       = $request->insumo_devuelto;
        $datoLaboral->identificador_id                      = $request->identificador_id;
        $datoLaboral->fecha_inicio                          = $request->fecha_inicio;
        $datoLaboral->fecha_fin                             = $request->fecha_fin;
        $datoLaboral->motivo_desvinculacion                 = $request->motivo_desvinculacion;
        $datoLaboral->nro_contrato                          = $request->nro_contrato;
        $datoLaboral->nro_item                              = $request->nro_item;
        $datoLaboral->cas                                   = $request->cas;
        $datoLaboral->nro_cas                               = $request->nro_cas;
        $datoLaboral->nombre_banco                          = $request->nombre_banco;
        $datoLaboral->nro_cuenta_bancaria                   = $request->nro_cuenta_bancaria;
        $datoLaboral->vigente                               = $request->vigente;
        $datoLaboral->save();

        $persona = RhTrnPersona::find($request->persona_id);
        if (is_null($persona)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro de personas no encontrado'
            ], 200);
        }
        $persona->identificador_dato_laboral            = 'TRUE';
        $persona->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de dato laboral creado exitosamente',
            'data'      => $datoLaboral
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
        $datoLaboral = RhTrnDatoLaboral::find($id);

        if (is_null($datoLaboral)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $datoLaboral
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
        $datoLaboral = RhTrnDatoLaboral::find($id);

        if (is_null($datoLaboral)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Registro no encontrado'
            ], 200);
        }

        $datoLaboral->persona_id                            = $request->persona_id;
        $datoLaboral->tipo_contrato_id                      = $request->tipo_contrato_id;
        $datoLaboral->estructura_organizacional_id          = $request->estructura_organizacional_id;
        $datoLaboral->horario_id                            = $request->horario_id;
        $datoLaboral->puesto_id                             = $request->puesto_id;
        $datoLaboral->organismo_financiador_id              = $request->organismo_financiador_id;
        $datoLaboral->categoria_viaje_id                    = $request->categoria_viaje_id;
        $datoLaboral->clasificacion_id                      = $request->clasificacion_id;
        $datoLaboral->insumo                                = $request->insumo;
        $datoLaboral->insumo_devuelto                       = $request->insumo_devuelto;
        $datoLaboral->identificador_id                      = $request->identificador_id;
        $datoLaboral->fecha_inicio                          = $request->fecha_inicio;
        $datoLaboral->fecha_fin                             = $request->fecha_fin;
        $datoLaboral->motivo_desvinculacion                 = $request->motivo_desvinculacion;
        $datoLaboral->nro_contrato                          = $request->nro_contrato;
        $datoLaboral->nro_item                              = $request->nro_item;
        $datoLaboral->cas                                   = $request->cas;
        $datoLaboral->nro_cas                               = $request->nro_cas;
        $datoLaboral->nombre_banco                          = $request->nombre_banco;
        $datoLaboral->nro_cuenta_bancaria                   = $request->nro_cuenta_bancaria;
        $datoLaboral->vigente                               = $request->vigente;
        $datoLaboral->save();
        return response()->json([
            'status'    => true,
            'message'   => 'Registro modificado exitosamente',
            'data'      => $datoLaboral
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
        $datoLaboral = RhTrnDatoLaboral::find($id);

        if (is_null($datoLaboral)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud no encontrado'
            ], 200);
        }
        $datoLaboral->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud eliminado exitosamente',
            'data'      => $datoLaboral
        ], 200);
    }

    public function datoLaboralPersonaId($persona_id)
    {
        $datoLaboral = RhTrnDatoLaboral::where('persona_id', $persona_id)->where('vigente', '=', 'true')->first();
        if (is_null($datoLaboral)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Solicitud de registro no encontrado'
            ], 200);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Solicitud de registro recuperado exitosamente',
            'data'      => $datoLaboral
        ], 200);
    }

}
