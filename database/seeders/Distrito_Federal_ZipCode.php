<?php

namespace Database\Seeders;

use App\Http\Service\StoreZipCodes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Distrito_Federal_ZipCode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new StoreZipCodes())->register('CPdescarga.xlsx - Distrito_Federal.csv');
    }
}
