<?php

/** --------------------------------------------------------------------------------
 * This middleware class handles [download attachment] precheck processes for leads
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

class DownloadAttachment
{

    /**
     * The permisson repository instance.
     */
    protected $leadpermissions;

    /**
     * Inject any dependencies here
     *
     */
    public function __construct(LeadPermissions $leadpermissions)
    {

        //permissions
        $this->leadpermissions = $leadpermissions;
    }

    /**
     * Check user permissions to edit a lead
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

        //attachement id
        $attachment_uniqueid = $request->route('uniqueid');

        //does the lead exist
        if (!$attachment = \App\Models\Attachment::Where('attachment_uniqiueid', $attachment_uniqueid)->first()) {
            Log::error("attachment could not be found", ['process' => '[permissions][leads][download-attachment]', 'ref' => config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'attachment unique id' => $attachment_uniqueid ?? '']);
            abort(404);
        }

        //validate that its a project lead
        if ($attachment->attachmentresource_type == 'customer_lead') {
            //get the lead
            if ($lead = \App\Models\CustomerLeads::Where('customer_lead_id', $attachment->attachmentresource_id)->first()) {
                //view lead permissions
                $request->merge([
                    'type' => "client"
                ]);
                if ($this->leadpermissions->check('view', $lead->customer_lead_id)) {
                    return $next($request);
                }
            }
        } elseif ($attachment->attachmentresource_type == 'lead') {
            if ($lead = \App\Models\Lead::Where('lead_id', $attachment->attachmentresource_id)->first()) {
                //view lead permissions
                $request->merge([
                    'type' => "lead"
                ]);
                if ($this->leadpermissions->check('view', $lead->lead_id)) {
                    return $next($request);
                }
            }
        }

        //no items were passed with this request
        Log::error("permission denied", ['process' => '[permissions][leads][download-attachment]', 'ref' => config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'attachment unique id' => $attachment_uniqueid ?? '']);
        abort(403);
    }
}
