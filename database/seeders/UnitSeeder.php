<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'name' => 'Миллиметр',
            'short' => 'мм'
        ]);
        Unit::create([
            'name' => 'Сантиметр',
            'short' => 'см'
        ]);
        Unit::create([
            'name' => 'Дециметр',
            'short' => 'дм'
        ]);
        Unit::create([
            'name' => 'Метр',
            'short' => 'м'
        ]);
        Unit::create([
            'name' => 'Гектар',
            'short' => 'га'
        ]);
        Unit::create([
            'name' => 'Квадратный метр',
            'short' => 'м2'
        ]);
        Unit::create([
            'name' => 'Литр',
            'short' => 'л'
        ]);
        Unit::create([
            'name' => 'Миллиграмм',
            'short' => 'мг'
        ]);
        Unit::create([
            'name' => 'Грамм',
            'short' => 'г'
        ]);
        Unit::create([
            'name' => 'Тонна',
            'short' => 'т'
        ]);
        Unit::create([
            'name' => 'Килограмм',
            'short' => 'кг'
        ]);
        Unit::create([
            'name' => 'Штука',
            'short' => 'шт'
        ]);
        Unit::create([
            'name' => 'Рулон',
            'short' => 'рул'
        ]);
    }
}
