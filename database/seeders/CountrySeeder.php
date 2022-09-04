<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

        $countries = array(array('name' => 'Egypt', 'emoji' => '🇪🇬'));
        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
                'emoji' => $country['emoji']
            ]);
        }
    }
}
