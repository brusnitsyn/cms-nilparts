<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        1
        ProductCategory::create([
            'name' => 'Тракторы'
        ]);
//        2
        ProductCategory::create([
            'name' => 'Комбайны'
        ]);
//        3
        ProductCategory::create([
            'name' => 'Жатки'
        ]);
//        4
        ProductCategory::create([
            'name' => 'Почвообрабатывающая техника'
        ]);
//        5
        ProductCategory::create([
            'name' => 'Посевная и посадочная техника'
        ]);
//        6
        ProductCategory::create([
            'name' => 'Техника для полива и орошения'
        ]);
//        7
        ProductCategory::create([
            'name' => 'Внесение удобрений'
        ]);
//        8
        ProductCategory::create([
            'name' => 'Переработка и хранение сельхозпродукции'
        ]);
//        9
        ProductCategory::create([
            'name' => 'Техника для транспортировки'
        ]);
//        10
        ProductCategory::create([
            'name' => 'Оборудование'
        ]);
//        11
        ProductCategory::create([
            'name' => 'Шины и диски'
        ]);

        // 12
        ProductCategory::create([
            'name' => 'Тракторы',
            'parent_id' => 1
        ]);
        // 13
        ProductCategory::create([
            'name' => 'Комбайны',
            'parent_id' => 2
        ]);
        // 14
        ProductCategory::create([
            'name' => 'Оборудование для тракторов',
            'parent_id' => 1
        ]);
        // 15
        ProductCategory::create([
            'name' => 'Запчасти для тракторов',
            'parent_id' => 1
        ]);
        // 16
        ProductCategory::create([
            'name' => 'Запчасти для комбайнов',
            'parent_id' => 2
        ]);
        // 17
        ProductCategory::create([
            'name' => 'Жатки',
            'parent_id' => 3
        ]);
        // 18
        ProductCategory::create([
            'name' => 'Запчасти для жаток',
            'parent_id' => 3
        ]);
        // 19
        ProductCategory::create([
            'name' => 'Почвообрабатывающая техника',
            'parent_id' => 4
        ]);
        // 20
        ProductCategory::create([
            'name' => 'Запчасти для почвообрабатывающей техники',
            'parent_id' => 4
        ]);
        // 21
        ProductCategory::create([
            'name' => 'Посевная и посадочная техника',
            'parent_id' => 5
        ]);
        // 22
        ProductCategory::create([
            'name' => 'Запчасти для посевной и посадочной техники',
            'parent_id' => 5
        ]);
        // 23
        ProductCategory::create([
            'name' => 'Техника для полива и орошения',
            'parent_id' => 6
        ]);
        // 24
        ProductCategory::create([
            'name' => 'Запчасти для техники для полива и орошения',
            'parent_id' => 6
        ]);
        // 25
        ProductCategory::create([
            'name' => 'Внесение удобрений',
            'parent_id' => 7
        ]);
        // 26
        ProductCategory::create([
            'name' => 'Переработка и хранение сельхозпродукции',
            'parent_id' => 8
        ]);
        // 27
        ProductCategory::create([
            'name' => 'Оборудование для переработки сельхозпродукции',
            'parent_id' => 8
        ]);
        // 28
        ProductCategory::create([
            'name' => 'Упаковочное оборудование',
            'parent_id' => 8
        ]);
        // 29
        ProductCategory::create([
            'name' => 'Запчасти для переработки и хранения сельхозпродукции',
            'parent_id' => 8
        ]);
        // 30
        ProductCategory::create([
            'name' => 'Техника для транспортировки',
            'parent_id' => 9
        ]);
        // 31
        ProductCategory::create([
            'name' => 'Оборудование для сельхозтехники',
            'parent_id' => 10
        ]);
        // 32
        ProductCategory::create([
            'name' => 'Сельхозшины',
            'parent_id' => 11
        ]);

        ProductCategory::create([
            'name' => 'Виноградниковые тракторы',
            'parent_id' => 12
        ]);
        ProductCategory::create([
            'name' => 'Минитракторы',
            'parent_id' => 12
        ]);
//        1-1-4 16
        ProductCategory::create([
            'name' => 'Мотоблоки',
            'parent_id' => 12
        ]);
//        1-1-5 17
        ProductCategory::create([
            'name' => 'Мототракторы',
            'parent_id' => 12
        ]);
//        1-1-6 18
        ProductCategory::create([
            'name' => 'Тракторы газонокосилки',
            'parent_id' => 12
        ]);
//        1-1-7 19
        ProductCategory::create([
            'name' => 'Тракторы гусеничные',
            'parent_id' => 12
        ]);
//        1-1-8 20
        ProductCategory::create([
            'name' => 'Тракторы колесные',
            'parent_id' => 12
        ]);
