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
            ['cat_id' => '24','spec_id' => '55'],
            ['cat_id' => '24','spec_id' => '54'],
            ['cat_id' => '24','spec_id' => '52'],
            ['cat_id' => '23','spec_id' => '51'],
            ['cat_id' => '23','spec_id' => '50'],
            ['cat_id' => '21','spec_id' => '45'],
            ['cat_id' => '23','spec_id' => '18'],
            ['cat_id' => '22','spec_id' => '49'],
            ['cat_id' => '22','spec_id' => '48'],
            ['cat_id' => '22','spec_id' => '47'],
            ['cat_id' => '21','spec_id' => '46'],
            ['cat_id' => '21','spec_id' => '44'],
            ['cat_id' => '21','spec_id' => '43'],
            ['cat_id' => '20','spec_id' => '42'],
            ['cat_id' => '20','spec_id' => '41'],
            ['cat_id' => '20','spec_id' => '40'],
            ['cat_id' => '20','spec_id' => '39'],
            ['cat_id' => '15','spec_id' => '82'],
            ['cat_id' => '15','spec_id' => '29'],
            ['cat_id' => '15','spec_id' => '28'],
            ['cat_id' => '15','spec_id' => '27'],
            ['cat_id' => '15','spec_id' => '25'],
            ['cat_id' => '15','spec_id' => '24'],
            ['cat_id' => '15','spec_id' => '23'],
            ['cat_id' => '14','spec_id' => '21'],
            ['cat_id' => '14','spec_id' => '19'],
            ['cat_id' => '29','spec_id' => '80'],
            ['cat_id' => '29','spec_id' => '79'],
            ['cat_id' => '29','spec_id' => '78'],
            ['cat_id' => '29','spec_id' => '77'],
            ['cat_id' => '29','spec_id' => '76'],
            ['cat_id' => '29','spec_id' => '53'],
            ['cat_id' => '19','spec_id' => '34'],
            ['cat_id' => '18','spec_id' => '38'],
            ['cat_id' => '18','spec_id' => '37'],
            ['cat_id' => '18','spec_id' => '35'],
            ['cat_id' => '17','spec_id' => '33'],
            ['cat_id' => '17','spec_id' => '32'],
            ['cat_id' => '16','spec_id' => '31'],
            ['cat_id' => '16','spec_id' => '30'],
            ['cat_id' => '16','spec_id' => '26'],
            ['cat_id' => '31','spec_id' => '86'],
            ['cat_id' => '30','spec_id' => '52'],
            ['cat_id' => '30','spec_id' => '81'],
            ['cat_id' => '30','spec_id' => '83'],
            ['cat_id' => '28','spec_id' => '87'],
            ['cat_id' => '28','spec_id' => '75'],
            ['cat_id' => '10','spec_id' => '69'],
            ['cat_id' => '10','spec_id' => '70'],
            ['cat_id' => '10','spec_id' => '71'],
            ['cat_id' => '10','spec_id' => '72'],
            ['cat_id' => '10','spec_id' => '73'],
            ['cat_id' => '10','spec_id' => '74'],
            ['cat_id' => '10','spec_id' => '68'],
            ['cat_id' => '28','spec_id' => '61'],
            ['cat_id' => '27','spec_id' => '66'],
            ['cat_id' => '27','spec_id' => '65'],
            ['cat_id' => '27','spec_id' => '64'],
            ['cat_id' => '26','spec_id' => '63'],
            ['cat_id' => '26','spec_id' => '62'],
            ['cat_id' => '26','spec_id' => '60'],
            ['cat_id' => '15','spec_id' => '22'],
            ['cat_id' => '25','spec_id' => '59'],
            ['cat_id' => '25','spec_id' => '58'],
            ['cat_id' => '25','spec_id' => '56'],
            ['cat_id' => '13','spec_id' => '17'],
            ['cat_id' => '13','spec_id' => '16'],
            ['cat_id' => '13','spec_id' => '15'],
            ['cat_id' => '13','spec_id' => '14'],
            ['cat_id' => '13','spec_id' => '13'],
            ['cat_id' => '10','spec_id' => '89'],
            ['cat_id' => '30','spec_id' => '85'],
            ['cat_id' => '33','spec_id' => '95'],
            ['cat_id' => '33','spec_id' => '94'],
            ['cat_id' => '33','spec_id' => '93'],
            ['cat_id' => '33','spec_id' => '96']
        ];

        $data = [];

        foreach ($cat_specs as $key => $cat_spec) {
            $data [] = [
                'cat_id' => $cat_spec['cat_id'],
                'spec_id' => $cat_spec['spec_id'],
                'created_at' => Carbon::now()->format('Y-m-d h-i-s'),
                'updated_at' => Carbon::now()->format('Y-m-d h-i-s')

            ];
        }

        DB::table('category_specialization')->insert($data);
    }
}
