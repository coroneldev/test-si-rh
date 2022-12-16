<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnParentesco extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rh_trn_parentescos';

    protected $fillable = [
        'persona_id',
        'parentesco_id',
        'expedido_ci_id',
        'nombres',
        'apellidos',
        'cedula_identidad',
        'direccion_laboral',
        'direccion_parentesco',
        'correo_electronico',
        'telefono',
        'vigente'
    ];

    public function parentesco()
    {
        return $this->belongsTo(RhClParentesco::class, 'parentesco_id');
    }

    /* public function personas()
    {
        return $this->belongsToMany(RhTrnPersona::class, 'rh_trn_personas');
        
    }*/
}
