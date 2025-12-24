<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for stats
 *
 * @package
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Lead;
use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;

class StatsRepository
{

    protected $users;
    protected $leads;
    protected $tasks;
    protected $projects;
    protected $clients;

    /**
     * Inject dependecies
     */
    public function __construct(
        User $users,
        Lead $leads,
        Task $tasks,
        Project $projects,
        Client $clients,
    ) {

        $this->users = $users;
        $this->tasks = $tasks;
        $this->projects = $projects;
        $this->leads = $leads;
        $this->clients = $clients;
    }



    /**
     * Sum invoices
     *
     * @param array $data for filtering
     *         - status  (optional)
     *         - assigned (optional)
     * @return float
     */
    public function countLeads($data = [])
    {

        $leads = $this->leads->newQuery();

        //default
        $leads->selectRaw('*');

        //status
        if (isset($data['status']) && $data['status'] != '') {
            $leads->where('lead_status', $data['status']);
        }

        //status
        if (isset($data['assigned']) && is_numeric($data['assigned'])) {
            request()->merge(['for_assigned_user' => $data['assigned']]);
            $leads->whereHas('assigned', function ($query) {
                $query->whereIn('leadsassigned_userid', [request('for_assigned_user')]);
            });
        }

        return $leads->count();
    }

    /**
     * count tasks
     * @param array $data for filtering
     *         - status  (optional)
     *         - assigned (optional)
     *         - client_id (optional)
     * @return float
     */
    public function countTasks($data = [])
    {

        $tasks = $this->tasks->newQuery();

        //default
        $tasks->selectRaw('*');

        //status
        if (isset($data['status']) && $data['status'] != '') {
            switch ($data['status']) {
                case 'new':
                    $tasks->where('task_status', 1);
                    break;
                case 'completed':
                    $tasks->where('task_status', 2);
                    break;
                case 'pending':
                    $tasks->whereNotIn('task_status', [1, 2]);
                    break;
                default:
                    $tasks->where('task_status', $data['status']);
            }
        }

        //status
        if (isset($data['client_id']) && assigned($data['client_id'])) {
            $tasks->where('task_clientid', $data['client_id']);
        }

        //status
        if (isset($data['assigned']) && is_numeric($data['assigned'])) {
            request()->merge(['for_assigned_user' => $data['assigned']]);
            $tasks->whereHas('assigned', function ($query) {
                $query->whereIn('tasksassigned_userid', [request('for_assigned_user')]);
            });
        }

        return $tasks->count();
    }

    /**
     * count projects
     * @param array $data for filtering
     *         - status  (optional)
     *         - assigned (optional)
     *         - client_id (optional)
     * @return float
     */
    public function countProjects($data = [])
    {

        $projects = $this->projects->newQuery();

        //default
        $projects->selectRaw('*');
        $projects->where('project_type', 'project');

        //status
        if (isset($data['status']) && $data['status'] != '') {
            if ($data['status'] == 'pending') {
                $projects->whereNotIn('project_status', ['completed', 'cancelled']);
            } else {
                $projects->where('project_status', $data['status']);
            }
        }

        //status
        if (isset($data['client_id'])) {
            $projects->where('project_clientid', $data['client_id']);
        }

        //status
        if (isset($data['assigned']) && is_numeric($data['assigned'])) {
            request()->merge(['for_assigned_user' => $data['assigned']]);
            $projects->whereHas('assigned', function ($query) {
                $query->whereIn('projectsassigned_userid', [request('for_assigned_user')]);
            });
        }

        return $projects->count();
    }


    public function generalCounts()
    {
        $clients = $this->clients->newQuery();
        $clients->selectRaw('*');
        $clientCount = $clients->count();

        $projects = $this->projects->newQuery();
        $projects->selectRaw('*');
        $projects->where('project_type', 'project');
        $projectCount = $projects->count();

        $data = [
            'clients' => $clientCount,
            'projects' => $projectCount,
        ];

        return $data;
    }
}
