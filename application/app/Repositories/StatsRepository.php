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
use App\Models\CustomerLeads;

class StatsRepository
{

    protected $users;
    protected $leads;
    protected $tasks;
    protected $projects;
    protected $clients;
    protected $customer_leads;

    /**
     * Inject dependecies
     */
    public function __construct(
        User $users,
        Lead $leads,
        Task $tasks,
        Project $projects,
        Client $clients,
        CustomerLeads $customer_leads
    ) {

        $this->users = $users;
        $this->tasks = $tasks;
        $this->projects = $projects;
        $this->leads = $leads;
        $this->clients = $clients;
        $this->customer_leads = $customer_leads;
    }



    /**
     * Sum invoices
     *
     * @param array $data for filtering
     *         - status  (optional)
     *         - assigned (optional)
     * @return array
     */
    public function countLeads($data = [])
    {

        $leadsQuery = $this->leads->newQuery();
        $customerLeadsQuery = $this->customer_leads->newQuery();

        // Exclude converted leads from the main leads table
        $leadsQuery->where('lead_converted', 'no');

        //status
        if (isset($data['status']) && $data['status'] != '') {
            $leadsQuery->where('lead_status', $data['status']);
            $customerLeadsQuery->where('lead_status', $data['status']);
        }

        //assigned
        if (isset($data['assigned']) && is_numeric($data['assigned']) && auth()->user()->role->role_leads_scope == 'own') {
            $assignedUserId = $data['assigned'];
            $leadsQuery->whereHas('assigned', function ($query) use ($assignedUserId) {
                $query->where('leadsassigned_userid', $assignedUserId)
                    ->where('leadsassigned_leadtype', 'lead');
            });
            $customerLeadsQuery->whereHas('assigned', function ($query) use ($assignedUserId) {
                $query->where('leadsassigned_userid', $assignedUserId)
                    ->where('leadsassigned_leadtype', 'customer_lead');
            });
        }

        $leadsCount = $leadsQuery->count();
        $customerLeadsCount = $customerLeadsQuery->count();

        return ["lead_count" => $leadsCount, "customer_lead_count" => $customerLeadsCount];
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
