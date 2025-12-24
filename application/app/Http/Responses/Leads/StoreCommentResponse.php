<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [store] process for the leads
 * controller
 * @package    
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Leads;

use Illuminate\Contracts\Support\Responsable;

class StoreCommentResponse implements Responsable
{

    private $payload;

    public function __construct($payload = array())
    {
        $this->payload = $payload;
    }

    /**
     * render the view for comments
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

        //prepend content on top of list
        $html = view('pages/lead/components/comment', compact('comments'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => '#card-comments-container',
            'action' => 'prepend',
            'value' => $html
        );

        //kanbad
        $board['leads'] = $leads;
        $id = getLeadId($leads->first())['leadId'];
        $type = getLeadId($leads->first())['type'];
        $html = view('pages/leads/components/kanban/card', compact('board'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => "#card_{$type}_{$id}",
            'action' => 'replace-with',
            'value' => $html
        );

        //response
        return response()->json($jsondata);
    }
}
