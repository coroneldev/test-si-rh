<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhClCiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'LA PAZ',
            'sigla'               => 'LP',
        ]);
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'COCHABAMBA',
            'sigla'               => 'CB',
        ]);
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'ORURO',
            'sigla'               => 'OR',
        ]);
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'CHUQUISACA',
            'sigla'               => 'CH',
        ]);
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'POTOSI',
            'sigla'               => 'PT',
        ]);
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'TARIJA',
            'sigla'               => 'TJ',
        ]);
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'SANTA CRUZ',
            'sigla'               => 'SC',
        ]);
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'BENI',
            'sigla'               => 'BE',
        ]);
        DB::table('rh_cl_ciudades')->insert([
            'nombre_ciudad'       => 'PANDO',
            'sigla'               => 'PD',
        ]);
    }
}
