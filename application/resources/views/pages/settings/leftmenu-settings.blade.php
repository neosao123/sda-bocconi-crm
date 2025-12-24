<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar settings-menu">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" id="settings-scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" id="settings-sidebar-nav">
            <ul id="sidebarnav">


                <!--main-->
                <li class="sidenav-menu-item {{ $page['settingsmenu_main'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-main">
                        <span class="hide-menu">{{ cleanLang(__('lang.main_settings')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/general" id="settings-menu-main-general"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/company" id="settings-menu-main-company"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.company_details')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/currency" id="settings-menu-main-currency"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.currency')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/logos" id="settings-menu-main-logo"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.company_logo')) }}</a>
                        </li>

                    </ul>
                </li>


                <!--billing-->
                <!--[MULTITENANCY]-->
                @if (config('system.settings_type') == 'saas')
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-billing">
                        <span class="hide-menu">{{ cleanLang(__('lang.billing')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0);" data-url="/settings/account/myaccount" id="settings-menu-billing-account"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.my_account')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/account/packages" id="settings-menu-billing-packages"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.packages')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/account/payments" id="settings-menu-billing-payments"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.payments')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/account/notices" id="settings-menu-billing-notices"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.notices')) }}</a>
                        </li>
                    </ul>
                </li>
                @endif

                <!--Email-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-email">
                        <span class="hide-menu">{{ cleanLang(__('lang.email')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if (config('system.settings_type') == 'standalone')
                        <!--general-->
                        <li><a href="javascript:void(0);" data-url="/settings/email/general" id="settings-menu-email-settings"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                        <!--smtp-->
                        <li><a href="javascript:void(0);" data-url="/settings/email/smtp" id="settings-menu-email-smtp"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.smtp_settings')) }}</a>
                        </li>
                        @endif
                        @if (config('system.settings_type') == 'saas')
                        <li><a href="javascript:void(0);" data-url="/settings/account/email" id="settings-menu-email-settings"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.email_settings')) }}</a>
                        </li>
                        @endif
                        <!--templates-->
                        <li><a href="javascript:void(0);" data-url="/settings/email/templates" id="settings-menu-email-templates"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.email_templates')) }}</a>
                        </li>
                        <!--email queue-->
                        <li><a href="javascript:void(0);" data-url="/settings/email/queue" id="settings-menu-email-queue"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.email_queue')) }}</a>
                        </li>
                        <!--email log-->
                        <li><a href="javascript:void(0);" data-url="/settings/email/log" id="settings-menu-email-log"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.email_log')) }}</a>
                        </li>
                    </ul>
                </li>

                <!--clients-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-clients">
                        <span class="hide-menu">{{ cleanLang(__('lang.clients')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0);" data-url="/settings/clients" id="settings-menu-clients-general"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                        <li>
                            <a class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url" id="settings-menu-categories-client" href="javascript:void(0);"
                                data-url="/categories?filter_category_type=client&source=ext">{{ cleanLang(__('lang.categories')) }}
                            </a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/customfields/clients" id="settings-menu-clients-forms"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.custom_form_fields')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/webmail/templates?filter_type=clients" id="settings-menu-clients-email-templates"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.email_templates')) }}</a>
                        </li>
                    </ul>
                </li>


                <!--projects-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-projects">
                        <span class="hide-menu">{{ cleanLang(__('lang.projects')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/projects/general" id="settings-menu-projects-general"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                        <!--project-->
                        <li>
                            <a class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url" id="settings-menu-categories-project" href="javascript:void(0);"
                                data-url="/categories?filter_category_type=project&source=ext">{{ cleanLang(__('lang.categories')) }}
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/projects/staff" id="settings-menu-projects-staff-permissions"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.team_permissions')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/projects/client" id="settings-menu-client-permissions"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.client_permissions')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/customfields/projects" id="settings-menu-projects-forms"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.custom_form_fields')) }}</a>
                        </li>
                        <li><a class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url" id="settings-menu-projects-automation" href="javascript:void(0);"
                                data-url="/settings/projects/automation">@lang('lang.automation')
                            </a>
                    </ul>
                </li>

                <!--tasks-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-tasks">
                        <span class="hide-menu">{{ cleanLang(__('lang.tasks')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/tasks" id="settings-menu-tasks-settings"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/tasks/statuses" id="settings-menu-tasks-stages"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.statuses')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/tasks/priorities" id="settings-menu-tasks-priorities"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.priorities')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/customfields/tasks" id="settings-menu-tasks-forms"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.custom_form_fields')) }}</a>
                        </li>
                    </ul>
                </li>

                <!--leads-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-leads">
                        <span class="hide-menu">{{ cleanLang(__('lang.leads')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/leads/general" id="settings-menu-leads-settings"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                        <li><a class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url" id="settings-menu-categories-lead" href="javascript:void(0);"
                                data-url="/categories?filter_category_type=lead&source=ext">{{ cleanLang(__('lang.categories')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/leads/statuses" id="settings-menu-leads-stages"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.lead_stages')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/sources" id="settings-menu-leads-sources"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.lead_sources')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/customfields/leads" id="settings-menu-leads-forms"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.custom_form_fields')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/webforms" id="settings-menu-leads-webforms"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.web_forms')) }}</a>
                        </li>
                        <li><a href="javascript:void(0);" data-url="/settings/webmail/templates?filter_type=leads" id="settings-menu-leads-email-templates"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.email_templates')) }}</a>
                        </li>
                    </ul>
                </li>

                <!--milestone-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-milestones">
                        <span class="hide-menu">{{ cleanLang(__('lang.milestones')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/milestones/settings" id="settings-menu-milestones-settings"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/milestones/default" id="settings-menu-milestones-categories"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.default_milestones')) }}</a>
                        </li>
                    </ul>
                </li>

                <!--tags-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-tags">
                        <span class="hide-menu">{{ cleanLang(__('lang.tags')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/tags" id="settings-menu-tags-settings"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/tags?source=ext" id="settings-menu-tags-view"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.view_tags')) }}</a>
                        </li>
                    </ul>
                </li>

                <!--files-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-files">
                        <span class="hide-menu">{{ cleanLang(__('lang.files')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/files/general" id="settings-menu-files-general"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">@lang('lang.general_settings')</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/files/folders" id="settings-menu-files-folders"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">@lang('lang.folders')</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/files/defaultfolders" id="settings-menu-files-defaultfolders"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">@lang('lang.default_folders')</a>
                        </li>
                    </ul>
                </li>

                <!--roles-->
                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-roles">
                        <span class="hide-menu">{{ cleanLang(__('lang.user_roles')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0);" data-url="/settings/roles" id="settings-menu-roles-general"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.general_settings')) }}</a>
                        </li>
                    </ul>
                </li>

                <li class="sidenav-menu-item">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false" id="settings-menu-other">
                        <span class="hide-menu">{{ cleanLang(__('lang.other')) }}
                        </span>
                    </a>
                    <!--update-->
                    <ul aria-expanded="false" class="collapse" id="settings-menu-other">
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/modules" id="settings-menu-main-modules"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.modules')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/cronjobs" id="settings-menu-main-cronjobs"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.cronjob_settings')) }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="/settings/system/clearcache" id="settings-menu-main-cronjobs"
                                class="settings-menu-link js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url">{{ cleanLang(__('lang.delete_cache')) }}</a>
                        </li>
                    </ul>

                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>