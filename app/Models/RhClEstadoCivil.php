<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhClEstadoCivil extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rh_cl_estados_civiles';

    protected $fillable = ['descripcion_est_civil'];

    public function personas()
    {
        return $this->hasMany(RhTrnPersona::class, 'id');
    }
}
