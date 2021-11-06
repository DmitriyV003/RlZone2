<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemModificationChestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_modification_chest', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('item_modification_id');
            $table->unsignedBigInteger('chest_id');

            $table->foreign('item_modification_id')->references('id')->on('item_modifications');
            $table->foreign('chest_id')->references('id')->on('chests');
            $table->unique('item_modification_id', 'chest_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_modification_chest');
    }
}
