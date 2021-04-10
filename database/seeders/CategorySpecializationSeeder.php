<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat_specs = [
            ['category_id' => '24','specialization_id' => '55'],
            ['category_id' => '24','specialization_id' => '54'],
            ['category_id' => '24','specialization_id' => '52'],
            ['category_id' => '23','specialization_id' => '51'],
            ['category_id' => '23','specialization_id' => '50'],
            ['category_id' => '21','specialization_id' => '45'],
            ['category_id' => '23','specialization_id' => '18'],
            ['category_id' => '22','specialization_id' => '49'],
            ['category_id' => '22','specialization_id' => '48'],
            ['category_id' => '22','specialization_id' => '47'],
            ['category_id' => '21','specialization_id' => '46'],
            ['category_id' => '21','specialization_id' => '44'],
            ['category_id' => '21','specialization_id' => '43'],
            ['category_id' => '20','specialization_id' => '42'],
            ['category_id' => '20','specialization_id' => '41'],
            ['category_id' => '20','specialization_id' => '40'],
            ['category_id' => '20','specialization_id' => '39'],
            ['category_id' => '15','specialization_id' => '82'],
            ['category_id' => '15','specialization_id' => '29'],
            ['category_id' => '15','specialization_id' => '28'],
            ['category_id' => '15','specialization_id' => '27'],
            ['category_id' => '15','specialization_id' => '25'],
            ['category_id' => '15','specialization_id' => '24'],
            ['category_id' => '15','specialization_id' => '23'],
            ['category_id' => '14','specialization_id' => '21'],
            ['category_id' => '14','specialization_id' => '19'],
            ['category_id' => '29','specialization_id' => '80'],
            ['category_id' => '29','specialization_id' => '79'],
            ['category_id' => '29','specialization_id' => '78'],
            ['category_id' => '29','specialization_id' => '77'],
            ['category_id' => '29','specialization_id' => '76'],
            ['category_id' => '29','specialization_id' => '53'],
            ['category_id' => '19','specialization_id' => '34'],
            ['category_id' => '18','specialization_id' => '38'],
            ['category_id' => '18','specialization_id' => '37'],
            ['category_id' => '18','specialization_id' => '35'],
            ['category_id' => '17','specialization_id' => '33'],
            ['category_id' => '17','specialization_id' => '32'],
            ['category_id' => '16','specialization_id' => '31'],
            ['category_id' => '16','specialization_id' => '30'],
            ['category_id' => '16','specialization_id' => '26'],
            ['category_id' => '31','specialization_id' => '86'],
            ['category_id' => '30','specialization_id' => '52'],
            ['category_id' => '30','specialization_id' => '81'],
            ['category_id' => '30','specialization_id' => '83'],
            ['category_id' => '28','specialization_id' => '87'],
            ['category_id' => '28','specialization_id' => '75'],
            ['category_id' => '10','specialization_id' => '69'],
            ['category_id' => '10','specialization_id' => '70'],
            ['category_id' => '10','specialization_id' => '71'],
            ['category_id' => '10','specialization_id' => '72'],
            ['category_id' => '10','specialization_id' => '73'],
            ['category_id' => '10','specialization_id' => '74'],
            ['category_id' => '10','specialization_id' => '68'],
            ['category_id' => '28','specialization_id' => '61'],
            ['category_id' => '27','specialization_id' => '66'],
            ['category_id' => '27','specialization_id' => '65'],
            ['category_id' => '27','specialization_id' => '64'],
            ['category_id' => '26','specialization_id' => '63'],
            ['category_id' => '26','specialization_id' => '62'],
            ['category_id' => '26','specialization_id' => '60'],
            ['category_id' => '15','specialization_id' => '22'],
            ['category_id' => '25','specialization_id' => '59'],
            ['category_id' => '25','specialization_id' => '58'],
            ['category_id' => '25','specialization_id' => '56'],
            ['category_id' => '13','specialization_id' => '17'],
            ['category_id' => '13','specialization_id' => '16'],
            ['category_id' => '13','specialization_id' => '15'],
            ['category_id' => '13','specialization_id' => '14'],
            ['category_id' => '13','specialization_id' => '13'],
            ['category_id' => '10','specialization_id' => '89'],
            ['category_id' => '30','specialization_id' => '85'],
            ['category_id' => '33','specialization_id' => '95'],
            ['category_id' => '33','specialization_id' => '94'],
            ['category_id' => '33','specialization_id' => '93'],
            ['category_id' => '33','specialization_id' => '96']
        ];

        $data = [];

        foreach ($cat_specs as $key => $cat_spec) {
            $data [] = [
                'category_id' => $cat_spec['category_id'],
                'specialization_id' => $cat_spec['specialization_id'],
                'created_at' => Carbon::now()->format('Y-m-d h-i-s'),
                'updated_at' => Carbon::now()->format('Y-m-d h-i-s')

            ];
        }

        DB::table('category_specialization')->insert($data);
    }
}
