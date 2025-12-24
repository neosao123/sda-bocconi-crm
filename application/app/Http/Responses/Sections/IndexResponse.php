<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [index] process for the sections
 * controller
 * @package
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Sections;

use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{

  private $payload;

  public function __construct($payload = array())
  {
    $this->payload = $payload;
  }

  /**
   * render the view for sections
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

    //was this call made from an embedded page/ajax or directly on temp page
    if (request('source') == 'ext' || request('action') == 'search' || request()->ajax()) {

      //template and dom - for additional ajax loading
      switch (request('action')) {

          //typically from the loadmore button
        case 'load':
          $template = 'pages/sections/components/table/ajax';
          $dom_container = '#sections-td-container';
          $dom_action = 'append';
          break;

          //from the sorting links
        case 'sort':
          $template = 'pages/sections/components/table/ajax';
          $dom_container = '#sections-td-container';
          $dom_action = 'replace';
          break;

          //from search box or filter panel
        case 'search':
          $template = 'pages/sections/components/table/wrapper';
          $dom_container = '#sections-table-wrapper';
          $dom_action = 'replace';
          break;

          //template and dom - for ajax initial loading
        default:
          $template = 'pages/sections/wrapper';
          $dom_container = '#embed-content-container';
          $dom_action = 'replace';
          break;
      }

      //load more button - change the page number and determine buttons visibility
      if ($sections->currentPage() < $sections->lastPage()) {
        $url = loadMoreButtonUrl($sections->currentPage() + 1, request('source'));
        $jsondata['dom_attributes'][] = array(
          'selector' => '#load-more-button',
          'attr' => 'data-url',
          'value' => $url
        );
        //load more - visible
        $jsondata['dom_visibility'][] = array('selector' => '.loadmore-button-container', 'action' => 'show');
        //load more: (intial load - sanity)
        $page['visibility_show_load_more'] = true;
        $page['url'] = $url;
      } else {
        $jsondata['dom_visibility'][] = array('selector' => '.loadmore-button-container', 'action' => 'hide');
      }

      //flip sorting url for this particular link - only is we clicked sort menu links
      if (request('action') == 'sort') {
        $sort_url = flipSortingUrl(request()->fullUrl(), request('sortorder'));
        $element_id = '#sort_' . request('orderby');
        $jsondata['dom_attributes'][] = array(
          'selector' => $element_id,
          'attr' => 'data-url',
          'value' => $sort_url
        );
      }

      //render the view and save to json
      $html = view($template, compact('page', 'sections'))->render();
      $jsondata['dom_html'][] = array(
        'selector' => $dom_container,
        'action' => $dom_action,
        'value' => $html
      );

      //move the actions buttons
      if (request('source') == 'ext' && request('action') == '') {
        $jsondata['dom_move_element'][] = array(
          'element' => '#list-page-actions',
          'newparent' => '.parent-page-actions',
          'method' => 'replace',
          'visibility' => 'show'
        );
        $jsondata['dom_visibility'][] = [
          'selector' => '#list-page-actions-container',
          'action' => 'show',
        ];
      }

      //update crumbs
      $html = view('misc/heading-crumbs', compact('page'))->render();
      $jsondata['dom_html'][] = array(
        'selector' => '#breadcrumbs',
        'action' => 'replace-with',
        'value' => $html
      );

      // POSTRUN FUNCTIONS------
      $jsondata['postrun_functions'][] = [
        'value' => 'NXBootSections',
      ];

      //ajax response
      return response()->json($jsondata);
    } else {
        //standard view
        $page['url'] = loadMoreButtonUrl($sections->currentPage() + 1, request('source'));
        $page['loading_target'] = 'sections-td-container';
        $page['visibility_show_load_more'] = ($sections->currentPage() < $sections->lastPage()) ? true : false;
        return view('pages/sections/wrapper', compact('page', 'sections' ))->render();
    }
  }
}
