<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employe;
class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Employe::factory(10)->create();
    }
}
