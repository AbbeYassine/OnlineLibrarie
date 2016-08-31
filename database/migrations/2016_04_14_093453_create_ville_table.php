<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create("ville",function(Blueprint $table){
            $table->increments("ville_id");
            $table->string("libelle",40);
            
            $table->integer("pays_id")->unsigned();
            $table->foreign("pays_id")->references("pays_id")->on("pays")
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });    
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ville', function (Blueprint $table) {
            $table->dropForeign('ville_pays_id_foreign');
        });
        Schema::drop('ville');
    }
}
