<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => '18','title' => 'Финансовые услуги','keyword' => 'finansovyje-uslugi','enabled' => '1','mtitle' => 'Финансовые услуги','mkeywords' => 'Финансовые услуги','mdescription' => 'Финансовые услуги','pay' => '0','price' => '0'],
            ['id' => '17','title' => 'Бухгалтерские услуги','keyword' => 'buhgalterskije-uslugi','enabled' => '1','mtitle' => 'Бухгалтерские услуги','mkeywords' => 'Бухгалтерские услуги','mdescription' => 'Бухгалтерские услуги','pay' => '0','price' => '0'],
            ['id' => '15','title' => 'Бытовые услуги','keyword' => 'bytovyje-uslugi','enabled' => '1','mtitle' => 'Бытовые услуги','mkeywords' => 'Бытовые услуги','mdescription' => 'Бытовые услуги','pay' => '0','price' => '0'],
            ['id' => '16','title' => 'Юридические услуги','keyword' => 'juridicheskije-uslugi','enabled' => '1','mtitle' => 'Юридические услуги','mkeywords' => 'Юридические услуги','mdescription' => 'Юридические услуги','pay' => '0','price' => '0'],
            ['id' => '10','title' => 'Ремонт и строительство','keyword' => 'remont-i-stroitelstvo-pod-kluch','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => '','pay' => '0','price' => '0'],
            ['id' => '13','title' => 'IT, интернет, телеком','keyword' => 'it-internet-telekom','enabled' => '1','mtitle' => '','mkeywords' => 'IT, интернет, телеком','mdescription' => 'IT, интернет, телеком','pay' => '0','price' => '0'],
            ['id' => '14','title' => 'Информационные услуги','keyword' => 'informacionnyje-uslugi','enabled' => '1','mtitle' => 'Информационные услуги','mkeywords' => 'Информационные услуги','mdescription' => 'Информационные услуги','pay' => '0','price' => '0'],
            ['id' => '19','title' => 'Страховые услуги','keyword' => 'strahovyje-uslugi','enabled' => '1','mtitle' => 'Страховые услуги','mkeywords' => 'Страховые услуги','mdescription' => 'Страховые услуги','pay' => '0','price' => '0'],
            ['id' => '20','title' => 'Красота и здоровье','keyword' => 'krasota-i-zdorovje','enabled' => '1','mtitle' => 'Красота и здоровье','mkeywords' => 'Красота и здоровье','mdescription' => 'Красота и здоровье','pay' => '0','price' => '0'],
            ['id' => '21','title' => 'Медицинские и ветеринарные услуги','keyword' => 'medicinskije-i-veterinarnyje-uslugi','enabled' => '1','mtitle' => 'Медицинские и ветеринарные услуги','mkeywords' => 'Медицинские и ветеринарные услуги','mdescription' => 'Медицинские и ветеринарные услуги','pay' => '0','price' => '0'],
            ['id' => '22','title' => 'Образование и воспитание','keyword' => 'obrazovanije-i-vospitanije','enabled' => '1','mtitle' => 'Образование и воспитание','mkeywords' => 'Образование и воспитание','mdescription' => 'Образование и воспитание','pay' => '0','price' => '0'],
            ['id' => '23','title' => 'Охрана и безопасность','keyword' => 'ohrana-i-bezopasnost','enabled' => '1','mtitle' => 'Охрана и безопасность','mkeywords' => 'Охрана и безопасность','mdescription' => 'Охрана и безопасность','pay' => '0','price' => '0'],
            ['id' => '24','title' => 'Питание, приготовление и доставка пищи','keyword' => 'pitanije-prigotovlenije-i-dostavka-pishhi','enabled' => '1','mtitle' => 'Питание, приготовление и доставка пищи','mkeywords' => 'Питание, приготовление и доставка пищи','mdescription' => 'Питание, приготовление и доставка пищи','pay' => '0','price' => '0'],
            ['id' => '25','title' => 'Праздники и мероприятия','keyword' => 'prazdniki-i-meroprijatija','enabled' => '1','mtitle' => 'Праздники и мероприятия','mkeywords' => 'Праздники и мероприятия','mdescription' => 'Праздники и мероприятия','pay' => '0','price' => '0'],
            ['id' => '26','title' => 'Реклама и полиграфия','keyword' => 'reklama-i-poligrafija','enabled' => '1','mtitle' => 'Реклама и полиграфия','mkeywords' => 'Реклама и полиграфия','mdescription' => 'Реклама и полиграфия','pay' => '0','price' => '0'],
            ['id' => '27','title' => 'Ремонт и обслуживание техники','keyword' => 'remont-i-obsluzhivanije-tehniki','enabled' => '1','mtitle' => 'Ремонт и обслуживание техники','mkeywords' => 'Ремонт и обслуживание техники','mdescription' => 'Ремонт и обслуживание техники','pay' => '0','price' => '0'],
            ['id' => '28','title' => 'Сад и благоустройство территорий','keyword' => 'sad-i-blagoustrojstvo-territorij','enabled' => '1','mtitle' => 'Сад и благоустройство территорий','mkeywords' => 'Сад и благоустройство территорий','mdescription' => 'Сад и благоустройство территорий','pay' => '0','price' => '0'],
            ['id' => '29','title' => 'Транспорт и перевозки','keyword' => 'transport-i-perevozki','enabled' => '1','mtitle' => 'Транспорт и перевозки','mkeywords' => 'Транспорт и перевозки','mdescription' => 'Транспорт и перевозки','pay' => '0','price' => '0'],
            ['id' => '30','title' => 'Фото и видеосъёмка','keyword' => 'foto-i-videos`jomka','enabled' => '1','mtitle' => 'Фото и видеосъёмка','mkeywords' => 'Фото и видеосъёмка','mdescription' => 'Фото и видеосъёмка','pay' => '0','price' => '0'],
            ['id' => '31','title' => 'Другое','keyword' => 'drugoje','enabled' => '1','mtitle' => 'Другое','mkeywords' => 'Другое','mdescription' => 'Другое','pay' => '0','price' => '0'],
            ['id' => '32','title' => 'Сварщик резчик','keyword' => 'Сварочные работы сварщик','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => '','pay' => '0','price' => '0'],
            ['id' => '33','title' => 'Аренда спецтехника','keyword' => 'arenda-spectehnika','enabled' => '1','mtitle' => 'аренда экскаватор аренда кран аренда ямобур','mkeywords' => 'услуги спецтехники','mdescription' => 'заказать спецтехнику','pay' => '1','price' => '60']
        ];

        $data = [];

        foreach ($categories as $category) {
            $data [] = [
                'id' => $category['id'],
                'cat_title' => $category['title'],
                'cat_slug' => $category['keyword'],
                'cat_enabled' => $category['enabled'],
                'cat_mtitle' => $category['mtitle'],
                'cat_mkeywords' => $category['mkeywords'],
                'cat_mdescription' => $category['mdescription'],
                'cat_pay' => $category['pay'],
                'cat_price' => $category['price'],
                'created_at' => Carbon::now()->format('Y-m-d h-i-s'),
                'updated_at' => Carbon::now()->format('Y-m-d h-i-s')
            ];
        }

        DB::table('categories')->insert($data);
    }
}
