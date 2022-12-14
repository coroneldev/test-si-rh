<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnAcceso extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rh_trn_accesos';
    protected $fillable = [
        'user_id',
        'sistema_id',
        'roles_id',
        'vigente',
    ];
    
}
