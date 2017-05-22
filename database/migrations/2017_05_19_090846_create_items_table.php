<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('item_category_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('icon');
            $table->timestamps(); 
            
            $table->foreign('item_category_id')
                ->references('id')->on('item_categories')
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
        Schema::drop('items');
    }
}
