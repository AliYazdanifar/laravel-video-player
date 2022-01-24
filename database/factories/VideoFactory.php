<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $persianFaker=\Faker\Factory::create('fa_IR');
        return [
            'name' => $persianFaker->name(),
            'url' =>'https://aspb2.cdn.asset.aparat.com/aparat-video/a09b9e8dd42a8f184dc46f5ae25a5b2014796723-240p.mp4?wmsAuthSign=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbiI6IjM0Njc3OGJhN2Q5ZTRjZGYzMGVlYTJhYmFlNmQxODY1IiwiZXhwIjoxNjQyMDc5MzU4LCJpc3MiOiJTYWJhIElkZWEgR1NJRyJ9.BsIL2XCzotCXD4aHClZGg9iYFRm4FO3jHsz2ake82H0',
            'length' => $this->faker->randomNumber(3),
            'slug' => $this->faker->slug(),
            'description' => $persianFaker->realText(),
            'thumbnail' => 'https://picsum.photos/446/240?random='.rand(1,99),
            'category_id' => Category::first() ?? Category::factory()
        ];
    }
}
