<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert([
            'libelle' => 'Literature'
        ]);
        DB::table('type')->insert([
            'libelle' => 'Art'
        ]);
        DB::table('type')->insert([
            'libelle' => 'History'
        ]);
        DB::table('type')->insert([
            'libelle' => 'Architecture'
        ]);
        DB::table('type')->insert([
            'libelle' => 'Scientific'
        ]);
        DB::table('type')->insert([
            'libelle' => 'Culture'
        ]);
        DB::table('type')->insert([
            'libelle' => 'Education'
        ]);
        DB::table('type')->insert([
            'libelle' => 'PRATICAL LIFE'
        ]);
        DB::table('type')->insert([
            'libelle' => 'Social Science'
        ]);

    }
}
