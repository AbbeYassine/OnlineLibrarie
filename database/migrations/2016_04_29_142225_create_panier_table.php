<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("panier", function (Blueprint $table) {
            $table->increments("panier_id");

            $table->integer("user_id");
            $table->integer("livre_id");
            $table->integer("Quantite");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("panier");
    }
}
