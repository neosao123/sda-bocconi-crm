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
        Schema::create('webhooks', function (Blueprint $table) {
            $table->id('webhooks_id'); // This creates an auto-incrementing primary key
            $table->dateTime('webhooks_created');
            $table->dateTime('webhooks_updated');
            $table->integer('webhooks_creatorid')->default(0);
            $table->string('webhooks_gateway_name', 100)->nullable()->comment('stripe|paypal|etc');
            $table->string('webhooks_type', 100)->nullable()->comment('type of call, as sent by gateway');
            $table->string('webhooks_payment_type', 30)->nullable()->comment('onetime|subscription');
            $table->decimal('webhooks_payment_amount', 10, 2)->nullable()->comment('(optional)');
            $table->string('webhooks_payment_transactionid', 150)->nullable()->comment('payment transaction id');
            $table->string('webhooks_matching_reference', 100)->nullable()->comment('e.g. Stripe (checkout session id) | Paypal (random string) that is used to match the webhook/ipn to the initial payment_session');
            $table->string('webhooks_matching_attribute', 100)->nullable()->comment('mainly used to record what is happening with a subscription (e.g cancelled|renewed)');
            $table->text('webhooks_payload')->nullable()->comment('(optional) json payload');
            $table->text('webhooks_comment')->nullable()->comment('(optional)');
            $table->dateTime('webhooks_started_at')->nullable()->comment('when the cronjob started this webhook');
            $table->dateTime('webhooks_completed_at')->nullable()->comment('when the cronjob completed this webhook');
            $table->tinyInteger('webhooks_attempts')->default(0)->comment('the number of times this webhook has been attempted');
            $table->string('webhooks_status', 20)->default('new')->comment('new | processing | failed | completed (set to processing by the cronjob, to avoid duplicate processing)');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhooks');
    }
};
