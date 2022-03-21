<?php

namespace Database\Seeders;
use Database\Factories\ArmamentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmamentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        ArmamentFactory::times(5)->create();
    }
}