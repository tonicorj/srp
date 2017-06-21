<?php

use Illuminate\Database\Seeder;
use SRP\Parceiros;
//use Faker\Factory as Fake;


class ParceirosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // só cria registros se tiver menos de 25 registros
        $qtd = Parceiros::all()->count();
        if ($qtd < 25) {
            $faker = Faker\Factory::create('pt_BR');
            foreach (range(1,25) as $index) {
                $id = BuscaProximoCodigo('PARCEIROS');
                if ($id == null) {
                    Parceiros::create(
                        ['PARCEIRO_NOME' => $faker->name]
                    );
                } else {
                    Parceiros::create(
                        ['ID_PARCEIRO' => $id, 'PARCEIRO_NOME' => $faker->name]
                    );
                }
            }
        }

        /*
        try
            { DB::statement('SET IDENTITY_INSERT PARCEIROS ON'); }
        catch (\Exception $e)
            { }
        */
    }
}
