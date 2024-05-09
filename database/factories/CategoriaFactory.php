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
    public function definition(): array
    {
        $categoria_nome = $this->faker->unique()->words($nb=2,$asText = true);
        $slug = Str::slug($categoria_nome);
        return [
            'nome' => Str::title($categoria_nome),
            'slug'=>$slug,
            'image' => $this->faker->numberBetween(1,6).'.jpg'
        ];
    }
}
