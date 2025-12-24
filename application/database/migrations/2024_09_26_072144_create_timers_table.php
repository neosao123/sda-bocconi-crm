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
        Schema::create('timers', function (Blueprint $table) {
            $table->id('timer_id');
            $table->dateTime('timer_created')->nullable();
            $table->dateTime('timer_updated')->nullable();
            $table->unsignedBigInteger('timer_creatorid')->nullable();
            $table->integer('timer_started')->nullable()->comment('unix time stamp for when the timer was started');
            $table->integer('timer_stopped')->default(0)->comment('unix timestamp for when the timer was stopped');
            $table->integer('timer_time')->default(0)->comment('seconds');
            $table->unsignedBigInteger('timer_taskid')->nullable();
            $table->unsignedBigInteger('timer_projectid')->default(0)->comment('needed for repository filtering');
            $table->unsignedBigInteger('timer_clientid')->default(0)->comment('needed for repository filtering');
            $table->string('timer_status', 20)->default('running')->comment('running | stopped');
            $table->string('timer_billing_status', 50)->default('not_invoiced')->comment('invoiced | not_invoiced');
            $table->unsignedBigInteger('timer_billing_invoiceid')->nullable()->comment('invoice id, if billed');

            // Indexes
            $table->index('timer_creatorid');
            $table->index('timer_taskid');
            $table->index('timer_projectid');
            $table->index('timer_clientid');
            $table->index('timer_status');
            $table->index('timer_billing_status');
            $table->index('timer_billing_invoiceid');

            $table->comment = '[truncate]';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timers');
    }
};
