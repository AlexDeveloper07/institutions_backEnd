<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();
        foreach (range(1, 50) as $index) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => $faker->password(),
                'role_id' => 1,
                'phone' => $faker->phoneNumber()
            ]);
        }
        foreach (range(1, 5) as $index) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => 'admin123',
                'role_id' => 2,
                'phone' => $faker->phoneNumber()
            ]);
        }
    }

}
