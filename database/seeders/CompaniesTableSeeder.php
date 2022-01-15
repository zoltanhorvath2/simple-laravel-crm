<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'company_name' => 'Lajoska Kft.',
            'email' => 'lajoskkft@gmail.com',
            'logo_url' => 'https://clipground.com/images/gp-logo-2.jpg',
            'website_url' => 'www.lajoskakft.hu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
