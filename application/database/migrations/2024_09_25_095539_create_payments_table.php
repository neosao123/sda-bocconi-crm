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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id')->comment('[truncate]');
            $table->dateTime('payment_created')->nullable();
            $table->dateTime('payment_updated')->nullable();
            $table->integer('payment_creatorid')->nullable()->comment("'0' for system");
            $table->date('payment_date')->nullable();
            $table->integer('payment_invoiceid')->nullable()->comment('invoice id');
            $table->integer('payment_subscriptionid')->nullable()->comment('subscription id');
            $table->integer('payment_clientid')->nullable();
            $table->integer('payment_projectid')->nullable();
            $table->decimal('payment_amount', 10, 2);
            $table->string('payment_transaction_id', 100)->nullable();
            $table->string('payment_gateway', 100)->nullable()->comment('paypal | stripe | cash | bank');
            $table->text('payment_notes')->nullable();
            $table->string('payment_type', 50)->default('invoice')->comment('invoice|subscription|amc-invoice');
            $table->integer('payment_amc_invoiceid')->nullable()->comment("amc invoice id");
            // Indexes
            $table->index('payment_creatorid');
            $table->index('payment_invoiceid');
            $table->index('payment_clientid');
            $table->index('payment_projectid');
            $table->index('payment_gateway');
            $table->index('payment_subscriptionid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
