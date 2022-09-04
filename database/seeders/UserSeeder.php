<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $faker = Factory::create();

        $user = User::create([
            'name' => 'Mohamed',
            'email' => 'Mohamed@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        $user->assignRole('admin');

        for ($i = 0; $i < 50; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('123456789')
            ]);
            $user->assignRole('agent');
        }
    }
}
