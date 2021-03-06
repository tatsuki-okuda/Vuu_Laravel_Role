<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;



class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,20),
            'title' => $this->faker->sentence(rand(1,4)),
            'content' => $this->faker->realText(50),
            'person_in_charge' => $this->faker->realText(20),
            
        ];
    }
}
