<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildings')->delete();
        $faker =  Factory::create();
        $countries = Country::pluck('id');
        $cities = City::pluck('id');
        $users = User::role('agent')->pluck('id');
        $types = ['sell', 'rent'];
        $statues = ['pending', 'canceled', 'approved'];
        for ($i = 0; $i < 500; $i++) {
            Building::create([
                'name' => $faker->streetName,
                'type' => $types[array_rand($types)],
                'beds' => rand(1, 15),
                'description' => $faker->paragraph,
                'sq' => rand(1, 500),
                'price' => rand(100, 10000000),
                'baths' => rand(1, 5),
                'user_id' => $users->random(),
                'country_id' => $countries->random(),
                'city_id' => $cities->random(),
                'status' => $statues[array_rand($statues)]
            ]);
        }
    }
}
