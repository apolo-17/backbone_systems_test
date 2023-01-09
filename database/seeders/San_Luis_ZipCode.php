<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class San_Luis_ZipCode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Http\Service\StoreZipCodes())->register('CPdescarga.xlsx - San_Luis_Potosí.csv');
    }
}
