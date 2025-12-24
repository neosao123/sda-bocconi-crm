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
        Schema::create('amc_invoices', function (Blueprint $table) {
            $table->id('bill_amc_invoiceid');
            $table->string('bill_uniqueid', 100)->nullable();
            $table->dateTime('bill_created')->nullable();
            $table->dateTime('bill_updated')->nullable();
            $table->dateTime('bill_date_status_change')->nullable();
            $table->integer('bill_clientid');
            $table->integer('bill_projectid')->nullable()->comment('optional');
            $table->integer('bill_date_wise_amc_invoiceid')->default(1);
            $table->integer('bill_creatorid');
            $table->date('bill_from_date');
            $table->date('bill_to_date')->nullable();
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
            $table->string('bill_status', 50)->default('draft')->comment('draft | due | overdue | paid | part_paid');
            $table->string('bill_type', 20)->default('invoice')->comment('invoice|estimate|proforma_invoice|amc_invoice');
            $table->string('bill_visibility', 20)->default('visible')->comment('visible|hidden');
            $table->string('bill_cron_status', 20)->default('none')->comment('none|processing|completed|error');
            $table->dateTime('bill_cron_date')->nullable()->comment('date when cron was run');
            $table->string('bill_viewed_by_client', 20)->default('no')->comment('yes|no');
            $table->string('bill_system', 20)->default('no')->comment('yes|no');
            $table->string('bill_publishing_type', 20)->default('instant')->comment('instant|scheduled');
            $table->date('bill_publishing_scheduled_date')->nullable();
            $table->string('bill_publishing_scheduled_status', 20)->default('')->comment('pending|published|failed');
            $table->text('bill_publishing_scheduled_log')->nullable();

            // Indexes
            $table->index('bill_clientid');
            $table->index('bill_projectid');
            $table->index('bill_creatorid');
            $table->index('bill_status');
            $table->index('bill_type');
            $table->index('bill_visibility');
            $table->index('bill_cron_status');
            $table->index('bill_viewed_by_client');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amc_invoices');
    }
};
