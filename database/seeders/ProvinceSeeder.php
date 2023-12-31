<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://apis.datos.gob.ar/georef/api/provincias');
        collect($response->object()->provincias)->map(function (object $province) {
            Province::updateOrCreate([
                'id' => $province->id
            ], [
                'name' => $province->nombre
            ]);
        });
    }
}
