<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $produto_nome = $this->faker->unique()->words($nb=2,$asText = true);
        $slug = Str::slug($produto_nome);
        $image_nome =$this->faker->numberBetween(1,24).'.jpg';
        return [
            'nome' => Str::title($produto_nome),
            'slug' => $slug,
            'pequena_descricao' => $this->faker->text(200),
            'descricao' => $this->faker->text(500),
            'preco_regular' => $this->faker->numberBetween(1,22),
            'estoque_status' => 'em_estoque',
            'quantidade' => $this->faker->numberBetween(100,200),
            'image' => $image_nome,
            'categoria_id' => $this->faker->numberBetween(1,6),
            'marca_id' => $this->faker->numberBetween(1,6)
        ];
    }
}
