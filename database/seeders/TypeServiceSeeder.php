<?php

namespace Database\Seeders;

use App\Models\TypeService;
use Illuminate\Database\Seeder;

class TypeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeService::create([
            'code' => '001',
            'name' => 'Servicio 1'
        ]);
        TypeService::create([
            'code' => '002',
            'name' => 'Servicio 2'
        ]);
        TypeService::create([
            'code' => '003',
            'name' => 'Servicio 3'
        ]);
    }
}
