<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
    	return [
    	    //
            'fullname'=>$this->faker->text(20),
            'age'=>$this->faker->text(20),
            'dob'=>$this->faker->text(20),
            'adharno'=>$this->faker->text(20),
            'address'=>$this->faker->text(20),
            'vaccinated'=>$this->faker->text(20),
            'dose1date'=>$this->faker->text(20),
            'dose2date'=>$this->faker->text(20),
            'result'=>$this->faker->text(20),
            'isolation'=>$this->faker->text(20),
    	];
    }
}
