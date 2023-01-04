<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnExperienciaLaboral extends Model
{
    use HasFactory;
   // use SoftDeletes;

    protected $table = 'rh_trn_experiencias_laborales';
    protected $fillable = [
        'persona_id',
        'lugar_trabajo',
        'fecha_inicio',
        'fecha_fin',
        'cargo_desempeniado',
        'funcion_desempeniada',
        'nombre_inmediato_superior',
        'cargo_inmediato_superior',
        'salario_percibido',
        'motivo_desvinculacion'
    ];
    
    public function persona()
    {
        return $this->belongsTo(RhTrnPersona::class, 'persona_id');
    }

}
