<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Service\StoreZipCodes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            Aguascalientes_ZipCode::class,
            Baja_California_Sur_ZipCode::class,
            Baja_California_ZipCode::class,
            Chiapas_ZipCode::class,
            Chihuahua_ZipCode::class,
            Coahuila_de_Zaragoza_ZipCode::class,
            Colima_ZipCode::class,
            Distrito_Federal_ZipCode::class,
            Durango_ZipCode::class,
            Guanajuato_ZipCode::class,
            Guerrero_ZipCode::class,
            Hidalgo_ZipCode::class,
            Jalisco_ZipCode::class,
            Mexico_ZipCode::class,
            Michoacan_de_Ocampo_ZipCode::class,
            Morelos_ZipCode::class,
            Nayarit_ZipCode::class,
            Nuevo_Leon_ZipCode::class,
            Oaxaca_ZipCode::class,
            Puebla_ZipCode::class,
            Queretaro_ZipCode::class,
            Quintana_Roo_ZipCode::class,
            San_Luis_ZipCode::class,
            Sinaloa_ZipCode::class,
            Sonora_ZipCode::class,
            Tabasco_ZipCode::class,
            Tamaulipas_ZipCode::class,
            Tlaxcala_ZipCode::class,
            Veracruz_de_Ignacio_ZipCode::class,
            Yucatan_ZipCode::class,
            Zacatecas_ZipCode::class
        ]);
    }
}
