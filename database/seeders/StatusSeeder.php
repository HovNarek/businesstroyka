<?php

namespace Database\Seeders;

use App\Models\Admin\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'status' => 'Без статуса'
        ]);
        Status::create([
            'status' => 'Занят'
        ]);
        Status::create([
            'status' => 'Свободен'
        ]);
        Status::create([
            'status' => 'Отсутствую'
        ]);
    }
}
