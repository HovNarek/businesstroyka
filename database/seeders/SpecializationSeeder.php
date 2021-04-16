<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
            ['id' => '37','title' => 'Кредиты и займы','keyword' => 'kredity-i-zajmy','enabled' => '1','mtitle' => 'Кредиты и займы','mkeywords' => 'Кредиты и займы','mdescription' => 'Кредиты и займы'],
            ['id' => '13','title' => 'Ремонт и настройка компьютеров','keyword' => 'remont-i-nastrojka-kompjuterov','enabled' => '1','mtitle' => 'Ремонт и настройка компьютеров','mkeywords' => 'Ремонт и настройка компьютеров','mdescription' => 'Ремонт и настройка компьютеров'],
            ['id' => '14','title' => 'Спутниковое тв установка','keyword' => 'sputnikovoje-tv-ustanovka','enabled' => '1','mtitle' => 'Спутниковое тв установка','mkeywords' => 'Спутниковое тв установка','mdescription' => 'Спутниковое тв установка'],
            ['id' => '15','title' => 'Создание сайтов','keyword' => 'sozdanije-sajtov','enabled' => '1','mtitle' => 'Создание сайтов','mkeywords' => 'Создание сайтов','mdescription' => 'Создание сайтов'],
            ['id' => '16','title' => 'Установка спутникового телевидения','keyword' => 'ustanovka-sputnikovogo-televidenija','enabled' => '1','mtitle' => 'Установка спутникового телевидения','mkeywords' => 'Установка спутникового телевидения','mdescription' => 'Установка спутникового телевидения'],
            ['id' => '17','title' => 'IT другое','keyword' => 'it-drugoje','enabled' => '1','mtitle' => 'IT другое','mkeywords' => 'IT другое','mdescription' => 'IT другое'],
            ['id' => '18','title' => 'Монтаж систем оповещения, охраны, видеонаб','keyword' => 'montazh-sistem-opoveshhenija-ohrany-videonab','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '19','title' => 'Поиск и сбор информации','keyword' => 'poisk-i-sbor-informacii','enabled' => '1','mtitle' => 'Поиск и сбор информации','mkeywords' => 'Поиск и сбор информации','mdescription' => 'Поиск и сбор информации'],
            ['id' => '21','title' => 'Консалтинг','keyword' => 'konsalting','enabled' => '1','mtitle' => 'Консалтинг','mkeywords' => 'Консалтинг','mdescription' => 'Консалтинг'],
            ['id' => '22','title' => 'Изготовление ключей','keyword' => 'izgotovlenije-kluchej','enabled' => '1','mtitle' => 'Изготовление ключей','mkeywords' => 'Изготовление ключей','mdescription' => 'Изготовление ключей'],
            ['id' => '23','title' => 'Мелкий бытовой ремонт','keyword' => 'melkij-bytovoj-remont','enabled' => '1','mtitle' => 'Мелкий бытовой ремонт','mkeywords' => 'Мелкий бытовой ремонт','mdescription' => 'Мелкий бытовой ремонт'],
            ['id' => '24','title' => 'Пошив и ремонт одежды','keyword' => 'poshiv-i-remont-odezhdy','enabled' => '1','mtitle' => 'Пошив и ремонт одежды','mkeywords' => 'Пошив и ремонт одежды','mdescription' => 'Пошив и ремонт одежды'],
            ['id' => '25','title' => 'Ремонт, установка и обслуживание техники','keyword' => 'remont-ustanovka-i-obsluzhivanije-tehniki','enabled' => '1','mtitle' => 'Ремонт, установка и обслуживание техники','mkeywords' => 'Ремонт, установка и обслуживание техники','mdescription' => 'Ремонт, установка и обслуживание техники'],
            ['id' => '26','title' => 'Регистрация фирм','keyword' => 'registracija-firm','enabled' => '1','mtitle' => 'Регистрация фирм','mkeywords' => 'Регистрация фирм','mdescription' => 'Регистрация фирм'],
            ['id' => '27','title' => 'Изготовление, сборка и ремонт мебели','keyword' => 'izgotovlenije-sborka-i-remont-mebeli','enabled' => '1','mtitle' => 'Изготовление, сборка и ремонт мебели','mkeywords' => 'Изготовление, сборка и ремонт мебели','mdescription' => 'Изготовление, сборка и ремонт мебели'],
            ['id' => '28','title' => 'Уборка, клининг','keyword' => 'uborka-klining','enabled' => '1','mtitle' => 'Уборка, клининг','mkeywords' => 'Уборка, клининг','mdescription' => 'Уборка, клининг'],
            ['id' => '29','title' => 'Химчистка, стирка','keyword' => 'himchistka-stirka','enabled' => '1','mtitle' => 'Химчистка, стирка','mkeywords' => 'Химчистка, стирка','mdescription' => 'Химчистка, стирка'],
            ['id' => '30','title' => 'Консультации','keyword' => 'konsultacii','enabled' => '1','mtitle' => 'Консультации','mkeywords' => 'Консультации','mdescription' => 'Консультации'],
            ['id' => '31','title' => 'Представительство в суде','keyword' => 'predstavitelstvo-v-sude','enabled' => '1','mtitle' => 'Представительство в суде','mkeywords' => 'Представительство в суде','mdescription' => 'Представительство в суде'],
            ['id' => '32','title' => 'Отчетность','keyword' => 'otchetnost','enabled' => '1','mtitle' => 'Отчетность','mkeywords' => 'Отчетность','mdescription' => 'Отчетность'],
            ['id' => '33','title' => 'Ведение фирмы','keyword' => 'vedenije-firmy','enabled' => '1','mtitle' => 'Ведение фирмы','mkeywords' => 'Ведение фирмы','mdescription' => 'Ведение фирмы'],
            ['id' => '34','title' => 'Страхование','keyword' => 'strahovanije','enabled' => '1','mtitle' => 'Страхование','mkeywords' => 'Страхование','mdescription' => 'Страхование'],
            ['id' => '35','title' => 'Поиск инвестора','keyword' => 'poisk-investora','enabled' => '1','mtitle' => 'Поиск инвестора','mkeywords' => 'Поиск инвестора','mdescription' => 'Поиск инвестора'],
            ['id' => '38','title' => 'Фондовый рынок','keyword' => 'fondovyj-rynok','enabled' => '1','mtitle' => 'Фондовый рынок','mkeywords' => 'Фондовый рынок','mdescription' => 'Фондовый рынок'],
            ['id' => '39','title' => 'Парикмахер','keyword' => 'parikmaher','enabled' => '1','mtitle' => 'Парикмахер','mkeywords' => 'Парикмахер','mdescription' => 'Парикмахер'],
            ['id' => '40','title' => 'Маникюр и педикюр','keyword' => 'manikur-i-pedikur','enabled' => '1','mtitle' => 'Маникюр и педикюр','mkeywords' => 'Маникюр и педикюр','mdescription' => 'Маникюр и педикюр'],
            ['id' => '41','title' => 'Косметолог и визажист','keyword' => 'kosmetolog-i-vizazhist','enabled' => '1','mtitle' => 'Косметолог и визажист','mkeywords' => 'Косметолог и визажист','mdescription' => 'Косметолог и визажист'],
            ['id' => '42','title' => 'Массажист','keyword' => 'massazhist','enabled' => '1','mtitle' => 'Массажист','mkeywords' => 'Массажист','mdescription' => 'Массажист'],
            ['id' => '43','title' => 'Доктор','keyword' => 'doktor','enabled' => '1','mtitle' => 'Доктор','mkeywords' => 'Доктор','mdescription' => 'Доктор'],
            ['id' => '44','title' => 'Ветиринар','keyword' => 'vetirinar','enabled' => '1','mtitle' => 'Ветиринар','mkeywords' => 'Ветиринар','mdescription' => 'Ветиринар'],
            ['id' => '45','title' => 'Медицинская сестра','keyword' => 'medicinskaja-sestra','enabled' => '1','mtitle' => 'Медицинская сестра','mkeywords' => 'Медицинская сестра','mdescription' => 'Медицинская сестра'],
            ['id' => '46','title' => 'Сиделка','keyword' => 'sidelka','enabled' => '1','mtitle' => 'Сиделка','mkeywords' => 'Сиделка','mdescription' => 'Сиделка'],
            ['id' => '47','title' => 'Репетитор','keyword' => 'repetitor','enabled' => '1','mtitle' => 'Репетитор','mkeywords' => 'Репетитор','mdescription' => 'Репетитор'],
            ['id' => '48','title' => 'Гувернантка','keyword' => 'guvernantka','enabled' => '1','mtitle' => 'Гувернантка','mkeywords' => 'Гувернантка','mdescription' => 'Гувернантка'],
            ['id' => '49','title' => 'Нянечка','keyword' => 'nanechka','enabled' => '1','mtitle' => 'Нянечка','mkeywords' => 'Нянечка','mdescription' => 'Нянечка'],
            ['id' => '50','title' => 'Охранник','keyword' => 'ohrannik','enabled' => '1','mtitle' => 'Охранник','mkeywords' => 'Охранник','mdescription' => 'Охранник'],
            ['id' => '51','title' => 'Сторож','keyword' => 'storozh','enabled' => '1','mtitle' => 'Сторож','mkeywords' => 'Сторож','mdescription' => 'Сторож'],
            ['id' => '52','title' => 'Обеды в офис','keyword' => 'obedy-v-ofis','enabled' => '1','mtitle' => 'Обеды в офис','mkeywords' => 'Обеды в офис','mdescription' => 'Обеды в офис'],
            ['id' => '53','title' => 'Переезды','keyword' => 'perejezdy','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '54','title' => 'Приготовление еды дома','keyword' => 'prigotovlenije-jedy-doma','enabled' => '1','mtitle' => 'Приготовление еды дома','mkeywords' => 'Приготовление еды дома','mdescription' => 'Приготовление еды дома'],
            ['id' => '55','title' => 'Проведение выездных банкетов','keyword' => 'provedenije-vyjezdnyh-banketov','enabled' => '1','mtitle' => 'Проведение выездных банкетов','mkeywords' => 'Проведение выездных банкетов','mdescription' => 'Проведение выездных банкетов'],
            ['id' => '56','title' => 'Свадьбы','keyword' => 'svadby','enabled' => '1','mtitle' => 'Свадьбы','mkeywords' => 'Свадьбы','mdescription' => 'Свадьбы'],
            ['id' => '58','title' => 'Корпоративы','keyword' => 'korporativy','enabled' => '1','mtitle' => 'Корпоративы','mkeywords' => 'Корпоративы','mdescription' => 'Корпоративы'],
            ['id' => '59','title' => 'Юбилеи','keyword' => 'jubilei','enabled' => '1','mtitle' => 'Юбилеи','mkeywords' => 'Юбилеи','mdescription' => 'Юбилеи'],
            ['id' => '60','title' => 'Обработка в фотошоп','keyword' => 'obrabotka-v-fotoshop','enabled' => '1','mtitle' => 'Обработка в фотошоп','mkeywords' => 'Обработка в фотошоп','mdescription' => 'Обработка в фотошоп'],
            ['id' => '61','title' => 'Системы автополива, дринажа','keyword' => 'sistemy-avtopoliva-drinazha','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '62','title' => 'Создание макетов для печати','keyword' => 'sozdanije-maketov-dla-pechati','enabled' => '1','mtitle' => 'Создание макетов для печати','mkeywords' => 'Создание макетов для печати','mdescription' => 'Создание макетов для печати'],
            ['id' => '63','title' => 'Верстка и подготовка к печати','keyword' => 'verstka-i-podgotovka-k-pechati','enabled' => '1','mtitle' => 'Верстка и подготовка к печати','mkeywords' => 'Верстка и подготовка к печати','mdescription' => 'Верстка и подготовка к печати'],
            ['id' => '64','title' => 'Ремонт спец техники','keyword' => 'remont-spec-tehniki','enabled' => '1','mtitle' => 'Ремонт спец техники','mkeywords' => 'Ремонт спец техники','mdescription' => 'Ремонт спец техники'],
            ['id' => '65','title' => 'Ремонт автомобилей','keyword' => 'remont-avtomobilej','enabled' => '1','mtitle' => 'Ремонт автомобилей','mkeywords' => 'Ремонт автомобилей','mdescription' => 'Ремонт автомобилей'],
            ['id' => '66','title' => 'Тех обслуживание','keyword' => 'teh-obsluzhivanije','enabled' => '1','mtitle' => 'Тех обслуживание','mkeywords' => 'Тех обслуживание','mdescription' => 'Тех обслуживание'],
            ['id' => '68','title' => 'Ремонтные работы','keyword' => 'remontnyje-raboty','enabled' => '1','mtitle' => 'Ремонтные работы','mkeywords' => 'Ремонтные работы','mdescription' => 'Ремонтные работы'],
            ['id' => '69','title' => 'Строительные работы','keyword' => 'stroitelnyje-raboty','enabled' => '1','mtitle' => 'Строительные работы','mkeywords' => 'Строительные работы','mdescription' => 'Строительные работы'],
            ['id' => '70','title' => 'Коммуникации','keyword' => 'kommunikacii','enabled' => '1','mtitle' => 'Коммуникации','mkeywords' => 'Коммуникации','mdescription' => 'Коммуникации'],
            ['id' => '71','title' => 'Инструменты, оборудование, техника','keyword' => 'instrumenty-oborudovanije-tehnika','enabled' => '1','mtitle' => 'Инструменты, оборудование, техника','mkeywords' => 'Инструменты, оборудование, техника','mdescription' => 'Инструменты, оборудование, техника'],
            ['id' => '72','title' => 'Ландшафтные работы','keyword' => 'landshaftnyje-raboty','enabled' => '1','mtitle' => 'Ландшафтные работы','mkeywords' => 'Ландшафтные работы','mdescription' => 'Ландшафтные работы'],
            ['id' => '73','title' => 'Строительные материалы','keyword' => 'stroitelnyje-materialy','enabled' => '1','mtitle' => 'Строительные материалы','mkeywords' => 'Строительные материалы','mdescription' => 'Строительные материалы'],
            ['id' => '74','title' => 'Разнорабочие','keyword' => 'raznorabochije','enabled' => '1','mtitle' => 'Разнорабочие','mkeywords' => 'Разнорабочие','mdescription' => 'Разнорабочие'],
            ['id' => '75','title' => 'Прочие работы','keyword' => 'prochije-raboty','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '76','title' => 'Водитель с легковым авто','keyword' => 'voditel-s-legkovym-avto','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '77','title' => 'Водитель с грузовым авто','keyword' => 'voditel-s-gruzovym-avto','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '78','title' => 'курьер (документы]','keyword' => 'kurjer-dokumenty','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '79','title' => 'Доставка грузов','keyword' => 'dostavka-gruzov','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '80','title' => 'Грузчики','keyword' => 'gruzchiki','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '81','title' => 'Видео съемка','keyword' => 'video-s`jemka','enabled' => '1','mtitle' => 'Видео съемка','mkeywords' => 'Видео съемка','mdescription' => 'Видео съемка'],
            ['id' => '82','title' => 'Домработница','keyword' => 'domrabotnica','enabled' => '1','mtitle' => 'Домработница','mkeywords' => 'Домработница','mdescription' => 'Домработница'],
            ['id' => '83','title' => 'Монтаж','keyword' => 'montazh','enabled' => '1','mtitle' => 'Монтаж','mkeywords' => 'Монтаж','mdescription' => 'Монтаж'],
            ['id' => '84','title' => 'Уборка','keyword' => 'uborka','enabled' => '1','mtitle' => 'Уборка','mkeywords' => 'Уборка','mdescription' => 'Уборка'],
            ['id' => '85','title' => 'Фото съемка','keyword' => 'foto-s`jemka','enabled' => '1','mtitle' => 'Фото съемка','mkeywords' => 'Фото съемка','mdescription' => 'Фото съемка'],
            ['id' => '86','title' => 'Другое','keyword' => 'drugoje','enabled' => '1','mtitle' => 'Другое','mkeywords' => 'Другое','mdescription' => 'Другое'],
            ['id' => '87','title' => 'Садовник','keyword' => 'sadovnik','enabled' => '1','mtitle' => 'Садовник','mkeywords' => 'Садовник','mdescription' => 'Садовник'],
            ['id' => '88','title' => 'Кровельные работы','keyword' => 'krovelnyje-raboty','enabled' => '1','mtitle' => '','mkeywords' => '','mdescription' => ''],
            ['id' => '89','title' => 'Фундаментные работы','keyword' => 'fundamentnyje-raboty','enabled' => '1','mtitle' => 'Фундаментные работы','mkeywords' => 'Фундаментные работы','mdescription' => 'Фундаментные работы'],
            ['id' => '93','title' => 'аренда экскаватор JCB','keyword' => 'arenda-ekskavator-jcb','enabled' => '1','mtitle' => 'аренда экскаватора','mkeywords' => 'сколько стоит экскаватор аренда','mdescription' => 'заказать экскаватор jcb'],
            ['id' => '94','title' => 'Экскаватор JCB','keyword' => 'ekskavator-jcb','enabled' => '1','mtitle' => 'аренда экскаватора','mkeywords' => 'аренда экскаватора','mdescription' => 'аренда экскаватора'],
            ['id' => '95','title' => 'Услуги ямобур вездеход','keyword' => 'uslugi-jamobur-vezdehod','enabled' => '1','mtitle' => 'услуги ямобур, аренда ямобур','mkeywords' => 'аренда ямобур','mdescription' => 'установка опор ЛЭП'],
            ['id' => '96','title' => 'Грузоперевозки Газель','keyword' => 'gruzoperevozki-gazel','enabled' => '1','mtitle' => 'аренда газель','mkeywords' => 'грузчики','mdescription' => 'грузоперевозки']
        ];

        $data = [];

        foreach ($specializations as $specialization) {
            $data [] = [
                'id' => $specialization['id'],
                'spec_title' => $specialization['title'],
                'spec_slug' => $specialization['keyword'],
                'spec_enabled' => $specialization['enabled'],
                'spec_mtitle' => $specialization['mtitle'],
                'spec_mkeywords' => $specialization['mkeywords'],
                'spec_mdescription' => $specialization['mdescription'],
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
            ];
        }

        DB::table('specializations')->insert($data);
    }
}
