<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $prduct_name = $this->faker->unique()->words($nb=2,$asText = true);
        $slug = Str::slug($prduct_name);
        $image_name =$this->faker->numberBetween(1,24).'.jpg';
        return [
            'name' => Str::title($prduct_name),
            'pequena_descricao' => $this->faker->text(200),
            'descricao' => $this->faker->text(500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100,200),
            'image' => $image_name,
            'images' => $image_name,
            'category_id' => $this->faker->numberBetween(1,6),
            'brand_id' => $this->faker->numberBetween(1,6)
        ];
    }
}
