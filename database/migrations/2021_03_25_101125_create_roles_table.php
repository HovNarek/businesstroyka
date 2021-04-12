<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name');
            $table->boolean('banners_create')->default(false);
            $table->boolean('banners_edit')->default(false);
            $table->boolean('banners_view')->default(false);
            $table->boolean('invoices_view')->default(false);
            $table->boolean('invoices_management')->default(false);
            $table->boolean('applications_view')->default(false);
            $table->boolean('applications_management')->default(false);
            $table->boolean('applications_deleting')->default(false);
            $table->boolean('users_profile')->default(false);
            $table->boolean('users_view')->default(false);
            $table->boolean('users_management')->default(false);
            $table->boolean('roles_show')->default(false);
            $table->boolean('roles_management')->default(false);
            $table->boolean('feedbacks_management')->default(false);
            $table->boolean('general_settings')->default(false);
            $table->boolean('counters')->default(false);
            $table->boolean('moderation_new_cities')->default(false);
            $table->boolean('regions_view')->default(false);
            $table->boolean('sitemap_view')->default(false);
            $table->boolean('sitemap_management')->default(false);
            $table->boolean('pages_view')->default(false);
            $table->boolean('pages_management')->default(false);
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
        Schema::dropIfExists('roles');
    }
}
