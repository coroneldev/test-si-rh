<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnFormacionAcademica extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rh_trn_formaciones_academicas';
    protected $fillable = [
        'persona_id',
        'pais_id',
        'ciudad_id',
        'institucion_id',
        'estado_id',
        'nivel_id',
        'titulo',
        'fecha_inicio',
        'fecha_fin',
        'provision_nacional',
        'registro_profesional',
        'vigente'
    ];

    public function institucion()
    {
        return $this->belongsTo(RhClInstitucion::class, 'institucion_id');
    }
    public function pais()
    {
        return $this->belongsTo(RhClPais::class, 'pais_id');
    }
    public function ciudad()
    {
        return $this->belongsTo(RhClCiudad::class, 'ciudad_id');
    }
    public function nivelEstudio()
    {
        return $this->belongsTo(RhClNivelEstudio::class, 'nivel_id');
    }
    public function estado()
    {
        return $this->belongsTo(RhClEstado::class, 'estado_id');
    }

}
