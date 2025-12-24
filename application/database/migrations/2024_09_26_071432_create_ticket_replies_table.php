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
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id('ticketreply_id');
            $table->dateTime('ticketreply_created');
            $table->dateTime('ticketreply_updated');
            $table->unsignedBigInteger('ticketreply_creatorid');
            $table->unsignedBigInteger('ticketreply_clientid')->nullable();
            $table->unsignedBigInteger('ticketreply_ticketid');
            $table->text('ticketreply_text');

            // Indexes
            $table->index('ticketreply_creatorid');
            $table->index('ticketreply_ticketid');
            $table->index('ticketreply_clientid');

            $table->comment = '[truncate]';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_replies');
    }
};
