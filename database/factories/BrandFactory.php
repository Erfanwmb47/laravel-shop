<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [

            'name' => fake()->unique()->name(),
            'tag' => fake()->randomNumber(),
            'description' => fake()->name(),
            'country_id' => fake()->numberBetween('1','233'),
            'gallery_id' => rand(1,10),
            'created_at' => now(),
            'updated_at'=> now()
        ];

    }



}
