<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhClGeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_cl_generos')->insert([
            'descripcion_genero'    => 'MASCULINO',
        ]);
        DB::table('rh_cl_generos')->insert([
            'descripcion_genero'    => 'FEMENINO',
        ]);
    }
}
