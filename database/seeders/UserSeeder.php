<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.net',
            'password' => bcrypt('password'),
            'roles' => 1,
            'status' => 1,
        ]);

        // provider
        $providerCount = rand(10, 20);
        for ($i = 0; $i < $providerCount; $i++)
        {
            User::create([
                'name' => $faker->name,
                'email' => 'provider'.$i.'@example.net',
                'password' => bcrypt('password'),
                'roles' => 2,
                'status' => rand(1, 2),
            ]);
        }

        // seeker
        $seekerCount = 40 - 1 - $providerCount;
        for ($i = 0; $i < $seekerCount; $i++)
        {
            User::create([
                'name' => $faker->name,
                'email' => 'seeker'.$i.'@example.net',
                'password' => bcrypt('password'),
                'roles' => 3,
                'status' => rand(1, 2),
            ]);
        }
    }
}
