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
        $city_array = ['Tanger', 'Assilah', 'Larache', 'Tétouan', 'Al Hoceïma', 'Oujda', 'Kénitra', 'Rabat', 'Casablanca', 'Marrakech', 'Agadir'];
        $count_random = 10;

        $random_city_index = rand(0, $count_random);
        User::create([
            'name' => $faker->name,
            'email' => "super_admin@mail.com",
            'email_verified_at' => $faker->dateTime($max = 'now', $timezone = null),
            'password' => bcrypt('123456'),
            'role' => 'super_admin',
            'address' => $city_array[$random_city_index] . ", Maroc"
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
            'address' => $city_array[$random_city_index] . ", Maroc"
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
                'address' => $city_array[$random_city_index] . ", Maroc"
            ]);
            /* array_splice($city_array, $random_city_index, 1);
            $count_random--; */
        }
    }
}
