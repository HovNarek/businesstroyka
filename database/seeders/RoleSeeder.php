<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_name' => 'Главный администратор',
            'banners_create' => true,
            'banners_edit' => true,
            'banners_view' => true,
            'invoices_view' => true,
            'invoices_management' => true,
            'applications_view' => true,
            'applications_management' => true,
            'applications_deleting' => true,
            'users_profile' => true,
            'users_view' => true,
            'users_management' => true,
            'roles_show' => true,
            'roles_management' => true,
            'feedbacks_management' => true,
            'general_settings' => true,
            'counters' => true,
            'moderation_new_cities' => true,
            'regions_view' => true,
            'sitemap_view' => true,
            'sitemap_management' => true,
            'pages_view' => true,
            'pages_management' => true,
        ]);

        Role::create([
            'role_name' => 'Модератор',
            'banners_create' => false,
            'banners_edit' => false,
            'banners_view' => false,
            'invoices_view' => true,
            'invoices_management' => false,
            'applications_view' => true,
            'applications_management' => true,
            'applications_deleting' => false,
            'users_profile' => true,
            'users_view' => true,
            'users_management' => true,
            'roles_show' => false,
            'roles_management' => false,
            'feedbacks_management' => true,
            'general_settings' => false,
            'counters' => false,
            'moderation_new_cities' => true,
            'regions_view' => true,
            'sitemap_view' => false,
            'sitemap_management' => false,
            'pages_view' => false,
            'pages_management' => false,
        ]);

        Role::create([
            'role_name' => 'Региональный менеджер',
            'banners_create' => true,
            'banners_edit' => true,
            'banners_view' => true,
            'invoices_view' => false,
            'invoices_management' => false,
            'applications_view' => false,
            'applications_management' => false,
            'applications_deleting' => false,
            'users_profile' => true,
            'users_view' => false,
            'users_management' => false,
            'roles_show' => false,
            'roles_management' => false,
            'feedbacks_management' => false,
            'general_settings' => false,
            'counters' => false,
            'moderation_new_cities' => false,
            'regions_view' => false,
            'sitemap_view' => false,
            'sitemap_management' => false,
            'pages_view' => false,
            'pages_management' => false,
        ]);
    }
}