//        1-1-9 21
        ProductCategory::create([
            'name' => 'Трелевочные тракторы',
            'parent_id' => 12
        ]);
//        1-2 13

//        1-2-1 23
        ProductCategory::create([
            'name' => 'Вилы для рулонов',
            'parent_id' => 14
        ]);
//        1-2-2 24
        ProductCategory::create([
            'name' => 'Захваты для рулонов сена',
            'parent_id' => 14
        ]);
//        1-2-3 25
        ProductCategory::create([
            'name' => 'Захваты для силоса',
            'parent_id' => 14
        ]);
//        1-2-4 26
        ProductCategory::create([
            'name' => 'Катушки для шланга',
            'parent_id' => 14
        ]);
//        1-2-5 27
        ProductCategory::create([
            'name' => 'Ковши для силоса',
            'parent_id' => 14
        ]);
//        1-2-6 28
        ProductCategory::create([
            'name' => 'Навесные фронтальные погрузчики',
            'parent_id' => 14
        ]);
//        1-2-7 29
        ProductCategory::create([
            'name' => 'Насосы для навоза',
            'parent_id' => 14
        ]);
//        1-2-8 30
        ProductCategory::create([
            'name' => 'Противовесы',
            'parent_id' => 14
        ]);
//        1-2-9 31
        ProductCategory::create([
            'name' => 'Противовесы тракторов',
            'parent_id' => 14
        ]);
//        1-2-10 32
        ProductCategory::create([
            'name' => 'Системы контроля высева',
            'parent_id' => 14
        ]);
//        1-2-11 33
        ProductCategory::create([
            'name' => 'Системы для полива',
            'parent_id' => 14
        ]);
//        1-3 14

//        1-3-1 35
        ProductCategory::create([
            'name' => 'Тракторы по запчастям',
            'parent_id' => 15
        ]);
//        1-3-2 36
        ProductCategory::create([
            'name' => 'Запчасти для тракторов колесных',
            'parent_id' => 15
        ]);
//        1-3-3 37
        ProductCategory::create([
            'name' => 'Запчасти для тракторов гусеничных',
            'parent_id' => 15
        ]);
//        1-3-4 38
        ProductCategory::create([
            'name' => 'Запчасти для минитракторов',
            'parent_id' => 15
        ]);

