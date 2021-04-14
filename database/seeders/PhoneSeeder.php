<?php

namespace Database\Seeders;

use App\Models\Admin\Phone;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::create([
            'phone' => '+7(374) 912-6645',
            'user_id' => 1,
        ]);
        Phone::create([
            'phone' => '+7(374) 962-6645',
            'user_id' => 2,
        ]);
    }
}
