<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $st=rand(0,1);
        if($st==1){
            $ap='allow';
        }else {
            $ap = 'deny';
        }
        return [

            'comment_id' => '0',
            'user_id' => rand(1,2),
            'commentable_id' => '2',
            'commentable_type' => 'App\Models\Product',
            'text' => fake()->unique()->text(100),
            'approved' =>  $ap,
            'created_at' => now(),
            'updated_at'=> now()


        ];
    }
}
