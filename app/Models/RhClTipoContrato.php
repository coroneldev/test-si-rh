<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhClTipoContrato extends Model
{
    use HasFactory;
    protected $table = 'rh_cl_tipos_contratos';


    public function datosLaborales()
    {
        return $this->hasMany(RhTrnDatoLaboral::class, 'id');
    }
    
}

