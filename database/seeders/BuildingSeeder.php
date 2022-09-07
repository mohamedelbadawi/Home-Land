<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\City;
use App\Models\Country;
use App\Models\Image;
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
        for ($i = 0; $i < 10; $i++) {
            $building = Building::create([
                'name' => $faker->streetName,
                'type' => $types[array_rand($types)],
                'beds' => rand(1, 15),
                'address' => $faker->address(),
                'year_built' => $faker->year(),
                'description' => $faker->paragraph,
                'sq' => $sq = rand(1, 500),
                'price' => $price = rand(100, 10000000),
                'price_sq' => rand(500,10000),
                'baths' => rand(1, 5),
                'user_id' => $users->random(),
                'country_id' => $countries->random(),
                'city_id' => $cities->random(),
                'status' => $statues[array_rand($statues)]
            ]);
            for ($i = 0; $i < 5; $i++) {

                Image::create(['name' => rand(1, 12) . ".jpg", 'imageable_id' => $building->id, 'imageable_type' => Building::class]);
            }
        }
    }
}
