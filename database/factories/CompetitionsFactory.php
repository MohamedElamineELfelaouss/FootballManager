<?php

namespace Database\Factories;


use App\Models\Competitions;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionsFactory extends Factory
{
    protected $model = Competitions::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'type' => $this->faker->randomElement(['League', 'Cup', 'International']),
            'annee' => $this->faker->year,
        ];
    }
}
