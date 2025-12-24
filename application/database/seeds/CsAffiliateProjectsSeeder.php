<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CsAffiliateProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cs_affiliate_projects')->insert([
            [
                'cs_affiliate_project_id' => 7,
                'cs_affiliate_project_created' => 2022,
                'cs_affiliate_project_updated' => 2022,
                'cs_affiliate_project_creatorid' => 1,
                'cs_affiliate_project_affiliateid' => 167,
                'cs_affiliate_project_projectid' => 5,
                'cs_affiliate_project_commission_rate' => 10.00,
                'cs_affiliate_project_status' => 'active',
            ],
        ]);
    }
}
