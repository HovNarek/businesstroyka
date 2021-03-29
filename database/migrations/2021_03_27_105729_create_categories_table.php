<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_title');
            $table->string('cat_keyword');
            $table->tinyInteger('cat_enabled')->default(0);
            $table->string('cat_mtitle')->nullable();
            $table->string('cat_mkeywords')->nullable();
            $table->string('cat_mdescription')->nullable();
            $table->tinyInteger('cat_pay')->default(0);
            $table->integer('cat_price')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
