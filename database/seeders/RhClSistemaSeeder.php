<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhClSistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_cl_sistemas')->insert([
            'nombre_sistema'      => 'RECURSOS HUMANOS',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_sistemas')->insert([
            'nombre_sistema'      => 'ACTIVOS FIJOS',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_sistemas')->insert([
            'nombre_sistema'      => 'PASAJES Y VIATICOS',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_sistemas')->insert([
            'nombre_sistema'      => 'ARCHIVOS',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_sistemas')->insert([
            'nombre_sistema'      => 'ALMACENES',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_sistemas')->insert([
            'nombre_sistema'      => 'PROGRAMA OPERATIVO ANUAL',
            'activo'              => 1,
        ]);
    }
}
