<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuteurLivreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("auteur_livre", function (Blueprint $table) {
            $table->increments("auteur_livre_id");


            $table->integer("auteur_id")->unsigned();
            $table->foreign("auteur_id")->references("auteur_id")->on("auteur");

            $table->integer("livre_id")->unsigned();
            $table->foreign("livre_id")->references("livre_id")->on("livre");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auteur_livre', function (Blueprint $table) {
            $table->dropForeign('auteur_livre_auteur_id_foreign');
            $table->dropForeign('auteur_livre_livre_id_foreign');

        });
        Schema::drop("auteur_livre");
    }
}
