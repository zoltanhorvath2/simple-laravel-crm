<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'last_name' => 'Kovács',
            'first_name' => 'Lajos',
            'company_id' => 1,
            'email' => 'kovacslajos@lajoskakft.hu',
            'phone_number' => '+36303334445',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
