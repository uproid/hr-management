<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ToombaApiDataFake extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1, 10) as $country) {
            DB::table("countries")->insert(
                [
                    'id' => $faker->countryCode(),
                    'country_name' => $faker->country(),
                    'region_id' => rand(1, 10),
                ]
            );

            DB::table("departments")->insert(
                [
                    'department_name' => $faker->word(),
                    'location_id' => rand(1, 10),
                ]
            );

            DB::table("dependents")->insert(
                [
                    'first_name' => $faker->firstName(),
                    'last_name' => $faker->lastName(),
                    'relationship' => Arr::random(["wife", "soon", "man"], 1)[0],
                    'employee_id' => rand(1, 10),
                ]
            );

            DB::table("employees")->insert(
                [
                    'first_name' => $faker->firstName(),
                    'last_name' => $faker->lastName(),
                    'email' => $faker->email(),
                    'phone_number' => $faker->phoneNumber(),
                    "hire_date" => $faker->date($format = 'Y-m-d', $max = 'now'),
                    "salary" => $faker->numberBetween($min = 1000, $max = 9000) . ".00",
                    "department_id" => rand(1, 10),
                    "job_id" => rand(1, 10),
                    "manager_id" => rand(1, 10),
                ]
            );

            DB::table("jobs")->insert(
                [
                    'job_title' => $faker->word(),
                    "min_salary" => $faker->numberBetween($min = 1000, $max = 4000) . ".00",
                    "max_salary" => $faker->numberBetween($min = 4000, $max = 9000) . ".00",
                ]
            );

            DB::table("locations")->insert(
                [
                    'street_address' => $faker->streetAddress(),
                    "postal_code" => $faker->postcode(),
                    "city" => $faker->city(),
                    "state_province" => $faker->city(),
                    "country_id" => $faker->countryCode(),
                ]
            );

            DB::table("regions")->insert(
                [
                    'region_name' => $faker->word(),
                ]
            );
        }
    }
}
