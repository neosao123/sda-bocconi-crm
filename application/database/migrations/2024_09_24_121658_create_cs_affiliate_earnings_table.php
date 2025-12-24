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
        Schema::create('cs_affiliate_earnings', function (Blueprint $table) {
            $table->increments('cs_affiliate_earning_id');
            $table->dateTime('cs_affiliate_earning_created');
            $table->dateTime('cs_affiliate_earning_updated');
            $table->integer('cs_affiliate_earning_projectid')->comment('[cs_affiliate_projects] table id');
            $table->integer('cs_affiliate_earning_invoiceid');
            $table->dateTime('cs_affiliate_earning_invoice_payment_date')->nullable();
            $table->dateTime('cs_affiliate_earning_commission_approval_date')->nullable();
            $table->integer('cs_affiliate_earning_affiliateid');
            $table->decimal('cs_affiliate_earning_amount', 10, 2);
            $table->decimal('cs_affiliate_earning_commission_rate', 10, 2)->default(0.00)->comment('set at the time of invoice payment');
            $table->string('cs_affiliate_earning_status', 30)->default('pending')->comment('paid|pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cs_affiliate_earnings');
    }
};
