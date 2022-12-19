<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RhClSistemaSeeder::class);
        $this->call(RhClRolSeeder::class);
        $this->call(RhClEstadoSeeder::class);
        $this->call(RhClEstadoCivilSeeder::class);
        $this->call(RhClGeneroSeeder::class);
        $this->call(RhClPaisSeeder::class);
        $this->call(RhClCiudadSeeder::class);
        $this->call(RhClParentescoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RhTrnPersonaSeeder::class);
        $this->call(RhTrnParentescoSeeder::class);
        $this->call(RhClTipoDocumentoSeeder::class);
        $this->call(RhTrnDeclaracionJuradaSeeder::class);
        $this->call(RhTrnDocumentoDigitalSeeder::class);
    }
}
