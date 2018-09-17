<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $city_array = [
            array(
                'city' => 'Tanger',
                'lat' => '35.7594651',
                'lng' => '-5.833954299999959'
                )
            , array(
                'city' => 'Assilah',
                'lat' => '35.4646127',
                'lng' => '-6.030865400000039'
                ), 
            array(
                'city' => 'Larache',
                'lat' => '35.1744271',
                'lng' => '-6.147396399999934'
                ), 
            array(
                'city' => 'Tétouan',
                'lat' => '35.5888995',
                'lng' => '-5.362551599999961'
                ), 
            array(
                'city' => 'Al Hoceïma',
                'lat' => '35.2445589',
                'lng' => '-3.9317468000000417'
                ), 
            array(
                'city' => 'Oujda',
                'lat' => '34.681962',
                'lng' => '-1.9001550000000407'
                ), 
            array(
                'city' => 'Kénitra',
                'lat' => '34.2540503',
                'lng' => '-6.589016600000036'
                ), 
            array(
                'city' => 'Rabat',
                'lat' => '33.9715904',
                'lng' => '-6.849812899999961'
                ), 
            array(
                'city' => 'Casablanca',
                'lat' => '33.5731104',
                'lng' => '-7.589843400000063'
                ), 
            array(
                'city' => 'Marrakech',
                'lat' => '31.6294723',
                'lng' => '-7.981084499999952'
                ), 
            array(
                'city' => 'Agadir',
                'lat' => '30.4277547',
                'lng' => '-9.598107199999959'
                )
        ];
        $count_random = 10;

        $random_city_index = rand(0, $count_random);
        User::create([
            'name' => $faker->name,
            'email' => "super_admin@mail.com",
            'email_verified_at' => $faker->dateTime($max = 'now', $timezone = null),
            'password' => bcrypt('123456'),
            'role' => 'super_admin',
            'address' => $city_array[$random_city_index]["city"] . ", Maroc",
            'lat' => $city_array[$random_city_index]["lat"],
            'lng' => $city_array[$random_city_index]["lng"]
        ]);
        /* array_splice($city_array, $random_city_index, 1);
        $count_random--; */

        $random_city_index = rand(0, $count_random);
        User::create([
            'name' => $faker->name,
            'email' => "user@mail.com",
            'email_verified_at' => $faker->dateTime($max = 'now', $timezone = null),
            'password' => bcrypt('123456'),
            'role' => 'user',
            'address' => $city_array[$random_city_index]["city"] . ", Maroc",
            'lat' => $city_array[$random_city_index]["lat"],
            'lng' => $city_array[$random_city_index]["lng"]
        ]);
        /* array_splice($city_array, $random_city_index, 1);
        $count_random--; */

        foreach(range(1,9) as $index)
        {
            $random_city_index = rand(0, $count_random);
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $faker->dateTime($max = 'now', $timezone = null),
                'password' => bcrypt('123456'),
                'role' => 'user',
                'address' => $city_array[$random_city_index]["city"] . ", Maroc",
                'lat' => $city_array[$random_city_index]["lat"],
                'lng' => $city_array[$random_city_index]["lng"]
            ]);
            /* array_splice($city_array, $random_city_index, 1);
            $count_random--; */
        }
    }
}
