<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('user_type', ['Заказчик', 'Исполнитель'])->nullable();
            $table->string('email')->unique();
            $table->string('login')->unique()->nullable();
            $table->string('password')->nullable();
            $table->enum('gender', ['Мужчина', 'Женщина'])->nullable();
            $table->string('name')->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
