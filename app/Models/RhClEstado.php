<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhClEstado extends Model
{
    use HasFactory;
    protected $table = 'rh_cl_estados';
    protected $fillable = ['seccion_id', 'descripcion'];
}