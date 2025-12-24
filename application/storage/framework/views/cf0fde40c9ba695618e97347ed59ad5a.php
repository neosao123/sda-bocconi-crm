<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12  col-lg-7 p-b-9 align-self-center text-right <?php echo e($page['list_page_actions_size'] ?? ''); ?> <?php echo e($page['list_page_container_class'] ?? ''); ?>" id="list-page-actions-container">
  <div id="list-page-actions">
    <!--SEARCH BOX-->
    <div class="header-search" id="header-search">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control search-records list-actions-search" data-url="<?php echo e($page['dynamic_search_url'] ?? ''); ?>" data-type="form" data-ajax-type="post" data-form-id="header-search"
        id="search_query" name="search_query" placeholder="<?php echo e(cleanLang(__('lang.search'))); ?>">
    </div>

    <!--SHOW ARCHIVED LEADS-->
    <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.show_archive_leads'))); ?>" id="pref_filter_show_archived_leads"
      class="list-actions-button btn btn-page-actions archive-border waves-effect waves-dark js-ajax-ux-request <?php echo e(runtimeActive(auth()->user()->pref_filter_show_archived_leads)); ?>"
      data-url="<?php echo e(url('/leads/search?action=search&toggle=pref_filter_show_archived_leads')); ?>">
      <i class="bi bi-archive archive"></i>
    </button>

    <!--SHOW OWN LEADS-->
    <?php if(config('visibility.own_leads_toggle_button')): ?>
      <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.my_leads'))); ?>" id="pref_filter_own_leads"
        class="list-actions-button btn btn-page-actions person-border waves-effect waves-dark js-ajax-ux-request <?php echo e(runtimeActive(auth()->user()->pref_filter_own_leads)); ?>"
        data-url="<?php echo e(url('/leads/search?action=search&toggle=pref_filter_own_leads')); ?>">
        <i class="bi bi-person-circle person"></i>
      </button>
    <?php endif; ?>


    <!--LEADS - KANBAN VIEW & SORTING-->
    <!--leads kanban toggle-->
    <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.kanban_view'))); ?>" id="pref_view_leads_layout"
      class="list-actions-button btn btn-page-actions list-border waves-effect waves-dark js-ajax-ux-request <?php echo e(runtimeActive(auth()->user()->pref_view_leads_layout)); ?>"
      data-url="<?php echo e(urlResource('/leads/search?action=search&toggle=layout')); ?>">
      <i class="bi bi-list list"></i>
    </button>

    

    <!--IMPORTING-->
    <?php if(config('visibility.list_page_actions_importing')): ?>
      <button type="button" title="<?php echo e(cleanLang(__('lang.import_leads'))); ?>" id="leads-import-button"
        class="data-toggle-tooltip list-actions-button btn btn-page-actions import-border waves-effect waves-dark edit-add-modal-button js-ajax-ux-request reset-target-modal-form" data-toggle="modal"
        data-target="#commonModal" data-footer-visibility="hidden" data-top-padding="none" data-action-url="<?php echo e(url('import/leads')); ?>" data-action-method="POST" data-loading-target="commonModalBody"
        data-action-ajax-loading-target="commonModalBody" data-modal-title="<?php echo app('translator')->get('lang.import_leads'); ?>" data-url="<?php echo e(url('import/leads/create')); ?>">
        <i class="bi bi-cloud-arrow-down import"></i>
      </button>
    <?php endif; ?>

    <!--EXPORT-->
    <?php if(config('visibility.list_page_actions_exporting')): ?>
      <button type="button" data-toggle="tooltip" title="<?php echo app('translator')->get('lang.export_leads'); ?>" class="list-actions-button btn btn-page-actions export-border  waves-effect waves-dark js-toggle-side-panel"
        data-target="sidepanel-export-leads">
        <i class="bi bi-cloud-arrow-up export"></i>
      </button>
    <?php endif; ?>

    <!--FILTERING-->
    <?php if(config('visibility.list_page_actions_filter_button')): ?>
      <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.filter'))); ?>"
        class="list-actions-button btn btn-page-actions  filter-border waves-effect waves-dark js-toggle-side-panel" data-target="<?php echo e($page['sidepanel_id'] ?? ''); ?> ">
        <i class="bi bi-funnel filter"></i>

      </button>
    <?php endif; ?>




    <!--ADD NEW ITEM-->
    <?php if(config('visibility.list_page_actions_add_button')): ?>
      <button type="button" class="btn-create edit-add-modal-button js-ajax-ux-request reset-target-modal-form <?php echo e($page['add_button_classes'] ?? ''); ?>" data-toggle="modal" data-target="#commonModal"
        data-url="<?php echo e($page['add_modal_create_url'] ?? ''); ?>" data-loading-target="commonModalBody" data-modal-title="<?php echo e($page['add_modal_title'] ?? ''); ?>"
        data-action-url="<?php echo e($page['add_modal_action_url'] ?? ''); ?>" data-action-method="<?php echo e($page['add_modal_action_method'] ?? ''); ?>"
        data-action-ajax-class="<?php echo e($page['add_modal_action_ajax_class'] ?? ''); ?>" data-modal-size="<?php echo e($page['add_modal_size'] ?? ''); ?>"
        data-action-ajax-loading-target="<?php echo e($page['add_modal_action_ajax_loading_target'] ?? ''); ?>" data-save-button-class="<?php echo e($page['add_modal_save_button_class'] ?? ''); ?>"
        data-project-progress="0">
        Create
      </button>
    <?php endif; ?>

    <!--add new button (link)-->
    <?php if(config('visibility.list_page_actions_add_button_link')): ?>
      <a id="fx-page-actions-add-button" type="button" class="btn-create edit-add-modal-button" href="<?php echo e($page['add_button_link_url'] ?? ''); ?>">
        Add
      </a>
    <?php endif; ?>
  </div>
</div>
<?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/leads/components/misc/list-page-actions.blade.php ENDPATH**/ ?>