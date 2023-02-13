<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $tipo_aleatorio = rand(0,1);
        if ($tipo_aleatorio == 0) {
            $tipo = 'Fisica';
        } else {
            $tipo = 'Juridica';
        }

        $ativo_aleatorio = rand(0,1);
        if ($ativo_aleatorio == 0) {
            $ativo = 'Sim';
        } else {
            $ativo = 'Nao';
        }
        return [
            'nome' => $faker->name,
            'email' => $faker->email,
            'celular' => $faker->cellphoneNumber(),
            'cidade' => $faker->city,
            'estado' => $faker->stateAbbr,
            'documento' => $faker->cpf,
            'tipo' => $tipo,
            'ativo' => $ativo,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}
