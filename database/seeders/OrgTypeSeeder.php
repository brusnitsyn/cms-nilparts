<?php

namespace Database\Seeders;

use App\Models\OrgType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrgType::create([
            'name' => 'ООО'
        ]);
        OrgType::create([
            'name' => 'ИП'
        ]);
    }
}
