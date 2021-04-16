<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_type' => 'Заказчик',
            'email' => 'admin@mail.ru',
            'login' => 'admin',
            'password' => Hash::make('adminadmin'),
            'gender' => 'Мужчина',
            'name' => 'Narek_admin',
            'city_id' => 134,
            'email_verified_at' => Carbon::now()->format('Y-m-d h:i:s'),
            'last_activity' => Carbon::now()->format('Y-m-d h:i:s'),
        ]);
        User::create([
            'user_type' => 'Заказчик',
            'email' => 'user@mail.ru',
            'login' => 'user',
            'password' => Hash::make('useruser'),
            'gender' => 'Мужчина',
            'name' => 'User',
            'city_id' => 134,
            'email_verified_at' => Carbon::now()->format('Y-m-d h:i:s'),
            'last_activity' => Carbon::now()->format('Y-m-d h:i:s'),
        ]);
    }
}
