<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $likeable=$this->likeable();
        return [
            'user_id'=>User::first() ?? User::factory(),
            'likeable_type'=> $likeable,
            'likeable_id'=>$likeable::factory(),
            'vote'=>$this->faker->randomElement([1,-1])
        ];
    }

    private function likeable(){
        return $this->faker->randomElement([
            Video::class,
            Comment::class
        ]);
    }
}
