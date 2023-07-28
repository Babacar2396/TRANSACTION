<?
namespace Database\Factories;

use App\Models\Compte;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompteFactory extends Factory
{
    protected $model = Compte::class;

    public function definition()
    {
        $fournisseurs = ['OM', 'WV', 'WR', 'CB'];

        return [
            'numeroCompte' => $this->faker->unique()->randomNumber(8) . '_' . $this->faker->phoneNumber,
            'solde' => $this->faker->randomFloat(2, 0, 10000),
            'fournisseur' => $this->faker->randomElement($fournisseurs),
            'client_id' => Client::factory()->create()->id,
        ];
    }
}
