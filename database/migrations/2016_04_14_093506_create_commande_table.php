<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create("commande",function(Blueprint $table){
            $table->increments("commande_id");
            $table->date('date_commande');
             
             
            $table->integer("client_id")->unsigned();
            $table->foreign("client_id")->references("client_id")->on("client")
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
        Schema::table('commande', function (Blueprint $table) {
            $table->dropForeign('client_client_id_foreign');
        });
        Schema::drop('commande');
    }
}
