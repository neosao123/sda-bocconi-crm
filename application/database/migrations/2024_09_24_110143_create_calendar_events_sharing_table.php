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
        Schema::create('calendar_events_sharing', function (Blueprint $table) {
            $table->id('calendarsharing_id')->comment('[truncate]'); // Primary Key
            $table->dateTime('calendarsharing_created')->nullable();
            $table->dateTime('calendarsharing_updated')->nullable();
            $table->unsignedBigInteger('calendarsharing_eventid'); // Foreign Key
            $table->unsignedBigInteger('calendarsharing_userid')->nullable(); // Foreign Key

            // Define the keys for the event ID and user ID
            $table->index('calendarsharing_eventid', 'calendarassigned_eventid');
            $table->index('calendarsharing_userid', 'calendarassigned_userid');

            // Optionally, you can define foreign keys for referential integrity
            // $table->foreign('calendarsharing_eventid')->references('id')->on('calendar_events')->onDelete('cascade');
            // $table->foreign('calendarsharing_userid')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_events_sharing');
    }
};
