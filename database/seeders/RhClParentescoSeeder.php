<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhClParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_cl_parentescos')->insert([
            'descripcion_parentesco' => 'PADRE',
        ]);
        DB::table('rh_cl_parentescos')->insert([
            'descripcion_parentesco' => 'MADRE',
        ]);
        DB::table('rh_cl_parentescos')->insert([
            'descripcion_parentesco' => 'HIJO',
        ]);
        DB::table('rh_cl_parentescos')->insert([
            'descripcion_parentesco' => 'HERMANO',
        ]);
        
    }
}
