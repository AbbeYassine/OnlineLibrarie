<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLigneCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("ligne_commande", function (Blueprint $table) {
            $table->increments("ligne_commande_id");
            $table->integer("quantite");


            $table->integer("commande_id")->unsigned();
            $table->foreign("commande_id")->references("commande_id")->on("commande")
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer("livre_id")->unsigned();
            $table->foreign("livre_id")->references("livre_id")->on("livre")
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
        Schema::table('ligne_commande', function (Blueprint $table) {
            $table->dropForeign('ligne_commande_commande_id_foreign');
            $table->dropForeign('ligne_commande_livre_id_foreign');

        });
        Schema::drop('ligne_commande');
    }
}
