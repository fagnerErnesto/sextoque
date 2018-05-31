<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('item_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id')->unsigned();
            $table->double('buy_price');
            $table->double('sell_price');
            $table->integer('quantity');
            $table->boolean('in_active');
            $table->timestamps();
        });

        Schema::table('item_value', function ($table){
            $table->foreign('item_id')
                ->references('id')
                ->on('item')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_value');
    }
}
