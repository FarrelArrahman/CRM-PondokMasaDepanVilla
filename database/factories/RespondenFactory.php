<?php

namespace Database\Factories;

use App\Models\Responden;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RespondenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Responden::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = ['L', 'P'];

        return [
            'nama_responden'    => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'no_hp'             => $this->faker->phoneNumber,
            'jenis_kel'         => $gender[rand(0,1)],
            'alamat'            => $this->faker->address,
            'status'            => 'Aktif',
            'keterangan'        => ''
        ];
    }
}
