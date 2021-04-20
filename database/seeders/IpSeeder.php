<?php

namespace Database\Seeders;

use App\Models\Admin\Ip;
use Illuminate\Database\Seeder;

class IpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ip::create([
            'user_id' => 1,
            'ip' => request()->ip(),
        ]);
        Ip::create([
            'user_id' => 2,
            'ip' => request()->ip(),
        ]);
    }
}
