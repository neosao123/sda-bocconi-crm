<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CsAffiliateEarningsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cs_affiliate_earnings')->insert([
            [
                'cs_affiliate_earning_id' => 3,
                'cs_affiliate_earning_created' => Carbon::parse('2022-08-16 18:25:17'),
                'cs_affiliate_earning_updated' => Carbon::parse('2022-08-16 18:25:50'),
                'cs_affiliate_earning_projectid' => 5,
                'cs_affiliate_earning_invoiceid' => 137,
                'cs_affiliate_earning_invoice_payment_date' => Carbon::parse('2022-08-16 18:25:17'),
                'cs_affiliate_earning_commission_approval_date' => Carbon::parse('2022-08-16 18:25:50'),
                'cs_affiliate_earning_affiliateid' => 167,
                'cs_affiliate_earning_amount' => 100.00,
                'cs_affiliate_earning_commission_rate' => 10.00,
                'cs_affiliate_earning_status' => 'paid',
            ],
        ]);
    }
}
