<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();
        $categories = Categorie::all()->pluck('id')->toArray();
        return [
            'titre_fr' => $this->faker->realText($maxNbChars = 40, $indexSize = 2),
            'contenu_fr' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'titre_en' => $this->faker->realText($maxNbChars = 40, $indexSize = 2),
            'contenu_en' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'user_id' => $this->faker->randomElement($users),
            'categorie_id' => $this->faker->randomElement($categories)
        ];
    }
}
