<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $valid_countries= array('france', 'France', 'Espagne', 'espagne', 'Italie', 'italie', 'Belgique', 'belgique');
        return [
            'nom'=>fake()->name(),
            'age'=>rand(7,77),
            'pays'=>fake()->randomElement($valid_countries)
        ];
    }
}
