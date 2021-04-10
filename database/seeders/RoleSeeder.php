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
            'super_admin' => 'Главный администратор',
            'moderator' => 'Модератор',
            'regional_manager' => 'Региональный менеджер',
        ]);
    }
}
