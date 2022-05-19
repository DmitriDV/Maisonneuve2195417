<?php

namespace Database\Factories;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $etudiants = Etudiant::all()->pluck('id')->toArray();
        return [
            'titre' => $this->faker->realText($maxNbChars = 40, $indexSize = 2),
            'contenu' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'etudiant_id' => $this->faker->randomElement($etudiants)
        ];
    }
}
