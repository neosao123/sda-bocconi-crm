<ul class="nav nav-tabs" role="tablist">

  <!--home-->
  <li class="nav-item"> <a class="nav-link active ajax-request" data-toggle="tab" href="javascript:void(0);" role="tab"
      data-url="{{ url('leads/content/' . getLeadId($lead)['leadId'] . '/show-main?show=tab&type=' . getLeadId($lead)['type']) }}" data-loading-class="loading-before-centre"
      data-loading-target="card-leads-left-panel"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">@lang('lang.lead')</span></a> </li>


  <!--organisation-->
  <li class="nav-item"> <a class="nav-link ajax-request" data-toggle="tab" href="javascript:void(0);" role="tab"
      data-url="{{ url('leads/content/' . getLeadId($lead)['leadId'] . '/show-organisation?type=' . getLeadId($lead)['type']) }}" data-loading-class="loading-before-centre"
      data-loading-target="card-leads-left-panel"><span class="hidden-sm-up"><i class="ti-id-badge"></i></span><span class="hidden-xs-down">@lang('lang.organisation_details')</span></a> </li>

  <!--customfields-->
  <li class="nav-item"> <a class="nav-link ajax-request" data-toggle="tab" href="javascript:void(0);" role="tab"
      data-url="{{ url('leads/content/' . getLeadId($lead)['leadId'] . '/show-customfields?type=' . getLeadId($lead)['type']) }}" data-loading-class="loading-before-centre"
      data-loading-target="card-leads-left-panel"><span class="hidden-sm-up"><i class="ti-menu"></i></span><span class="hidden-xs-down">@lang('lang.information')</span></a>
  </li>


  <!--my notes-->
  <li class="nav-item"> <a class="nav-link ajax-request" data-toggle="tab" href="javascript:void(0);" role="tab"
      data-url="{{ url('leads/content/' . getLeadId($lead)['leadId'] . '/show-mynotes?type=' . getLeadId($lead)['type']) }}" data-loading-class="loading-before-centre"
      data-loading-target="card-leads-left-panel"><span class="hidden-sm-up"><i class="ti-notepad"></i></span><span class="hidden-xs-down">@lang('lang.my_notes')</span></a>
  </li>

  <!--log [FUTURE]-->
  <li class="nav-item hidden"> <a class="nav-link ajax-request" data-toggle="tab" href="javascript:void(0);" role="tab"
      data-url="{{ url('leads/content/' . getLeadId($lead)['leadId'] . '/show-logs') }}" data-loading-class="loading-before-centre" data-loading-target="card-leads-left-panel"><span
        class="hidden-sm-up"><i class="ti-comment-alt"></i></span><span class="hidden-xs-down">@lang('lang.log')</span></a> </li>
</ul>
