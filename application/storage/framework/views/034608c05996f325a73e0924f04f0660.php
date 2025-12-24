<?php $__currentLoopData = $proforma_invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proforma_invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!--each row-->
  <tr id="proforma_invoice_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
    <?php if(config('visibility.proforma_invoices_col_checkboxes')): ?>
      <td class="proforma_invoices_col_checkbox checkitem" id="proforma_invoices_col_checkbox_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
        <!--list checkbox-->
        <span class="list-checkboxes display-inline-block w-px-20">
          <input type="checkbox" id="listcheckbox-proforma-invoices-<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>" name="ids[<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>]"
            class="listcheckbox listcheckbox-proforma-invoices filled-in chk-col-light-blue" data-actions-container-class="proforma-invoices-checkbox-actions-container">
          <label for="listcheckbox-proforma-invoices-<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>"></label>
        </span>
      </td>
    <?php endif; ?>
    <td class="proforma_invoices_col_id" id="proforma_invoices_col_id_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
      <a href="/proforma-invoices/<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
        <?php echo e($proforma_invoice->formatted_bill_proforma_invoiceid); ?> </a>
      <!--recurring-->
      <?php if(auth()->user()->is_team && $proforma_invoice->bill_recurring == 'yes'): ?>
        <span class="sl-icon-refresh text-danger p-l-5" data-toggle="tooltip" title="<?php echo app('translator')->get('lang.recurring_invoice'); ?>"></span>
      <?php endif; ?>
      <!--child invoice-->
      <?php if(auth()->user()->is_team && $proforma_invoice->bill_recurring_child == 'yes'): ?>
        <a href="<?php echo e(url('proforma-invoices/' . $proforma_invoice->bill_recurring_parent_id)); ?>">
          <i class="ti-back-right text-success p-l-5" data-toggle="tooltip" data-html="true"
            title="<?php echo e(cleanLang(__('lang.invoice_automatically_created_from_recurring'))); ?> <br>(#<?php echo e(runtimeInvoiceIdFormat($proforma_invoice->bill_recurring_parent_id)); ?>)"></i>
        </a>
      <?php endif; ?>
    </td>
    <td class="proforma_invoices_col_date" id="proforma_invoices_col_date_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
      <?php echo e(runtimeDate($proforma_invoice->bill_date)); ?>

    </td>
    <?php if(config('visibility.proforma_invoices_col_client')): ?>
      <td class="proforma_invoices_col_company" id="proforma_invoices_col_company_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
        <a href="/clients/<?php echo e($proforma_invoice->bill_clientid); ?>"><?php echo e(str_limit($proforma_invoice->client_company_name ?? '---', 12)); ?></a>
      </td>
    <?php endif; ?>
    <?php if(config('visibility.proforma_invoices_col_project')): ?>
      <td class="proforma_invoices_col_project" id="proforma_invoices_col_project_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
        <a href="/projects/<?php echo e($proforma_invoice->bill_projectid); ?>"><?php echo e(str_limit($proforma_invoice->project_title ?? '---', 12)); ?></a>
      </td>
    <?php endif; ?>

    
    <td class="proforma_invoices_col_project" id="proforma_invoices_col_project_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
      <a href="/estimates/<?php echo e($proforma_invoice->bill_quotationid); ?>"><?php echo e(str_limit($proforma_invoice->estimate->formatted_bill_estimateid ?? '---', 12)); ?></a>
    </td>
    

    <td class="proforma_invoices_col_project" id="proforma_invoices_col_project_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
      <a href="/workorder/<?php echo e($proforma_invoice->bill_workorderid); ?>"><?php echo e(str_limit($proforma_invoice->workorder->formatted_workorderid ?? '---', 12)); ?></a>
    </td>

    <td class="proforma_invoices_col_amount" id="proforma_invoices_col_amount_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
      <?php echo e(runtimeMoneyFormat($proforma_invoice->bill_final_amount)); ?></td>
    <?php if(config('visibility.proforma_invoices_col_payments')): ?>
      <td class="proforma_invoices_col_payments" id="proforma_invoices_col_payments_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
        <a href="<?php echo e(url('payments?filter_payment_invoiceid=' . $proforma_invoice->bill_proforma_invoiceid)); ?>"><?php echo e(runtimeMoneyFormat($proforma_invoice->sum_payments)); ?></a>
      </td>
    <?php endif; ?>
    <td class="proforma_invoices_col_balance hidden" id="proforma_invoices_col_balance_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
      <?php echo e(runtimeMoneyFormat($proforma_invoice->invoice_balance)); ?>

    </td>
    <td class="proforma_invoices_col_status" id="proforma_invoices_col_status_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">

      <span class="label <?php echo e(runtimeInvoiceStatusColors($proforma_invoice->bill_status, 'label')); ?>"><?php echo e(runtimeLang($proforma_invoice->bill_status)); ?></span>

      <!--invoice is scheduled-->
      <?php if($proforma_invoice->bill_publishing_type == 'scheduled' && $proforma_invoice->bill_publishing_scheduled_status == 'pending'): ?>
        <span class="label label-icons label-icons-warning" data-toggle="tooltip" data-placement="top"
          title="<?php echo app('translator')->get('lang.scheduled_publishing_info'); ?>: <?php echo e(runtimeDate($proforma_invoice->bill_publishing_scheduled_date)); ?>"><i class="sl-icon-clock"></i></span>
      <?php endif; ?>

      <?php if(config('system.settings_estimates_show_view_status') == 'yes' && auth()->user()->is_team && $proforma_invoice->bill_status != 'draft' && $proforma_invoice->bill_status != 'paid'): ?>
        <!--estimate not viewed-->
        <?php if($proforma_invoice->bill_viewed_by_client == 'no'): ?>
          <span class="label label-icons label-icons-default" data-toggle="tooltip" data-placement="top" title="<?php echo app('translator')->get('lang.client_has_not_opened'); ?>"><i class="sl-icon-eye"></i></span>
        <?php endif; ?>
        <!--estimate viewed-->
        <?php if($proforma_invoice->bill_viewed_by_client == 'yes'): ?>
          <span class="label label-icons label-icons-info" data-toggle="tooltip" data-placement="top" title="<?php echo app('translator')->get('lang.client_has_opened'); ?>"><i class="sl-icon-eye"></i></span>
        <?php endif; ?>
      <?php endif; ?>

    </td>
    <td class="proforma_invoices_col_action actions_column" id="proforma_invoices_col_action_<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
      <!--action button-->
      <span class="list-table-action dropdown font-size-inherit">

        <!--client options-->
        <?php if(auth()->user()->is_client): ?>
          <a title="<?php echo e(cleanLang(__('lang.download'))); ?>" title="<?php echo e(cleanLang(__('lang.download'))); ?>" class="data-toggle-tooltip data-toggle-tooltip btn btn-outline-warning btn-circle btn-sm"
            href="<?php echo e(url('/proforma-invoices/' . $proforma_invoice->bill_proforma_invoiceid . '/pdf')); ?>" download>
            <i class="bi bi-cloud-arrow-down export"></i>
        <?php endif; ?>
        <!--delete-->
        <?php if(config('visibility.action_buttons_delete')): ?>
          <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>" class="data-toggle-action-tooltip btn btn-outline-danger sl-icon-trash-border btn-circle btn-sm confirm-action-danger"
            data-confirm-title="<?php echo e(cleanLang(__('lang.delete_invoice'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
            data-url="<?php echo e(url('/')); ?>/proforma-invoices/<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>">
            <i class="bi bi-trash3 trash"></i>

          </button>
        <?php endif; ?>
        <!--edit-->
        <?php if(config('visibility.action_buttons_edit')): ?>
          <a href="/proforma-invoices/<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>/edit-invoice" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
            class="data-toggle-action-tooltip btn btn-outline-info btn-circle btn-sm">
            <i class="sl-icon-note"></i>
          </a>
        <?php endif; ?>
        <a href="/proforma-invoices/<?php echo e($proforma_invoice->bill_proforma_invoiceid); ?>" title="<?php echo e(cleanLang(__('lang.view'))); ?>"
          class="data-toggle-action-tooltip btn btn-outline-info btn-circle btn-sm">
          <i class="ti-new-window"></i>
        </a>

        <!--more button (team)-->
        <?php if(auth()->user()->is_team): ?>
          <span class="list-table-action dropdown font-size-inherit">
            <button type="button" id="listTableAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(cleanLang(__('lang.more'))); ?>"
              class="data-toggle-action-tooltip btn btn-outline-default-light btn-circle btn-sm">
              <i class="ti-more"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="listTableAction">
              
              
              <!--email to client-->
              
              <!--add payment-->
              
              <!--clone invoice-->
              
              <!--change category-->
              
              <!--attach project -->
              
              <!--dettach project -->
              
              <!--recurring settings-->
              
              <!--stop recurring -->
              
              
              
              <a class="dropdown-item" href="<?php echo e(url('/proforma-invoices/' . $proforma_invoice->bill_uniqueid . '/pdf')); ?>" download>
                <?php echo e(cleanLang(__('lang.download'))); ?></a>
            </div>
          </span>
        <?php endif; ?>
        <!--more button-->
      </span>
      <!--action button-->

    </td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/proforma-invoices/components/table/ajax.blade.php ENDPATH**/ ?>