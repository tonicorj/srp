<?php

use Illuminate\Database\Seeder;
use SRP\Models\SSocial\origemservsocial;

class OrigemSSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // só cria registros se tiver menos de 25 registros
        $qtd = origemservsocial::all()->count();
        if ($qtd < 25) {
            $faker = Faker\Factory::create('pt_BR');
            foreach (range(1,25) as $index) {
                $id = BuscaProximoCodigo('ORIGEM_SERVSOCIAL');
                if ($id == null) {
                    origemservsocial::create(
                        ['ORIGEM_SERVSOCIAL_DESCRICAO' => $faker->word]
                    );
                } else {
                    origemservsocial::create(
                        ['ID_ORIGEM_SERVSOCIAL' => $id, 'ORIGEM_SERVSOCIAL_DESCRICAO' => $faker->word]
                    );
                }
            }
        }
    }
}
