<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCraftAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('craft_attempts', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('price', 12, 5);
            $table->boolean('is_win');
            $table->integer('chosen_percent');
            $table->integer('actual_percent');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item_modification_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_modification_id')->references('id')->on('item_modifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('craft_attempts');
    }
}
