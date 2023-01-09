<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RhTrnPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rh_trn_personas')->insert([
            'user_id'               =>   1,
            'estado_civil_id'       =>   1,
            'genero_id'             =>   1,
            'pais_id'               =>   1,
            'ciudad_id'             =>   1,
            'expedido_ci_id'        =>   1,
            'apellido_paterno'      =>  'CONTRERAS',
            'apellido_materno'      =>  'VASQUEZ',
            'nombres'               =>  'ARNOLD',
            'cedula_identidad'      =>  '6120501',
            'complemento_ci'        =>  '1',
            'fecha_nacimiento'      =>  '1900-02-02',
            'telefono_fijo'         =>  '2818181',
            'telefono_movil'        =>  '70000000',
            'correo_personal'       =>  'C_ARNOLD@GMAIL.COM',
            'nro_nua_afp'           =>  '1234567879',
            'nombre_afp'            =>  'BBVA',
            'nro_libreta_militar'   =>  '988754',
            'grupo_sanguineo'       =>  'OR+',
            'nro_nit'               =>  '6120501018',
            'nombre_seguro_medico'  =>  'CAJA PETROLERA',
            'nro_seguro_medico'     =>  '659832',
            'licencia_conducir'     =>  'TRUE',
            'licencia_categoria'    =>  'A',
            'domicilio'             =>  'ESQUINA ASPIAZU NRO 54, ZONA SOPOCACHI',
            'vigente'               =>  1,
            'identificador_dato_laboral' =>  0,
            'estado_finalizacion'   =>  0,
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),

        ]);
    }
}
