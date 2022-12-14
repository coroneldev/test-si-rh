<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhClRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_cl_roles')->insert([
            'nombre_rol'          => 'SUPER ADMINISTRADOR',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_roles')->insert([
            'nombre_rol'          => 'ADMINISTRADOR',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_roles')->insert([
            'nombre_rol'          => 'USUARIO ESPECIAL',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_roles')->insert([
            'nombre_rol'          => 'USUARIO NORMAL',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_roles')->insert([
            'nombre_rol'          => 'REPORTE GERENCIAL',
            'activo'              => 1,
        ]);
        DB::table('rh_cl_roles')->insert([
            'nombre_rol'          => 'REPORTE GENERICO',
            'activo'              => 1,
        ]);
    }
}
