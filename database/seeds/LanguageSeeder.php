<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langue')->insert([
            'libelle' => 'francais'
        ]);
        DB::table('langue')->insert([
            'libelle' => 'anglais'
        ]);
    }
}
