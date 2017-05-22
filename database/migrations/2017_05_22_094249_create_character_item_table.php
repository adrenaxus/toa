<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_item', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('item_id')->unsigned();
            $table->integer('character_id')->unsigned();
            $table->timestamps(); 
            
            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onDelete('cascade');
            $table->foreign('character_id')
                ->references('id')->on('characters')
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
        Schema::drop('character_item');
    }
}
