<?php

use Illuminate\Database\Seeder;
use SRP\Models\DFutebol\Parceiros;
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
        factory( Parceiros::class, 20 )->create();
    }
}
