<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contract_templates')->insert([
            'contract_template_created' => '2023-01-07 17:07:29',
            'contract_template_updated' => '2022-05-22 09:15:49',
            'contract_template_creatorid' => 0,
            'contract_template_title' => 'Default Template',
            'contract_template_heading_color' => '#FFFFFF',
            'contract_template_title_color' => '#FFFFFF',
            'contract_template_body' => 'This agreement (the “Agreement”) is between <strong>{client_company_name}</strong> (the “Client”) and <strong>{company_name}</strong> (the “Service Provider”). This Agreement is dated <strong>{contract_date}</strong>.<br /><br />
                <h6><span style=\"text-decoration: underline;\"><br />DELIVERABLES</span></h6>
                <br />The Client is hiring the Service Provider to do the following: <br /><br />
                <ul>
                <li>Design a website template.</li>
                <li>Convert the template into a WordPress theme.</li>
                <li>Install the WordPress theme on the Client\'s website.</li>
                </ul>
                <h6><span style=\"text-decoration: underline;\"><br /><br />DURATION</span></h6>
                <br />The Service Provider will begin work on&nbsp;<strong>{contract_date}</strong> and must complete the work by <strong>{contract_end_date}</strong>.<br />
                <h6><span style=\"text-decoration: underline;\"><br /><br /><br />PAYMENT</span></h6>
                <br />The Client will pay the Service Provider a sum of <strong>{pricing_table_total}</strong>. Of this, the Client will pay the Service Provider a 30% deposit, before work begins.<br /><br /><strong>{pricing_table}</strong><br /><br />The Service Provider will invoice the Client on or after <strong>{contract_end_date}</strong>. <br /><br />The Client agrees to pay the Service Provider in full within 7 days of receiving the invoice. Payment after that date will incur a late fee of $500 per month.',
            'contract_template_system' => 'no'
        ]);
    }
}
