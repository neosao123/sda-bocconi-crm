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
        Schema::create('payment_sessions', function (Blueprint $table) {
            $table->id('session_id'); // AUTO_INCREMENT
            $table->dateTime('session_created')->nullable();
            $table->dateTime('session_updated')->nullable();
            $table->integer('session_creatorid')->nullable()->comment('user making the payment');
            $table->string('session_creator_fullname', 150)->nullable();
            $table->string('session_creator_email', 150)->nullable();
            $table->string('session_gateway_name', 150)->nullable()->comment('stripe | paypal | etc');
            $table->string('session_gateway_ref', 150)->nullable()->comment('Stripe - The checkout_session_id | Paypal -');
            $table->decimal('session_amount', 10, 2)->nullable()->comment('amount of the payment');
            $table->string('session_invoices', 250)->nullable()->comment('single invoice id | future - comma separated invoice ids for this payment');
            $table->integer('session_subscription')->nullable()->comment('subscription id');
            $table->text('session_payload')->nullable();

            // Indexes
            $table->index('session_gateway_name');
            $table->index('session_gateway_ref');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_sessions');
    }
};
