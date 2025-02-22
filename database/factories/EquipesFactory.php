<?php

namespace Database\Factories;

use App\Models\Equipes;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipesFactory extends Factory
{
    protected $model = Equipes::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->unique()->company,
            'pays' => $this->faker->country,
            'entraineur' => $this->faker->name,
        ];
    }
}
