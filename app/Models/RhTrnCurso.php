<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnCurso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rh_trn_cursos';
    protected $fillable = [
        'persona_id',
        'estado_id',
        'institucion_id',
        'fecha_inicio',
        'fecha_fin',
        'nombre',
        'duracion',
        'tipo',
        'vigente',
    ];

    public function persona()
    {
        return $this->belongsTo(RhTrnPersona::class, 'persona_id');
    }

    public function estado()
    {
        return $this->belongsTo(RhClEstado::class, 'estado_id');
    }

    public function institucion()
    {
        return $this->belongsTo(RhClInstitucion::class, 'institucion_id');
    }
}
