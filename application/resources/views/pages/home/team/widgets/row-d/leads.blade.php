    <!-- Column -->
    <div class="col-lg-5 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex m-b-0 no-block">
                    <h5 class="card-title m-b-0 align-self-center">{{ $type == 'leads' ? cleanLang(__('lang.leads')) : cleanLang(__('lang.customer_leads'))}}</h5>
                    <div class="ml-auto">
                        {{ cleanLang(__('lang.this_year')) }}
                    </div>
                </div>
                <div id="{{ $type == 'leads' ? "leadsWidgetTeam" : "customerLeadsWidgetTeam" }}"></div>
                <ul class="list-inline m-t-30 text-center font-12">
                    @foreach(config('home.lead_statuses') as $lead_status)
                    <li class="p-b-10"><span class="label {{ $lead_status['label'] }} label-rounded"><i class="fa fa-circle {{ $lead_status['color'] }}"></i> {{ $lead_status['title'] }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    <!--[DYNAMIC INLINE SCRIPT]  Backend Variables to Javascript Variables-->
    <script>
        // Use var instead of const to allow redeclaration
        var leadTypeForJs = "{{ $type }}";
        if (leadTypeForJs == 'customer_leads') {
            NX.team_home_c3_customer_leads_data = JSON.parse('{!! clean($payload["customer_leads_stats"]) !!}', true);
            NX.team_home_c3_customer_leads_colors = JSON.parse('{!! clean($payload["customer_leads_key_colors"]) !!}', true);
            NX.team_home_c3_customer_leads_title = "{{ $payload['customer_leads_chart_center_title'] }}";
        } else {
            NX.team_home_c3_leads_data = JSON.parse('{!! clean($payload["leads_stats"]) !!}', true);
            NX.team_home_c3_leads_colors = JSON.parse('{!! clean($payload["leads_key_colors"]) !!}', true);
            NX.team_home_c3_leads_title = "{{ $payload['leads_chart_center_title'] }}";
        }
    </script>