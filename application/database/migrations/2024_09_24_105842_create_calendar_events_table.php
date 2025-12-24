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
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->id('calendar_event_id'); // Primary Key
            $table->string('calendar_event_uniqueid', 100)->nullable();
            $table->dateTime('calendar_event_created');
            $table->dateTime('calendar_event_updated');
            $table->integer('calendar_event_creatorid')->nullable();
            $table->string('calendar_event_title', 200)->nullable();
            $table->text('calendar_event_description')->nullable();
            $table->text('calendar_event_location')->nullable();
            $table->string('calendar_event_all_day', 50)
                ->default('yes')
                ->comment('yes|no');
            $table->date('calendar_event_start_date')->nullable();
            $table->time('calendar_event_start_time')->nullable();
            $table->date('calendar_event_end_date')->nullable();
            $table->time('calendar_event_end_time')->nullable();
            $table->string('calendar_event_sharing', 100)
                ->default('self')
                ->comment('myself|whole-team|selected-users');
            $table->string('calendar_event_reminder', 100)
                ->default('no')
                ->comment('yes|no');
            $table->string('calendar_event_reminder_sent', 20)
                ->default('no')
                ->comment('yes|no');
            $table->text('calendar_event_timezoe')
                ->nullable()
                ->comment('timezone used in the dates');
            $table->dateTime('calendar_event_reminder_date_sent')->nullable();
            $table->integer('calendar_event_reminder_duration')->nullable();
            $table->text('calendar_event_reminder_period')
                ->nullable()
                ->comment('optional - e.g. 1 for 1 day');
            $table->string('calendar_event_colour', 50)
                ->nullable()
                ->comment('optional - hour| day | week | month | year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_events');
    }
};
