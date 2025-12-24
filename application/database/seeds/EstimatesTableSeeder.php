<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstimatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estimates')->insert([
            'bill_estimateid' => -100,
            'bill_uniqueid' => '84612794.02318210',
            'bill_created' => '2022-05-22 11:46:15',
            'bill_updated' => '2022-05-22 11:46:15',
            'bill_date_sent_to_customer' => null,
            'bill_date_status_change' => '2022-05-22 11:46:15',
            'bill_clientid' => 0,
            'bill_projectid' => 0,
            'bill_proposalid' => null,
            'bill_contractid' => null,
            'bill_creatorid' => 0,
            'bill_categoryid' => 5,
            'bill_date' => '2022-05-22',
            'bill_expiry_date' => null,
            'bill_subtotal' => 0.00,
            'bill_discount_type' => 'none',
            'bill_discount_percentage' => 0.00,
            'bill_discount_amount' => 0.00,
            'bill_amount_before_tax' => 0.00,
            'bill_tax_type' => 'summary',
            'bill_tax_total_percentage' => 0.00,
            'bill_tax_total_amount' => 0.00,
            'bill_adjustment_description' => null,
            'bill_adjustment_amount' => 0.00,
            'bill_final_amount' => 0.00,
            'bill_notes' => '<p>Thank you for your business. We look forward to working with you on this project.</p>',
            'bill_terms' => 'draft',
            'bill_status' => 'draft',
            'bill_type' => 'estimate',
            'bill_estimate_type' => 'document',
            'bill_visibility' => 'visible',
            'bill_viewed_by_client' => 'no',
            'bill_system' => 'yes',
            'bill_converted_to_invoice' => 'no',
            'bill_converted_to_invoice_invoiceid' => null,
            'estimate_automation_status' => 'disabled',
            'estimate_automation_create_project' => 'no',
            'estimate_automation_project_title' => null,
            'estimate_automation_project_status' => 'in_progress',
            'estimate_automation_create_tasks' => 'no',
            'estimate_automation_project_email_client' => 'no',
            'estimate_automation_create_invoice' => 'no',
            'estimate_automation_invoice_due_date' => 7,
            'estimate_automation_invoice_email_client' => 'no',
            'estimate_automation_copy_attachments' => 'no',
            'estimate_automation_log_created_project_id' => null,
            'estimate_automation_log_created_invoice_id' => null,
            'bill_publishing_type' => 'instant',
            'bill_publishing_scheduled_date' => null,
            'bill_publishing_scheduled_status' => '',
            'bill_publishing_scheduled_log' => null,
        ]);
    }
}
