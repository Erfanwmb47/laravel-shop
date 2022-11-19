<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'country_id' => fake()->numberBetween('1','252'),
            'gallery_id' => rand(1,10),
        ];
    }



}
