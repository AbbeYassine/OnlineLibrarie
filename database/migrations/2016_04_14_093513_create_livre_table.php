<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("livre",function(Blueprint $table) {
            $table->increments("livre_id");
            $table->string('nom', 30);
            $table->integer('prix');
            $table->integer('quantite_stock');
            $table->string("image",100);
            

            $table->integer("langue_id")->unsigned();
            $table->foreign("langue_id")->references("langue_id")->on("langue")
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer("type_id")->unsigned();
            $table->foreign("type_id")->references("type_id")->on("type")
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
         Schema::table('livre', function (Blueprint $table) {
            $table->dropForeign('livre_langue_id_foreign');
            $table->dropForeign('livre_type_id_foreign');
        });
        Schema::drop('livre');
    }
}
