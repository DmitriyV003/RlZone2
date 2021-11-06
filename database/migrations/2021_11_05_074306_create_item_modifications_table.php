<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_modifications', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_visible_for_user')->default(false);
            $table->string('type');
            $table->unsignedDecimal('price', 12, 5);
            $table->unsignedDecimal('sell_price', 12, 5);
            $table->unsignedDecimal('old_price', 12, 5)->nullable();
            $table->integer('weight')->default(0);
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('quality_id');
            $table->unsignedBigInteger('rarity_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('quality_id')->references('id')->on('qualities');
            $table->foreign('rarity_id')->references('id')->on('rarities');
            $table->foreign('item_id')->references('id')->on('items');
            $table->unique(['quality_id', 'rarity_id', 'item_id', 'weight']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_characteristics');
    }
}
