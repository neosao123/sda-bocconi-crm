<?php

/** --------------------------------------------------------------------------------
 * This middleware set the global status of each module. Save the bool data in config
 *
 * [example] config('module.settings_modules_projects')
 *
 * @package    
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Middleware\Modules;

use Closure;

class Status
{

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //only for logged in users
        if (!auth()->check()) {
            return $next($request);
        }

        //valid modules (as found in the settings table)
        $modules = [
            'projects' => 'settings_modules_projects',
            'tasks' => 'settings_modules_tasks',
            'leads' => 'settings_modules_leads',
            'timetracking' => 'settings_modules_timetracking',
            'reminders' => 'settings_modules_reminders',
            'spaces' => 'settings_modules_spaces',
            'calendar' => 'settings_modules_calendar',
        ];

        //set theglobal visibility of each module
        foreach ($modules as $key => $value) {
            config(
                [
                    "modules.$key" => $this->moduleStatus($value),
                ]
            );
        }

        //done
        return $next($request);
    }

    /** -------------------------------------------------------------------------
     * Check the global and/or client modules status (enabled or disabled)
     * @param string $module the module that is being checked. The name corresponds
     *               with the field name, in the table, settings
     * @return bool
     * -------------------------------------------------------------------------*/
    public function moduleStatus($module)
    {
        //module is globallu disabled
        if (!config("system.$module") || config("system.$module") == 'disabled') {
            return false;
        }

        //module is disabled for client user (where client has been set to use custom modules)
        if (auth()->user()->is_client) {
            if (auth()->user()->client->client_app_modules == 'custom') {
                switch ($module) {
                    case 'settings_modules_projects':
                        return (auth()->user()->client->client_settings_modules_projects == 'enabled') ? true : false;
                        break;
                }
            }

            //disable some team only modulkes
            switch ($module) {
                case 'settings_modules_calendar':
                    return false;
                    break;
            }
        }

        //finally
        return true;
    }
}
