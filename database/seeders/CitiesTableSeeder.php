<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(database_path('seeders/cities.json'));
        $data = json_decode($json);

        foreach ($data as $cityData) {
            City::create([
                'name' => $cityData->city,
            ]);
        }
    }
}
