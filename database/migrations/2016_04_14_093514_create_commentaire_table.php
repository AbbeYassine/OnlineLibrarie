    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("commentaire",function(Blueprint $table){
            $table->increments("commentaire_id");
            $table->string("content",100);
            
            $table->double("rating");
            $table->integer("client_id")->unsigned();
            $table->foreign("client_id")->references("client_id")->on("client")
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
        Schema::table('commentaire', function (Blueprint $table) {
            $table->dropForeign('commentaire_client_id_foreign');
            $table->dropForeign('commentaire_livre_id_foreign');

        });
        Schema::drop("commentaire");
    }
}
