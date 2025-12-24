<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12  col-lg-7 p-b-9 align-self-center text-right {{ $page['list_page_actions_size'] ?? '' }} {{ $page['list_page_container_class'] ?? '' }}"
    id="list-page-actions-container">
    <div id="list-page-actions">
        <!--SEARCH BOX-->
        @if( config('visibility.list_page_actions_search'))
        <div class="header-search" id="header-search">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control search-records list-actions-search"
                data-url="{{ $page['dynamic_search_url'] ?? '' }}" data-type="form" data-ajax-type="post"
                data-form-id="header-search" id="search_query" name="search_query"
                placeholder="{{ cleanLang(__('lang.search')) }}">
        </div>
        @endif

        <!--ARCHIVED PROJECTS-->
        @if(config('visibility.archived_projects_toggle_button'))
        <button type="button" data-toggle="tooltip" title="{{ cleanLang(__('lang.show_archive_projects')) }}"
            id="pref_filter_show_archived_projects"
            class="list-actions-button btn btn-page-actions archive-border waves-effect waves-dark js-ajax-ux-request {{ runtimeActive(auth()->user()->pref_filter_show_archived_projects) }}"
            data-url="{{ url('/projects/search?action=search&toggle=pref_filter_show_archived_projects&filter_category='.request('filter_category')) }}" >
           <i class="bi bi-archive archive"></i>

        </button>
        @endif

        <!--SHOW OWN PROJECTS-->
        @if(config('visibility.own_projects_toggle_button'))
        <button type="button" data-toggle="tooltip" title="{{ cleanLang(__('lang.my_projects')) }}"
            id="pref_filter_own_projects"
            class="list-actions-button btn btn-page-actions sl-icon-user-border waves-effect waves-dark js-ajax-ux-request {{ runtimeActive(auth()->user()->pref_filter_own_projects) }}"
            data-url="{{ url('/projects/search?action=search&toggle=pref_filter_own_projects&filter_category='.request('filter_category')) }}" >
            <ion-icon name="person-outline" class="user"></ion-icon>
        </button>
        @endif


        <!--layout toggle-->
        <span class="dropdown">
            <button type="button" data-toggle="dropdown" title="@lang('lang.view_layout')" aria-haspopup="true"
                aria-expanded="false"
                class="data-toggle-tooltip  list-actions-button btn btn-page-actions sl-icon-grid-border waves-effect waves-dark" >
                <ion-icon name="grid-outline"class="grid" ></ion-icon>
            </button>
            <div class="dropdown-menu" aria-labelledby="listTableAction">
                <!--list view-->
                <a class="dropdown-item display-block ajax-request" href="javascript:void(0)"
                    data-url="{{ url('/projects/search?action=search&toggle_project_view=list&filter_category='.request('filter_category')) }}"
                    id="invoice-action-stop-recurring"> <i class="ti-view-list-alt display-inline-block m-t-3"></i>
                    <span class="display-inline-block vm m-t--3 p-l-3">@lang('lang.list_view')</span>
                </a>
                <!--card view-->
                <a class="dropdown-item display-block ajax-request" href="javascript:void(0)"
                    data-url="{{ url('/projects/search?action=search&toggle_project_view=card&filter_category='.request('filter_category')) }}"
                    id="invoice-action-stop-recurring"> <i class="ti-layout-cta-left display-inline-block m-t-3"></i>
                    <span class="display-inline-block vm m-t--3 p-l-3">@lang('lang.card_view')</span>
                </a>
            </div>
        </span>

        <!--TOGGLE STATS-->
        @if( config('visibility.stats_toggle_button'))
        <button type="button" data-toggle="tooltip" title="{{ cleanLang(__('lang.quick_stats')) }}"
            class="list-actions-button btn btn-page-actions trend-up-border waves-effect waves-dark js-toggle-stats-widget update-user-ux-preferences"
            data-type="statspanel" data-progress-bar="hidden"
            data-url-temp="{{ url('/') }}/{{ auth()->user()->team_or_contact }}/updatepreferences" data-url=""
            data-target="list-pages-stats-widget" >
          <i class="bi bi-pie-chart-fill trend-up"></i>

        </button>
        @endif


        <!--EXPORT-->
        @if(config('visibility.list_page_actions_exporting'))
        <button type="button" data-toggle="tooltip" title="@lang('lang.export_projects')"
            class="list-actions-button btn btn-page-actions export-border  waves-effect waves-dark js-toggle-side-panel"
            data-target="sidepanel-export-projects">
            <i class="ti-export" ></i>
        </button>
        @endif

        <!--FILTERING-->
        @if(config('visibility.list_page_actions_filter_button'))
        <button type="button" data-toggle="tooltip" title="{{ cleanLang(__('lang.filter')) }}"
            class="list-actions-button btn btn-page-actions filter-border waves-effect waves-dark js-toggle-side-panel"
            data-target="{{ $page['sidepanel_id'] ?? '' }}" >
            <i class="bi bi-funnel filter"></i>

        </button>
        @endif

        <!--ADD NEW ITEM-->
        @if(config('visibility.list_page_actions_add_button'))
        <button type="button"
            class="btn-create edit-add-modal-button js-ajax-ux-request reset-target-modal-form {{ $page['add_button_classes'] ?? '' }}"
            data-toggle="modal" data-target="#commonModal" data-url="{{ $page['add_modal_create_url'] ?? '' }}"
            data-loading-target="commonModalBody" data-modal-title="{{ $page['add_modal_title'] ?? '' }}"
            data-action-url="{{ $page['add_modal_action_url'] ?? '' }}"
            data-action-method="{{ $page['add_modal_action_method'] ?? '' }}"
            data-action-ajax-class="{{ $page['add_modal_action_ajax_class'] ?? '' }}"
            data-modal-size="{{ $page['add_modal_size'] ?? '' }}"
            data-action-ajax-loading-target="{{ $page['add_modal_action_ajax_loading_target'] ?? '' }}"
            data-save-button-class="{{ $page['add_modal_save_button_class'] ?? '' }}" data-project-progress="0">
            Create
        </button>
        @endif

        <!--add new button (link)-->
        @if( config('visibility.list_page_actions_add_button_link'))
        <a id="fx-page-actions-add-button" type="button" class="btn-create edit-add-modal-button"
            href="{{ $page['add_button_link_url'] ?? '' }}">
      Add
        </a>
        @endif
    </div>
</div>