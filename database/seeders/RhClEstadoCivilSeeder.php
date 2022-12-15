<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhClEstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_cl_estados_civiles')->insert([
            'descripcion_est_civil'    => 'SOLTERO',
            'sigla'                    => 'SOL',
        ]);
        DB::table('rh_cl_estados_civiles')->insert([
            'descripcion_est_civil'    => 'CASADO',
            'sigla'                    => 'CAS',
        ]);
        DB::table('rh_cl_estados_civiles')->insert([
            'descripcion_est_civil'    => 'VIUDO',
            'sigla'                    => 'VIU',
        ]);
        DB::table('rh_cl_estados_civiles')->insert([
            'descripcion_est_civil'    => 'DIVORCIADO',
            'sigla'                    => 'DIV',
        ]);
    }
}
