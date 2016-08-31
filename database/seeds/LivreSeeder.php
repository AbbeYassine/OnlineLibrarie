<?php

use Illuminate\Database\Seeder;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livre')->insert([
            'nom' => 'La Bible de Jérusalem' ,
            'prix' => '13' ,
            'quantite_stock' => '15' ,
            'langue_id' => '1' ,
            'type_id' => '1'
        ]);
        DB::table('livre')->insert([
            'nom' => 'Les Misérables I' ,
            'prix' => '13' ,
            'quantite_stock' => '15' ,
            'langue_id' => '1' ,
            'type_id' => '1'
        ]);
        DB::table('livre')->insert([
            'nom' => 'Le Petit Prince' ,
            'prix' => '13' ,
            'quantite_stock' => '15' ,
            'langue_id' => '1' ,
            'type_id' => '1'
        ]);
        DB::table('livre')->insert([
            'nom' => 'Les Rougon-Macquart, tome 13 : Germinal ' ,
            'prix' => '13' ,
            'quantite_stock' => '15' ,
            'langue_id' => '1' ,
            'type_id' => '1'
        ]);
        DB::table('livre')->insert([
            'nom' => 'Le Rouge et le Noir' ,
            'prix' => '13' ,
            'quantite_stock' => '15' ,
            'langue_id' => '1' ,
            'type_id' => '1'
        ]);
        DB::table('livre')->insert([
            'nom' => 'Le Grand Meaulnes' ,
            'prix' => '13' ,
            'quantite_stock' => '15' ,
            'langue_id' => '1' ,
            'type_id' => '1'
        ]);
        DB::table('livre')->insert([
            'nom' => 'Jamais sans ma fille' ,
            'prix' => '13' ,
            'quantite_stock' => '15' ,
            'langue_id' => '1' ,
            'type_id' => '1'
        ]);
        DB::table('livre')->insert([
            'nom' => 'Les Trois mousquetaires' ,
            'prix' => '13' ,
            'quantite_stock' => '15' ,
            'langue_id' => '1' ,
            'type_id' => '1'
        ]);
    }
}
