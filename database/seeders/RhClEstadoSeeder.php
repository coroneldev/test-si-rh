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
           // 'seccion_id'            => '3',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
        DB::table('rh_cl_estados')->insert([
            'descripcion_estado'    => 'EN PROCESO',
            //'seccion_id'            => '3',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
        DB::table('rh_cl_estados')->insert([
            'descripcion_estado'    => 'EN CURSO',
            //'seccion_id'            => '3',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
        DB::table('rh_cl_estados')->insert([
            'descripcion_estado'    => 'LEE',
            //'seccion_id'            => '6',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
        DB::table('rh_cl_estados')->insert([
            'descripcion_estado'    => 'ESCRIBE',
           // 'seccion_id'            => '6',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
        DB::table('rh_cl_estados')->insert([
            'descripcion_estado'    => 'HABLA',
           // 'seccion_id'            => '6',
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
    }
}
