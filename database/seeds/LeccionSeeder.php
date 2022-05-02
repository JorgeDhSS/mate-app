<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leccions')->insert([
            [
                'nombre' => 'Conteo'
            ], 
            [
                'nombre' => 'Suma'
            ],
            [
                'nombre' => 'Resta'
            ],
            [
                'nombre' => 'Multiplicación'
            ],
            [
                'nombre' => 'División'
            ]
        ]);
    }
}
