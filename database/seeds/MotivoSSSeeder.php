<?php

use Illuminate\Database\Seeder;
use SRP\Models\SSocial\AtividadesSS;
class MotivoSSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // só cria registros se tiver menos de 25 registros
        $qtd = AtividadesSS::all()->count();
        if ($qtd < 25) {
            $faker = Faker\Factory::create('pt_BR');
            foreach (range(1,25) as $index) {
                $id = BuscaProximoCodigo('ATIVIDADES_ASSIST_SOCIAL');
                if ($id == null) {
                    AtividadesSS::create(
                        ['ATIV_ASSIST_SOCIAL_DESCR' => $faker->word]
                    );
                } else {
                    AtividadesSS::create(
                        ['ID_ATIV_ASSIST_SOCIAL' => $id, 'ATIV_ASSIST_SOCIAL_DESCR' => $faker->word]
                    );
                }
            }
        }
    }
}
