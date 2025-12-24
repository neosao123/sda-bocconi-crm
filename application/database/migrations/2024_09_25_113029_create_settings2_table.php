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
        Schema::create('settings2', function (Blueprint $table) {
            $table->integer('settings2_id')->autoIncrement();
            $table->dateTime('settings2_created');
            $table->dateTime('settings2_updated');
            $table->text('settings2_bills_pdf_css')->nullable();
            $table->text('settings2_calendar_projects_colour')->nullable()->comment('default|primary|success|info|warning|danger|lime|brown');
            $table->text('settings2_calendar_tasks_colour')->nullable()->comment('default|primary|success|info|warning|danger|lime|brown');
            $table->text('settings2_calendar_events_colour')->nullable()->comment('default|primary|success|info|warning|danger|lime|brown');
            $table->integer('settings2_calendar_reminder_duration')->nullable();
            $table->text('settings2_calendar_reminder_period')->nullable()->comment('hours|days|weeks|months|years');
            $table->text('settings2_calendar_events_assigning')->nullable()->comment('admin|everyone');
            $table->integer('settings2_calendar_first_day')->nullable()->comment('Sunday =0, Monday =1, etc. Default 0');
            $table->integer('settings2_calendar_default_event_duration')->nullable()->comment('default 30 minutes');
            $table->text('settings2_calendar_send_reminder_projects')->nullable()->comment('start-date|due-date');
            $table->text('settings2_calendar_send_reminder_tasks')->nullable()->comment('start-date|due-date');
            $table->text('settings2_calendar_send_reminder_events')->nullable()->comment('start-date|due-date');
            $table->text('settings2_captcha_api_site_key')->nullable();
            $table->text('settings2_captcha_api_secret_key')->nullable();
            $table->string('settings2_captcha_status', 10)->default('disabled')->comment('disabled|enabled');
            $table->string('settings2_estimates_automation_default_status', 10)->default('disabled')->comment('disabled|enabled');
            $table->string('settings2_estimates_automation_create_project', 10)->default('no')->comment('yes|no');
            $table->string('settings2_estimates_automation_project_status', 50)->default('in_progress')->comment('not_started | in_progress | on_hold');
            $table->text('settings2_estimates_automation_project_title')->nullable()->comment('default project title');
            $table->string('settings2_estimates_automation_project_email_client', 10)->default('no')->comment('yes|no');
            $table->string('settings2_estimates_automation_create_invoice', 10)->default('no')->comment('yes|no');
            $table->string('settings2_estimates_automation_invoice_email_client', 10)->default('no')->comment('yes|no');
            $table->integer('settings2_estimates_automation_invoice_due_date')->default(7);
            $table->string('settings2_estimates_automation_create_tasks', 10)->default('no')->comment('yes|no');
            $table->string('settings2_estimates_automation_copy_attachments', 10)->default('yes')->comment('yes|no');
            $table->string('settings2_extras_dimensions_billing', 10)->default('disabled')->comment('enabled|disabled');
            $table->string('settings2_extras_dimensions_default_unit', 30)->default('m2');
            $table->string('settings2_extras_dimensions_show_measurements', 10)->default('no')->comment('show on the pd,web etc');
            $table->string('settings2_projects_automation_default_status', 10)->default('disabled')->comment('disabled|enabled');
            $table->string('settings2_projects_automation_create_invoices', 10)->default('no')->comment('yes|no');
            $table->string('settings2_projects_automation_convert_estimates_to_invoices', 10)->default('no')->comment('yes|no');
            $table->string('settings2_projects_automation_skip_draft_estimates', 10)->default('yes')->comment('yes|no');
            $table->string('settings2_projects_automation_skip_declined_estimates', 10)->default('yes')->comment('yes|no');
            $table->string('settings2_projects_automation_invoice_unbilled_hours', 10)->default('no')->comment('yes|no');
            $table->decimal('settings2_projects_automation_invoice_hourly_rate', 10, 2)->nullable();
            $table->integer('settings2_projects_automation_invoice_hourly_tax_1')->nullable();
            $table->string('settings2_projects_automation_invoice_email_client', 10)->default('no');
            $table->integer('settings2_projects_automation_invoice_due_date')->default(7);
            $table->string('settings2_tasks_manage_dependencies', 60)->default('super-users')->comment('admin-users | super-users | all-task-users');
            $table->text('settings2_tap_secret_key')->nullable();
            $table->text('settings2_tap_publishable_key')->nullable();
            $table->text('settings2_tap_currency_code')->nullable();
            $table->string('settings2_tap_language', 10)->default('en')->comment('arabic (ar) | english (en)');
            $table->text('settings2_tap_display_name')->nullable();
            $table->string('settings2_tap_status', 10)->default('disabled')->comment('enabled|disabled');
            $table->text('settings2_paystack_secret_key')->nullable();
            $table->text('settings2_paystack_public_key')->nullable();
            $table->text('settings2_paystack_currency_code')->nullable();
            $table->text('settings2_paystack_display_name')->nullable();
            $table->string('settings2_paystack_status', 10)->default('disabled')->comment('enabled|disabled');
            $table->text('settings2_proposals_automation_default_status')->nullable()->comment('disabled|enabled');
            $table->text('settings2_proposals_automation_create_project')->nullable()->comment('yes|no');
            $table->text('settings2_proposals_automation_project_status')->nullable()->comment('not_started | in_progress | on_hold');
            $table->text('settings2_proposals_automation_project_email_client')->nullable()->comment('yes|no');
            $table->text('settings2_proposals_automation_create_invoice')->nullable()->comment('yes|no');
            $table->text('settings2_proposals_automation_invoice_email_client')->nullable()->comment('yes|no');
            $table->integer('settings2_proposals_automation_invoice_due_date')->nullable()->default(7);
            $table->text('settings2_proposals_automation_create_tasks')->nullable()->comment('yes|no');
            $table->string('settings2_file_folders_status', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_file_folders_manage_assigned', 10)->default('yes')->comment('yes|no');
            $table->string('settings2_file_folders_manage_project_manager', 10)->default('yes')->comment('yes|no');
            $table->string('settings2_file_folders_manage_client', 10)->default('yes')->comment('yes|no');
            $table->string('settings2_file_bulk_download', 10)->default('enabled')->comment('enabled|disabled');
            $table->integer('settings2_search_category_limit')->default(5);
            $table->text('settings2_spaces_team_space_id')->nullable();
            $table->string('settings2_spaces_team_space_status', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_user_space_status', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_team_space_title', 150)->default('Team Space');
            $table->string('settings2_spaces_user_space_title', 150)->default('My Space');
            $table->string('settings2_spaces_team_space_menu_name', 150)->default('Team Space');
            $table->string('settings2_spaces_user_space_menu_name', 150)->default('Space');
            $table->string('settings2_spaces_features_files', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_features_notes', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_features_comments', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_features_tasks', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_features_whiteboard', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_features_checklists', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_features_todos', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_spaces_features_reminders', 10)->default('enabled')->comment('enabled|disabled');
            $table->string('settings2_tickets_replying_interface', 10)->default('popup')->comment('popup|inline');
            $table->string('settings2_tickets_archive_button', 10)->default('yes')->comment('yes|no');
            $table->string('settings2_projects_cover_images_show_on_project', 10)->default('no')->comment('yes|no');
            $table->string('settings2_onboarding_status', 10)->default('disabled')->comment('enabled|disabled');
            $table->text('settings2_onboarding_content')->nullable();
            $table->string('settings2_onboarding_view_status', 10)->default('unseen')->comment('seen|unseen');
            $table->string('settings2_tweak_reports_truncate_long_text', 10)->default('yes')->comment('yes|no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings2');
    }
};
