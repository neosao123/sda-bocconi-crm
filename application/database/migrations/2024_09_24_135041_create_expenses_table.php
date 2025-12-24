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
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('expense_id');
            $table->string('expense_importid', 100)->nullable();
            $table->date('expense_created')->nullable();
            $table->date('expense_updated')->nullable();
            $table->date('expense_date')->nullable();
            $table->string('expense_pay_to')->nullable();
            $table->text('expense_description')->nullable();
            $table->decimal('expense_amount', 10, 2);
            $table->integer('expense_creatorid');
            $table->decimal('expense_amount_in_words', 10, 2)->nullable();
            $table->string('expense_authorized_by')->nullable();
            $table->string('expense_payment_method')->nullable()->comment('cash|online|cheque');
            $table->text('expense_reference_id')->nullable();

            // $table->integer('expense_clientid')->nullable();
            // $table->integer('expense_projectid')->nullable();
            // $table->integer('expense_categoryid')->default(7);
            // $table->decimal('expense_amount_without_tax', 10, 2);
            // $table->text('expense_type')->nullable()->comment('business|client');
            // $table->string('expense_billable', 30)->default('not_billable')->comment('billable | not_billable');
            // $table->string('expense_billing_status', 30)->default('not_invoiced')->comment('invoiced | not_invoiced');
            // $table->integer('expense_billable_invoiceid')->nullable()->comment('id of the invoice that it has been billed to');

            // Define indexes
            $table->index('expense_creatorid');
            // $table->index('expense_clientid');
            // $table->index('expense_projectid');
            // $table->index('expense_billable');
            // $table->index('expense_billing_status');
            // $table->index('expense_billable_invoiceid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
