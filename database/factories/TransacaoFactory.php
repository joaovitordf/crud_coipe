<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transacao>
 */
class TransacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        $status_aleatorio = rand(0, 1);
        if ($status_aleatorio == 0) {
            $status = 'Aberta';
        } else {
            $status = 'Liquidada';
        }

        $tipo_aleatorio = rand(0, 1);
        if ($tipo_aleatorio == 0) {
            $tipo = 'Credito';
        } else {
            $tipo = 'Debito';
        }
        return [
            'status_transacao' => $status,
            'tipo_transacao' => $tipo,
            'pessoa_id' => Pessoa::factory(),
            'categoria_id' => Categoria::factory(),
            'saldo_atual' => $faker->randomFloat(2, 12, 150000),
            'data_vencimentoTitulo' => date("Y-m-d"),
            'data_liquidacao' => date("Y-m-d"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}
