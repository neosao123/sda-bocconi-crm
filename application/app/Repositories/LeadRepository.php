<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for leads
 *
 * @package    
 * @author     shreyas@neosao
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use Log;
// 
use App\Models\Lead;
use App\Models\CustomerLeads;
use App\Models\Client;
// 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class LeadRepository
{

    /**
     * The leads repository instance.
     */
    protected $leads;

    protected $customerLeads;

    /**
     * Inject dependecies
     */
    public function __construct(Lead $leads, CustomerLeads $customerLeads, Client $client)
    {
        $this->leads = $leads;
        $this->customerLeads = $customerLeads;
        $this->client = $client;
    }

    /**
     * Search model
     * @param int $id optional for getting a single, specified record
     * @return object lead collection
     */
    public function search($id = '', $data = [])
    {

        $leads = $this->leads->newQuery();
        $customer_leads = $this->customerLeads->newQuery();

        //default - always apply filters
        if (!isset($data['apply_filters'])) {
            $data['apply_filters'] = true;
        }

        //joins

        $leads->leftJoin('categories', 'categories.category_id', '=', 'leads.lead_categoryid');
        $leads->leftJoin('users', 'users.id', '=', 'leads.lead_creatorid');
        $leads->leftJoin('leads_status', 'leads_status.leadstatus_id', '=', 'leads.lead_status');

        $customer_leads->leftJoin('categories', 'categories.category_id', '=', 'customer_leads.lead_categoryid');
        $customer_leads->leftJoin('users', 'users.id', '=', 'customer_leads.lead_creatorid');
        $customer_leads->leftJoin('leads_status', 'leads_status.leadstatus_id', '=', 'customer_leads.lead_status');


        //join: users reminders - do not do this for cronjobs
        if (auth()->check()) {
            $leads->leftJoin('reminders', function ($join) {
                $join->on('reminders.reminderresource_id', '=', 'leads.lead_id')
                    ->where('reminders.reminderresource_type', '=', 'lead')
                    ->where('reminders.reminder_userid', '=', auth()->id());
            });

            $customer_leads->leftJoin('reminders', function ($join) {
                $join->on('reminders.reminderresource_id', '=', 'customer_leads.customer_lead_id')
                    ->where('reminders.reminderresource_type', '=', 'customer_lead')
                    ->where('reminders.reminder_userid', '=', auth()->id());
            });
        }

        // select all
        $leads->selectRaw('*');
        $customer_leads->selectRaw('*');

        //count unread notifications
        $leads->selectRaw('(SELECT COUNT(*)
                                      FROM events_tracking
                                      LEFT JOIN events ON events.event_id = events_tracking.eventtracking_eventid
                                      WHERE eventtracking_userid = ' . auth()->id() . '
                                      AND events_tracking.eventtracking_status = "unread"
                                      AND events.event_parent_type = "lead"
                                      AND events.eventresource_id = leads.lead_id
                                      AND events.event_item = "comment")
                                      AS count_unread_comments');

        $customer_leads->selectRaw('(SELECT COUNT(*)
                                      FROM events_tracking
                                      LEFT JOIN events ON events.event_id = events_tracking.eventtracking_eventid
                                      WHERE eventtracking_userid = ' . auth()->id() . '
                                      AND events_tracking.eventtracking_status = "unread"
                                      AND events.event_parent_type = "lead"
                                      AND events.eventresource_id = customer_leads.customer_lead_id
                                      AND events.event_item = "comment")
                                      AS count_unread_comments');

        //count unread notifications
        $leads->selectRaw('(SELECT COUNT(*)
                                      FROM events_tracking
                                      LEFT JOIN events ON events.event_id = events_tracking.eventtracking_eventid
                                      WHERE eventtracking_userid = ' . auth()->id() . '
                                      AND events_tracking.eventtracking_status = "unread"
                                      AND events.event_parent_type = "lead"
                                      AND events.event_parent_id = leads.lead_id
                                      AND events.event_item = "attachment")
                                      AS count_unread_attachments');

        $customer_leads->selectRaw('(SELECT COUNT(*)
                                      FROM events_tracking
                                      LEFT JOIN events ON events.event_id = events_tracking.eventtracking_eventid
                                      WHERE eventtracking_userid = ' . auth()->id() . '
                                      AND events_tracking.eventtracking_status = "unread"
                                      AND events.event_parent_type = "lead"
                                      AND events.event_parent_id = customer_leads.customer_lead_id
                                      AND events.event_item = "attachment")
                                      AS count_unread_attachments');

        //converted by details
        $leads->selectRaw('(SELECT first_name
                                      FROM users
                                      WHERE users.id = leads.lead_converted_by_userid)
                                      AS converted_by_first_name');

        $customer_leads->selectRaw('(SELECT first_name
                                      FROM users
                                      WHERE users.id = customer_leads.lead_converted_by_userid)
                                      AS converted_by_first_name');

        //converted by details
        $leads->selectRaw('(SELECT last_name
                                      FROM users
                                      WHERE users.id = leads.lead_converted_by_userid)
                                      AS converted_by_last_name');

        $customer_leads->selectRaw('(SELECT last_name
                                      FROM users
                                      WHERE users.id = customer_leads.lead_converted_by_userid)
                                      AS converted_by_last_name');

        $leads->selectRaw('(SELECT CONCAT_WS(" ", first_name, last_name)
                                   FROM users WHERE users.id = leads.lead_converted_by_userid)
                                   AS converted_by_full_name');

        $customer_leads->selectRaw('(SELECT CONCAT_WS(" ", first_name, last_name)
                                   FROM users WHERE users.id = customer_leads.lead_converted_by_userid)
                                   AS converted_by_full_name');

        //default where
        $leads->whereRaw("1 = 1");
        $customer_leads->whereRaw("1 = 1");

        //filter for active or archived (default to active) - do not use this when a lead id has been specified
        if (!is_numeric($id)) {
            if (!request()->filled('filter_show_archived_leads') && !request()->filled('filter_lead_state')) {
                $leads->where('lead_active_state', 'active');
                $customer_leads->where('lead_active_state', 'active');
            }
        }

        //filters: id
        if (request()->filled('filter_lead_id')) {
            $leads->where('lead_id', request('filter_lead_id'));
        }
        if (is_numeric($id)) {
            if (request()->type == "client") {
                $customer_leads->where('customer_lead_id', $id);
                return $customer_leads->get();
            } else {
                $leads->where('lead_id', $id);
                return $leads->get();
            }
        }

        //do not show items that not yet ready (i.e exclude items in the process of being cloned that have status 'invisible')
        $leads->where('lead_visibility', 'visible');

        //apply filters
        if ($data['apply_filters']) {

            //filter assigned
            if (is_array(request('filter_assigned')) && !empty(array_filter(request('filter_assigned')))) {
                $leads->whereHas('assigned', function ($query) {
                    $query->whereIn('leadsassigned_userid', request('filter_assigned'));
                });
                $customer_leads->whereHas('assigned', function ($query) {
                    $query->whereIn('leadsassigned_userid', request('filter_assigned'));
                });
            }

            // filter: single lead status (applies to both)
            if (request()->filled('filter_single_lead_status')) {
                $leads->where('lead_status', request('filter_single_lead_status'));
                $customer_leads->where('lead_status', request('filter_single_lead_status'));
            }

            // filter: array of lead status
            if (is_array(request('filter_lead_status')) && !empty(array_filter(request('filter_lead_status')))) {
                $leads->whereIn('lead_status', request('filter_lead_status'));
                $customer_leads->whereIn('lead_status', request('filter_lead_status'));
            }

            // filter: lead source
            if (is_array(request('filter_lead_source')) && !empty(array_filter(request('filter_lead_source')))) {
                $leads->whereIn('lead_source', request('filter_lead_source'));
                $customer_leads->whereIn('lead_source', request('filter_lead_source'));
            }

            // filter: added date (start)
            if (request()->filled('filter_lead_created_start')) {
                $leads->whereDate('lead_created', '>=', request('filter_lead_created_start'));
                $customer_leads->whereDate('lead_created', '>=', request('filter_lead_created_start'));
            }

            // filter: added date (end)
            if (request()->filled('filter_lead_created_end')) {
                $leads->whereDate('lead_created', '<=', request('filter_lead_created_end'));
                $customer_leads->whereDate('lead_created', '<=', request('filter_lead_created_end'));
            }

            // filter: last contacted (start)
            if (request()->filled('filter_lead_last_contacted_start')) {
                $leads->whereDate('lead_last_contacted', '>=', request('filter_lead_last_contacted_start'));
                $customer_leads->whereDate('lead_last_contacted', '>=', request('filter_lead_last_contacted_start'));
            }

            // filter: last contacted (end)
            if (request()->filled('filter_lead_last_contacted_end')) {
                $leads->whereDate('lead_last_contacted', '<=', request('filter_lead_last_contacted_end'));
                $customer_leads->whereDate('lead_last_contacted', '<=', request('filter_lead_last_contacted_end'));
            }

            // filter: archived leads
            if (request()->filled('filter_lead_state') && in_array(request('filter_lead_state'), ['active', 'archived'])) {
                $leads->where('lead_active_state', request('filter_lead_state'));
                $customer_leads->where('lead_active_state', request('filter_lead_state'));
            }

            // filter: archived leads
            if (request()->filled('filter_lead_type')) {
                $leads->where('lead_type', request('filter_lead_type'));
                $customer_leads->where('lead_type', request('filter_lead_type'));
            }


            // // filter: value min
            // if (request()->filled('filter_lead_value_min')) {
            //     $leads->where('lead_value', '>=', request('filter_lead_value_min'));
            //     $customer_leads->where('lead_value', '>=', request('filter_lead_value_min'));
            // }

            // // filter: value max
            // if (request()->filled('filter_lead_value_max')) {
            //     $leads->where('lead_value', '<=', request('filter_lead_value_max'));
            //     $customer_leads->where('lead_value', '<=', request('filter_lead_value_max'));
            // }

            //filter my leads (using the actions button)
            if (request()->filled('filter_my_leads')) {
                //leads assigned to me
                $leads->whereHas('assigned', function ($query) {
                    $query->whereIn('leadsassigned_userid', [auth()->id()]);
                });
                $customer_leads->whereHas('assigned', function ($query) {
                    $query->whereIn('leadsassigned_userid', [auth()->id()]);
                });
            }

            //filter: tags
            if (is_array(request('filter_tags')) && !empty(array_filter(request('filter_tags')))) {
                $leads->whereHas('tags', function ($query) {
                    $query->whereIn('tag_title', request('filter_tags'));
                });
                $customer_leads->whereHas('tags', function ($query) {
                    $query->whereIn('tag_title', request('filter_tags'));
                });
            }
        }


        //custom fields filtering
        if (request('action') == 'search') {
            if ($fields = \App\Models\CustomField::Where('customfields_type', 'leads')->Where('customfields_show_filter_panel', 'yes')->get()) {
                foreach ($fields as $field) {
                    //field name, as posted by the filter panel (e.g. filter_ticket_custom_field_70)
                    $field_name = 'filter_' . $field->customfields_name;
                    if ($field->customfields_name != '' && request()->filled($field_name)) {
                        if (in_array($field->customfields_datatype, ['number', 'decimal', 'dropdown', 'date', 'checkbox'])) {
                            $leads->Where($field->customfields_name, request($field_name));
                            $customer_leads->Where($field->customfields_name, request($field_name));
                        }
                        if (in_array($field->customfields_datatype, ['text', 'paragraph'])) {
                            $leads->Where($field->customfields_name, 'LIKE', '%' . request($field_name) . '%');
                            $customer_leads->Where($field->customfields_name, 'LIKE', '%' . request($field_name) . '%');
                        }
                    }
                }
            }
        }

        $searchQuery = request('search_query');

        $applySearch = function ($query) use ($searchQuery) {
            $normalized = strtolower(trim($searchQuery));
            $normalized = str_replace([' ', '-'], '', $normalized);
            $query->where(function ($q) use ($searchQuery, $normalized) {
                $q->orWhere('lead_created', 'LIKE', '%' . date('Y-m-d', strtotime($searchQuery)) . '%');
                $q->orWhere('lead_last_contacted', 'LIKE', '%' . date('Y-m-d', strtotime($searchQuery)) . '%');
                $q->orWhere('lead_title', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_firstname', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_lastname', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_email', '=', $searchQuery);
                $q->orWhere('lead_company_name', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_street', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_city', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_state', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_zip', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_country', '=', $searchQuery);
                $q->orWhere('lead_source', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_phone', 'LIKE', '%' . $searchQuery . '%');
                $q->orWhere('lead_type', 'LIKE', '%' . $normalized . '%');

                $q->orWhereHas('tags', function ($q2) use ($searchQuery) {
                    $q2->where('tag_title', 'LIKE', '%' . $searchQuery . '%');
                });
            });
        };

        // Apply to both queries
        $applySearch($leads);
        $applySearch($customer_leads);

        //eager load
        $leads->with([
            'tags',
            'leadstatus',
            'attachments',
            'assigned',
            'reminders',
        ]);

        $customer_leads->with([
            'tags',
            'reminders',
            'assigned',
        ]);

        //count relationships
        $leads->withCount([
            'tags',
            'comments',
            'attachments',
            'checklists',
        ]);


        // Execute both queries without pagination
        $leadsData = $leads->get();
        $customerLeadsData = $customer_leads->get();

        // Merge the two collections
        $mergedItems = $leadsData->merge($customerLeadsData)->all();

        // Sort the merged items by lead_created (or any other field)
        usort($mergedItems, function ($a, $b) {
            return strtotime($b->lead_created) <=> strtotime($a->lead_created); // DESC order
        });

        // Set pagination values
        $perPage = max(1, config('system.settings_system_kanban_pagination_limits', 15));
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1;

        // Slice the sorted array to get items for the current page
        $currentItems = array_slice($mergedItems, ($currentPage - 1) * $perPage, $perPage);

        // Create LengthAwarePaginator manually
        return new \Illuminate\Pagination\LengthAwarePaginator(
            $currentItems,
            count($mergedItems),
            $perPage,
            $currentPage,
            [
                'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        // $combined = $leadsData->merge($customerLeadsData);

        // // Get the results and return them.
        // return $combined->paginate(config('system.settings_system_kanban_pagination_limits'));
    }

    /**
     * Create a new record
     * @param array $position new record position
     * @return mixed object|bool
     */
    public function create($position = '')
    {
        // dd(request()->all());
        //validate
        if (!is_numeric($position)) {
            Log::error("validation error - invalid params", ['process' => '[LeadRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'project_id' => 1]);
            return false;
        }

        //save new user
        if (request()->lead_clientid) {
            if (!$this->client->where('client_id', request()->lead_clientid)->first()) {
                Log::error("record could not be found", ['process' => '[LeadCreateRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'lead_id' => $id ?? '']);
                return false;
            }
            $lead = new $this->customerLeads;
            $lead->lead_clientid = request()->lead_clientid;
        } else {
            $lead = new $this->leads;
        }

        //data
        $lead->lead_creatorid = auth()->id();
        $lead->lead_uniqueid = str_unique();
        $lead->lead_type = request('lead_type');
        $lead->lead_firstname = request('lead_firstname');
        $lead->lead_lastname = request('lead_lastname');
        $lead->lead_email = request('lead_email');
        $lead->lead_phone = request('lead_phone');
        $lead->lead_job_position = request('lead_job_position');
        $lead->lead_company_name = request('lead_company_name');
        $lead->lead_website = request('lead_website');
        $lead->lead_vat = request('lead_vat');
        $lead->lead_street = request('lead_street');
        $lead->lead_city = request('lead_city');
        $lead->lead_state = request('lead_state');
        $lead->lead_zip = request('lead_zip');
        $lead->lead_country = request('lead_country');
        $lead->lead_source = request('lead_source');
        $lead->lead_title = request('lead_title');
        $lead->lead_description = request('lead_description');
        // $lead->lead_value = request('lead_value');
        $lead->lead_last_contacted = request('lead_last_contacted'); //or \Carbon\Carbon::now()
        $lead->lead_status = request('lead_status');
        $lead->lead_position = $position;
        $lead->lead_categoryid = request('lead_categoryid');

        //save and return id
        if ($lead->save()) {
            //apply custom fields data
            if (request()->lead_clientid) {
                $this->applyCustomFields($lead->customer_lead_id);
                return $lead->customer_lead_id;
            } else {
                $this->applyCustomFields($lead->lead_id);
                return $lead->lead_id;
            }
        } else {
            return false;
        }
    }

    /**
     * update a record
     * @param int $id record id
     * @return mixed int|bool
     */
    public function update($id)
    {

        //get the record
        if (!$lead = $this->leads->find($id)) {
            Log::error("record could not be found", ['process' => '[LeadAssignedRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'lead_id' => $id ?? '']);
            return false;
        }

        //last updated
        $lead->lead_updatorid = auth()->id();

        //general
        $lead->lead_firstname = request('lead_firstname');
        $lead->lead_lastname = request('lead_lastname');
        $lead->lead_email = request('lead_email');
        $lead->lead_phone = request('lead_phone');
        $lead->lead_job_position = request('lead_job_position');
        $lead->lead_company_name = request('lead_company_name');
        $lead->lead_website = request('lead_website');
        $lead->lead_street = request('lead_street');
        $lead->lead_city = request('lead_city');
        $lead->lead_state = request('lead_state');
        $lead->lead_zip = request('lead_zip');
        $lead->lead_country = request('lead_country');
        $lead->lead_source = request('lead_source');
        $lead->lead_title = request('lead_title');
        $lead->lead_description = request('lead_description');
        $lead->lead_value = request('lead_value');
        $lead->lead_last_contacted = request('lead_last_contacted');
        $lead->lead_status = request('lead_status');

        //save
        if ($lead->save()) {
            //apply custom fields data
            $this->applyCustomFields($lead->lead_id);
            return $lead->lead_id;
        } else {
            return false;
        }
    }

    /**
     * feed for leads
     * @param string $status lead status
     * @param string $limit assigned|null limit to leads assiged to auth() user
     * @param string $searchterm
     * @return array
     */
    // public function autocompleteFeed($status = '', $limit = '', $searchterm = '')
    // {

    //     //validation
    //     if ($searchterm == '') {
    //         return [];
    //     }

    //     //start
    //     $query = $this->leads->newQuery();
    //     $query->selectRaw("lead_title AS value, lead_id AS id");

    //     //[filter] lead status
    //     if ($status != '') {
    //         if ($status == 'active') {
    //             $query->where('lead_status', '!=', 'completed');
    //         } else {
    //             $query->where('lead_status', '=', $status);
    //         }
    //     }

    //     //[filter] search term
    //     $query->where('lead_title', 'like', '%' . $searchterm . '%');

    //     //[filter] assigned
    //     if ($limit == 'assigned') {
    //         $leads->whereHas('assigned', function ($query) {
    //             $query->whereIn('leadsassigned_userid', auth()->user()->id);
    //         });
    //     }

    //     //return
    //     return $query->get();
    // }



    public function autocompleteFeed($status = '', $limit = '', $searchterm = '')
    {
        // validation
        if ($searchterm == '') {
            return [];
        }

        // Subquery to get all converted lead IDs
        $convertedLeadIds = DB::table('customer_leads')
            ->whereNotNull('lead_converted_by_leadid')
            ->pluck('lead_converted_by_leadid')
            ->toArray();

        // Main query for leads not converted
        $leadQuery = $this->leads->newQuery();
        $leadQuery->selectRaw("lead_title AS value, CONCAT('lead_', lead_id) AS id");

        // [filter] status
        if ($status != '') {
            if ($status == 'active') {
                $leadQuery->where('lead_status', '!=', 'completed');
            } else {
                $leadQuery->where('lead_status', '=', $status);
            }
        }

        // [filter] search term
        $leadQuery->where('lead_title', 'like', '%' . $searchterm . '%');

        // [exclude] converted leads
        if (!empty($convertedLeadIds)) {
            $leadQuery->whereNotIn('lead_id', $convertedLeadIds);
        }

        // [filter] assigned
        if ($limit == 'assigned') {
            $leadQuery->whereHas('assigned', function ($query) {
                $query->whereIn('leadsassigned_userid', [auth()->user()->id]);
            });
        }

        $leads = $leadQuery->get();

        // Get customer leads (always include)
        $customerLeads = DB::table('customer_leads')
            ->selectRaw("lead_title AS value, CONCAT('customer_lead_', customer_lead_id) AS id")
            ->where('lead_title', 'like', '%' . $searchterm . '%')
            ->get();

        // Merge and return
        return $customerLeads->merge($leads)->values();
    }



    /**
     * feed for leads
     * @param string $status lead status
     * @param string $limit assigned|null limit to leads assiged to auth() user
     * @param string $searchterm
     * @return array
     */
    public function autocompleteFeedNames($status = '', $limit = '', $searchterm = '')
    {

        //validation
        if ($searchterm == '') {
            return [];
        }

        //start
        $query = $this->leads->newQuery();
        $query->selectRaw("CONCAT(lead_firstname , ' ' , lead_lastname , ' - ' , lead_title) AS value, lead_title, lead_id AS id");

        //[filter] lead status
        if ($status != '') {
            if ($status == 'active') {
                $query->where('lead_status', '!=', 'completed');
            } else {
                $query->where('lead_status', '=', $status);
            }
        }

        //[filter] search term
        $query->where('lead_title', 'like', '%' . $searchterm . '%');

        //[filter] assigned
        if ($limit == 'assigned') {
            $leads->whereHas('assigned', function ($query) {
                $query->whereIn('leadsassigned_userid', auth()->user()->id);
            });
        }

        //return
        return $query->get();
    }

    /**
     * update model wit custom fields data (where enabled)
     */
    public function applyCustomFields($id = '')
    {

        //custom fields
        $fields = \App\Models\CustomField::Where('customfields_type', 'leads')->get();
        foreach ($fields as $field) {
            if ($field->customfields_standard_form_status == 'enabled') {
                $field_name = $field->customfields_name;
                \App\Models\Lead::where('lead_id', $id)
                    ->update([
                        "$field_name" => request($field_name),
                    ]);
            }
        }
    }

    /**
     * clone a leads
     * @return bool
     */
    public function cloneLead($lead = '', $data = [])
    {

        //we are copying
        $new_lead = $lead->replicate();
        $new_lead->lead_created = now();
        $new_lead->lead_creatorid = auth()->id();
        $new_lead->lead_uniqueid = str_unique();
        $new_lead->lead_title = $data['lead_title'];
        $new_lead->lead_firstname = $data['lead_firstname'];
        $new_lead->lead_lastname = $data['lead_lastname'];
        $new_lead->lead_status = $data['lead_status'];
        $new_lead->lead_email = $data['lead_email'];
        $new_lead->lead_value = $data['lead_value'];
        $new_lead->lead_phone = $data['lead_phone'];
        $new_lead->lead_company_name = $data['lead_company_name'];
        $new_lead->lead_website = $data['lead_website'];
        $new_lead->lead_last_contacted = null;
        $new_lead->lead_converted_by_userid = null;
        $new_lead->lead_converted_date = null;
        $new_lead->lead_converted_clientid = null;
        $new_lead->lead_active_state = 'active';
        $new_lead->save();

        //copy check list
        if ($data['copy_checklist']) {
            if ($checklists = \App\Models\Checklist::Where('checklistresource_type', 'lead')->Where('checklistresource_id', $lead->lead_id)->get()) {
                foreach ($checklists as $checklist) {
                    $new_checklist = $checklist->replicate();
                    $new_checklist->checklist_created = now();
                    $new_checklist->checklist_creatorid = auth()->id();
                    $new_checklist->checklist_clientid = $new_lead->lead_clientid;
                    $new_checklist->checklist_status = 'pending';
                    $new_checklist->checklistresource_type = 'lead';
                    $new_checklist->checklistresource_id = $new_lead->lead_id;
                    $new_checklist->save();
                }
            }
        }

        //copy attachements
        if ($data['copy_files']) {
            if ($attachments = \App\Models\Attachment::Where('attachmentresource_type', 'lead')->Where('attachmentresource_id', $lead->lead_id)->get()) {
                foreach ($attachments as $attachment) {
                    //unique key
                    $unique_key = Str::random(50);
                    //directory
                    $directory = Str::random(40);
                    //paths
                    $source = BASE_DIR . "/storage/files/" . $attachment->attachment_directory;
                    $destination = BASE_DIR . "/storage/files/$directory";
                    //validate
                    if (is_dir($source)) {
                        //copy the database record
                        $new_attachment = $attachment->replicate();
                        $new_attachment->attachment_creatorid = auth()->id();
                        $new_attachment->attachment_created = now();
                        $new_attachment->attachmentresource_id = $lead->lead_id;
                        $new_attachment->attachment_clientid = $new_lead->lead_clientid;
                        $new_attachment->attachment_uniqiueid = $directory;
                        $new_attachment->attachment_directory = $directory;
                        $new_attachment->attachmentresource_type = 'lead';
                        $new_attachment->attachmentresource_id = $new_lead->lead_id;
                        $new_attachment->save();
                        //copy folder
                        File::copyDirectory($source, $destination);
                    }
                }
            }
        }

        //all done
        return $new_lead;
    }

    /**
     * Get a list or leads which the user is
     * When the $result param is set to 'feed', this can be used in Feed.php
     * @param string $result null | feed | list
     * @return mixed returns collection by default or a feed obj or an array of lead id's
     */
    public function usersAssignedLeads($userid = '', $result = '')
    {

        //sanity
        if (!is_numeric($userid)) {
            $userid = -1;
        }

        //save userid to usein subquery
        request()->merge([
            'temp_query_userid' => $userid,
        ]);

        $leads = $this->leads->newQuery();

        $leads->whereHas('assigned', function ($q) {
            $q->whereIn('leadsassigned_userid', [request('temp_query_userid')]);
        });

        //sorting
        $leads->orderBy('lead_title', 'asc');

        $collection = $leads->get();

        //array result
        if ($result == 'list') {
            $list = [];
            foreach ($collection as $lead) {
                $list[] = $lead->lead_id;
            }
            return $list;
        }

        //return
        return $collection;
    }
}
