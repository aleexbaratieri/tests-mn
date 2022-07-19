<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados', [
            'orderBy' => 'nome'
        ]);

        $data = $states->json();

        foreach($data as $state) {
            State::updateOrCreate([
                'state' => $state['nome'],
                'uf' => $state['sigla']
            ]);
        }
    }
}
