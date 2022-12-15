<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhClPais extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rh_cl_paises';

    protected $fillable = ['nombre_pais'];

    public function personas()
    {
        return $this->hasMany(RhTrnPersona::class, 'id');
    }

}
