<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnDatoLaboral extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'rh_trn_datos_laborales';

    protected $fillable = [
        'persona_id',
        'tipo_contrato_id',
        'estructura_organizacional_id',
        'horario_id',
        'puesto_id',
        'organismo_financiador_id',
        'categoria_viaje_id',
        'clasificacion_id',
        'insumo_id',
        'identificador_id',
        'fecha_inicio',
        'fecha_fin',
        'motivo_desvinculacion',
        'nro_contrato',
        'nro_item',
        'cas',
        'nombre_banco',
        'vigente',
    ];

    public function persona()
    {
        return $this->belongsTo(RhTrnPersona::class, 'persona_id');
    }
    
    public function tipoContrato()
    {
        return $this->belongsTo(RhClTipoContrato::class, 'tipo_contrato_id');
    }
    public function estructuraOrganizacional()
    {
        return $this->belongsTo(RhClEstructuraOrganizacional::class, 'estructura_organizacional_id');
    }
    public function horario()
    {
        return $this->belongsTo(RhClHorario::class, 'horario_id');
    }
    public function puesto()
    {
        return $this->belongsTo(RhClPuesto::class, 'puesto_id');
    }
    public function organismoFinanciador()
    {
        return $this->belongsTo(RhClOrganismoFinanciador::class, 'organismo_financiador_id');
    }
    public function categoriaViaje()
    {
        return $this->belongsTo(RhClCategoriaViaje::class, 'categoria_viaje_id');
    }
    public function clasificacion()
    {
        return $this->belongsTo(RhClClasificacion::class, 'clasificacion_id');
    }
    public function identificador()
    {
        return $this->belongsTo(RhClIdentificador::class, 'identificador_id');
    }


}
