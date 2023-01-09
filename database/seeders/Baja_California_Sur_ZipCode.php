<?php

namespace Database\Seeders;

use App\Http\Service\StoreZipCodes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Baja_California_Sur_ZipCode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new StoreZipCodes())->register('CPdescarga.xlsx - Baja_California_Sur.csv');
    }
}
