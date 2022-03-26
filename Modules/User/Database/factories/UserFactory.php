<?php
namespace Modules\User\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'اکانت دمو',
            'email' => 'info@demo.com',
            'mobile' => '09363389294',
            'password' => Hash::make('1'),
            'role_id' => 1,
        ];
    }
}

