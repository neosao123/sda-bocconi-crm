<?php

/** --------------------------------------------------------------------------------
 * This middleware mostly used for cluster/group menu visibility or other complex
 * menu structures. Regular menu items willjust used the modules.xvy check
 *
 * module visibility is set in [Middleware/Modules/Status.php]
 *
 * @package
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Middleware\Modules;

use Closure;

class Visibility
{

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //only logged in
        if (!auth()->check()) {
            return $next($request);
        }

        //set all the menus
        $this->viewLeads();
        $this->viewClients();
        $this->viewProjects();
        $this->viewTasks();
        $this->viewTeam();
        $this->viewCalendar();


        $this->viewUsers();
        $this->viewTimesheets();
        $this->viewTimetracking();
        $this->viewReminders();
        $this->viewSpaces();

        //done
        return $next($request);
    }


    /**
     * visibility of the leads feature [team]
     */
    public function viewLeads()
    {

        //team
        if (auth()->user()->is_team) {
            if (auth()->user()->role->role_leads >= 1) {
                if (config('modules.leads')) {
                    config(['visibility.modules.leads' => true]);
                }
            }
        }
    }

    /**
     * visibility of the client feature [team]
     */
    public function viewClients()
    {
        //team
        if (auth()->user()->is_team) {
            if (auth()->user()->role->role_clients >= 1) {
                config(['visibility.modules.clients' => true]);
            }
        }
    }

    /**
     * visibility of the projects features [both]
     */
    public function viewProjects()
    {

        //team
        if (auth()->user()->is_team) {
            if (auth()->user()->role->role_projects >= 1) {
                if (config('modules.projects')) {
                    config(['visibility.modules.projects' => true]);
                }
            }
        }

        //client
        if (auth()->user()->is_client) {
            if (config('modules.projects')) {
                config(['visibility.modules.projects' => true]);
            }
        }
    }

    /**
     * visibility of the tasks feature [team]
     */
    public function viewTasks()
    {

        //team
        if (auth()->user()->is_team) {
            if (auth()->user()->role->role_tasks >= 1) {
                if (config('modules.tasks') && config('modules.projects')) {
                    config(['visibility.modules.tasks' => true]);
                }
            }
        }

        //client
        if (auth()->user()->is_client) {
            if (config('modules.tasks')) {
                config(['visibility.modules.tasks' => true]);
            }
        }
    }

    /**
     * visibility of the team feature [team]
     */
    public function viewTeam()
    {

        //team
        if (auth()->user()->is_team) {
            if (auth()->user()->role->role_team >= 1) {
                config(['visibility.modules.team' => true]);
            }
        }
    }



    /**
     * visibility of the client users features [team]
     */
    public function viewUsers()
    {

        //team
        if (auth()->user()->is_team) {
            if (auth()->user()->role->role_contacts >= 1) {
                config(['visibility.modules.users' => true]);
            }
        }
    }

    /**
     * visibility of the timesheets feature [team]
     */
    public function viewTimesheets()
    {

        //team
        if (auth()->user()->is_team) {
            if (auth()->user()->role->role_timesheets >= 1) {
                if (config('modules.timetracking')) {
                    config(['visibility.modules.timesheets' => true]);
                }
            }
        }

        //client
        if (auth()->user()->is_client) {
            if (config('modules.timetracking')) {
                config(['visibility.modules.timesheets' => true]);
            }
        }
    }

    /**
     * visibility of the time tracking (timers) feature [team]
     */
    public function viewTimetracking()
    {

        //team
        if (auth()->user()->is_team) {
            if (config('modules.timetracking')) {
                config(['visibility.modules.timetracking' => true]);
            }
        }
    }

    /**
     * visibility of reminders feature [team]
     */
    public function viewReminders()
    {

        //team
        if (config('modules.reminders')) {
            config(['visibility.modules.reminders' => true]);
        }
    }

    /**
     * visibility of the spaces feature [team]
     */
    public function viewSpaces()
    {
        if (auth()->user()->is_team) {
            if (config('modules.spaces')) {
                config(['visibility.modules.spaces' => true]);
            }
        }
    }

    /**
     * visibility of the calendar feature [team]
     */
    public function viewCalendar()
    {
        if (auth()->user()->is_team) {
            if (config('modules.calendar')) {
                config(['visibility.modules.calendar' => true]);
            }
        }
    }
}
