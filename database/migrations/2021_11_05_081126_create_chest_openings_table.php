<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChestOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chest_openings', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('price', 12, 5);
            $table->unsignedBigInteger('item_modification_id');
            $table->unsignedBigInteger('chest_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('item_modification_id')->references('id')->on('item_modifications');
            $table->foreign('chest_id')->references('id')->on('chests');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chest_openings');
    }
}
