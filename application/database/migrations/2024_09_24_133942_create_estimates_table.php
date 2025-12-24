<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->integer('bill_estimateid')->autoIncrement();
            $table->string('bill_uniqueid', 100)->nullable();
            $table->dateTime('bill_created')->nullable();
            $table->dateTime('bill_updated')->nullable();
            $table->dateTime('bill_date_sent_to_customer')->nullable();
            $table->dateTime('bill_date_status_change')->nullable();
            $table->integer('bill_clientid')->nullable();
            $table->integer('bill_projectid')->nullable();
            $table->integer('bill_proposalid')->nullable();
            $table->integer('bill_contractid')->nullable();
            $table->integer('bill_creatorid');
            $table->integer('bill_categoryid')->default(4);
            $table->date('bill_date');
            $table->date('bill_expiry_date')->nullable();
            $table->decimal('bill_subtotal', 15, 2)->default(0.00);
            $table->string('bill_discount_type', 30)->default('none')->comment('amount | percentage | none');
            $table->decimal('bill_discount_percentage', 15, 2)->default(0.00)->comment('actual amount or percentage');
            $table->decimal('bill_discount_amount', 15, 2)->default(0.00);
            $table->decimal('bill_amount_before_tax', 15, 2)->default(0.00);
            $table->string('bill_tax_type', 20)->default('summary')->comment('summary|inline|none');
            $table->decimal('bill_tax_total_percentage', 15, 2)->default(0.00)->comment('percentage');
            $table->decimal('bill_tax_total_amount', 15, 2)->default(0.00)->comment('amount');
            $table->string('bill_adjustment_description', 250)->nullable();
            $table->decimal('bill_adjustment_amount', 15, 2)->default(0.00);
            $table->decimal('bill_final_amount', 15, 2)->default(0.00);
            $table->longText('bill_notes')->nullable();
            $table->text('bill_terms')->nullable();
            $table->string('bill_status', 50)->default('draft')->comment('draft | new | accepted | revised | declined | expired');
            $table->string('bill_type', 150)->default('estimate')->comment('estimate|invoice');
            $table->string('bill_estimate_type', 150)->default('estimate')->comment('estimate|document');
            $table->string('bill_visibility', 150)->default('visible')->comment('visible|hidden');
            $table->string('bill_viewed_by_client', 20)->default('no')->comment('yes|no');
            $table->string('bill_system', 20)->default('no')->comment('yes|no');
            $table->string('bill_converted_to_invoice', 20)->default('no')->comment('Added as of V1.10');
            $table->integer('bill_converted_to_invoice_invoiceid')->nullable()->comment('Added as of V1.10');
            $table->string('estimate_automation_status', 100)->default('disabled')->comment('disabled|enabled');
            $table->string('estimate_automation_create_project', 50)->default('no')->comment('yes|no');
            $table->string('estimate_automation_project_title', 250)->nullable();
            $table->string('estimate_automation_project_status', 100)->default('in_progress')->comment('not_started | in_progress | on_hold');
            $table->string('estimate_automation_create_tasks', 50)->default('no')->comment('yes|no');
            $table->string('estimate_automation_project_email_client', 50)->default('no')->comment('yes|no');
            $table->string('estimate_automation_create_invoice', 50)->default('no')->comment('yes|no');
            $table->integer('estimate_automation_invoice_due_date')->default(7);
            $table->string('estimate_automation_invoice_email_client', 50)->default('no');
            $table->string('estimate_automation_copy_attachments', 50)->default('no')->comment('yes|no');
            $table->integer('estimate_automation_log_created_project_id')->nullable();
            $table->integer('estimate_automation_log_created_invoice_id')->nullable();
            $table->string('bill_publishing_type', 20)->default('instant')->comment('instant|scheduled');
            $table->date('bill_publishing_scheduled_date')->nullable();
            $table->string('bill_publishing_scheduled_status', 20)->default('')->comment('pending|published|failed');
            $table->text('bill_publishing_scheduled_log')->nullable();
            $table->integer('bill_leadid')->nullable();
            $table->string('bill_leadtype', 50)->nullable();
            $table->integer('bill_date_wise_invoiceid')->default(1);

            $table->index('bill_clientid');
            $table->index('bill_creatorid');
            $table->index('bill_categoryid');
            $table->index('bill_status');
            $table->index('bill_type');
            $table->index('bill_visibility');
            $table->index('bill_viewed_by_client');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};
