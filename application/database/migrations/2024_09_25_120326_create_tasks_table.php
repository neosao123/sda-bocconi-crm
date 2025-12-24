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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('task_uniqueid', 100)->nullable();
            $table->string('task_importid', 100)->nullable();
            $table->double('task_position')->comment('increment by 16384');
            $table->dateTime('task_created')->nullable()->default(now())->comment('always now()');
            $table->dateTime('task_updated')->nullable();
            $table->integer('task_creatorid')->nullable();
            $table->integer('task_clientid')->nullable()->comment('optional');
            $table->integer('task_projectid')->nullable()->comment('project_id');
            $table->date('task_date_start')->nullable();
            $table->date('task_date_due')->nullable();
            $table->string('task_title', 250)->nullable();
            $table->text('task_description')->nullable();
            $table->string('task_client_visibility', 100)->default('yes');
            $table->integer('task_milestoneid')->nullable()->comment('new tasks must be set to the [uncategorised] milestone');
            $table->string('task_previous_status', 100)->default('new');
            $table->integer('task_priority')->default(1);
            $table->integer('task_status')->default(1);
            $table->string('task_active_state', 100)->default('active')->comment('active|archived');
            $table->string('task_billable', 5)->default('yes')->comment('yes | no');
            $table->string('task_billable_status', 20)->default('not_invoiced')->comment('invoiced | not_invoiced');
            $table->integer('task_billable_invoiceid')->nullable()->comment('id of the invoice that it has been billed to');
            $table->integer('task_billable_lineitemid')->nullable()->comment('id of line item that was billed');
            $table->string('task_visibility', 40)->default('visible')->comment('visible|hidden');
            $table->string('task_overdue_notification_sent', 40)->default('no')->comment('yes|no');
            $table->string('task_recurring', 40)->default('no')->comment('yes|no');
            $table->integer('task_recurring_duration')->nullable()->comment('e.g. 20 (for 20 days)');
            $table->string('task_recurring_period', 30)->nullable()->comment('day | week | month | year');
            $table->integer('task_recurring_cycles')->nullable()->comment('0 for infinity');
            $table->integer('task_recurring_cycles_counter')->default(0)->comment('number of times it has been renewed');
            $table->date('task_recurring_last')->nullable()->comment('date when it was last renewed');
            $table->date('task_recurring_next')->nullable()->comment('date when it will next be renewed');
            $table->string('task_recurring_child', 10)->default('no')->comment('yes|no');
            $table->dateTime('task_recurring_parent_id')->nullable()->comment('if it was generated from a recurring invoice, the id of parent invoice');
            $table->string('task_recurring_copy_checklists', 10)->default('yes')->comment('yes|no');
            $table->string('task_recurring_copy_files', 10)->default('yes')->comment('yes|no');
            $table->string('task_recurring_automatically_assign', 10)->default('yes')->comment('yes|no');
            $table->string('task_recurring_finished', 10)->default('no')->comment('yes|no');
            $table->text('task_cloning_original_task_id')->nullable();
            $table->string('task_cover_image', 10)->default('no')->comment('yes|no');
            $table->text('task_cover_image_uniqueid')->nullable();
            $table->text('task_cover_image_filename')->nullable();
            $table->text('task_calendar_timezone')->nullable();
            $table->text('task_calendar_location')->nullable()->comment('optional - used by the calendar');
            $table->string('task_calendar_reminder', 10)->default('no')->comment('yes|no');
            $table->integer('task_calendar_reminder_duration')->nullable()->comment('optional - e.g 1 for 1 day');
            $table->text('task_calendar_reminder_period')->nullable()->comment('optional - hours | days | weeks | months | years');
            $table->text('task_calendar_reminder_sent')->nullable()->comment('yes|no');
            $table->dateTime('task_calendar_reminder_date_sent')->nullable();

            // Add your custom fields here
            for ($i = 1; $i <= 70; $i++) {
                if ($i <= 10) {
                    $table->tinyText("task_custom_field_{$i}")->nullable();
                } elseif ($i <= 20) {
                    $table->dateTime("task_custom_field_{$i}")->nullable();
                } elseif ($i <= 50) {
                    $table->text("task_custom_field_{$i}")->nullable();
                } elseif ($i <= 60) {
                    $table->integer("task_custom_field_{$i}")->nullable();
                } else {
                    $table->decimal("task_custom_field_{$i}", 10, 2)->nullable();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
