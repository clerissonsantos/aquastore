<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ClienteFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'cpf' => $this->generateCustomText(11),
            'data_nascimento' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->randomDigit(11),
            'cep' => $this->generateCustomText(8),
            'logradouro' => fake()->streetName(),
            'numero' => $this->generateCustomText(2),
            'bairro' => $this->generateCustomText(10),
            'cidade' => $this->generateCustomText(10),
            'uf' => $this->generateCustomText(2),
        ];
    }

    private function generateCustomText($length)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
