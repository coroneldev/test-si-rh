<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhClInstitucion extends Model
{
    use HasFactory;

    protected $table = 'rh_cl_instituciones';
    protected $fillable = ['nombre', 'sigla', 'tipo'];

    
    public function curso()
    {
        return $this->hasMany(RhTrnCurso::class, 'id');
    }
    
}
