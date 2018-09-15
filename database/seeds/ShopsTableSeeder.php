<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $city_array = ['Tanger', 'Assilah', 'Larache', 'Tétouan', 'Al Hoceïma', 'Oujda', 'Kénitra', 'Rabat', 'Casablanca', 'Marrakech', 'Agadir'];
        $count_random = 10;
        foreach(range(1,11) as $index)
        {
            $random_city_index = rand(0, $count_random);
            Shop::create([
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'image' => 'shop_' . $index . '.png',
                'address' => $city_array[$random_city_index] . ", Maroc"
            ]);
            array_splice($city_array, $random_city_index, 1);
            $count_random--;
        }
    }
}
