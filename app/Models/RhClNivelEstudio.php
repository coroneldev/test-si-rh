<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhClNivelEstudio extends Model
{
    use HasFactory;
    protected $table = 'rh_cl_niveles_estudios';
    protected $fillable = ['descripcion'];
}
