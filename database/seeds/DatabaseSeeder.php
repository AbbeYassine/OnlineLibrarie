<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        /*$this->call(PaysSeeder::class);
        $this->call(VilleSeeder::class);*/
        $this->call(TypeSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(LivreSeeder::class);
        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
