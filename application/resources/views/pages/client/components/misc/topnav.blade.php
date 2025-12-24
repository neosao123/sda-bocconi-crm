                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <!--timeline-->
                    <li class="nav-item">
                        <a class="nav-link  tabs-menu-item {{ $page['tabmenu_timeline'] ?? '' }}"
                            href="{{ url('clients') }}/{{ $client->client_id }}"
                            role="tab">{{ cleanLang(__('lang.timeline')) }}</a>
                    </li>
                    <!--details-->
                    <li class="nav-item">
                        <a class="nav-link tabs-menu-item   js-dynamic-url js-ajax-ux-request" data-toggle="tab"
                            id="tabs-menu-details" data-loading-class="loading-tabs"
                            data-loading-target="embed-content-container"
                            data-dynamic-url="{{ _url('/clients') }}/{{ $client->client_id }}/details"
                            data-url="{{ _url('/clients') }}/{{ $client->client_id }}/client-details"
                            href="#clients_ajaxtab" role="tab">{{ cleanLang(__('lang.details')) }}</a>
                    </li>
                    <!--contacts-->
                    <li class="nav-item">
                        <a class="nav-link  tabs-menu-item js-dynamic-url js-ajax-ux-request {{ $page['tabmenu_contacts'] ?? '' }}"
                            data-toggle="tab" data-loading-class="loading-tabs"
                            data-loading-target="embed-content-container" id="tabs-menu-contacts"
                            data-dynamic-url="{{ url('clients') }}/{{ $client->client_id }}/contacts"
                            data-url="{{ url('/contacts') }}?contactresource_type=client&contactresource_id={{ $client->client_id }}&source=ext&page=1"
                            href="#clients_ajaxtab" role="tab">{{ cleanLang(__('lang.users')) }}</a>
                    </li>
                    <!--projects-->
                    <li class="nav-item">
                        <a class="nav-link tabs-menu-item js-dynamic-url js-ajax-ux-request {{ $page['tabmenu_projects'] ?? '' }}"
                            data-toggle="tab" data-loading-class="loading-tabs" id="tabs-menu-projects"
                            data-loading-target="embed-content-container"
                            data-dynamic-url="{{ _url('clients/'.$client->client_id.'/projects') }}"
                            data-url="{{ url('/projects') }}?projectresource_type=client&projectresource_id={{ $client->client_id }}&source=ext&page=1"
                            href="#clients_ajaxtab" role="tab">{{ cleanLang(__('lang.projects')) }}</a>
                    </li>

                    <!--billing-->
                    <li class="nav-item dropdown {{ $page['tabmenu_financial'] ?? '' }}">
                        <a class="nav-link dropdown-toggle tabs-menu-item tabs-menu-item" data-toggle="dropdown"
                            id="tabs-menu-billing" href="javascript:void(0)" role="button" aria-haspopup="true"
                            id="tabs-menu-billing" aria-expanded="false">
                            <span class="hidden-xs-down">{{ cleanLang(__('lang.financial')) }}</span>
                        </a>
                        <div class="dropdown-menu" x-placement="bottom-start" id="fx-client-misc-topnave-billing">
                            <!--[timesheets]-->
                            <a class="dropdown-item js-dynamic-url  js-ajax-ux-request {{ $page['tabmenu_timesheets'] ?? '' }}"
                                data-toggle="tab" data-loading-class="loading-tabs"
                                data-loading-target="embed-content-container"
                                data-dynamic-url="{{ url('/clients') }}/{{ $client->client_id }}/timesheets"
                                data-url="{{ url('/timesheets') }}?source=ext&page=1&timesheetresource_id={{ $client->client_id }}&timesheetresource_type=client"
                                href="#projects_ajaxtab" role="tab">{{ cleanLang(__('lang.timesheets')) }}</a>
                        </div>
                    </li>

                    <!--notes-->
                    <li class="nav-item">
                        <a class="nav-link  tabs-menu-item js-dynamic-url js-ajax-ux-request {{ $page['tabmenu_notes'] ?? '' }}"
                            id="tabs-menu-notes" data-toggle="tab" data-loading-class="loading-tabs"
                            data-loading-target="embed-content-container"
                            data-dynamic-url="{{ url('clients') }}/{{ $client->client_id }}/notes"
                            data-url="{{ url('/notes') }}?source=ext&page=1&noteresource_type=client&noteresource_id={{ $client->client_id }}"
                            href="#clients_ajaxtab" role="tab">{{ cleanLang(__('lang.notes')) }}</a>
                    </li>

                </ul>