<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 15; $i++) {

            DB::table('employees')->insert([
                'last_name' => $faker->lastName(),
                'first_name' => $faker->firstName(),
                'company_id' => $i + 1,
                'email' => $faker->companyEmail(),
                'phone_number' => $faker->phoneNumber(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('employees')->insert([
                'last_name' => $faker->lastName(),
                'first_name' => $faker->firstName(),
                'company_id' => $i + 1,
                'email' => $faker->companyEmail(),
                'phone_number' => $faker->phoneNumber(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
