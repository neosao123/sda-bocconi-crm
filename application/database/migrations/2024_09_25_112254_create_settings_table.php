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
        Schema::create('settings', function (Blueprint $table) {
            $table->integer('settings_id')->autoIncrement();
            $table->dateTime('settings_created');
            $table->dateTime('settings_updated');
            $table->string('settings_type', 50)->default('standalone')->nullable()->comment('standalone|saas');
            $table->integer('settings_saas_tenant_id')->nullable();
            $table->string('settings_saas_status', 100)->nullable()->comment('unsubscribed|free-trial|awaiting-payment|failed|active|cancelled');
            $table->integer('settings_saas_package_id')->nullable();
            $table->string('settings_saas_onetimelogin_key', 100)->nullable();
            $table->string('settings_saas_onetimelogin_destination', 100)->nullable()->comment('home|payment');
            $table->integer('settings_saas_package_limits_clients')->nullable();
            $table->integer('settings_saas_package_limits_team')->nullable();
            $table->integer('settings_saas_package_limits_projects')->nullable();
            $table->text('settings_saas_notification_uniqueid')->nullable()->comment('(optional) unique identifier');

            $table->text('settings_saas_notification_body')->nullable()->comment('html body of promotion etc');
            $table->text('settings_saas_notification_read')->nullable()->comment('yes|no');
            $table->text('settings_saas_notification_action')->nullable()->comment('none|external-link|internal-link');
            $table->text('settings_saas_notification_action_url')->nullable();
            $table->string('settings_saas_email_server_type', 30)->default('local')->nullable()->comment('local |smtp');
            $table->text('settings_saas_email_forwarding_address')->nullable();
            $table->text('settings_saas_email_local_address')->nullable();
            $table->dateTime('settings_installation_date')->comment('date the system was setup')->nullable(false);

            $table->text('settings_version');
            $table->text('settings_company_name')->nullable();
            $table->text('settings_company_address_line_1')->nullable();
            $table->text('settings_company_state')->nullable();
            $table->text('settings_company_city')->nullable();
            $table->text('settings_company_zipcode')->nullable();
            $table->text('settings_company_country')->nullable();
            $table->text('settings_company_telephone')->nullable();
            $table->text('settings_company_customfield_1')->nullable();
            $table->text('settings_company_customfield_2')->nullable();
            $table->text('settings_company_customfield_3')->nullable();
            $table->text('settings_company_customfield_4')->nullable();
            $table->text('settings_clients_registration')->nullable()->comment('enabled | disabled');
            $table->text('settings_clients_shipping_address')->nullable()->comment('enabled | disabled');
            $table->text('settings_client_prefix')->default('CLI')->nullable();
            $table->text('settings_workorder_prefix')->default('WO')->nullable();
            $table->text('settings_proforma_invoice_prefix')->default('PI')->nullable();
            $table->text('settings_amc_invoice_prefix')->default('NS')->nullable();
            $table->text('settings_customer_prefix')->default('CST')->nullable();

            $table->string('settings_clients_disable_email_delivery', 12)->default('disabled')->nullable()->comment('enabled | disabled');
            $table->string('settings_clients_app_login', 12)->default('enabled')->nullable()->comment('enabled | disabled');
            $table->string('settings_customfields_display_leads', 12)->default('toggled')->nullable()->comment('toggled|expanded');
            $table->string('settings_customfields_display_clients', 12)->default('toggled')->nullable()->comment('toggled|expanded');
            $table->string('settings_customfields_display_projects', 12)->default('toggled')->nullable()->comment('toggled|expanded');
            $table->string('settings_customfields_display_tasks', 12)->default('toggled')->nullable()->comment('toggled|expanded');
            $table->string('settings_customfields_display_tickets', 12)->default('toggled')->nullable()->comment('toggled|expanded');

            $table->text('settings_email_general_variables')->nullable()->comment('common variable displayed available in templates');
            $table->text('settings_email_from_address')->nullable();
            $table->text('settings_email_from_name')->nullable();
            $table->text('settings_email_server_type')->nullable()->comment('smtp|sendmail');
            $table->text('settings_email_smtp_host')->nullable();
            $table->text('settings_email_smtp_port')->nullable();
            $table->text('settings_email_smtp_username')->nullable();
            $table->text('settings_email_smtp_password')->nullable();
            $table->text('settings_email_smtp_encryption')->nullable()->comment('tls|ssl|starttls');
            $table->text('settings_estimates_default_terms_conditions')->nullable();
            $table->text('settings_estimates_prefix')->nullable();

            $table->string('settings_estimates_show_view_status', 10)->default('yes')->nullable()->comment('yes|no');
            $table->string('settings_modules_projects', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_tasks', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_invoices', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_payments', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_leads', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_knowledgebase', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_estimates', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_expenses', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_notes', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_subscriptions', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_contracts', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_proposals', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_tickets', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_timetracking', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_reminders', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_spaces', 10)->default('enabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_messages', 10)->default('enabled')->nullable()->comment('enabled|disabled');

            $table->text('settings_modules_reports')->nullable()->comment('enabled|disabled');
            $table->text('settings_modules_calendar')->nullable()->comment('enabled|disabled');

            $table->integer('settings_files_max_size_mb')->default(300)->nullable()->comment('maximum size in MB');

            $table->string('settings_knowledgebase_article_ordering', 40)->default('name')->nullable()->comment('name-asc|name-desc|date-asc|date-desc');
            $table->string('settings_knowledgebase_allow_guest_viewing', 10)->default('no')->nullable()->comment('yes | no');

            $table->text('settings_knowledgebase_external_pre_body')->nullable()->comment('for use when viewing externally, as guest');
            $table->text('settings_knowledgebase_external_post_body')->nullable()->comment('for use when viewing externally, as guest');
            $table->text('settings_knowledgebase_external_header')->nullable()->comment('for use when viewing externally, as guest');
            $table->text('settings_system_timezone')->nullable();
            $table->text('settings_system_date_format')->nullable()->comment('d-m-Y | d/m/Y | m-d-Y | m/d/Y | Y-m-d | Y/m/d | Y-d-m | Y/d/m');
            $table->text('settings_system_datepicker_format')->nullable()->comment('dd-mm-yyyy | mm-dd-yyyy');
            $table->text('settings_system_default_leftmenu')->nullable()->comment('collapsed | open');
            $table->text('settings_system_default_statspanel')->nullable()->comment('collapsed | open');

            $table->tinyInteger('settings_system_pagination_limits')->nullable();
            $table->tinyInteger('settings_system_kanban_pagination_limits')->nullable();

            $table->text('settings_system_currency_code')->nullable();
            $table->text('settings_system_currency_symbol')->nullable();
            $table->text('settings_system_currency_position')->nullable()->comment('left|right');
            $table->text('settings_system_decimal_separator')->nullable();
            $table->text('settings_system_thousand_separator')->nullable();

            $table->string('settings_system_close_modals_body_click', 10)->default('no')->nullable()->comment('yes|no');
            $table->string('settings_system_language_default', 40)->default('en')->nullable()->comment('english|french|etc');
            $table->string('settings_system_language_allow_users_to_change', 10)->default('yes')->nullable()->comment('yes|no');
            $table->string('settings_system_logo_large_name', 40)->default('logo.jpg')->nullable();
            $table->string('settings_system_logo_small_name', 40)->default('logo-small.jpg')->nullable();
            $table->string('settings_system_logo_versioning', 40)->default('1')->nullable()->comment('used to refresh logo when updated');
            $table->string('settings_system_session_login_popup', 10)->default('disabled')->nullable()->comment('enabled|disabled');
            $table->date('settings_system_javascript_versioning')->nullable();
            $table->string('settings_system_exporting_strip_html', 10)->default('yes')->nullable()->comment('yes|no');
            $table->string('settings_tags_allow_users_create', 10)->default('yes')->nullable()->comment('yes|no');
            $table->string('settings_leads_allow_private', 10)->default('yes')->nullable()->comment('yes|no');
            $table->string('settings_leads_allow_new_sources', 10)->default('yes')->nullable()->comment('yes|no');

            $table->text('settings_leads_kanban_value')->nullable()->comment('show|hide');
            $table->text('settings_leads_kanban_date_created')->nullable()->comment('show|hide');
            $table->text('settings_leads_kanban_category')->nullable()->comment('show|hide');
            $table->text('settings_leads_kanban_date_contacted')->nullable()->comment('show|hide');
            $table->text('settings_leads_kanban_telephone')->nullable()->comment('show|hide');
            $table->text('settings_leads_kanban_source')->nullable()->comment('show|hide');
            $table->text('settings_leads_kanban_email')->nullable()->comment('show|hide');
            $table->text('settings_leads_kanban_tags')->nullable();
            $table->text('settings_leads_kanban_reminder')->nullable();
            $table->text('settings_tasks_client_visibility')->nullable()->comment('visible|invisible - used in create new task form on the checkbox ');
            $table->text('settings_tasks_billable')->nullable()->comment('billable|not-billable - used in create new task form on the checkbox ');

            $table->text('settings_tasks_kanban_date_created')->nullable()->comment('show|hide');
            $table->text('settings_tasks_kanban_date_due')->nullable()->comment('show|hide');
            $table->text('settings_tasks_kanban_date_start')->nullable()->comment('show|hide');
            $table->text('settings_tasks_kanban_priority')->nullable()->comment('show|hide');
            $table->text('settings_tasks_kanban_milestone')->nullable();
            $table->text('settings_tasks_kanban_client_visibility')->nullable()->comment('show|hide');

            $table->string('settings_tasks_kanban_project_title', 10)->default('show')->nullable()->comment('show|hide');
            $table->string('settings_tasks_kanban_client_name', 10)->default('show')->nullable()->comment('show|hide');
            $table->text('settings_tasks_kanban_tags')->nullable();
            $table->text('settings_tasks_kanban_reminder')->nullable();
            $table->string('settings_tasks_send_overdue_reminder', 10)->default('yes')->nullable()->comment('yes|no');
            $table->text('settings_invoices_prefix')->nullable();
            $table->smallInteger('settings_invoices_recurring_grace_period')->nullable()->comment('Number of days for due date on recurring invoices. If set to zero, invoices will be given due date same as invoice date');
            $table->text('settings_invoices_default_terms_conditions')->nullable();
            $table->text('settings_invoices_show_view_status')->notNullable();
            $table->text('settings_invoices_show_project_on_invoice')->notNullable()->comment('yes|no');

            $table->string('settings_projects_cover_images', 10)->default('disabled')->nullable()->comment('enabled|disabled');
            $table->string('settings_projects_permissions_basis', 40)->default('user_roles')->nullable()->comment('user_roles|category_based');
            $table->string('settings_projects_categories_main_menu', 10)->default('no')->nullable()->comment('yes|no');
            $table->decimal('settings_projects_default_hourly_rate', 10, 2)->default(0.00)->nullable()->comment('default hourly rate for new projects');

            $table->text('settings_projects_allow_setting_permission_on_project_creation')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_files_view')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_files_upload')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_comments_view')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_comments_post')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_tasks_view')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_tasks_collaborate')->nullable()->comment('yes|no');

            // Adding new fields related to project permissions
            $table->text('settings_projects_clientperm_tasks_create')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_timesheets_view')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_expenses_view')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_milestones_view')->nullable()->comment('yes|no');
            $table->text('settings_projects_clientperm_assigned_view')->nullable()->comment('yes|no');
            // Permissions for assigned users
            $table->text('settings_projects_assignedperm_milestone_manage')->nullable()->comment('yes|no');
            $table->text('settings_projects_assignedperm_tasks_collaborate')->nullable()->comment('yes|no');
            // Project events
            $table->text('settings_projects_events_show_task_status_change')->nullable()->comment('yes|no');

            $table->text('settings_stripe_secret_key')->nullable();
            $table->text('settings_stripe_public_key')->nullable();
            $table->text('settings_stripe_webhooks_key')->nullable()->comment('from strip dashboard');
            $table->text('settings_stripe_default_subscription_plan_id')->nullable();
            $table->text('settings_stripe_currency')->nullable();
            $table->text('settings_stripe_display_name')->nullable()->comment('what customer will see on payment screen');
            $table->text('settings_stripe_status')->nullable()->comment('enabled|disabled');
            // Subscription prefix
            $table->string('settings_subscriptions_prefix', 40)->default('SUB-')->nullable();
            // PayPal fields
            $table->text('settings_paypal_email')->nullable();
            $table->text('settings_paypal_currency')->nullable();
            $table->text('settings_paypal_display_name')->nullable()->comment('what customer will see on payment screen');
            $table->text('settings_paypal_mode')->nullable()->comment('sandbox | live');
            $table->text('settings_paypal_status')->nullable()->comment('enabled|disabled');
            // Mollie fields
            $table->text('settings_mollie_live_api_key')->nullable();
            $table->text('settings_mollie_test_api_key')->nullable();
            $table->text('settings_mollie_display_name')->nullable();

            $table->string('settings_mollie_mode', 40)->nullable()->default('live');
            $table->text('settings_mollie_currency')->nullable();
            $table->string('settings_mollie_status', 10)->default('disabled')->nullable()->comment('enabled|disabled');

            // Bank details
            $table->text('settings_bank_details')->nullable();
            $table->text('settings_bank_display_name')->nullable()->comment('what customer will see on payment screen');
            $table->text('settings_bank_status')->nullable()->comment('enabled|disabled');

            // Razorpay fields
            $table->text('settings_razorpay_keyid')->nullable();
            $table->text('settings_razorpay_secretkey')->nullable();
            $table->text('settings_razorpay_currency')->nullable();
            $table->text('settings_razorpay_display_name')->nullable();

            $table->string('settings_razorpay_status', 10)->default('disabled')->nullable();
            $table->string('settings_completed_check_email', 10)->default('no')->nullable()->comment('yes|no');
            $table->string('settings_expenses_billable_by_default', 10)->default('yes')->nullable()->comment('yes|no');
            $table->text('settings_tickets_edit_subject')->nullable()->comment('yes|no');
            $table->text('settings_tickets_edit_body')->nullable()->comment('yes|no');
            $table->string('settings_theme_name', 60)->default('default')->nullable()->comment('default|darktheme');
            $table->text('settings_theme_head')->nullable();
            $table->text('settings_theme_body')->nullable();
            $table->text('settings_track_thankyou_session_id')->nullable()->comment('used to ensure we show thank you page just once');

            $table->string('settings_proposals_prefix', 30)->default('PROP-')->nullable();
            $table->string('settings_proposals_show_view_status', 10)->default('yes')->nullable()->comment('yes|no');
            $table->string('settings_contracts_prefix', 30)->default('CONT-')->nullable();
            $table->string('settings_contracts_show_view_status', 10)->default('yes')->nullable()->comment('yes|no');
            $table->string('settings_cronjob_has_run', 10)->default('no')->nullable()->comment('yes|no');
            $table->dateTime('settings_cronjob_last_run')->nullable();
            $table->string('settings_modules_hsnsacs', 10)->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_workorder', 10)->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_proforma_invoice', 10)->nullable()->comment('enabled|disabled');
            $table->string('settings_modules_amc_invoice', 10)->nullable()->comment('enabled|disabled');
            $table->string('settings_company_gst_number', 30)->nullable()->comment('GST or VAT Number');

            $table->engine = 'MyISAM';
            $table->charset = 'utf8mb3';
            $table->collation = 'utf8mb3_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
