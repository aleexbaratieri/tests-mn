<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = json_decode(file_get_contents(storage_path('data/states.json')), true);

        foreach($states as $state) {
            State::updateOrCreate([
                'state' => $state['nome'],
                'uf' => $state['sigla']
            ]);
        }
    }
}
