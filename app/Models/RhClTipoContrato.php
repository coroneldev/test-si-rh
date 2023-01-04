<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhClTipoContrato extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'rh_cl_tipos_contratos';


    public function datosLaborales()
    {
        return $this->hasMany(RhTrnDatoLaboral::class, 'id');
    }
    
}

