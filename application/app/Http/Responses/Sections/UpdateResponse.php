<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [update] process for the Sections
 * controller
 * @package
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Sections;

use Illuminate\Contracts\Support\Responsable;

class UpdateResponse implements Responsable
{

  private $payload;

  public function __construct($payload = array())
  {
    $this->payload = $payload;
  }

  /**
   * render the view for Sections
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

    //replace the row of this record
    $html = view('pages/sections/components/table/ajax', compact('sections'))->render();
    $jsondata['dom_html'][] = array(
      'selector' => "#sections-td-container",
      'action' => 'replace',
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
