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
        Schema::create('events_tracking', function (Blueprint $table) {
            $table->increments('eventtracking_id');
            $table->dateTime('eventtracking_created');
            $table->dateTime('eventtracking_updated');
            $table->integer('eventtracking_eventid')->comment('ID of the associated event');
            $table->integer('eventtracking_userid')->comment('ID of the user associated with the event tracking');
            $table->string('eventtracking_status', 30)->default('unread')->comment('read|unread');
            $table->string('eventtracking_email', 50)->default('no')->comment('yes|no');
            $table->string('eventtracking_source', 50)->nullable()->comment('the actual item (e.g. file | comment | invoice)');
            $table->string('eventtracking_source_id', 50)->nullable()->comment('the id of the actual item');
            $table->string('parent_type', 50)->nullable()->comment('used to locate the main event in the events table. Also used for marking the event as read, once the parent has been viewed.');
            $table->integer('parent_id')->nullable();
            $table->string('resource_type', 50)->nullable()->comment('Also used for marking events as read, for ancillary items like (project comments, project file) where just viewing a project is enough');
            $table->integer('resource_id')->nullable();

            // Define indexes
            $table->index('eventtracking_userid');
            $table->index('eventtracking_eventid');
            $table->index('eventtracking_status');
            $table->index('parent_type');
            $table->index('parent_id');
            $table->index('resource_type');
            $table->index('resource_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_tracking');
    }
};
