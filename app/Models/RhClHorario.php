<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhClHorario extends Model
{
    use HasFactory;
    protected $table = 'rh_cl_horarios';

    
    public function datosLaborales()
    {
        return $this->hasMany(RhTrnDatoLaboral::class, 'id');
    }
}
