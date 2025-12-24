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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->dateTime('ticket_created')->nullable();
            $table->dateTime('ticket_updated')->nullable();
            $table->unsignedBigInteger('ticket_creatorid');
            $table->unsignedBigInteger('ticket_categoryid')->default(9);
            $table->unsignedBigInteger('ticket_clientid')->nullable();
            $table->unsignedBigInteger('ticket_projectid')->nullable();
            $table->string('ticket_subject', 250)->nullable();
            $table->text('ticket_message')->nullable();
            $table->string('ticket_priority', 50)->default('normal')->comment('normal | high | urgent');
            $table->dateTime('ticket_last_updated')->nullable();
            $table->tinyInteger('ticket_status')->default(1)->comment('numeric status id');
            $table->string('ticket_active_state', 20)->default('active')->comment('active|archived');

            // Custom fields
            for ($i = 1; $i <= 70; $i++) {
                $table->tinyText("ticket_custom_field_{$i}")->nullable();
            }

            // Indexes
            $table->index('ticket_creatorid');
            $table->index('ticket_categoryid');
            $table->index('ticket_clientid');
            $table->index('ticket_projectid');
            $table->index('ticket_priority');
            $table->index('ticket_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
