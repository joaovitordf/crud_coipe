<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoria_aleatorio = rand(0, 4);
        if ($categoria_aleatorio == 0) {
            $categoria = 'Energia';
        } elseif ($categoria_aleatorio == 1) {
            $categoria = 'Internet';
        } elseif ($categoria_aleatorio == 2) {
            $categoria = 'Transporte';
        } elseif ($categoria_aleatorio == 3) {
            $categoria = 'Vendas de servicos';
        } elseif ($categoria_aleatorio == 4) {
            $categoria = 'Vendas de produtos';
        }

        $tipo_aleatorio = rand(0, 1);
        if ($tipo_aleatorio == 0) {
            $tipo = 'Credito';
        } else {
            $tipo = 'Debito';
        }
        return [
            'nome_categoria' => $categoria,
            'tipo_categoria' =>  $tipo,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}
