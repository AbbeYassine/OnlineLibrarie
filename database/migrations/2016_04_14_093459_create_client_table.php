<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("client", function (Blueprint $table) {
            $table->increments("client_id");
            $table->string("email", 40);
            $table->string("password", 100);
            $table->string("first_name", 40);
            $table->string("last_name", 40);
            $table->string("street", 12);
            $table->string("zip", 5);
            $table->string("phone", 12);
            $table->string("avatar", 100);
            $table->string("val_activation", 32);
            $table->integer("active");
            $table->integer("ville_id");
            $table->boolean("confirmed")->default(0);
            $table->string("confirmation_code")->nullable();
            $table->rememberToken();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('client');
    }
}
