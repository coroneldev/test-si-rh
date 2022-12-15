<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhClEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_cl_estados')->insert([
            'descripcion_estado'    => 'CONCLUIDO',
        ]);
        DB::table('rh_cl_estados')->insert([
            'descripcion_estado'    => 'EN PROCESO',
        ]);
        DB::table('rh_cl_estados')->insert([
            'descripcion_estado'    => 'EN CURSO',
        ]);
    }
}
