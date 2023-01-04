<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnDeclaracionJurada extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'rh_trn_declaraciones_juradas';
}
