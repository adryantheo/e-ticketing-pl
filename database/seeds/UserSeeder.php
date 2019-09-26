<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        User::create([    
            'name' => $faker->name,
            'email' => 'superadmon@mail.com',
            'password' => Hash::make('rahasia'),
            'role_id' => '1'
        ]);
    }
}
