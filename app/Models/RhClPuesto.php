<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhClPuesto extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'rh_cl_puestos';

    public function datosLaborales()
    {
        return $this->hasMany(RhTrnDatoLaboral::class, 'id');
    }
}