//        2-1-1 40
        ProductCategory::create([
            'name' => 'Виноградоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-2 41
        ProductCategory::create([
            'name' => 'Горохоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-3 42
        ProductCategory::create([
            'name' => 'Зерноуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-4 43
        ProductCategory::create([
            'name' => 'Капустоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-5 44
        ProductCategory::create([
            'name' => 'Картофелеуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-6 45
        ProductCategory::create([
            'name' => 'Комбайны для уборки чеснока',
            'parent_id' => 13
        ]);
//        2-1-7 46
        ProductCategory::create([
            'name' => 'Кормоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-8 47
        ProductCategory::create([
            'name' => 'Кукурузоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-9 48
        ProductCategory::create([
            'name' => 'Кукоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-10 49
        ProductCategory::create([
            'name' => 'Морковоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-11 50
        ProductCategory::create([
            'name' => 'Прицепные кормоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-12 51
        ProductCategory::create([
            'name' => 'Свеклоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-14 52
        ProductCategory::create([
            'name' => 'Хлопкоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-14 53
        ProductCategory::create([
            'name' => 'Ягодоуборочные комбайны',
            'parent_id' => 13
        ]);
//        2-1-14 54
        ProductCategory::create([
            'name' => 'Другие комбайны',
            'parent_id' => 13
        ]);

//        2-2-1 56
        ProductCategory::create([
            'name' => 'Комбайны по запчастям',
            'parent_id' => 16
        ]);
//        2-2-2 57
        ProductCategory::create([
            'name' => 'Запчасти для зерноуборочных комбайнов',
            'parent_id' => 16
        ]);
//        2-2-3 58
        ProductCategory::create([
            'name' => 'Запчасти для свеклоуборочных комбайнов',
            'parent_id' => 16
        ]);
//        2-2-4 59
        ProductCategory::create([
            'name' => 'Запчасти для кормоуборочных комбайнов',
            'parent_id' => 16
        ]);
//        2-2-5 60
        ProductCategory::create([
            'name' => 'Запчасти для кукурузоуборочных комбайнов',
            'parent_id' => 16
        ]);
//        2-2-6 61
        ProductCategory::create([
            'name' => 'Запчасти для лукоуборочных комбайнов',
            'parent_id' => 16
        ]);
//        3-1 17

        ProductCategory::create([
            'name' => 'Жатки для уборки подсолнечника',
            'parent_id' => 17
        ]);
        ProductCategory::create([
            'name' => 'Жатки зерновые',
            'parent_id' => 17
        ]);
        ProductCategory::create([
            'name' => 'Жатки кукурузные',
            'parent_id' => 17
        ]);
        ProductCategory::create([
            'name' => 'Жатки роторные',
            'parent_id' => 17
        ]);
        ProductCategory::create([
            'name' => 'Очесывающие жатки',
            'parent_id' => 17
        ]);
        ProductCategory::create([
            'name' => 'Подборщики валков',
            'parent_id' => 17
        ]);
        ProductCategory::create([
            'name' => 'Рапсовые столы',
            'parent_id' => 17
        ]);
        ProductCategory::create([
            'name' => 'Тележки для жатки',
            'parent_id' => 17
        ]);
        ProductCategory::create([
            'name' => 'Другие жатки',
            'parent_id' => 17
        ]);

        ProductCategory::create([
            'name' => 'Жатки по запчастям',
            'parent_id' => 18
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для жаток зерновых',
            'parent_id' => 18
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для жаток кукурузных',
            'parent_id' => 18
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для жаток роторных',
            'parent_id' => 18
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для рапсовых столов',
            'parent_id' => 18
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для жаток для уборки подсолнечника',
            'parent_id' => 18
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для подборщиков валков',
            'parent_id' => 18
        ]);

        ProductCategory::create([
            'name' => 'Агрегаты предпосевные',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Аэраторы для лугов',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Бороны',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Ботвоудалители',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Глубокорыхлители',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Гребнеобразователи',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Камнедробилки',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Камнеуборочные машины',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Катки сельхозтехника',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Компостные машины',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Культиваторы',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Мульчирователи',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Окучиватели',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Планировщики почвы',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Плуги',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Плуги оборотные',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Почвофрезы',
            'parent_id' => 19
        ]);
        ProductCategory::create([
            'name' => 'Стерневые культиваторы',
            'parent_id' => 19
        ]);

        ProductCategory::create([
            'name' => 'Запчасти для борон',
            'parent_id' => 20
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для культиваторов',
            'parent_id' => 20
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для плугов',
            'parent_id' => 20
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для глубокорыхлителей',
            'parent_id' => 20
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для катков сельхозтехники',
            'parent_id' => 20
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для почвофрез',
            'parent_id' => 20
        ]);

        ProductCategory::create([
            'name' => 'Посевные комплексы',
            'parent_id' => 21
        ]);
        ProductCategory::create([
            'name' => 'Протравители семян',
            'parent_id' => 21
        ]);
        ProductCategory::create([
            'name' => 'Рассадопосадочные машины',
            'parent_id' => 21
        ]);
        ProductCategory::create([
            'name' => 'Сеялки ручные',
            'parent_id' => 21
        ]);
        ProductCategory::create([
            'name' => 'Сеялки сплошного высева механические',
            'parent_id' => 21
        ]);
        ProductCategory::create([
            'name' => 'Сеялки сплошного высева пневматические',
            'parent_id' => 21
        ]);
        ProductCategory::create([
            'name' => 'Сеялки точного высева механические',
            'parent_id' => 21
        ]);
        ProductCategory::create([
            'name' => 'Сеялки точного высева пневматические',
            'parent_id' => 21
        ]);
        ProductCategory::create([
            'name' => 'Сеялки точного высева с электроприводом',
            'parent_id' => 21
        ]);

        ProductCategory::create([
            'name' => 'Посевная и посадочная техника по запчастям',
            'parent_id' => 13
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для сеялок',
            'parent_id' => 13
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для рассадопосадочных машин',
            'parent_id' => 13
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для посевных комплексов',
            'parent_id' => 13
        ]);

        ProductCategory::create([
            'name' => 'Дождевальные машины',
            'parent_id' => 23
        ]);
        ProductCategory::create([
            'name' => 'Опрыскиватели вентиляторные',
            'parent_id' => 23
        ]);
        ProductCategory::create([
            'name' => 'Опрыскиватели навесные',
            'parent_id' => 23
        ]);
        ProductCategory::create([
            'name' => 'Опрыскиватели прицепные',
            'parent_id' => 23
        ]);
        ProductCategory::create([
            'name' => 'Опрыскиватели самоходные',
            'parent_id' => 23
        ]);
        ProductCategory::create([
            'name' => 'Ручные опрыскиватели',
            'parent_id' => 23
        ]);
        ProductCategory::create([
            'name' => 'Спринклерные оросители',
            'parent_id' => 23
        ]);

        ProductCategory::create([
            'name' => 'Техника для полива и орошения по запчастям',
            'parent_id' => 24
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для опрыскивателей',
            'parent_id' => 24
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для дождевальных машин',
            'parent_id' => 24
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для опрыскивателей самоходных',
            'parent_id' => 24
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для опрыскивателей вентиляторных',
            'parent_id' => 24
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для опрыскивателей прицепных',
            'parent_id' => 24
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для опрыскивателей навесных',
            'parent_id' => 24
        ]);

        ProductCategory::create([
            'name' => 'Контейнеры для навозной жижи',
            'parent_id' => 25
        ]);
        ProductCategory::create([
            'name' => 'Миксеры для навоза',
            'parent_id' => 25
        ]);
        ProductCategory::create([
            'name' => 'Навозоразбрасыватели',
            'parent_id' => 25
        ]);
        ProductCategory::create([
            'name' => 'Разбрасыватели жидких удобрений',
            'parent_id' => 25
        ]);
        ProductCategory::create([
            'name' => 'Разбрасыватели минеральных удобрений',
            'parent_id' => 25
        ]);

        ProductCategory::create([
            'name' => 'Аэраторы зерновые',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Вентиляционное оборудование',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Загрузчики сеялок',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Зернометатели',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Зерноочистители',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Зерносушилки',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Мобильные зерносушилки',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Пневмоперегружатели зерна',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Силосы',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Фотосепараторы',
            'parent_id' => 26
        ]);
        ProductCategory::create([
            'name' => 'Шнековые погрузчики',
            'parent_id' => 26
        ]);

        ProductCategory::create([
            'name' => 'Конвейерное оборудование',
            'parent_id' => 27
        ]);
        ProductCategory::create([
            'name' => 'Мойки для овощей',
            'parent_id' => 27
        ]);
        ProductCategory::create([
            'name' => 'Наполнители контейнеров',
            'parent_id' => 27
        ]);
        ProductCategory::create([
            'name' => 'Сортировочные машины',
            'parent_id' => 27
        ]);
        ProductCategory::create([
            'name' => 'Транспортеры',
            'parent_id' => 27
        ]);
        ProductCategory::create([
            'name' => 'Упаковочные машины',
            'parent_id' => 27
        ]);
        ProductCategory::create([
            'name' => 'Холодильные тоннели',
            'parent_id' => 27
        ]);

        ProductCategory::create([
            'name' => 'Паллетайзеры',
            'parent_id' => 28
        ]);
        ProductCategory::create([
            'name' => 'Стреппинг-машины',
            'parent_id' => 28
        ]);
        ProductCategory::create([
            'name' => 'Термоусадочные машины',
            'parent_id' => 28
        ]);
        ProductCategory::create([
            'name' => 'Фальцевально-склеивающие машины',
            'parent_id' => 28
        ]);
        ProductCategory::create([
            'name' => 'Фасовочно-упаковочные машины',
            'parent_id' => 28
        ]);
        ProductCategory::create([
            'name' => 'Фасовочные машины',
            'parent_id' => 28
        ]);
        ProductCategory::create([
            'name' => 'Этикетировщики',
            'parent_id' => 28
        ]);
        ProductCategory::create([
            'name' => 'Другое упаковочное оборудование',
            'parent_id' => 28
        ]);

        ProductCategory::create([
            'name' => 'Переработка и хранение сельхозпродукции по запчастям',
            'parent_id' => 29
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для оборудования для переработки сельхозпродукции',
            'parent_id' => 29
        ]);
        ProductCategory::create([
            'name' => 'Запчасти для оборудования для обработки зерна',
            'parent_id' => 29
        ]);

        ProductCategory::create([
            'name' => 'Бункеры-перегрузчики зерна',
            'parent_id' => 30
        ]);
        ProductCategory::create([
            'name' => 'контейнеры для навозной жижи',
            'parent_id' => 30
        ]);
        ProductCategory::create([
            'name' => 'Прицепы тракторные',
            'parent_id' => 30
        ]);
        ProductCategory::create([
            'name' => 'Самозагружающиеся прицепы',
            'parent_id' => 30
        ]);
        ProductCategory::create([
            'name' => 'Тележки для жатки',
            'parent_id' => 30
        ]);

        ProductCategory::create([
            'name' => 'Вилы для рулонов',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Захваты для рулонов сена',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Захваты для силоса',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Катушки для шланга',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Ковши для силоса',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Ковши фронтальные',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Навесные фронтальные погрузчики',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Насосы для навоза',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Противовесы',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Противовесы тракторов',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Тенты',
            'parent_id' => 31
        ]);
        ProductCategory::create([
            'name' => 'Шланги для полива',
            'parent_id' => 31
        ]);

        ProductCategory::create([
            'name' => 'Шины для комбайнов',
            'parent_id' => 32
        ]);
        ProductCategory::create([
            'name' => 'Шины для прицепной сельхозтехники',
            'parent_id' => 32
        ]);
        ProductCategory::create([
            'name' => 'Шины для тракторов',
            'parent_id' => 32
        ]);
    }
}
