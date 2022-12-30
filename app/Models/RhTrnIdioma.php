<?php

namespace App\Models;

use Database\Seeders\RhClIdiomaSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RhTrnIdioma extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rh_trn_idiomas';

    protected $fillable = [
        'persona_id',
        'idioma_id',
        'estado_id',
        'nivel_conocimiento_id',
        'vigente',
    ];

    public function persona()
    {
        return $this->belongsTo(RhTrnPersona::class, 'persona_id');
    }
    public function idioma()
    {
        return $this->belongsTo(RhClIdioma::class, 'idioma_id');
    }
    public function estado()
    {
        return $this->belongsTo(RhClEstado::class, 'estado_id');
    }
    public function nivelConocimiento()
    {
        return $this->belongsTo(RhClEstado::class, 'nivel_conocimiento_id');
    }

}
