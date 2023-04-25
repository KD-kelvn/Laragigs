<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class listingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title'=> $this->faker->sentence(),
            'Tags'=> 'laravel, api, next js',
            'Company'=> $this->faker->company(),
            'Location'=> $this->faker->city(),
            'Email'=> $this->faker->unique()->companyEmail(),
            'Website'=> $this->faker->url(),
            'Description'=> $this->faker->paragraph(6)
        ];
    }
}
