<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'                      => 'rperez',
            'email'                     => 'rperez@gmail.com',
            'password'                  => '$2y$10$13Yfd5vgVjfuQWA174C8NenucdvgsYbeM0VZ1K6bckESa.KoFyHhe',
        ]);
    }
}
