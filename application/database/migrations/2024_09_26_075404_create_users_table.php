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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('unique_id')->nullable();
            $table->dateTime('created')->nullable();
            $table->dateTime('updated')->nullable();
            $table->dateTime('deleted')->nullable()->comment('date when account was deleted');
            $table->integer('creatorid')->nullable();
            $table->text('email')->nullable();
            $table->text('password');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('phone')->nullable();
            $table->text('position')->nullable();
            $table->integer('clientid')->nullable()->comment('for client users');
            $table->string('account_owner', 10)->default('no')->comment('yes | no');
            $table->string('primary_admin', 10)->default('no')->comment('yes | no');
            $table->text('avatar_directory')->nullable();
            $table->text('avatar_filename')->nullable();
            $table->text('type');
            $table->string('status', 20)->default('active')->comment('active|suspended|deleted');
            $table->integer('role_id')->default(2);
            $table->dateTime('last_seen')->nullable();
            $table->string('theme', 100)->default('default');
            $table->text('last_ip_address')->nullable();
            $table->text('social_facebook')->nullable();
            $table->text('social_twitter')->nullable();
            $table->text('social_linkedin')->nullable();
            $table->text('social_github')->nullable();
            $table->text('social_dribble')->nullable();
            $table->string('pref_language', 200)->default('english');
            $table->string('pref_email_notifications', 10)->default('yes');
            $table->string('pref_leftmenu_position', 50)->default('collapsed');
            $table->string('pref_statspanel_position', 50)->default('collapsed');
            $table->string('pref_filter_own_tasks', 50)->default('no');
            $table->string('pref_hide_completed_tasks', 50)->default('no');
            $table->string('pref_filter_own_projects', 50)->default('no');
            $table->string('pref_filter_show_archived_projects', 50)->default('no');
            $table->string('pref_filter_show_archived_tasks', 50)->default('no');
            $table->string('pref_filter_show_archived_leads', 50)->default('no');
            $table->string('pref_filter_show_archived_tickets', 50)->default('no');
            $table->string('pref_filter_own_leads', 50)->default('no');
            $table->string('pref_view_tasks_layout', 50)->default('kanban');
            $table->string('pref_view_leads_layout', 50)->default('kanban');
            $table->string('pref_view_projects_layout', 50)->default('list');
            $table->string('pref_theme', 100)->default('default');
            $table->string('pref_calendar_dates_projects', 30)->default('due');
            $table->string('pref_calendar_dates_tasks', 30)->default('due');
            $table->string('pref_calendar_dates_events', 30)->default('due');
            $table->string('pref_calendar_view', 30)->default('own');
            $table->text('remember_token')->nullable();
            $table->string('remember_filters_tickets_status', 20)->default('disabled');
            $table->text('remember_filters_tickets_payload')->nullable();
            $table->string('remember_filters_projects_status', 20)->default('disabled');
            $table->text('remember_filters_projects_payload')->nullable();
            $table->string('remember_filters_invoices_status', 20)->default('disabled');
            $table->text('remember_filters_invoices_payload')->nullable();
            $table->string('remember_filters_estimates_status', 20)->default('disabled');
            $table->text('remember_filters_estimates_payload')->nullable();
            $table->string('remember_filters_contracts_status', 20)->default('disabled');
            $table->text('remember_filters_contracts_payload')->nullable();
            $table->string('remember_filters_payments_status', 20)->default('disabled');
            $table->text('remember_filters_payments_payload')->nullable();
            $table->string('remember_filters_proposals_status', 20)->default('disabled');
            $table->text('remember_filters_proposals_payload')->nullable();
            $table->string('remember_filters_clients_status', 20)->default('disabled');
            $table->text('remember_filters_clients_payload')->nullable();
            $table->string('remember_filters_leads_status', 20)->default('disabled');
            $table->text('remember_filters_leads_payload')->nullable();
            $table->string('remember_filters_tasks_status', 20)->default('disabled');
            $table->text('remember_filters_tasks_payload')->nullable();
            $table->string('remember_filters_subscriptions_status', 20)->default('disabled');
            $table->text('remember_filters_subscriptions_payload')->nullable();
            $table->string('remember_filters_products_status', 20)->default('disabled');
            $table->text('remember_filters_products_payload')->nullable();
            $table->string('remember_filters_expenses_status', 20)->default('disabled');
            $table->text('remember_filters_expenses_payload')->nullable();
            $table->string('remember_filters_timesheets_status', 20)->default('disabled');
            $table->text('remember_filters_timesheets_payload')->nullable();
            $table->text('forgot_password_token')->nullable()->comment('random token');
            $table->dateTime('forgot_password_token_expiry')->nullable();
            $table->string('force_password_change', 10)->default('no');
            $table->string('notifications_system', 10)->default('no');
            $table->string('notifications_new_project', 10)->default('no');
            $table->string('notifications_projects_activity', 10)->default('no');
            $table->string('notifications_billing_activity', 10)->default('no');
            $table->string('notifications_new_assignement', 10)->default('no');
            $table->string('notifications_leads_activity', 10)->default('no');
            $table->string('notifications_tasks_activity', 10)->default('no');
            $table->string('notifications_tickets_activity', 10)->default('no');
            $table->string('notifications_reminders', 10)->default('yes_email');
            $table->text('thridparty_stripe_customer_id')->nullable();
            $table->string('dashboard_access', 150)->default('yes');
            $table->string('welcome_email_sent', 150)->default('no');
            $table->text('space_uniqueid')->nullable();
            $table->text('timezone')->nullable()->comment('experimental');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
