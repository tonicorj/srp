<?php

use Illuminate\Database\Seeder;

class AtividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( Atividades::class, 20 )->create();
    }
}
