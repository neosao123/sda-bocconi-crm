<?php

/** --------------------------------------------------------------------------------
 * This middleware class handles [destory] precheck processes for leads
 *
 * @package    
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Middleware\Leads;

use App\Models\Lead;
use App\Permissions\LeadPermissions;
use Closure;
use Log;

use function PHPSTORM_META\type;

class Destroy
{

    /**
     * The permisson repository instance.
     */
    protected $leadpermissions;

    /**
     * Inject any dependencies here
     *
     */
    public function __construct(LeadPermissions $leadpermissions, Lead $lead_model)
    {

        //lead permissions repo
        $this->leadpermissions = $leadpermissions;
    }

    /**
     * This 'bulk actions' middleware does the following
     *   1. If the request was for a sinle item
     *         - single item actions must have a query string '?id=123'
     *         - this id will be merged into the expected 'ids' request array (just as if it was a bulk request)
     *   2. loop through all the 'ids' that are in the post request
     *
     * HTML for the checkbox is expected to be in this format:
     *   <input type="checkbox" name="ids[{{ $lead->lead_id }}]"
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //validate module status
        if (!config('visibility.modules.leads')) {
            abort(404, __('lang.the_requested_service_not_found'));
            return $next($request);
        }

        //for a single item request - merge into an $ids[x] array and set as if checkox is selected (on)
        if (is_numeric($request->route('lead')) && ($request->type == "client" || $request->type == "lead")) {
            $ids[$request->route('lead') . '-' . $request->type] = 'on';
            request()->merge([
                'ids' => $ids,
            ]);
        }

        //loop through each lead and check permissions
        if (is_array(request('ids'))) {

            //validate each item in the list exists
            foreach (request('ids') as $id => $value) {
                [$lead_id, $type] = explode('-', $id);
                //only checked items
                if ($value == 'on') {
                    // dd($lead_id, $type);
                    //validate
                    $query = $type == "client" ? \App\Models\CustomerLeads::Where('customer_lead_id', $lead_id)->first() : \App\Models\Lead::Where('lead_id', $lead_id)->first();
                    if (!$query) {
                        abort(409, __('lang.one_of_the_selected_items_nolonger_exists'));
                    }
                    $leadInfo = getLeadId($query);
                    $formattedId = $leadInfo['formatted_id'];
                    // if ($leadInfo['type'] == 'lead' && $query->lead_converted == 'no') {
                    //     // continue
                    // } else {
                    //     abort(403, __('lang.actions_not_available') . " - #$formattedId");
                    // }
                    //permission on each one
                    if (!$this->leadpermissions->check('delete', $lead_id)) {
                        abort(403, __('lang.permission_denied_for_this_item') . " - #$lead_id");
                    }
                }
            }
            //client - no permissions
            if (auth()->user()->is_client) {
                abort(403);
            }
        } else {
            //no items were passed with this request
            Log::error("no items were sent with this request", ['process' => '[permissions][leads][change-category]', 'ref' => config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'lead id' => $lead_id ?? '']);
            abort(409);
        }
        //all is on - passed
        return $next($request);
    }
}
