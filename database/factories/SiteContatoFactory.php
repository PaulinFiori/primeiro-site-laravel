<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContato;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = SiteContato::class;

    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'telefone' => fake()->tollFreePhoneNumber(),
            'email' => fake()->safeEmail(),
            'motivo_contatos_id' => fake()->numberBetween($min = 1, $max = 3),
            'mensagem' => fake()->text(200)
        ];
    }
}
