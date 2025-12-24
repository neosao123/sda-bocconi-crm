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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id('subscription_id');
            $table->string('subscription_gateway_id', 250)->nullable();
            $table->dateTime('subscription_created')->nullable();
            $table->dateTime('subscription_updated')->nullable();
            $table->unsignedBigInteger('subscription_creatorid');
            $table->unsignedBigInteger('subscription_clientid');
            $table->unsignedBigInteger('subscription_categoryid')->default(4);
            $table->unsignedBigInteger('subscription_projectid')->nullable()->comment('optional');
            $table->string('subscription_gateway_product', 250)->nullable()->comment('stripe product id');
            $table->string('subscription_gateway_price', 250)->nullable()->comment('stripe price id');
            $table->string('subscription_gateway_product_name', 250)->nullable()->comment('e.g. Gold Plan');
            $table->integer('subscription_gateway_interval')->nullable()->comment('e.g. 2');
            $table->string('subscription_gateway_period', 50)->nullable()->comment('e.g. months');
            $table->dateTime('subscription_date_started')->nullable();
            $table->dateTime('subscription_date_ended')->nullable();
            $table->date('subscription_date_renewed')->nullable()->comment('from stripe');
            $table->date('subscription_date_next_renewal')->nullable()->comment('from stripe');
            $table->text('subscription_gateway_last_message')->nullable()->comment('from stripe');
            $table->dateTime('subscription_gateway_last_message_date')->nullable();
            $table->decimal('subscription_subtotal', 10, 2)->default(0.00);
            $table->decimal('subscription_amount_before_tax', 10, 2)->default(0.00);
            $table->decimal('subscription_tax_percentage', 10, 2)->default(0.00)->comment('percentage');
            $table->decimal('subscription_tax_amount', 10, 2)->default(0.00)->comment('amount');
            $table->decimal('subscription_final_amount', 10, 2)->default(0.00);
            $table->text('subscription_notes')->nullable();
            $table->string('subscription_status', 50)->default('pending')->comment('pending | active | failed | paused | cancelled');
            $table->string('subscription_visibility', 50)->default('visible')->comment('visible | invisible');
            $table->string('subscription_cron_status', 20)->default('none')->comment('none|processing|completed|error (used to prevent collisions when recurring invoiced)');
            $table->dateTime('subscription_cron_date')->nullable()->comment('date when cron was run');

            // Indexes
            $table->index('subscription_gateway_id');
            $table->index('subscription_gateway_product');
            $table->index('subscription_gateway_price');
            $table->index('subscription_creatorid');
            $table->index('subscription_clientid');
            $table->index('subscription_projectid');
            $table->index('subscription_categoryid');
            $table->index('subscription_status');
            $table->index('subscription_visibility');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
