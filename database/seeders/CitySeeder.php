<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/municipios', [
            'orderBy' => 'nome'
        ]);

        if($cities->ok()) {
            $data = $cities->json();
            $states = State::get();
    
            foreach($data as $city) {
                City::updateOrCreate([
                    'city' => $city['nome'],
                    'id_state' => $states->firstWhere('uf', $city['microrregiao']['mesorregiao']['UF']['sigla'])->id
                ]);
            }
        }
    }
}
