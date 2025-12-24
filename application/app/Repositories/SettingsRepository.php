<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for settings
 *
 * @package
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Settings;
use Log;

class SettingsRepository
{

    /**
     * The settimgs repository instance.
     */
    protected $settings;

    /**
     * Inject dependecies
     */
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * update settings
     * @return bool
     */
    public function updateGeneral()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //general 
        //$settings->settings_system_timezone = request('settings_system_timezone');
        $settings->settings_system_date_format = request('settings_system_date_format');
        $settings->settings_system_datepicker_format = request('settings_system_datepicker_format');
        $settings->settings_system_default_leftmenu = request('settings_system_default_leftmenu');
        $settings->settings_system_default_statspanel = request('settings_system_default_statspanel');
        //$settings->settings_system_pagination_limits = request('settings_system_pagination_limits');
        // $settings->settings_system_kanban_pagination_limits = request('settings_system_kanban_pagination_limits');
        //$settings->settings_system_close_modals_body_click = request('settings_system_close_modals_body_click');
        $settings->settings_system_language_allow_users_to_change = request('settings_system_language_allow_users_to_change');
        // $settings->settings_system_language_default = request('settings_system_language_default');
        // $settings->settings_system_session_login_popup = request('settings_system_session_login_popup');
        $settings->settings_system_exporting_strip_html = request('settings_system_exporting_strip_html');
        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }

    /**
     * update settings
     * @return bool
     */
    public function updateCurrency()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //general
        $settings->settings_system_currency_code = request('settings_system_currency_code');
        $settings->settings_system_currency_symbol = request('settings_system_currency_symbol');
        $settings->settings_system_currency_position = request('settings_system_currency_position');
        $settings->settings_system_decimal_separator = request('settings_system_decimal_separator');
        $settings->settings_system_thousand_separator = request('settings_system_thousand_separator');
        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }

    /**
     * update settings
     * @return bool
     */
    public function updateCompany()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //general
        $settings->settings_company_name = request('settings_company_name');
        $settings->settings_company_city = request('settings_company_city');
        $settings->settings_company_address_line_1 = request('settings_company_address_line_1');
        $settings->settings_company_state = request('settings_company_state');
        $settings->settings_company_zipcode = request('settings_company_zipcode');
        $settings->settings_company_country = request('settings_company_country');
        $settings->settings_company_telephone = request('settings_company_telephone');

        $settings->settings_company_customfield_1 = request('settings_company_customfield_1');
        $settings->settings_company_customfield_2 = request('settings_company_customfield_2');
        $settings->settings_company_customfield_3 = request('settings_company_customfield_3');
        $settings->settings_company_customfield_4 = request('settings_company_customfield_4');

        /**
         * Dt. 09-09-2024
         * @author: Abhi Harshe, Neosao Services
         * gst number
         */
        $settings->settings_company_gst_number = request('settings_company_gst_number');

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }

    /**
     * update project general settings
     * @return bool
     */
    public function updateProjectGeneral()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        $settings->settings_projects_default_hourly_rate = request('settings_projects_default_hourly_rate');
        $settings->settings_projects_cover_images = (request('settings_projects_cover_images') == 'enabled') ? 'enabled' : 'disabled';
        $settings->settings_projects_categories_main_menu = (request('settings_projects_categories_main_menu') == 'yes') ? 'yes' : 'no';
        $settings->settings_projects_events_show_task_status_change = (request('settings_projects_events_show_task_status_change') == 'yes') ? 'yes' : 'no';
        $settings->save();

        //show tasks status change events in the project timeline
        \App\Models\Event::where('event_item_lang', 'event_changed_task_status')
            ->update([
                'event_show_in_timeline' => $settings->settings_projects_events_show_task_status_change,
            ]);

        return true;
    }

    /**
     * update project client permission settings
     * @return bool
     */
    public function updateProjectClientPermissions()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //general
        $settings->settings_projects_clientperm_tasks_view = (request('settings_projects_clientperm_tasks_view') == 'on') ? 'yes' : 'no';
        $settings->settings_projects_clientperm_tasks_collaborate = (request('settings_projects_clientperm_tasks_collaborate') == 'on') ? 'yes' : 'no';
        $settings->settings_projects_clientperm_tasks_create = (request('settings_projects_clientperm_tasks_create') == 'on') ? 'yes' : 'no';
        $settings->settings_projects_clientperm_timesheets_view = (request('settings_projects_clientperm_timesheets_view') == 'on') ? 'yes' : 'no';
        $settings->settings_projects_clientperm_assigned_view = (request('settings_projects_clientperm_assigned_view') == 'on') ? 'yes' : 'no';
        $settings->settings_projects_clientperm_expenses_view = (request('settings_projects_clientperm_expenses_view') == 'on') ? 'yes' : 'no';

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }

    /**
     * update project staff permission settings
     * @return bool
     */
    public function updateProjectStaffPermissions()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //general
        $settings->settings_projects_assignedperm_tasks_collaborate = (request('settings_projects_assignedperm_tasks_collaborate') == 'on') ? 'yes' : 'no';
        $settings->settings_projects_permissions_basis = (request('settings_projects_permissions_basis') == 'user_roles') ? 'user_roles' : 'category_based';

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }

    /**
     * update tags settings
     * @return bool
     */
    public function updateTagsSettings()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_tags_allow_users_create = (request('settings_tags_allow_users_create') == 'on') ? 'yes' : 'no';

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }



    /**
     * update email general settings
     * @return bool
     */
    public function updateEmailGeneral()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_email_from_address = request('settings_email_from_address');
        $settings->settings_email_from_name = request('settings_email_from_name');
        $settings->settings_email_server_type = request('settings_email_server_type');
        $settings->settings_completed_check_email = 'yes';

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }

    /**
     * update email smtp settings
     * @return bool
     */
    public function updateEmailSMTP()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_email_smtp_host = request('settings_email_smtp_host');
        $settings->settings_email_smtp_port = request('settings_email_smtp_port');
        $settings->settings_email_smtp_username = request('settings_email_smtp_username');
        $settings->settings_email_smtp_password = request('settings_email_smtp_password');
        $settings->settings_email_smtp_encryption = request('settings_email_smtp_encryption');

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }


    /**
     * update clients settings
     * @return bool
     */
    public function updateClients()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_clients_registration = (request('settings_clients_registration') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_clients_shipping_address = (request('settings_clients_shipping_address') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_clients_app_login = (request('settings_clients_app_login') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_clients_disable_email_delivery = (request('settings_clients_disable_email_delivery') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_clients_app_login = (request('settings_clients_app_login') == 'on') ? 'enabled' : 'disabled';

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }


    /**
     * update tasks settings
     * @return bool
     */
    public function updateTasks()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_tasks_kanban_date_created = (request('settings_tasks_kanban_date_created') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_date_due = (request('settings_tasks_kanban_date_due') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_date_start = (request('settings_tasks_kanban_date_start') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_priority = (request('settings_tasks_kanban_priority') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_milestone = (request('settings_tasks_kanban_milestone') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_client_visibility = (request('settings_tasks_kanban_client_visibility') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_project_title = (request('settings_tasks_kanban_project_title') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_client_name = (request('settings_tasks_kanban_client_name') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_tags = (request('settings_tasks_kanban_tags') == 'on') ? 'show' : 'hide';
        $settings->settings_tasks_kanban_reminder = (request('settings_tasks_kanban_reminder') == 'on') ? 'show' : 'hide';

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }

    /**
     * update tasks settings
     * @return bool
     */
    public function updateMilestones()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_projects_assignedperm_milestone_manage = (request('settings_projects_assignedperm_milestone_manage') == 'on') ? 'yes' : 'no';

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }


    /**
     * update lead settings
     * @return bool
     */
    public function updateLeads()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_leads_kanban_date_created = (request('settings_leads_kanban_date_created') == 'on') ? 'show' : 'hide';
        $settings->settings_leads_kanban_date_contacted = (request('settings_leads_kanban_date_contacted') == 'on') ? 'show' : 'hide';
        $settings->settings_leads_kanban_value = (request('settings_leads_kanban_value') == 'on') ? 'show' : 'hide';
        $settings->settings_leads_kanban_category = (request('settings_leads_kanban_category') == 'on') ? 'show' : 'hide';
        $settings->settings_leads_kanban_telephone = (request('settings_leads_kanban_telephone') == 'on') ? 'show' : 'hide';
        $settings->settings_leads_kanban_source = (request('settings_leads_kanban_source') == 'on') ? 'show' : 'hide';
        $settings->settings_leads_kanban_email = (request('settings_leads_kanban_email') == 'on') ? 'show' : 'hide';
        $settings->settings_leads_kanban_tags = (request('settings_leads_kanban_tags') == 'on') ? 'show' : 'hide';
        $settings->settings_leads_kanban_reminder = (request('settings_leads_kanban_reminder') == 'on') ? 'show' : 'hide';

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }

    /**
     * update theme
     * @return bool
     */
    public function updateTheme()
    {

        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_theme_name = request('settings_theme_name');
        $settings->settings_theme_head = request('settings_theme_head');
        $settings->settings_theme_body = request('settings_theme_body');

        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }


    /**
     * update modules settings
     * @return bool
     */
    public function updateModules()
    {
        //get the record
        if (!$settings = $this->settings->find(1)) {
            return false;
        }

        //update
        $settings->settings_modules_projects = (request('settings_modules_projects') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_tasks = (request('settings_modules_tasks') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_invoices = (request('settings_modules_invoices') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_payments = (request('settings_modules_payments') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_leads = (request('settings_modules_leads') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_knowledgebase = (request('settings_modules_knowledgebase') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_estimates = (request('settings_modules_estimates') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_expenses = (request('settings_modules_expenses') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_subscriptions = (request('settings_modules_subscriptions') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_tickets = (request('settings_modules_tickets') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_timetracking = (request('settings_modules_timetracking') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_reminders = (request('settings_modules_reminders') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_proposals = (request('settings_modules_proposals') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_contracts = (request('settings_modules_contracts') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_messages = (request('settings_modules_messages') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_reports = (request('settings_modules_reports') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_calendar = (request('settings_modules_calendar') == 'on') ? 'enabled' : 'disabled';

        //$settings->settings_modules_spaces = (request('settings_modules_spaces') == 'on') ? 'enabled' : 'disabled';


        /**
         * dt. 30-08-2024
         * Dev. abhi harshe, #neosao
         * section and section type
         */
        $settings->settings_modules_hsnsacs = (request('settings_modules_hsnsacs') == 'on') ? 'enabled' : 'disabled';
        /**
         * @author shreyasm@neosao
         * Workorder Modules in Sales
         */

        $settings->settings_modules_workorder = (request('settings_modules_workorder') == 'on') ? 'enabled' : 'disabled';

        /**
         * @author shreyasm@neosao
         * Proforma Invoice Modules in Sales
         */
        $settings->settings_modules_proforma_invoice = (request('settings_modules_proforma_invoice') == 'on') ? 'enabled' : 'disabled';
        $settings->settings_modules_amc_invoice = (request('settings_modules_amc_invoice') == 'on') ? 'enabled' : 'disabled';


        //save
        if ($settings->save()) {
            return true;
        } else {
            Log::error("record could not be updated - database error", ['process' => '[SettingsRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
    }
}
