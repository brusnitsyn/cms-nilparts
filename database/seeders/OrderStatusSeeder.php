<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
            'name' => 'Создан',
            'color' => '#fcd34d'
        ]);

        OrderStatus::create([
            'name' => 'В работе',
            'color' => '#fcd34d'
        ]);

        OrderStatus::create([
            'name' => 'Завершен',
            'color' => '#86efac'
        ]);
    }
}
