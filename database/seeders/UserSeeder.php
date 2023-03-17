<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class UserSeeder extends Seeder
{
    private const ROLES = ['candidate', 'admin'];

    private const PASSWORDS = [
        'admin123', '123456'
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < count(self::ROLES); $i++) {
            $role = Role::where('type', self::ROLES[$i])->first();
            if (!is_null($role)) continue;
            Role::create(['type' => self::ROLES[$i]]);
        }
        $faker = faker::create();
        foreach (range(1, 50) as $index) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => self::PASSWORDS[rand(0, 1)],
                'role_id' => Role::inRandomOrder()->first()->id,
                'phone' => $faker->phoneNumber()
            ]);
        }
    }
}
