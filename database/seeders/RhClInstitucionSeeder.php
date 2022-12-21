<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhClInstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_cl_instituciones')->insert([
            'nombre'                => 'UNIVERSIDAD MAYOR DE SAN ANDRES',
            'sigla'                 => 'UMSA',
            'tipo'                  => '1',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
        DB::table('rh_cl_instituciones')->insert([
            'nombre'                => 'UNIVERSIDAD PUBLICA DE EL ALTO',
            'sigla'                 => 'UPEA',
            'tipo'                  => '1',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
        DB::table('rh_cl_instituciones')->insert([
            'nombre'                => 'OTRO',
            'sigla'                 => 'OTRO',
            'tipo'                  => '3',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
    }
}
