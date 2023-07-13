<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = \Morilog\Jalali\Jalalian::now();
        return [

            'name' => fake()->unique()->word,
            'nickName' => fake()->randomNumber(),
            'price' => fake()->numberBetween('1','99')*1000,
            'UPC'=> fake()->numberBetween('10000000','99999999'),
            'brand_id'=> rand(1,10),
            'volume'=>fake()->numberBetween('10','99').','.fake()->numberBetween('10','99').','.fake()->numberBetween('10','99'),
            'weight'=>fake()->numberBetween('100','999'),
            'quantity'=>fake()->numberBetween('100','999'),
            'maxOrder'=>fake()->numberBetween('1','9'),
            'abstract' => fake()->unique()->text('256'),
            'description' => fake()->unique()->text('512'),
            'status'=>'active',
            'user_id'=> '1',
            'gallery_id'=>rand(3,12),
            'created_at' => $date,
            'updated_at'=> $date

        ];
    }
}
