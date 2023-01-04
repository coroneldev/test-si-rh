<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhClClasificacion extends Model
{
    use HasFactory;
    protected $table = 'rh_cl_clasificaciones';

    public function datosLaborales()
    {
        return $this->hasMany(RhTrnDatoLaboral::class, 'id');
    }
}
