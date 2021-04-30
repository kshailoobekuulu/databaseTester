<?php

namespace Database\Factories;

use App\Models\Task;
use App\Validators\Admin\TaskValidator;
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
            'title' => $this->faker->text(50),
            'description' => $this->faker->paragraph,
            'type' => TaskValidator::$types[random_int(0, 3)],
            'mysql_solution' => $this->faker->paragraph(),
            'postgre_solution' => $this->faker->paragraph(),
            'mssql_solution' => $this->faker->paragraph(),
            'active' => $this->faker->boolean,
        ];
    }
}
