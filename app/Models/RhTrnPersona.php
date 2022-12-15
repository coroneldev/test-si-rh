<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnPersona extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rh_trn_personas';

    protected $fillable = [
        'user_id',
        'estado_civil_id',
        'genero_id',
        'pais_id',
        'ciudad_id',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'cedula_identidad',
        'expedido_ci',
        'complemento_ci',
        'fecha_nacimiento',
        'telefono_fijo',
        'telefono_movil',
        'email_personal',
        'nro_nua_afp',
        'nombre_afp',
        'libreta_militar',
        'grupo_sanguineo',
        'nro_nit',
        'nombre_seguro_med',
        'nro_seguro_medico',
        'licencia_conducir',
        'licencia_categoria',
        'domicilio',
    ];

    public function estadoCivil()
    {
        return $this->belongsTo(RhClEstadoCivil::class, 'estado_civil_id');
    }
    public function genero()
    {
        return $this->belongsTo(RhClGenero::class, 'genero_id');
    }
    public function pais()
    {
        return $this->belongsTo(RhClPais::class, 'pais_id');
    }
    public function ciudad()
    {
        return $this->belongsTo(RhClCiudad::class, 'ciudad_id');
    }
}
