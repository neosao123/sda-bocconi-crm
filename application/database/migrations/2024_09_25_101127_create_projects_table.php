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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_uniqueid', 100)->nullable()->comment('optional');
            $table->string('project_type', 30)->default('project')->comment('project|template|space');
            $table->string('project_reference', 250)->nullable()->comment('[optional] additional data for identifying a project');
            $table->string('project_importid', 100)->nullable();
            $table->dateTime('project_created')->nullable();
            $table->dateTime('project_updated')->nullable();
            $table->integer('project_timestamp_created')->nullable();
            $table->integer('project_timestamp_updated')->nullable();
            $table->integer('project_clientid')->nullable();
            $table->integer('project_creatorid')->comment('creator of the project');
            $table->integer('project_categoryid')->default(1)->comment('default category');
            $table->string('project_cover_directory', 100)->nullable();
            $table->string('project_cover_filename', 100)->nullable();
            $table->integer('project_cover_file_id')->nullable()->comment('if this cover was made from an existing file');
            $table->string('project_title', 250);
            $table->date('project_date_start')->nullable();
            $table->date('project_date_due')->nullable();
            $table->text('project_description')->nullable();
            $table->string('project_status', 50)->default('not_started')->comment('not_started | in_progress | on_hold | cancelled | completed');
            $table->string('project_active_state', 10)->default('active')->comment('active|archive');
            $table->tinyInteger('project_progress')->default(0);
            $table->decimal('project_billing_rate', 10, 2)->default(0.00);
            $table->string('project_billing_type', 40)->default('hourly')->comment('hourly | fixed');
            $table->integer('project_billing_estimated_hours')->default(0)->comment('estimated hours');
            $table->decimal('project_billing_costs_estimate', 10, 2)->default(0.00);
            $table->string('project_progress_manually', 10)->default('no')->comment('yes | no');
            $table->string('clientperm_tasks_view', 10)->default('yes')->comment('yes | no');
            $table->string('clientperm_tasks_collaborate', 40)->default('yes')->comment('yes | no');
            $table->string('clientperm_tasks_create', 40)->default('yes')->comment('yes | no');
            $table->string('clientperm_timesheets_view', 40)->default('yes')->comment('yes | no');
            $table->string('clientperm_expenses_view', 40)->default('no')->comment('yes | no');
            $table->string('assignedperm_milestone_manage', 40)->default('yes')->comment('yes | no');
            $table->string('assignedperm_tasks_collaborate', 40)->nullable()->comment('yes | no');
            $table->string('project_visibility', 40)->default('visible')->comment('visible|hidden (used to prevent projects that are still being cloned from showing in projects list)');
            $table->text('project_calendar_timezone')->nullable();
            $table->text('project_calendar_location')->nullable()->comment('optional - used by the calendar');
            $table->string('project_calendar_reminder', 10)->default('no')->comment('yes|no');
            $table->integer('project_calendar_reminder_duration')->nullable()->comment('optional - e.g 1 for 1 day');
            $table->text('project_calendar_reminder_period')->nullable()->comment('optional - hours | days | weeks | months | years');
            $table->text('project_calendar_reminder_sent')->nullable()->comment('yes|no');
            $table->dateTime('project_calendar_reminder_date_sent')->nullable();

            // Custom fields
            for ($i = 1; $i <= 70; $i++) {
                if ($i <= 10) {
                    $table->tinyText("project_custom_field_$i")->nullable();
                } elseif ($i <= 20) {
                    $table->dateTime("project_custom_field_$i")->nullable();
                } elseif ($i <= 30) {
                    $table->text("project_custom_field_$i")->nullable();
                } elseif ($i <= 40) {
                    $table->string("project_custom_field_$i", 20)->nullable();
                } elseif ($i <= 50) {
                    $table->string("project_custom_field_$i", 150)->nullable();
                } elseif ($i <= 60) {
                    $table->integer("project_custom_field_$i")->nullable();
                } elseif ($i <= 70) {
                    $table->decimal("project_custom_field_$i", 10, 2)->nullable();
                }
            }

            // Automation
            $table->string('project_automation_status', 30)->default('disabled')->comment('disabled|enabled');
            $table->string('project_automation_create_invoices', 30)->default('no')->comment('yes|no');
            $table->string('project_automation_convert_estimates_to_invoices', 30)->default('no')->comment('yes|no');
            $table->string('project_automation_invoice_unbilled_hours', 30)->default('no')->comment('yes|no');
            $table->decimal('project_automation_invoice_hourly_rate', 10, 2)->nullable();
            $table->integer('project_automation_invoice_hourly_tax_1')->nullable();
            $table->string('project_automation_invoice_email_client', 30)->default('no')->comment('yes|no');
            $table->integer('project_automation_invoice_due_date')->default(0);

            // Keys & Indexes
            $table->index('project_clientid');
            $table->index('project_creatorid');
            $table->index('project_categoryid');
            $table->index('project_status');
            $table->index('project_visibility');
            $table->index('project_type');
            $table->index('project_active_state');
            $table->index('project_billing_type');
            $table->index('clientperm_tasks_view');
            $table->index('project_progress_manually');
            $table->index('clientperm_tasks_collaborate');
            $table->index('clientperm_tasks_create');
            $table->index('clientperm_timesheets_view');
            $table->index('clientperm_expenses_view');
            $table->index('assignedperm_milestone_manage');
            $table->index('assignedperm_tasks_collaborate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
