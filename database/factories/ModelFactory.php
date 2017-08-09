<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(SRP\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// modelo de atividades
$factory->define(Atividades::class, function(Faker\Generator $faker) {
    return [
        'ATIVIDADE_DESCRICAO' => $faker->word,
    ];
});

// departamentos
$factory->define(\SRP\Models\adm\Departamentos::class, function(Faker\Generator $faker) {
    return [
        'DEPARTAMENTO_DESCRICAO' => $faker->word,
        //'ID_FUNCIONARIO'=>'';
    ];
});

// modelo de parceiros para seeder
$factory->define(Parceiros::class, function(Faker\Generator $faker) {
    return [
        'ID_PARCEIRO' => BuscaProximoCodigo('PARCEIROS'),
        'ID_CIDADE' => null,
        'PARCEIRO_NOME' => $faker->name,
        'PARCEIRO_PRIORIDADE' => rand(1,10),
        'PARCEIRO_TELEFONE' => $faker->phoneNumber,
        'PARCEIRO_CELULAR'  => $faker->phoneNumber,
        'PARCEIRO_MAIL'     => $faker->email,
        'NOME_CONTATO_PARCEIRO' => $faker->name,
    ];
});