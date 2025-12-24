<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [update] process for the leads
 * controller
 * @package    
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Leads;

use Illuminate\Contracts\Support\Responsable;

class UpdateTagsResponse implements Responsable
{

    private $payload;

    public function __construct($payload = array())
    {
        $this->payload = $payload;
    }

    /**
     * render the view for leads
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //full payload array
        $payload = $this->payload;

        $html = view('pages.lead.components.tags', compact('tags', 'lead', 'current_tags'))->render();
        $jsondata['dom_html'][] = [
            'selector' => '#card-tags-container',
            'action' => 'replace',
            'value' => $html,
        ];


        //update whole card (for kanban view)
        $board['leads'] = $leads;
        $id = getLeadId($leads->first())['leadId'];
        $type = getLeadId($leads->first())['type'];
        $html = view('pages/leads/components/kanban/card', compact('board'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => "#card_{$type}{$id}",
            'action' => 'replace-with',
            'value' => $html
        );

        //response
        return response()->json($jsondata);
    }
}
