<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = array(
            array('id' => '3','title' => 'Московская область','enabled' => '1','main' => '0'),
            array('id' => '5','title' => 'Ленинградская область','enabled' => '1','main' => '1'),
            array('id' => '6','title' => 'Адыгея','enabled' => '1','main' => '0'),
            array('id' => '7','title' => 'Алтайский край','enabled' => '1','main' => '0'),
            array('id' => '8','title' => 'Амурская область','enabled' => '1','main' => '0'),
            array('id' => '9','title' => 'Архангельская область','enabled' => '1','main' => '0'),
            array('id' => '10','title' => 'Астраханская область','enabled' => '1','main' => '0'),
            array('id' => '11','title' => 'Башкортостан','enabled' => '1','main' => '1'),
            array('id' => '12','title' => 'Белгородская область','enabled' => '1','main' => '0'),
            array('id' => '13','title' => 'Брянская область','enabled' => '1','main' => '0'),
            array('id' => '14','title' => 'Бурятия','enabled' => '1','main' => '0'),
            array('id' => '15','title' => 'Владимирская область','enabled' => '1','main' => '0'),
            array('id' => '16','title' => 'Волгоградская область','enabled' => '1','main' => '0'),
            array('id' => '17','title' => 'Вологодская область','enabled' => '1','main' => '0'),
            array('id' => '18','title' => 'Воронежская область','enabled' => '1','main' => '0'),
            array('id' => '19','title' => 'Дагестан','enabled' => '1','main' => '0'),
            array('id' => '20','title' => 'Еврейская АО','enabled' => '1','main' => '0'),
            array('id' => '21','title' => 'Забайкальский край','enabled' => '1','main' => '0'),
            array('id' => '22','title' => 'Ивановская область','enabled' => '1','main' => '0'),
            array('id' => '23','title' => 'Ингушетия','enabled' => '1','main' => '0'),
            array('id' => '24','title' => 'Иркутская область','enabled' => '1','main' => '0'),
            array('id' => '25','title' => 'Кабардино-Балкария','enabled' => '1','main' => '0'),
            array('id' => '26','title' => 'Калининградская область','enabled' => '1','main' => '0'),
            array('id' => '27','title' => 'Калмыкия','enabled' => '1','main' => '0'),
            array('id' => '28','title' => 'Калужская область','enabled' => '1','main' => '0'),
            array('id' => '29','title' => 'Камчатский край','enabled' => '1','main' => '0'),
            array('id' => '30','title' => 'Карачаево-Черкесия','enabled' => '1','main' => '0'),
            array('id' => '31','title' => 'Карелия','enabled' => '1','main' => '0'),
            array('id' => '32','title' => 'Кемеровская область','enabled' => '1','main' => '0'),
            array('id' => '33','title' => 'Кировская область','enabled' => '1','main' => '0'),
            array('id' => '34','title' => 'Коми','enabled' => '1','main' => '0'),
            array('id' => '35','title' => 'Костромская область','enabled' => '1','main' => '0'),
            array('id' => '36','title' => 'Краснодарский край','enabled' => '1','main' => '0'),
            array('id' => '37','title' => 'Красноярский край','enabled' => '1','main' => '0'),
            array('id' => '38','title' => 'Курганская область','enabled' => '1','main' => '0'),
            array('id' => '39','title' => 'Курская область','enabled' => '1','main' => '0'),
            array('id' => '40','title' => 'Липецкая область','enabled' => '1','main' => '0'),
            array('id' => '41','title' => 'Магаданская область','enabled' => '1','main' => '0'),
            array('id' => '42','title' => 'Марий Эл','enabled' => '1','main' => '0'),
            array('id' => '43','title' => 'Мордовия','enabled' => '1','main' => '0'),
            array('id' => '44','title' => 'Мурманская область','enabled' => '1','main' => '0'),
            array('id' => '45','title' => 'Ненецкий АО','enabled' => '1','main' => '0'),
            array('id' => '46','title' => 'Нижегородская область','enabled' => '1','main' => '0'),
            array('id' => '47','title' => 'Новгородская область','enabled' => '1','main' => '0'),
            array('id' => '48','title' => 'Новосибирская область','enabled' => '1','main' => '0'),
            array('id' => '49','title' => 'Омская область','enabled' => '1','main' => '0'),
            array('id' => '50','title' => 'Оренбургская область','enabled' => '1','main' => '0'),
            array('id' => '51','title' => 'Орловская область','enabled' => '1','main' => '0'),
            array('id' => '52','title' => 'Пензенская область','enabled' => '1','main' => '0'),
            array('id' => '53','title' => 'Пермский край','enabled' => '1','main' => '0'),
            array('id' => '54','title' => 'Приморский край','enabled' => '1','main' => '0'),
            array('id' => '55','title' => 'Псковская область','enabled' => '1','main' => '0'),
            array('id' => '56','title' => 'Республика Алтай','enabled' => '1','main' => '0'),
            array('id' => '57','title' => 'Ростовская область','enabled' => '1','main' => '0'),
            array('id' => '58','title' => 'Рязанская область','enabled' => '1','main' => '0'),
            array('id' => '59','title' => 'Самарская область','enabled' => '1','main' => '0'),
            array('id' => '60','title' => 'Саратовская область','enabled' => '1','main' => '0'),
            array('id' => '61','title' => 'Сахалинская область','enabled' => '1','main' => '0'),
            array('id' => '62','title' => 'Саха (Якутия)','enabled' => '1','main' => '0'),
            array('id' => '63','title' => 'Свердловская область','enabled' => '1','main' => '1'),
            array('id' => '64','title' => 'Северная Осетия','enabled' => '1','main' => '0'),
            array('id' => '65','title' => 'Смоленская область','enabled' => '1','main' => '0'),
            array('id' => '66','title' => 'Ставропольский край','enabled' => '1','main' => '0'),
            array('id' => '67','title' => 'Тамбовская область','enabled' => '1','main' => '0'),
            array('id' => '68','title' => 'Татарстан','enabled' => '1','main' => '0'),
            array('id' => '69','title' => 'Тверская область','enabled' => '1','main' => '0'),
            array('id' => '70','title' => 'Томская область','enabled' => '1','main' => '0'),
            array('id' => '71','title' => 'Тульская область','enabled' => '1','main' => '0'),
            array('id' => '72','title' => 'Тыва','enabled' => '1','main' => '0'),
            array('id' => '73','title' => 'Тюменская область','enabled' => '1','main' => '0'),
            array('id' => '74','title' => 'Удмуртия','enabled' => '1','main' => '0'),
            array('id' => '75','title' => 'Ульяновская область','enabled' => '1','main' => '0'),
            array('id' => '76','title' => 'Хабаровский край','enabled' => '1','main' => '0'),
            array('id' => '77','title' => 'Хакасия','enabled' => '1','main' => '0'),
            array('id' => '78','title' => 'Ханты-Мансийский АО','enabled' => '1','main' => '0'),
            array('id' => '79','title' => 'Челябинская область','enabled' => '1','main' => '0'),
            array('id' => '80','title' => 'Чеченская республика','enabled' => '1','main' => '0'),
            array('id' => '81','title' => 'Чувашия','enabled' => '1','main' => '0'),
            array('id' => '82','title' => 'Чукотский АО','enabled' => '1','main' => '0'),
            array('id' => '83','title' => 'Ямало-Ненецкий АО','enabled' => '1','main' => '0'),
            array('id' => '84','title' => 'Ярославская область','enabled' => '1','main' => '0'),
            array('id' => '5050','title' => 'Санкт-Петербург','enabled' => '1','main' => '0'),
            array('id' => '5287','title' => 'Минск','enabled' => '1','main' => '0'),
        );

        $data = [];

        foreach ($regions as $region) {
            $data [] = [
                'id' => $region['id'],
                'region_name' => $region['title'],
                'region_enabled' => $region['enabled'],
                'region_main' => $region['main'],
                'created_at' => Carbon::now()->format('Y-m-d h-i-s'),
                'updated_at' => Carbon::now()->format('Y-m-d h-i-s')

            ];
        }

        DB::table('regions')->insert($data);
    }
}
