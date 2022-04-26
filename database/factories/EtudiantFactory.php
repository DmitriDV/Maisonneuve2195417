<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ville;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $villes = Ville::all()->pluck('id')->toArray();
        return [
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'date_de_naissance' => $this->faker->date($format = 'Y-m-d', $max = '2000-01-01'),
            'villeId' => $this->faker->randomElement($villes)
        ];
    }
}
