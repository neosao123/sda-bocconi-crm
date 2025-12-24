<div class="col-12 align-self-center hidden checkbox-actions box-shadow-minimum"
    id="projects-checkbox-actions-container">
    <!--button-->
    @if(config('visibility.action_buttons_edit'))
    <div class="x-buttons">
        @if(config('visibility.action_buttons_delete'))
        <button type="button" class="btn btn-sm btn-default waves-effect sl-icon-trash-border waves-dark confirm-action-danger"
            data-type="form" data-ajax-type="POST" data-form-id="projects-list-table"
            data-url="{{ url('/projects/delete?type=bulk') }}"
            data-confirm-title="{{ cleanLang(__('lang.delete_selected_items')) }}"
            data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}" id="checkbox-actions-delete-projects"  >
            <i class="bi bi-trash3 trash"></i>
            {{ cleanLang(__('lang.delete')) }}</button>
        @endif
        <button type="button"
            class="btn btn-sm btn-default waves-effect sl-icon-share-alt-border waves-dark actions-modal-button js-ajax-ux-request"
            data-toggle="modal" data-target="#actionsModal"
            data-modal-title="{{ cleanLang(__('lang.change_category')) }}"
            data-url="{{ urlResource('/projects/change-category') }}"
            data-action-url="{{ urlResource('/projects/change-category?type=bulk') }}" data-action-method="POST"
            data-action-type="form" data-action-form-id="main-body" data-loading-target="actionsModalBody"
            data-skip-checkboxes-reset="TRUE" id="checkbox-actions-change-category-projects" >
            <ion-icon name="share-social-outline" class="sharer"></ion-icon>
            {{ cleanLang(__('lang.change_category')) }}
        </button>

        <!--change status-->
        <button type="button"
            class="btn btn-sm btn-default waves-effect waves-dark actions-modal-button js-ajax-ux-request"
            data-toggle="modal" data-target="#actionsModal" data-modal-title="@lang('lang.change_status')"
            data-url="{{ urlResource('/projects/bulk-change-status') }}"
            data-action-url="{{ urlResource('/projects/bulk-change-status') }}" data-action-method="POST"
            data-action-type="form" data-action-form-id="main-body" data-loading-target="actionsModalBody"
            data-skip-checkboxes-reset="TRUE" id="checkbox-actions-change-category-projects">
            <i class="ti-bookmark"></i> @lang('lang.change_status')
        </button>

        @if(auth()->user()->role->role_assign_projects == 'yes')
        <!--assign users-->
        <button type="button"
            class="btn btn-sm btn-default waves-effect sl-icon-people-border waves-dark actions-modal-button js-ajax-ux-request"
            data-toggle="modal" data-target="#actionsModal" data-modal-title="@lang('lang.assign_users')"
            data-url="{{ urlResource('/projects/change-assigned') }}"
            data-action-url="{{ urlResource('/projects/change-assigned?type=bulk') }}" data-action-method="POST"
            data-action-type="form" data-action-form-id="main-body" data-loading-target="actionsModalBody"
            data-skip-checkboxes-reset="TRUE" id="checkbox-actions-change-category-projects">
            <ion-icon name="people-outline" class="people"></ion-icon> @lang('lang.assign_users')
        </button>
        @endif

    </div>
    @else
    <div class="x-notice">
        {{ cleanLang(__('lang.no_actions_available')) }}
    </div>
    @endif
</div>