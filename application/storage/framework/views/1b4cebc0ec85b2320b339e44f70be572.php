<?php $__currentLoopData = $amc_invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amc_invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="amc_invoice_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
    <?php if(config('visibility.amc_invoices_col_checkboxes')): ?>
    <td class="amc_invoices_col_checkbox checkitem" id="amc_invoices_col_checkbox_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <!--list checkbox-->
        <span class="list-checkboxes display-inline-block w-px-20">
            <input type="checkbox" id="listcheckbox-invoices-<?php echo e($amc_invoice->bill_amc_invoiceid); ?>" name="ids[<?php echo e($amc_invoice->bill_amc_invoiceid); ?>]"
                class="listcheckbox listcheckbox-invoices filled-in chk-col-light-blue" data-actions-container-class="invoices-checkbox-actions-container">
            <label for="listcheckbox-invoices-<?php echo e($amc_invoice->bill_amc_invoiceid); ?>"></label>
        </span>
    </td>
    <?php endif; ?>
    <td class="amc_invoices_col_id" id="amc_invoices_col_id_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <a href="/amc-invoices/<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
            <?php echo e($amc_invoice->bill_amc_invoiceid); ?> </a>
        <!--recurring-->
        <?php if(auth()->user()->is_team && $amc_invoice->bill_recurring == 'yes'): ?>
        <span class="sl-icon-refresh text-danger p-l-5" data-toggle="tooltip" title="<?php echo app('translator')->get('lang.recurring_invoice'); ?>"></span>
        <?php endif; ?>
        <!--child invoice-->
        <?php if(auth()->user()->is_team && $amc_invoice->bill_recurring_child == 'yes'): ?>
        <a href="<?php echo e(url('invoices/' . $amc_invoice->bill_recurring_parent_id)); ?>">
            <i class="ti-back-right text-success p-l-5" data-toggle="tooltip" data-html="true"
                title="<?php echo e(cleanLang(__('lang.invoice_automatically_created_from_recurring'))); ?> <br>(#<?php echo e(runtimeInvoiceIdFormat($amc_invoice->bill_recurring_parent_id)); ?>)"></i>
        </a>
        <?php endif; ?>
    </td>
    <td class="amc_invoices_col_invoice_id" id="amc_invoices_col_invoice_id_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <a href="/amc-invoices/<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
            <?php echo e($amc_invoice->formatted_bill_amc_invoiceid); ?> </a>
    </td>
    <td class="amc_invoices_col_date" id="amc_invoices_col_date_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <?php echo e(runtimeDate($amc_invoice->bill_from_date)); ?>

    </td>
    <?php if(config('visibility.amc_invoices_col_client')): ?>
    <td class="amc_invoices_col_company" id="amc_invoices_col_company_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <a href="/clients/<?php echo e($amc_invoice->bill_clientid); ?>"><?php echo e(str_limit($amc_invoice->client_company_name ?? '---', 12)); ?></a>
    </td>
    <?php endif; ?>
    <?php if(config('visibility.amc_invoices_col_project')): ?>
    <td class="amc_invoices_col_project" id="amc_invoices_col_project_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <a href="/projects/<?php echo e($amc_invoice->bill_projectid); ?>"><?php echo e(str_limit($amc_invoice->project_title ?? '---', 12)); ?></a>
    </td>
    <?php endif; ?>
    <td class="amc_invoices_col_amount" id="amc_invoices_col_amount_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <?php echo e(runtimeMoneyFormat($amc_invoice->bill_final_amount)); ?>

    </td>
    <?php if(config('visibility.amc_invoices_col_payments')): ?>
    <td class="amc_invoices_col_payments" id="amc_invoices_col_payments_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <a href="<?php echo e(url('payments?filter_payment_invoiceid=' . $amc_invoice->bill_amc_invoiceid)); ?>"><?php echo e(runtimeMoneyFormat($amc_invoice->sum_payments)); ?></a>
    </td>
    <?php endif; ?>
    <td class="amc_invoices_col_balance hidden" id="amc_invoices_col_balance_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <?php echo e(runtimeMoneyFormat($amc_invoice->invoice_balance)); ?>

    </td>
    <td class="amc_invoices_col_status" id="amc_invoices_col_status_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">

        <span class="label <?php echo e(runtimeInvoiceStatusColors($amc_invoice->bill_status, 'label')); ?>"><?php echo e(runtimeLang($amc_invoice->bill_status)); ?></span>

        <!--invoice is scheduled-->
        <?php if($amc_invoice->bill_publishing_type == 'scheduled' && $amc_invoice->bill_publishing_scheduled_status == 'pending'): ?>
        <span class="label label-icons label-icons-warning" data-toggle="tooltip" data-placement="top" title="<?php echo app('translator')->get('lang.scheduled_publishing_info'); ?>: <?php echo e(runtimeDate($amc_invoice->bill_publishing_scheduled_date)); ?>"><i
                class="sl-icon-clock"></i></span>
        <?php endif; ?>

        <?php if(config('system.settings_estimates_show_view_status') == 'yes' && auth()->user()->is_team && $amc_invoice->bill_status != 'draft' && $amc_invoice->bill_status != 'paid'): ?>
        <!--estimate not viewed-->
        <?php if($amc_invoice->bill_viewed_by_client == 'no'): ?>
        <span class="label label-icons label-icons-default" data-toggle="tooltip" data-placement="top" title="<?php echo app('translator')->get('lang.client_has_not_opened'); ?>"><i class="sl-icon-eye"></i></span>
        <?php endif; ?>
        <!--estimate viewed-->
        <?php if($amc_invoice->bill_viewed_by_client == 'yes'): ?>
        <span class="label label-icons label-icons-info" data-toggle="tooltip" data-placement="top" title="<?php echo app('translator')->get('lang.client_has_opened'); ?>"><i class="sl-icon-eye"></i></span>
        <?php endif; ?>
        <?php endif; ?>

    </td>
    <td class="amc_invoices_col_action actions_column" id="amc_invoices_col_action_<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">

            <!--client options-->
            <?php if(auth()->user()->is_client): ?>
            <a title="<?php echo e(cleanLang(__('lang.download'))); ?>" title="<?php echo e(cleanLang(__('lang.download'))); ?>" class="data-toggle-tooltip data-toggle-tooltip btn btn-outline-warning btn-circle btn-sm"
                href="<?php echo e(url('/amc-invoices/' . $amc_invoice->bill_uniqueid . '/pdf')); ?>" download>
                <i class="bi bi-cloud-arrow-down export"></i>
                <?php endif; ?>
                <!--delete-->
                <?php if(config('visibility.action_buttons_delete')): ?>
                <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>" class="data-toggle-action-tooltip btn btn-outline-danger sl-icon-trash-border btn-circle btn-sm confirm-action-danger"
                    data-confirm-title="<?php echo e(cleanLang(__('lang.delete_invoice'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                    data-url="<?php echo e(url('/')); ?>/amc-invoices/<?php echo e($amc_invoice->bill_amc_invoiceid); ?>">
                    <i class="bi bi-trash3 trash"></i>

                </button>
                <?php endif; ?>
                <!--edit-->
                <?php if(config('visibility.action_buttons_edit')): ?>
                <a href="/amc-invoices/<?php echo e($amc_invoice->bill_amc_invoiceid); ?>/edit-invoice" title="<?php echo e(cleanLang(__('lang.edit'))); ?>" class="data-toggle-action-tooltip btn btn-outline-info btn-circle btn-sm">
                    <i class="sl-icon-note"></i>
                </a>
                <?php endif; ?>
                <a href="/amc-invoices/<?php echo e($amc_invoice->bill_amc_invoiceid); ?>" title="<?php echo e(cleanLang(__('lang.view'))); ?>" class="data-toggle-action-tooltip btn btn-outline-info btn-circle btn-sm">
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
                        <?php if(config('visibility.action_buttons_edit')): ?>
                        <!--add payment-->
                        <?php if(auth()->user()->role->role_invoices > 1): ?>
                        <a class="dropdown-item actions-modal-button js-ajax-ux-request reset-target-modal-form edit-add-modal-button" href="javascript:void(0)" data-toggle="modal"
                            data-target="#commonModal" data-modal-title="<?php echo e(cleanLang(__('lang.add_new_payment'))); ?>" data-url="<?php echo e(url('/payments/create?bill_amc_invoiceid=' . $amc_invoice->bill_amc_invoiceid)); ?>"
                            data-action-url="<?php echo e(urlResource('/payments?ref=amc_invoice&source=list&bill_amc_invoiceid=' . $amc_invoice->bill_amc_invoiceid)); ?>" data-loading-target="actionsModalBody"
                            data-action-method="POST">
                            <?php echo e(cleanLang(__('lang.add_new_payment'))); ?></a>
                        <?php endif; ?>

                        <?php endif; ?>
                        <a class="dropdown-item" href="<?php echo e(url('payments?filter_payment_invoiceid=' . $amc_invoice->bill_amc_invoiceid)); ?>">
                            <?php echo e(cleanLang(__('lang.view_payments'))); ?></a>
                        <a class="dropdown-item" href="<?php echo e(url('/amc-invoices/' . $amc_invoice->bill_uniqueid . '/pdf')); ?>" download>
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
<!--each row--><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/amc-invoices/components/table/ajax.blade.php ENDPATH**/ ?>