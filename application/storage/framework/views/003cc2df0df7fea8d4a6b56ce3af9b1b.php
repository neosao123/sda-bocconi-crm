<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12  col-lg-5 align-self-center text-right p-b-9 <?php echo e($page['list_page_actions_size'] ?? ''); ?> <?php echo e($page['list_page_container_class'] ?? ''); ?>" id="list-page-actions-container">
  <div id="list-page-actions">
    <?php if(auth()->user()->is_team && auth()->user()->role->role_invoices >= 2): ?>
      <!--reminder-->
      <?php if(config('visibility.modules.reminders')): ?>
        <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.reminder'))); ?>" id="reminders-panel-toggle-button"
          class="reminder-toggle-panel-button estimate-actions-button btn btn-outline-inverse waves-effect waves-dark js-toggle-reminder-panel ajax-request <?php echo e($bill->reminder_status); ?>"
          data-url="<?php echo e(url('reminders/start?resource_type=invoice&resource_id=' . $bill->bill_invoiceid)); ?>" data-loading-target="reminders-side-panel-body" data-progress-bar='hidden'
          data-target="reminders-side-panel" data-title="<?php echo app('translator')->get('lang.my_reminder'); ?>">
          <ion-icon name="alarm-outline" class="clock "></ion-icon>

        </button>
      <?php endif; ?>
      <!--publish invoice-->
      <?php if($bill->bill_status == 'draft'): ?>
        <span class="dropdown">
          <button type="button" data-toggle="dropdown" title="<?php echo e(cleanLang(__('lang.publish_invoice'))); ?>" aria-haspopup="true" aria-expanded="false"
            class="data-toggle-tooltip  estimate-actions-button btn sl-icon-share-alt-border btn-outline-primary waves-effect waves-dark">
            <ion-icon name="share-social-outline" class="sharer"></ion-icon>

          </button>
          <div class="dropdown-menu w-px-250 p-t-20 p-l-20 p-r-20 js-stop-propagation" aria-labelledby="listTableAction">
            <div class="form-group form-group-checkbox row m-b-0">
              <div class="col-12">
                <input type="checkbox" id="publishing_option_now" name="publishing_option_now" class="filled-in chk-col-light-blue publishing_option"
                  data-url="<?php echo e(urlResource('/invoices/' . $bill->bill_invoiceid . '/publish')); ?>" <?php echo e(runtimePreChecked2($bill->bill_publishing_type, 'instant')); ?>>
                <label class="p-l-30" for="publishing_option_now"><?php echo app('translator')->get('lang.publish_now'); ?> <span class="align-middle text-info font-16" data-toggle="tooltip" title="<?php echo app('translator')->get('lang.it_will_be_sent_now'); ?>" data-placement="top"><i
                      class="ti-info-alt"></i></span></label>
              </div>
            </div>

            <div class="modal-selector m-l--20 m-r--20 p-t-5 p-b-5 m-t-10 p-l-20 p-r-20 p-t-10" id="publishing_option_later_container">

              <div class="form-group form-group-checkbox row  m-b-0">
                <div class="col-12">
                  <input type="checkbox" id="publishing_option_later" name="publishing_option_later" class="filled-in chk-col-light-blue publishing_option"
                    data-url="<?php echo e(urlResource('/invoices/' . $bill->bill_invoiceid . '/publish/scheduled')); ?>" data-type="form" data-form-id="publishing_option_later_container" data-ajax-type="post"
                    <?php echo e(runtimePreChecked2($bill->bill_publishing_type, 'scheduled')); ?>>
                  <label class="p-l-30" for="publishing_option_later"><?php echo app('translator')->get('lang.publish_later'); ?> <span class="align-middle text-info font-16" data-toggle="tooltip" title="<?php echo app('translator')->get('lang.it_will_be_sent_schedule'); ?>"
                      data-placement="top"><i class="ti-info-alt"></i></span></label>
                </div>
              </div>

              <!--date-->
              <div class="form-group row m-b-10">
                <div class="col-sm-12">
                  <input type="text" class="form-control form-control-sm pickadate publishing_option_date" autocomplete="off" name="publishing_option_date"
                    value="<?php echo e(runtimeDatepickerDate($bill->bill_publishing_scheduled_date ?? '')); ?>" <?php echo e(runtimePublihItemDate($bill->bill_publishing_type)); ?>>
                  <input class="mysql-date" type="hidden" name="publishing_option_date" id="publishing_option_date" value="<?php echo e($bill->bill_publishing_scheduled_date ?? ''); ?>">
                </div>
              </div>
            </div>
            <!--form buttons-->
            <div class="text-right p-t-5 m-b-10">
              <button type="submit" id="publishing_option_button" class="btn btn-sm btn-info waves-effect text-left" data-url="" data-loading-target="" data-ajax-type="POST"
                data-lang-error-message="<?php echo app('translator')->get('lang.schedule_date_is_requried'); ?>" data-lang-publish="<?php echo app('translator')->get('lang.publish_now'); ?>" data-lang-schedule="<?php echo app('translator')->get('lang.schedule'); ?>"
                data-on-start-submit-button="disable"><?php echo e(runtimePublihItemButtonLang($bill->bill_publishing_type)); ?></button>
            </div>
          </div>
        </span>
      <?php endif; ?>

      <!--email invoice-->
      <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.send_email'))); ?>"
        class="estimate-actions-button btn btn-outline-warning waves-effect waves-dark ti-email-border  confirm-action-info" href="javascript:void(0)"
        data-confirm-title="<?php echo e(cleanLang(__('lang.send_email'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.confirm'))); ?>"
        data-url="<?php echo e(urlResource('/invoices/' . $bill->bill_invoiceid . '/resend')); ?>" id="invoice-action-email-invoice"><ion-icon name="mail-outline" class="email"></ion-icon></button>
      <!--add payment-->
      <button type="button" title="<?php echo e(cleanLang(__('lang.add_a_payment'))); ?>" id="invoiceAddPaymentButton"
        class="data-toggle-tooltip estimate-actions-button btn btn-outline-brown waves-effect waves-dark js-ajax-ux-request reset-target-modal-form edit-add-modal-button" data-toggle="modal"
        data-target="#commonModal" data-modal-title="<?php echo e(cleanLang(__('lang.add_a_payment'))); ?>" data-url="<?php echo e(url('/payments/create?bill_invoiceid=' . $bill->bill_invoiceid)); ?>"
        data-action-url="<?php echo e(url('/payments?ref=invoice&source=page&bill_invoiceid=' . $bill->bill_invoiceid)); ?>" data-loading-target="actionsModalBody" data-action-method="POST">
        <i class="ti-credit-card"></i>
      </button>
      <!--recurring options-->
      <span class="dropdown">
        <button type="button" data-toggle="dropdown" title="<?php echo e(cleanLang(__('lang.recurring_options'))); ?>" aria-haspopup="true" aria-expanded="false"
          class="data-toggle-tooltip  estimate-actions-button sl-icon-refresh-border btn btn-outline-info waves-effect waves-dark">
          <ion-icon name="refresh-outline" class="refresh"></ion-icon>

        </button>
        <div class="dropdown-menu" aria-labelledby="listTableAction">
          <!--recurring settings-->
          <a class="dropdown-item edit-add-modal-button js-ajax-ux-request reset-target-modal-form" href="javascript:void(0)" data-toggle="modal" data-target="#commonModal"
            data-url="<?php echo e(urlResource('/invoices/' . $bill->bill_invoiceid . '/recurring-settings?source=page')); ?>" data-loading-target="commonModalBody"
            data-modal-title="<?php echo e(cleanLang(__('lang.recurring_settings'))); ?>" data-action-url="<?php echo e(urlResource('/invoices/' . $bill->bill_invoiceid . '/recurring-settings?source=page')); ?>"
            data-action-method="POST" data-action-ajax-loading-target="invoices-td-container"><ion-icon name="settings-outline"
              class="display-inline-block p-r-5"></ion-icon><?php echo e(cleanLang(__('lang.recurring_settings'))); ?></a>

          <!--view child invoices-->
          <a class="dropdown-item <?php echo e(runtimeVisibility('invoice-view-child-invoices', $bill->bill_recurring)); ?>" href="<?php echo e(url('invoices?filter_recurring_parent_id=') . $bill->bill_invoiceid); ?>"
            id="invoice-action-view-children"><i class="sl-icon-docs display-inline-block p-r-5"></i><?php echo e(cleanLang(__('lang.view_child_invoices'))); ?></a>

          <!--stop recurring-->
          <a class="dropdown-item confirm-action-info display-block <?php echo e(runtimeVisibility('invoice-stop-recurring', $bill->bill_recurring)); ?>" href="javascript:void(0)"
            data-confirm-title="<?php echo e(cleanLang(__('lang.stop_recurring'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
            data-url="<?php echo e(urlResource('/invoices/' . $bill->bill_invoiceid . '/stop-recurring')); ?>" id="invoice-action-stop-recurring">
            <i class="sl-icon-ban display-inline-block p-r-5"></i><?php echo e(cleanLang(__('lang.stop_recurring'))); ?></a>
        </div>
      </span>
      <!--clone-->
      <span class="dropdown">
        <button type="button"
          class="data-toggle-tooltip estimate-actions-button mdi-content-copy-border btn btn-outline-success waves-effect waves-dark 
                        actions-modal-button js-ajax-ux-request reset-target-modal-form edit-add-modal-button"
          title="<?php echo e(cleanLang(__('lang.clone_invoice'))); ?>" data-toggle="modal" data-target="#commonModal" data-modal-title="<?php echo e(cleanLang(__('lang.clone_invoice'))); ?>"
          data-url="<?php echo e(url('/invoices/' . $bill->bill_invoiceid . '/clone')); ?>" data-action-url="<?php echo e(url('/invoices/' . $bill->bill_invoiceid . '/clone')); ?>" data-loading-target="actionsModalBody"
          data-action-method="POST">
          <ion-icon name="copy-outline" class="copy"></ion-icon>
        </button>
      </span>
      <!--edit-->
      <span class="dropdown">
        <button type="button" data-toggle="dropdown" title="<?php echo e(cleanLang(__('lang.edit'))); ?>" aria-haspopup="true" aria-expanded="false"
          class="data-toggle-tooltip estimate-actions-button btn btn-outline-warning sl-icon-note-border waves-effect waves-dark">
          <i class="sl-icon-note"></i>
        </button>

        <div class="dropdown-menu" aria-labelledby="listTableAction">
          <!--edit-->
          <a class="dropdown-item" href="<?php echo e(url('/invoices/' . $bill->bill_invoiceid . '/edit-invoice')); ?>"><i
              class="sl-icon-note display-inline-block p-r-5"></i><?php echo e(cleanLang(__('lang.edit_invoice'))); ?></a>

          
        </div>

      </span>
      <!--delete-->
      <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.delete_invoice'))); ?>"
        class="estimate-actions-button btn btn-page-actions sl-icon-trash-border waves-effect waves-dark confirm-action-danger" data-confirm-title="<?php echo e(cleanLang(__('lang.delete_invoice'))); ?>"
        data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE" data-url="<?php echo e(url('/')); ?>/invoices/<?php echo e($bill->bill_invoiceid); ?>?source=page">
        <i class="bi bi-trash3 trash"></i></button>

    <?php endif; ?>

    <!--reminder-->
    <?php if(auth()->check() && auth()->user()->is_client): ?>
      <?php if(config('visibility.modules.reminders')): ?>
        <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.reminder'))); ?>" id="reminders-panel-toggle-button"
          class="reminder-toggle-panel-button estimate-actions-button btn btn-page-actions waves-effect waves-dark js-toggle-reminder-panel ajax-request <?php echo e($bill->reminder_status); ?>"
          data-url="<?php echo e(url('reminders/start?resource_type=invoice&resource_id=' . $bill->bill_invoiceid)); ?>" data-loading-target="reminders-side-panel-body" data-progress-bar='hidden'
          data-target="reminders-side-panel" data-title="<?php echo app('translator')->get('lang.my_reminder'); ?>">
          <ion-icon name="alarm-outline" class="clock "></ion-icon>

        </button>
      <?php endif; ?>
    <?php endif; ?>

    <!--Download PDF-->
    <a data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.download'))); ?>" id="invoiceDownloadButton" href="<?php echo e(url('/invoices/' . $bill->bill_invoiceid . '/pdf')); ?>"
      class="estimate-actions-button btn btn-outline-green waves-effect waves-dark" download>
      <ion-icon name="arrow-down-outline"></ion-icon>
    </a>

  </div>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/misc/invoice/actions.blade.php ENDPATH**/ ?>