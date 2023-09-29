<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Андрей',
            'Сергей',
            'Михаил',
            'Стас',
            'Артем',
            'Татьяна',
            'Евгений',
            'Катя',
            'Борис'
        ];

        foreach ($names as $name) {
            Employee::create(['name' => $name]);
        }
    }
}
