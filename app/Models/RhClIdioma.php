<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhClIdioma extends Model
{
    use HasFactory;
    protected $table = 'rh_cl_idiomas';

    public function idiomas()
    {
        return $this->hasMany(RhTrnIdioma::class, 'id');
    }
}
