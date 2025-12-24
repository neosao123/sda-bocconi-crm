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
                <?php if(auth()->user()->role->role_homepage == 'dashboard'): ?>
                <li data-modular-id="main_menu_team_home" class="sidenav-menu-item <?php echo e($page['mainmenu_home'] ?? ''); ?> menu-tooltip menu-with-tooltip" title="<?php echo e(cleanLang(__('lang.home'))); ?>">
                    <a class="waves-effect waves-dark" href="/home" aria-expanded="false" target="_self">
                        <i class="bi bi-speedometer2"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.dashboard'))); ?>

                        </span>
                    </a>
                </li>
                <!--home-->
                <?php endif; ?>

                <!--leads[done]-->
                <?php if(config('visibility.modules.leads')): ?>
                <li data-modular-id="main_menu_team_leads" class="sidenav-menu-item <?php echo e($page['mainmenu_leads'] ?? ''); ?> menu-tooltip menu-with-tooltip" title="<?php echo e(cleanLang(__('lang.leads'))); ?>">
                    <a class="waves-effect waves-dark" href="/leads" aria-expanded="false" target="_self">
                        <i class="bi bi-telephone-plus"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.leads'))); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!--leads-->


                <!--users[done]-->
                <?php if(runtimeGroupMenuVibility([config('visibility.modules.clients'), config('visibility.modules.users')])): ?>
                <li data-modular-id="main_menu_team_clients" class="sidenav-menu-item <?php echo e($page['mainmenu_customers'] ?? ''); ?>">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-people"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.customers'))); ?>

                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if(config('visibility.modules.clients')): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_customers'] ?? ''); ?>" id="submenu_clients">
                            <a href="/clients" class="<?php echo e($page['submenu_customers'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.clients'))); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if(config('visibility.modules.users')): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_contacts'] ?? ''); ?>" id="submenu_contacts">
                            <a href="/users" class="<?php echo e($page['submenu_contacts'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.client_users'))); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <!--customers-->

                <!--projects[done]-->
                <?php if(config('visibility.modules.projects')): ?>
                <li data-modular-id="main_menu_team_projects" class="sidenav-menu-item <?php echo e($page['mainmenu_projects'] ?? ''); ?>">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-folder-symlink"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.projects'))); ?>

                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if(config('system.settings_projects_categories_main_menu') == 'yes'): ?>
                        <?php $__currentLoopData = config('projects_categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="sidenav-submenu" id="submenu_projects">
                            <a href="<?php echo e(_url('/projects?filter_category=' . $category->category_id)); ?>"
                                class="<?php echo e($page['submenu_projects_category_' . $category->category_id] ?? ''); ?>"><?php echo e($category->category_name); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_projects'] ?? ''); ?>" id="submenu_projects">
                            <a href="<?php echo e(_url('/projects')); ?>" class="<?php echo e($page['submenu_projects'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.projects'))); ?></a>
                        </li>
                        <?php endif; ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_templates'] ?? ''); ?>" id="submenu_project_templates">
                            <a href="<?php echo e(_url('/templates/projects')); ?>" class="<?php echo e($page['submenu_templates'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.templates'))); ?></a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <!--projects-->

                <!--proposals [multiple]-->
                <?php if(config('visibility.modules.proposals') && auth()->user()->role->role_templates_proposals > 0): ?>
                <!--multipl menu-->
                <li data-modular-id="main_menu_team_proposals" class="sidenav-menu-item <?php echo e($page['mainmenu_proposals'] ?? ''); ?>">
                    <!--multiple menu-->
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.proposals'))); ?>

                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="sidenav-submenu <?php echo e($page['submenu_proposals'] ?? ''); ?>" id="submenu_proposals">
                            <a href="<?php echo e(_url('/proposals')); ?>" class="<?php echo e($page['submenu_proposals'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.proposals'))); ?></a>
                        </li>
                        <li class="sidenav-submenu <?php echo e($page['submenu_proposal_templates'] ?? ''); ?>" id="submenu_proposal_templates">
                            <a href="<?php echo e(_url('/templates/proposals')); ?>" class="<?php echo e($page['submenu_templates'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.templates'))); ?></a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <!--proposals-->

                <!--proposals [single]-->
                <?php if(config('visibility.modules.proposals') && auth()->user()->role->role_templates_proposals == 0): ?>
                <li data-modular-id="main_menu_team_proposals" class="sidenav-menu-item <?php echo e($page['mainmenu_proposals'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.proposals'))); ?>">
                    <a class="waves-effect waves-dark p-r-20" href="/proposals" aria-expanded="false" target="_self">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.proposals'))); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>


                <!--billing-->

                <!--tasks[done]-->
                <?php if(config('visibility.modules.tasks')): ?>
                <li data-modular-id="main_menu_team_tasks" class="sidenav-menu-item <?php echo e($page['mainmenu_tasks'] ?? ''); ?> menu-tooltip menu-with-tooltip" title="<?php echo e(cleanLang(__('lang.tasks'))); ?>">
                    <a class="waves-effect waves-dark" href="/tasks" aria-expanded="false" target="_self">
                        <i class="bi bi-list-task"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.tasks'))); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!--tasks-->


                <!--contracts [multiple]-->
                <?php if(config('visibility.modules.contracts') && auth()->user()->role->role_templates_contracts > 0): ?>
                <!--multipl menu-->
                <li data-modular-id="main_menu_team_contracts" class="sidenav-menu-item <?php echo e($page['mainmenu_contracts'] ?? ''); ?>">
                    <!--multiple menu-->
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-file-earmark-ruled"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.contracts'))); ?>

                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="sidenav-submenu <?php echo e($page['submenu_contracts'] ?? ''); ?>" id="submenu_contracts">
                            <a href="<?php echo e(_url('/contracts')); ?>" class="<?php echo e($page['submenu_contracts'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.contracts'))); ?></a>
                        </li>
                        <li class="sidenav-submenu <?php echo e($page['submenu_contract_templates'] ?? ''); ?>" id="submenu_contract_templates">
                            <a href="<?php echo e(_url('/templates/contracts')); ?>" class="<?php echo e($page['submenu_contract_templates'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.templates'))); ?></a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <!--contracts-->

                <!--contracts [single]-->
                <?php if(config('visibility.modules.contracts') && auth()->user()->role->role_templates_contracts == 0): ?>
                <li data-modular-id="main_menu_team_contracts" class="sidenav-menu-item <?php echo e($page['mainmenu_contracts'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.contracts'))); ?>">
                    <a class="waves-effect waves-dark p-r-20" href="/contracts" aria-expanded="false" target="_self">
                        <i class="bi bi-file-earmark-ruled"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.contracts'))); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>

                <!--[MODULES] - dynamic menu-->
                <?php echo config('module_menus.main_menu_team'); ?>


                <!--spaces-->
                <?php if(config('visibility.modules.spaces')): ?>
                <li data-modular-id="main_menu_team_spaces hidden" class="sidenav-menu-item <?php echo e($page['mainmenu_spaces'] ?? ''); ?>">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">

                        <span class="hide-menu"><?php echo app('translator')->get('lang.spaces'); ?>
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if(config('system.settings2_spaces_user_space_status') == 'enabled'): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_spaces_my'] ?? ''); ?>" id="submenu_spaces_my">
                            <a href="<?php echo e(_url('/spaces/' . auth()->user()->space_uniqueid)); ?>" class="<?php echo e($page['submenu_spaces_my'] ?? ''); ?>">
                                <?php echo e(config('system.settings2_spaces_user_space_menu_name')); ?>

                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(config('system.settings2_spaces_team_space_status') == 'enabled'): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_spaces_team'] ?? ''); ?>" id="submenu_spaces_team">
                            <a href="<?php echo e(_url('/spaces/' . config('system.settings2_spaces_team_space_id'))); ?>" class="<?php echo e($page['submenu_spaces_team'] ?? ''); ?>">
                                <?php echo e(config('system.settings2_spaces_team_space_menu_name')); ?>

                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <!--spaces-->



                <!--team-->
                <?php if(auth()->user()->is_team): ?>
                <li data-modular-id="main_menu_team_team" class="sidenav-menu-item <?php echo e($page['mainmenu_team'] ?? ''); ?>">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-person-fill-gear"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.team'))); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if(config('visibility.modules.team')): ?>
                        <li class="sidenav-submenu mainmenu_team <?php echo e($page['submenu_team'] ?? ''); ?>" id="submenu_team">
                            <a href="/team" class="<?php echo e($page['submenu_team'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.team_members'))); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if(config('visibility.modules.timesheets')): ?>
                        <li class="sidenav-submenu mainmenu_timesheets <?php echo e($page['submenu_timesheets'] ?? ''); ?>" id="submenu_timesheets">
                            <a href="/timesheets" class="<?php echo e($page['submenu_timesheets'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.time_sheets'))); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!--reports-->
                <?php if(config('visibility.modules.reports')): ?>
                <li data-modular-id="main_menu_reports" class="sidenav-menu-item <?php echo e($page['mainmenu_reports'] ?? ''); ?> menu-tooltip menu-with-tooltip" title="<?php echo e(cleanLang(__('lang.reports'))); ?>">
                    <a class="waves-effect waves-dark p-r-20" href="/reports" aria-expanded="false" target="_self">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('lang.reports'); ?>
                        </span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- custom menus -->
                

                <?php if(config('visibility.modules.calendar')): ?>
                <li data-modular-id="main_menu_calendar" class="sidenav-menu-item <?php echo e($page['mainmenu_calendar'] ?? ''); ?> menu-tooltip menu-with-tooltip" title="<?php echo e(cleanLang(__('lang.calendar'))); ?>">
                    <a class="waves-effect waves-dark p-r-20" href="<?php echo e(url('/calendar')); ?>" aria-expanded="false" target="_self">
                        <i class="bi bi-calendar3"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('lang.calendar'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(auth()->user()->is_admin): ?>
                <li data-modular-id="main_menu_settings" class="sidenav-menu-item <?php echo e($page['mainmenu_settings'] ?? ''); ?> menu-tooltip menu-with-tooltip" title="<?php echo e(cleanLang(__('lang.settings'))); ?>">
                    <a class="waves-effect waves-dark p-r-20" href="<?php echo e(url('/settings')); ?>" aria-expanded="false" target="_self">
                        <i class="bi bi-gear-wide-connected"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('lang.settings'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/nav/leftmenu-team.blade.php ENDPATH**/ ?>