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

            $table->string('balance')->default('0.00');
            $table->string('balance_spent')->default('0.00');
            $table->integer('rating')->default(0);
            $table->boolean('blocked')->default(false);
            $table->string('block_reason')->nullable();
            $table->string('surname')->nullable();
            $table->string('midname')->nullable();
            $table->string('street')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('specialization_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->string('status_desc')->nullable();
            $table->string('icq')->nullable();
            $table->string('skype')->nullable();
            $table->string('site')->nullable();
            $table->boolean('show_info')->default(false);
            $table->string('about')->nullable();
            $table->boolean('new_messages')->default(true);
            $table->boolean('new_orders_offers')->default(false);
            $table->dateTime('last_activity')->nullable();
            $table->boolean('is_logout')->default(false);


            $table->rememberToken();
            $table->timestamps();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities');

            $table->foreign('specialization_id')
                ->references('id')
                ->on('specializations');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');
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
