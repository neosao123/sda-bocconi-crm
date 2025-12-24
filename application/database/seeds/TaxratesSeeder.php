<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taxrates')->insert([
            [
                'taxrate_id' => 1,
                'taxrate_uniqueid' => 'zero-rated-tax-rate',
                'taxrate_created' => '2024-07-11 09:08:22',
                'taxrate_updated' => '2024-07-11 09:08:22',
                'taxrate_creatorid' => 0,
                'taxrate_name' => 'No Tax',
                'taxrate_value' => 0.00,
                'taxrate_type' => 'system',
                'taxrate_clientid' => null,
                'taxrate_estimateid' => null,
                'taxrate_invoiceid' => null,
                'taxrate_status' => 'enabled',
            ],
        ]);
    }
}
