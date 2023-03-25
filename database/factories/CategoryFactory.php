<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=category::class;
    public function definition(): array
    {
        return [
           'catName'=>$this->faker->text(30),
           'slug'=>$this->faker->slug(),
           'parentId'=>$this->faker->numberBetween(1,10),
           'type'=>$this->faker->numberBetween(1,5),
           'author'=>$this->faker->name(),
           'status'=>$this->faker->numberBetween(0,1)
            
        ];
    }
}
