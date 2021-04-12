<?php

namespace Database\Seeders;

use App\Models\Admin\UserPhone;
use Illuminate\Database\Seeder;

class UserPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserPhone::create([
            'user_phone' => '+7(374) 912-6645',
            'user_id' => 1,
        ]);
    }
}
