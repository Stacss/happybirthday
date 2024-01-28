<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $novokuznetsk = City::firstOrCreate(['name' => 'Новокузнецк']);

        // Создание записи для Марии Адамовны Петровой-Березовской
        Client::create([
            'first_name' => 'Мария',
            'last_name' => 'Петрова-Березовская',
            'middle_name' => 'Адамовна',
            'city_id' => $novokuznetsk->id,
            'birthdate' => '1949-03-01',
        ]);

        // Создание еще 99 записей
        Client::factory(99)->create();
    }
}
