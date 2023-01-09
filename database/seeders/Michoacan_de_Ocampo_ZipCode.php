<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Michoacan_de_Ocampo_ZipCode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Http\Service\StoreZipCodes())->register('CPdescarga.xlsx - Michoacán_de_Ocampo.csv');
    }
}
