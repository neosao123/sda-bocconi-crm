<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [store] process for the sections
 * controller
 * @package
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Sections;

use Illuminate\Contracts\Support\Responsable;

class StoreResponse implements Responsable
{

  private $payload;

  public function __construct($payload = array())
  {
    $this->payload = $payload;
  }


  /**
   * render the view for categories
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

    //prepend content on top of list
    $html = view('pages/sections/components/table/ajax', compact('sections'))->render();
    $jsondata['dom_html'][] = array(
      'selector' => '#sections-td-container',
      'action' => 'prepend',
      'value' => $html
    );

    //close modal
    $jsondata['dom_visibility'][] = array('selector' => '#commonModal', 'action' => 'close-modal');

    //notice
    $jsondata['notification'] = array('type' => 'success', 'value' => __('lang.request_has_been_completed'));

    //response
    return response()->json($jsondata);
  }
}
