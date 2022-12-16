<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhClParentesco extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rh_cl_parentescos';


    protected $fillable = ['descripcion_parentesco'];

    public function parentescos()
    {
        return $this->hasMany(RhTrnPersona::class, 'id');
    }
}
