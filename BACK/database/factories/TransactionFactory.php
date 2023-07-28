<?php
namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Compte;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        $types = ['depot', 'retrait', 'transfert'];
        $compteSource = Compte::factory()->create();
        $compteDestination = Compte::factory()->create();

        return [
            'type' => $this->faker->randomElement($types),
            'montant' => $this->faker->randomFloat(2, 500, 1000000),
            'dateTransaction' => $this->faker->dateTimeThisYear(),
            'statut' => $this->faker->randomElement(['valide', 'en_attente', 'annule']),
            'compteSource_id' => Compte::factory()->create()->id,
            'compteDestination_id' => Compte::factory()->create()->id,
            'code' => $this->faker->unique()->randomNumber(30),
        ];
    }
}
