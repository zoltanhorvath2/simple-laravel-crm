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
        for($i = 0; $i <= 15; $i++){
            DB::table('companies')->insert([
                'company_name' => 'Cég' . (string)$i,
                'email' => 'cég' . (string)$i . '@gmail.com',
                'logo_url' => 'https://clipground.com/images/gp-logo-2.jpg',
                'website_url' => 'www.vallalat' . (string)$i .'.hu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
