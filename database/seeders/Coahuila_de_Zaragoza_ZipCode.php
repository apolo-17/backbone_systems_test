<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Coahuila_de_Zaragoza_ZipCode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Http\Service\StoreZipCodes())->register('CPdescarga.xlsx - Coahuila_de_Zaragoza.csv');
    }
}
