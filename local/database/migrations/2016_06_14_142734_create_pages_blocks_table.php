<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('block_id')->unsigned()->index(); 
            $table->integer('page_id')->unsigned()->index();  
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');  
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages_blocks');
    }
}
