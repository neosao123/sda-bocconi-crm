<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<aside class="left-sidebar" id="js-trigger-nav-team">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" id="main-scroll-sidebar" style="background: #003e68">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" id="main-sidenav">
            <ul id="sidebarnav" data-modular-id="main_menu_team">

                <!--home-->
                @if (auth()->user()->role->role_homepage == 'dashboard')
                <li data-modular-id="main_menu_team_home" class="sidenav-menu-item {{ $page['mainmenu_home'] ?? '' }} menu-tooltip menu-with-tooltip" title="{{ cleanLang(__('lang.home')) }}">
                    <a class="waves-effect waves-dark" href="/home" aria-expanded="false" target="_self">
                        <i class="bi bi-speedometer2"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.dashboard')) }}
                        </span>
                    </a>
                </li>
                <!--home-->
                @endif

                <!--leads[done]-->
                @if (config('visibility.modules.leads'))
                <li data-modular-id="main_menu_team_leads" class="sidenav-menu-item {{ $page['mainmenu_leads'] ?? '' }} menu-tooltip menu-with-tooltip" title="{{ cleanLang(__('lang.leads')) }}">
                    <a class="waves-effect waves-dark" href="/leads" aria-expanded="false" target="_self">
                        <i class="bi bi-telephone-plus"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.leads')) }}
                        </span>
                    </a>
                </li>
                @endif
                <!--leads-->


                <!--users[done]-->
                @if (runtimeGroupMenuVibility([config('visibility.modules.clients'), config('visibility.modules.users')]))
                <li data-modular-id="main_menu_team_clients" class="sidenav-menu-item {{ $page['mainmenu_customers'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-people"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.customers')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if (config('visibility.modules.clients'))
                        <li class="sidenav-submenu {{ $page['submenu_customers'] ?? '' }}" id="submenu_clients">
                            <a href="/clients" class="{{ $page['submenu_customers'] ?? '' }}">{{ cleanLang(__('lang.clients')) }}</a>
                        </li>
                        @endif
                        @if (config('visibility.modules.users'))
                        <li class="sidenav-submenu {{ $page['submenu_contacts'] ?? '' }}" id="submenu_contacts">
                            <a href="/users" class="{{ $page['submenu_contacts'] ?? '' }}">{{ cleanLang(__('lang.client_users')) }}</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                <!--customers-->

                <!--projects[done]-->
                @if (config('visibility.modules.projects'))
                <li data-modular-id="main_menu_team_projects" class="sidenav-menu-item {{ $page['mainmenu_projects'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-folder-symlink"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.projects')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if (config('system.settings_projects_categories_main_menu') == 'yes')
                        @foreach (config('projects_categories') as $category)
                        <li class="sidenav-submenu" id="submenu_projects">
                            <a href="{{ _url('/projects?filter_category=' . $category->category_id) }}"
                                class="{{ $page['submenu_projects_category_' . $category->category_id] ?? '' }}">{{ $category->category_name }}</a>
                        </li>
                        @endforeach
                        @else
                        <li class="sidenav-submenu {{ $page['submenu_projects'] ?? '' }}" id="submenu_projects">
                            <a href="{{ _url('/projects') }}" class="{{ $page['submenu_projects'] ?? '' }}">{{ cleanLang(__('lang.projects')) }}</a>
                        </li>
                        @endif
                        <li class="sidenav-submenu {{ $page['submenu_templates'] ?? '' }}" id="submenu_project_templates">
                            <a href="{{ _url('/templates/projects') }}" class="{{ $page['submenu_templates'] ?? '' }}">{{ cleanLang(__('lang.templates')) }}</a>
                        </li>
                    </ul>
                </li>
                @endif
                <!--projects-->

                <!--proposals [multiple]-->
                @if (config('visibility.modules.proposals') && auth()->user()->role->role_templates_proposals > 0)
                <!--multipl menu-->
                <li data-modular-id="main_menu_team_proposals" class="sidenav-menu-item {{ $page['mainmenu_proposals'] ?? '' }}">
                    <!--multiple menu-->
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.proposals')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="sidenav-submenu {{ $page['submenu_proposals'] ?? '' }}" id="submenu_proposals">
                            <a href="{{ _url('/proposals') }}" class="{{ $page['submenu_proposals'] ?? '' }}">{{ cleanLang(__('lang.proposals')) }}</a>
                        </li>
                        <li class="sidenav-submenu {{ $page['submenu_proposal_templates'] ?? '' }}" id="submenu_proposal_templates">
                            <a href="{{ _url('/templates/proposals') }}" class="{{ $page['submenu_templates'] ?? '' }}">{{ cleanLang(__('lang.templates')) }}</a>
                        </li>
                    </ul>
                </li>
                @endif
                <!--proposals-->

                <!--proposals [single]-->
                @if (config('visibility.modules.proposals') && auth()->user()->role->role_templates_proposals == 0)
                <li data-modular-id="main_menu_team_proposals" class="sidenav-menu-item {{ $page['mainmenu_proposals'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.proposals')) }}">
                    <a class="waves-effect waves-dark p-r-20" href="/proposals" aria-expanded="false" target="_self">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.proposals')) }}
                        </span>
                    </a>
                </li>
                @endif


                <!--billing-->

                <!--tasks[done]-->
                @if (config('visibility.modules.tasks'))
                <li data-modular-id="main_menu_team_tasks" class="sidenav-menu-item {{ $page['mainmenu_tasks'] ?? '' }} menu-tooltip menu-with-tooltip" title="{{ cleanLang(__('lang.tasks')) }}">
                    <a class="waves-effect waves-dark" href="/tasks" aria-expanded="false" target="_self">
                        <i class="bi bi-list-task"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.tasks')) }}
                        </span>
                    </a>
                </li>
                @endif
                <!--tasks-->


                <!--contracts [multiple]-->
                @if (config('visibility.modules.contracts') && auth()->user()->role->role_templates_contracts > 0)
                <!--multipl menu-->
                <li data-modular-id="main_menu_team_contracts" class="sidenav-menu-item {{ $page['mainmenu_contracts'] ?? '' }}">
                    <!--multiple menu-->
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-file-earmark-ruled"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.contracts')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="sidenav-submenu {{ $page['submenu_contracts'] ?? '' }}" id="submenu_contracts">
                            <a href="{{ _url('/contracts') }}" class="{{ $page['submenu_contracts'] ?? '' }}">{{ cleanLang(__('lang.contracts')) }}</a>
                        </li>
                        <li class="sidenav-submenu {{ $page['submenu_contract_templates'] ?? '' }}" id="submenu_contract_templates">
                            <a href="{{ _url('/templates/contracts') }}" class="{{ $page['submenu_contract_templates'] ?? '' }}">{{ cleanLang(__('lang.templates')) }}</a>
                        </li>
                    </ul>
                </li>
                @endif
                <!--contracts-->

                <!--contracts [single]-->
                @if (config('visibility.modules.contracts') && auth()->user()->role->role_templates_contracts == 0)
                <li data-modular-id="main_menu_team_contracts" class="sidenav-menu-item {{ $page['mainmenu_contracts'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.contracts')) }}">
                    <a class="waves-effect waves-dark p-r-20" href="/contracts" aria-expanded="false" target="_self">
                        <i class="bi bi-file-earmark-ruled"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.contracts')) }}
                        </span>
                    </a>
                </li>
                @endif

                <!--[MODULES] - dynamic menu-->
                {!! config('module_menus.main_menu_team') !!}

                <!--spaces-->
                @if (config('visibility.modules.spaces'))
                <li data-modular-id="main_menu_team_spaces hidden" class="sidenav-menu-item {{ $page['mainmenu_spaces'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">

                        <span class="hide-menu">@lang('lang.spaces')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if (config('system.settings2_spaces_user_space_status') == 'enabled')
                        <li class="sidenav-submenu {{ $page['submenu_spaces_my'] ?? '' }}" id="submenu_spaces_my">
                            <a href="{{ _url('/spaces/' . auth()->user()->space_uniqueid) }}" class="{{ $page['submenu_spaces_my'] ?? '' }}">
                                {{ config('system.settings2_spaces_user_space_menu_name') }}
                            </a>
                        </li>
                        @endif
                        @if (config('system.settings2_spaces_team_space_status') == 'enabled')
                        <li class="sidenav-submenu {{ $page['submenu_spaces_team'] ?? '' }}" id="submenu_spaces_team">
                            <a href="{{ _url('/spaces/' . config('system.settings2_spaces_team_space_id')) }}" class="{{ $page['submenu_spaces_team'] ?? '' }}">
                                {{ config('system.settings2_spaces_team_space_menu_name') }}
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                <!--spaces-->



                <!--team-->
                @if (auth()->user()->is_team)
                <li data-modular-id="main_menu_team_team" class="sidenav-menu-item {{ $page['mainmenu_team'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-person-fill-gear"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.team')) }}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if (config('visibility.modules.team'))
                        <li class="sidenav-submenu mainmenu_team {{ $page['submenu_team'] ?? '' }}" id="submenu_team">
                            <a href="/team" class="{{ $page['submenu_team'] ?? '' }}">{{ cleanLang(__('lang.team_members')) }}</a>
                        </li>
                        @endif
                        @if (config('visibility.modules.timesheets'))
                        <li class="sidenav-submenu mainmenu_timesheets {{ $page['submenu_timesheets'] ?? '' }}" id="submenu_timesheets">
                            <a href="/timesheets" class="{{ $page['submenu_timesheets'] ?? '' }}">{{ cleanLang(__('lang.time_sheets')) }}</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                <!--reports-->
                @if (config('visibility.modules.reports'))
                <li data-modular-id="main_menu_reports" class="sidenav-menu-item {{ $page['mainmenu_reports'] ?? '' }} menu-tooltip menu-with-tooltip" title="{{ cleanLang(__('lang.reports')) }}">
                    <a class="waves-effect waves-dark p-r-20" href="/reports" aria-expanded="false" target="_self">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span class="hide-menu">@lang('lang.reports')
                        </span>
                    </a>
                </li>
                @endif

                <!-- custom menus -->
                {{--
                    @if (config('visibility.modules.hsnsacs'))
                    <li data-modular-id="main_menu_hsnsacs"
                        class="sidenav-menu-item {{ $page['mainmenu_hsnsacs'] ?? '' }} menu-tooltip menu-with-tooltip"
                title="{{ cleanLang(__('lang.hsnsacs')) }}">
                <a class="waves-effect waves-dark p-r-20" href="/hsnsacs" aria-expanded="false" target="_self">
                    <i class="bi bi-tag"></i>
                    <span class="hide-menu">@lang('lang.hsn_sac_codes')
                    </span>
                </a>
                </li>
                @endif
                --}}

                @if (config('visibility.modules.calendar'))
                <li data-modular-id="main_menu_calendar" class="sidenav-menu-item {{ $page['mainmenu_calendar'] ?? '' }} menu-tooltip menu-with-tooltip" title="{{ cleanLang(__('lang.calendar')) }}">
                    <a class="waves-effect waves-dark p-r-20" href="{{ url('/calendar') }}" aria-expanded="false" target="_self">
                        <i class="bi bi-calendar3"></i>
                        <span class="hide-menu">@lang('lang.calendar')</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->is_admin)
                <li data-modular-id="main_menu_settings" class="sidenav-menu-item {{ $page['mainmenu_settings'] ?? '' }} menu-tooltip menu-with-tooltip" title="{{ cleanLang(__('lang.settings')) }}">
                    <a class="waves-effect waves-dark p-r-20" href="{{ url('/settings') }}" aria-expanded="false" target="_self">
                        <i class="bi bi-gear-wide-connected"></i>
                        <span class="hide-menu">@lang('lang.settings')</span>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>