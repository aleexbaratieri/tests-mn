<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = json_decode(file_get_contents(storage_path('data/cities.json')), true);
        $states = State::get();
    
        foreach($cities as $city) {
            City::updateOrCreate([
                'city' => $city['nome'],
                'id_state' => $states->firstWhere('uf', $city['microrregiao']['mesorregiao']['UF']['sigla'])->id
            ]);
        }
    }
}
