<?php

use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ville')->insert([
            'libelle' => "sfax",
            'pays_id' => 1
        ]);
    }
}
