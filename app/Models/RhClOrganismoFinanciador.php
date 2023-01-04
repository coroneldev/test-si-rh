<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhClOrganismoFinanciador extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'rh_cl_organismos_financiadores';

    public function datosLaborales()
    {
        return $this->hasMany(RhTrnDatoLaboral::class, 'id');
    }
}
