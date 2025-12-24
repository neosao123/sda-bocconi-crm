<?php if(auth()->check() && auth()->user()->is_team): ?>
<?php if(auth()->check() && auth()->user()->role->role_invoices >= 2): ?>
<!--show editing icon (recurring)-->
<a class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form" href="javascript:void(0)"
    data-toggle="modal" data-target="#commonModal"
    data-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/recurring-settings?source=page')); ?>"
    data-loading-target="commonModalBody" data-modal-title="<?php echo e(cleanLang(__('lang.recurring_settings'))); ?>"
    data-action-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/recurring-settings?source=page')); ?>"
    data-action-method="POST" data-action-ajax-loading-target="invoices-td-container">
    <ion-icon name="refresh-outline" class="refresh text-danger cursor-pointer <?php echo e(runtimeVisibility('invoice-recurring-icon', $bill->bill_recurring)); ?>"
        data-toggle="tooltip" id="invoice-recurring-icon" title="<?php echo e(cleanLang(__('lang.recurring_invoice'))); ?>"></ion-icon>
</a>
<?php else: ?>
<!--show plain icon (recurring)-->
<ion-icon name="refresh-outline" class="refresh text-danger cursor-pointer <?php echo e(runtimeVisibility('invoice-recurring-icon', $bill->bill_recurring)); ?>"
    data-toggle="tooltip" id="invoice-recurring-icon" title="<?php echo e(cleanLang(__('lang.recurring_invoice'))); ?>"></ion-icon>
<?php endif; ?>
<!--child invoice-->
<?php if($bill->bill_recurring_child == 'yes'): ?>
<a href="<?php echo e(url('invoices/'.$bill->bill_recurring_parent_id)); ?>">
    <i class="ti-back-right text-success" data-toggle="tooltip" data-html="true"
        title="<?php echo e(cleanLang(__('lang.invoice_automatically_created_from_recurring'))); ?> <br>(#<?php echo e(runtimeInvoiceIdFormat($bill->bill_recurring_parent_id)); ?>)"></i>
</a>
<?php endif; ?>
<?php endif; ?><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/invoice/icons-recuring.blade.php ENDPATH**/ ?>