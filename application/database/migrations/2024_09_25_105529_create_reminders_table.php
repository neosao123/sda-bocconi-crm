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
        Schema::create('reminders', function (Blueprint $table) {
            $table->id('reminder_id'); // AUTO_INCREMENT is handled by Laravel
            $table->dateTime('reminder_created');
            $table->dateTime('reminder_updated');
            $table->integer('reminder_userid')->nullable();
            $table->dateTime('reminder_datetime')->nullable();
            $table->timestamp('reminder_timestamp')->nullable();
            $table->string('reminder_title', 250)->nullable();
            $table->string('reminder_meta', 250)->nullable();
            $table->text('reminder_notes')->nullable();
            $table->string('reminder_status', 10)->default('new')->comment('active|due');
            $table->string('reminder_sent', 10)->default('no')->comment('yes|no');
            $table->string('reminderresource_type', 50)->nullable()->comment('project|client|estimate|lead|task|invoice|ticket');
            $table->integer('reminderresource_id')->nullable()->comment('linked resource id');

            // Indexes
            $table->index('reminderresource_type');
            $table->index('reminderresource_id');
            $table->index('reminder_status');
            $table->index('reminder_sent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
