<?php

namespace Database\Factories;

// use App\Models\Categorie;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategoryFactory extends Factory
{
    // protected $categorie = Categorie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'game_id' => function () {
                return Game::inRandomOrder()->first()->id;
            },
        ];
    }
}
