<?php
$client_tax_number = $bill->client->client_vat ?? '';
if ($bill->bill_type == 'estimate') {
if (isset($bill->lead) && isset($bill->bill_leadid)) {
if ($bill->bill_leadtype == 'customer_lead') {
$client_tax_number = $bill->lead->client->client_vat ?? '';
} else {
$client_tax_number = $bill->lead->lead_vat ?? '';
}
}
}
$company_tax_number = config('system.settings_company_gst_number') ?? '';
$pattern = "/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/";
$gstType = 'TAX';
if ($client_tax_number != '' && $company_tax_number != '') {
if (preg_match($pattern, $client_tax_number)) {
$client_tax_state = substr($client_tax_number, 0, 2);
$company_tax_state = substr($company_tax_number, 0, 2);
if ($company_tax_state == $client_tax_state) {
$gstType = 'CSGST';
} else {
$gstType = 'IGST';
}
}
}
?>
<div id="bill-form-container">
    <div class="card card-body invoice-wrapper box-shadow" id="invoice-wrapper">

        <!--HEADER-->
        <?php if($bill->bill_type == 'invoice'): ?>
        <?php echo $__env->make('pages.bill.components.elements.invoice.header-web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if($bill->bill_type == 'proforma-invoice'): ?>
        <?php echo $__env->make('pages.bill.components.elements.proforma-invoice.header-web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if($bill->bill_type == 'amc-invoice'): ?>
        <?php echo $__env->make('pages.bill.components.elements.amc-invoice.header-web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if($bill->bill_type == 'estimate'): ?>
        <?php echo $__env->make('pages.bill.components.elements.estimate.header-web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!--scheduled for publishing-->
        <?php if($bill->bill_status == 'draft' && $bill->bill_publishing_type == 'scheduled'): ?>
        <?php if($bill->bill_publishing_scheduled_status == 'pending'): ?>
        <div class="alert alert-info m-b-0 m-t-5"><?php echo app('translator')->get('lang.scheduled_publishing_info'); ?> :
            <?php echo e(runtimeDate($bill->bill_publishing_scheduled_date)); ?>

        </div>
        <?php endif; ?>
        <?php if($bill->bill_publishing_scheduled_status == 'failed'): ?>
        <div class="alert alert-danger m-b-0 m-t-5"><?php echo app('translator')->get('lang.scheduled_publishing_failed_info'); ?> :
            <?php echo e(runtimeDate($bill->bill_publishing_scheduled_date)); ?>

        </div>
        <?php endif; ?>
        <?php endif; ?>

        <hr class="billing-mode-only-item">
        <div class="row">
            <!--ADDRESSES-->
            <div class="col-12 m-b-10 billing-mode-only-item">
                <!--company address-->
                <div class="pull-left">
                    <address>
                        <h3 class="x-company-name text-primary mb-0 uppercaseText textWrapTitle break-all"><?php echo e(config('system.settings_company_name')); ?></h3>
                        <?php if(config('system.settings_company_gst_number')): ?>
                        <p>
                            <span style="color:grey;font-weight:600"><?php echo e(config('system.settings_company_gst_number')); ?></span>
                        </p>
                        <?php endif; ?>
                        <p class="text-muted m-l-5">
                            <?php if(config('system.settings_company_address_line_1')): ?>
                            <?php echo e(config('system.settings_company_address_line_1')); ?>

                            <?php endif; ?>
                            <?php if(config('system.settings_company_city')): ?>
                            <br /> <?php echo e(config('system.settings_company_city')); ?>

                            <?php endif; ?>
                            <?php if(config('system.settings_company_state')): ?>
                            <br /><?php echo e(config('system.settings_company_state')); ?>

                            <?php endif; ?>
                            <?php if(config('system.settings_company_zipcode')): ?>
                            <br /> <?php echo e(config('system.settings_company_zipcode')); ?>

                            <?php endif; ?>
                            <?php if(config('system.settings_company_country')): ?>
                            <br /> <?php echo e(config('system.settings_company_country')); ?>

                            <?php endif; ?>

                            <!--custom company fields-->
                            <?php if(config('system.settings_company_customfield_1') != ''): ?>
                            <br /> <?php echo e(config('system.settings_company_customfield_1')); ?>

                            <?php endif; ?>
                            <?php if(config('system.settings_company_customfield_2') != ''): ?>
                            <br /> <?php echo e(config('system.settings_company_customfield_2')); ?>

                            <?php endif; ?>
                            <?php if(config('system.settings_company_customfield_3') != ''): ?>
                            <br /> <?php echo e(config('system.settings_company_customfield_3')); ?>

                            <?php endif; ?>
                            <?php if(config('system.settings_company_customfield_4') != ''): ?>
                            <br /> <?php echo e(config('system.settings_company_customfield_4')); ?>

                            <?php endif; ?>
                        </p>
                    </address>
                </div>
                <!--client address-->
                <div class="pull-right text-right">
                    <address>

                        <?php if($bill->bill_type == 'proforma-invoice'): ?>
                        <h3 class=""><?php echo e(cleanLang(__('lang.proforma_bill_to'))); ?></h3>
                        <?php endif; ?>
                        <?php if($bill->bill_type == 'invoice' || $bill->bill_type == 'amc-invoice'): ?>
                        <h3 class=""><?php echo e(cleanLang(__('lang.bill_to'))); ?></h3>
                        <?php endif; ?>
                        <?php if($bill->bill_type == 'estimate'): ?>
                        <h3 class=""><?php echo e(cleanLang(__('lang.quotation_to'))); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($bill->lead) && isset($bill->bill_leadid)): ?>
                        <?php if($bill->bill_leadtype == 'customer_lead'): ?>
                        <h4 class="font-bold uppercaseText textWrapTitle break-all"><?php echo e($bill->lead->client->client_company_name); ?></h4>
                        <p class="text-muted m-l-30">
                            <?php if($bill->lead->client->client_billing_street): ?>
                            <?php echo e($bill->lead->client->client_billing_street); ?>

                            <?php endif; ?>
                            <?php if($bill->lead->client->client_billing_city): ?>
                            <br /> <?php echo e($bill->lead->client->client_billing_city); ?>

                            <?php endif; ?>
                            <?php if($bill->lead->client->client_billing_state): ?>
                            <br /> <?php echo e($bill->lead->client->client_billing_state); ?>

                            <?php endif; ?>
                            <?php if($bill->lead->client->client_billing_zip): ?>
                            <br /> <?php echo e($bill->lead->client->client_billing_zip); ?>

                            <?php endif; ?>
                            <?php if($bill->lead->client->client_billing_country): ?>
                            <br /> <?php echo e($bill->lead->client->client_billing_country); ?>

                            <?php endif; ?>
                        </p>
                        <?php else: ?>
                        <h4 class="font-bold uppercaseText textWrapTitle break-all"><?php echo e($bill->lead->lead_company_name); ?></h4>
                        <p class="text-muted m-l-30">
                            <?php if($bill->lead->lead_street): ?>
                            <?php echo e($bill->lead->lead_street); ?>

                            <?php endif; ?>
                            <?php if($bill->lead->lead_city): ?>
                            <br /> <?php echo e($bill->lead->lead_city); ?>

                            <?php endif; ?>
                            <?php if($bill->lead->lead_state): ?>
                            <br /> <?php echo e($bill->lead->lead_state); ?>

                            <?php endif; ?>
                            <?php if($bill->lead->lead_zip): ?>
                            <br /> <?php echo e($bill->lead->lead_zip); ?>

                            <?php endif; ?>
                            <?php if($bill->lead->lead_country): ?>
                            <br /> <?php echo e($bill->lead->lead_country); ?>

                            <?php endif; ?>
                        </p>
                        <?php endif; ?>
                        <?php else: ?>
                        <a href="<?php echo e(url('clients/' . $bill->client_id)); ?>">
                            <h4 class="font-bold uppercaseText textWrapTitle break-all"><?php echo e($bill->client_company_name); ?></h4>
                        </a>
                        <p class="text-muted m-l-30">
                            <?php if($bill->client_billing_street): ?>
                            <?php echo e($bill->client_billing_street); ?>

                            <?php endif; ?>
                            <?php if($bill->client_billing_city): ?>
                            <br /> <?php echo e($bill->client_billing_city); ?>

                            <?php endif; ?>
                            <?php if($bill->client_billing_state): ?>
                            <br /> <?php echo e($bill->client_billing_state); ?>

                            <?php endif; ?>
                            <?php if($bill->client_billing_zip): ?>
                            <br /> <?php echo e($bill->client_billing_zip); ?>

                            <?php endif; ?>
                            <?php if($bill->client_billing_country): ?>
                            <br /> <?php echo e($bill->client_billing_country); ?>

                            <?php endif; ?>

                            <!--custom fields-->
                            <?php $__currentLoopData = $customfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field->customfields_show_invoice == 'yes' && $field->customfields_status == 'enabled'): ?>
                            <?php $key = $field->customfields_name; ?>
                            <?php $customfield = $bill[$key] ?? ''; ?>
                            <?php if($customfield != ''): ?>
                            <br /><?php echo e($field->customfields_title); ?>:
                            <?php echo e(runtimeCustomFieldsFormat($customfield, $field->customfields_datatype)); ?>

                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                        <?php endif; ?>
                    </address>
                </div>
            </div>

            <!--project title-->
            <?php if(config('system.settings_invoices_show_project_on_invoice') == 'yes' && $bill->project_title != ''): ?>
            <div class="col-12 m-b-10 billing-mode-only-item invoice-project-title">
                <span class=""><?php echo app('translator')->get('lang.project'); ?>:</span> <?php echo e($bill->project_title); ?>

            </div>
            <?php endif; ?>

            <!--DATES & AMOUNT DUE-->
            <?php if($bill->bill_type == 'invoice' || $bill->bill_type == 'proforma-invoice'): ?>
            <div class="col-12 m-b-10 billing-mode-only-item" id="invoice-dates-wrapper">
                <?php echo $__env->make('pages.bill.components.elements.invoice.dates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($bill->bill_type == 'invoice'): ?>
                <?php echo $__env->make('pages.bill.components.elements.invoice.payments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if($bill->bill_type == 'amc-invoice'): ?>
            <div class="col-12 m-b-10 billing-mode-only-item" id="invoice-dates-wrapper">
                <?php echo $__env->make('pages.bill.components.elements.amc-invoice.dates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endif; ?>

            <?php if($bill->bill_type == 'estimate'): ?>
            <div class="col-12 m-b-10 billing-mode-only-item" id="invoice-dates-wrapper">
                <?php echo $__env->make('pages.bill.components.elements.estimate.dates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endif; ?>

            <!--INVOICE TABLE-->
            <?php echo $__env->make('pages.bill.components.elements.main-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--[EDITING] INVOICE LINE ITEMS BUTTONS -->
            <?php if(config('visibility.bill_mode') == 'editing'): ?>
            <div class="col-12">
                <?php echo $__env->make('pages.bill.components.misc.add-line-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endif; ?>

            <!-- TOTAL & SUMMARY -->
            <?php echo $__env->make('pages.bill.components.elements.totals-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- TAXES & DISCOUNTS -->
            <?php if(config('visibility.bill_mode') == 'editing'): ?>
            <?php echo $__env->make('pages.bill.components.elements.taxes-discounts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <!--[VIEWING] INVOICE TERMS & MAKE PAYMENT BUTTON-->
            <?php if(config('visibility.bill_mode') == 'viewing'): ?>
            <div class="col-12 billing-mode-only-item">
                <!--invoice terms-->
                <div class="text-left">
                    <?php if($bill->bill_type == 'proforma-invoice'): ?>
                    <h4><?php echo e(cleanLang(__('lang.proforma_invoice_terms'))); ?></h4>
                    <?php elseif($bill->bill_type == 'invoice'): ?>
                    <h4><?php echo e(cleanLang(__('lang.invoice_terms'))); ?></h4>
                    <?php elseif($bill->bill_type == 'amc-invoice'): ?>
                    <h4><?php echo e(cleanLang(__('lang.amc_invoice_terms'))); ?></h4>
                    <?php else: ?>
                    <h4><?php echo e(cleanLang(__('lang.estimate_terms'))); ?></h4>
                    <?php endif; ?>
                    <div id="invoice-terms"><?php echo clean($bill->bill_terms); ?></div>
                </div>
                <!--client - make a payment button-->
                <?php if((auth()->check() && auth()->user()->is_client) || config('visibility.public_bill_viewing')): ?>
                <hr>
                <div class="p-t-25 invoice-pay" id="invoice-buttons-container">
                    <div class="text-right">
                        <!--[invoice] download pdf-->
                        <span>
                            <?php if($bill->bill_type == 'proforma-invoice'): ?>
                            <a class="btn btn-secondary btn-outline" href="<?php echo e(url('/proforma-invoices/' . $bill->bill_proforma_invoiceid . '/pdf')); ?>" download>
                                <span><ion-icon name="arrow-down-outline"></ion-icon>
                                    <?php echo e(cleanLang(__('lang.download'))); ?></span> </a>
                            <?php elseif($bill->bill_type == 'invoice'): ?>
                            <a class="btn btn-secondary btn-outline" href="<?php echo e(url('/invoices/' . $bill->bill_invoiceid . '/pdf')); ?>" download>
                                <span><ion-icon name="arrow-down-outline"></ion-icon>
                                    <?php echo e(cleanLang(__('lang.download'))); ?></span> </a>
                            <?php else: ?>
                            <!--[estimate] download pdf-->
                            <a class="btn btn-secondary btn-outline" href="<?php echo e(url('/estimates/view/' . $bill->bill_uniqueid . '/pdf')); ?>">
                                <span><ion-icon name="arrow-down-outline"></ion-icon>
                                    <?php echo e(cleanLang(__('lang.download'))); ?></span> </a>
                            <?php endif; ?>
                        </span>

                        <!--[invoice] - make payment-->
                        <?php if($bill->bill_type == 'invoice' && $bill->invoice_balance > 0): ?>
                        <button class="btn btn-danger" id="invoice-make-payment-button">
                            <?php echo e(cleanLang(__('lang.make_a_payment'))); ?> </button>
                        <?php endif; ?>

                        <!--accept or decline-->
                        <?php if(in_array($bill->bill_status, ['new', 'revised'])): ?>
                        <!--decline-->
                        <button class="buttons-accept-decline btn btn-danger confirm-action-danger" data-confirm-title="<?php echo e(cleanLang(__('lang.decline_estimate'))); ?>"
                            data-confirm-text="<?php echo e(cleanLang(__('lang.decline_estimate_confirm'))); ?>" data-ajax-type="GET" data-url="<?php echo e(url('/')); ?>/estimates/<?php echo e($bill->bill_uniqueid); ?>/decline">
                            <?php echo e(cleanLang(__('lang.decline_estimate'))); ?> </button>
                        <!--accept-->
                        <button class="buttons-accept-decline btn btn-success confirm-action-success" data-confirm-title="<?php echo e(cleanLang(__('lang.accept_estimate'))); ?>"
                            data-confirm-text="<?php echo e(cleanLang(__('lang.accept_estimate_confirm'))); ?>" data-ajax-type="GET" data-url="<?php echo e(url('/')); ?>/estimates/<?php echo e($bill->bill_uniqueid); ?>/accept">
                            <?php echo e(cleanLang(__('lang.accept_estimate'))); ?> </button>
                        <?php endif; ?>


                    </div>
                    <?php endif; ?>

                </div>
                <!--payment buttons-->
                <?php echo $__env->make('pages.pay.buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>


                <!--[EDITING] INVOICE TERMS & MAKE PAYMENT BUTTON-->
                <?php if(config('visibility.bill_mode') == 'editing'): ?>
                <div class="col-12">
                    <!--invoice terms-->
                    <div class="text-left billing-mode-only-item">
                        <?php if($bill->bill_type == 'proforma-invoice'): ?>
                        <h4><?php echo e(cleanLang(__('lang.proforma_invoice_terms'))); ?></h4>
                        <?php elseif($bill->bill_type == 'invoice'): ?>
                        <h4><?php echo e(cleanLang(__('lang.invoice_terms'))); ?></h4>
                        <?php elseif($bill->bill_type == 'amc-invoice'): ?>
                        <h4><?php echo e(cleanLang(__('lang.amc_invoice_terms'))); ?></h4>
                        <?php else: ?>
                        <h4><?php echo e(cleanLang(__('lang.estimate_terms'))); ?></h4>
                        <?php endif; ?>
                        <textarea class="form-control form-control-sm tinymce-textarea" rows="3" name="bill_terms" id="bill_terms"><?php echo clean($bill->bill_terms); ?></textarea>
                    </div>
                    <!--client - make a payment button-->
                    <div class="text-right p-t-25">
                        <?php if($bill->bill_type == 'proforma-invoice'): ?>
                        <!--cancel-->
                        <a class="btn btn-secondary btn-sm" href="<?php echo e(url('/proforma-invoices/' . $bill->bill_invoiceid)); ?>"><?php echo app('translator')->get('lang.exit_editing_mode'); ?></a>
                        <!--save changes-->
                        <button class="btn btn-danger btn-sm" data-url="<?php echo e(url('/proforma-invoices/' . $bill->bill_proforma_invoiceid . '/edit-invoice')); ?>" data-type="form" data-form-id="bill-form-container"
                            data-ajax-type="post" id="billing-save-button">
                            <?php echo app('translator')->get('lang.save_changes'); ?>
                        </button>
                        <?php elseif($bill->bill_type == 'invoice'): ?>
                        <!--cancel-->
                        <a class="btn btn-secondary btn-sm" href="<?php echo e(url('/invoices/' . $bill->bill_invoiceid)); ?>"><?php echo app('translator')->get('lang.exit_editing_mode'); ?></a>
                        <!--save changes-->
                        <button class="btn btn-danger btn-sm" data-url="<?php echo e(url('/invoices/' . $bill->bill_invoiceid . '/edit-invoice')); ?>" data-type="form" data-form-id="bill-form-container"
                            data-ajax-type="post" id="billing-save-button">
                            <?php echo app('translator')->get('lang.save_changes'); ?>
                        </button>
                        <?php elseif($bill->bill_type == 'amc-invoice'): ?>
                        <!--cancel-->
                        <a class="btn btn-secondary btn-sm" href="<?php echo e(url('/amc-invoices/' . $bill->bill_amc_invoiceid)); ?>"><?php echo app('translator')->get('lang.exit_editing_mode'); ?></a>
                        <!--save changes-->
                        <button class="btn btn-danger btn-sm" data-url="<?php echo e(url('/amc-invoices/' . $bill->bill_amc_invoiceid . '/edit-invoice')); ?>" data-type="form" data-form-id="bill-form-container"
                            data-ajax-type="post" id="billing-save-button">
                            <?php echo app('translator')->get('lang.save_changes'); ?>
                        </button>
                        <?php else: ?>
                        <a class="btn btn-secondary btn-sm billing-mode-only-item" href="<?php echo e(url('/estimates/' . $bill->bill_estimateid)); ?>"><?php echo app('translator')->get('lang.exit_editing_mode'); ?></a>
                        <!--save changes-->
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" data-url="<?php echo e(url('/estimates/' . $bill->bill_estimateid . '/edit-estimate?estimate_mode=' . request('estimate_mode'))); ?>"
                            data-type="form" data-form-id="bill-form-container" data-ajax-type="post" data-loading-target="documents-side-panel-billing-content" data-loading-class="loading"
                            id="billing-save-button">
                            <?php echo app('translator')->get('lang.save_changes'); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>

        <!--ADMIN ONLY NOTES-->
        <?php if(auth()->check() && auth()->user()->is_team && !config('visibility.public_bill_viewing')): ?>
        <?php if(config('visibility.bill_mode') == 'viewing'): ?>
        <div class="card card-body invoice-wrapper box-shadow billing-mode-only-item billing-mode-only-item" id="invoice-wrapper">
            <div class="d-flex flex-row justify-content-between">
                <h4 class=""><?php echo e(cleanLang(__('lang.description'))); ?> <span class="align-middle text-themecontrast font-16" data-toggle="tooltip"
                        title="<?php echo e(cleanLang(__('lang.not_visisble_to_client'))); ?>" data-placement="top"><i class="ti-info-alt"></i></span></h4>

                <?php if($bill->bill_type == 'proforma-invoice'): ?>
                <a data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.download'))); ?>" id="proformaInvoiceDownloadButton"
                    href="<?php echo e(url('/proforma-invoices/view/' . $bill->bill_uniqueid . '/description')); ?>" class="estimate-actions-button btn btn-outline-green waves-effect waves-dark" download>
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </a>
                <?php elseif($bill->bill_type == 'amc-invoice'): ?>
                <a data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.download'))); ?>" id="proformaInvoiceDownloadButton"
                    href="<?php echo e(url('/amc-invoices/view/' . $bill->bill_uniqueid . '/description')); ?>" class="estimate-actions-button btn btn-outline-green waves-effect waves-dark" download>
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </a>
                <?php elseif($bill->bill_type == 'invoice'): ?>
                <a data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.download'))); ?>" id="invoiceDownloadButton" href="<?php echo e(url('/invoices/view/' . $bill->bill_uniqueid . '/description')); ?>"
                    class="estimate-actions-button btn btn-outline-green waves-effect waves-dark" download>
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </a>
                <?php else: ?>
                <a data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.download'))); ?>" id="estimateDownloadButton" href="<?php echo e(url('/estimates/view/' . $bill->bill_uniqueid . '/description')); ?>"
                    class="estimate-actions-button btn btn-outline-green waves-effect waves-dark" download>
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </a>
                <?php endif; ?>


            </div>
            <div><?php echo $bill->bill_notes; ?></div>
        </div>
        <?php endif; ?>
        <?php if(config('visibility.bill_mode') == 'editing'): ?>
        <div class="card card-body invoice-wrapper box-shadow billing-mode-only-item" id="invoice-wrapper">
            <h4 class=""><?php echo e(cleanLang(__('lang.description'))); ?> <span class="align-middle text-themecontrast font-16" data-toggle="tooltip"
                    title="<?php echo e(cleanLang(__('lang.not_visisble_to_client'))); ?>" data-placement="top"><i class="ti-info-alt"></i></span></h4>
            <div>
                <textarea class="form-control form-control-sm tinymce-textarea-description" rows="3" name="bill_notes" id="bill_notes"><?php echo e($bill->bill_notes); ?></textarea>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>

        <!--INVOICE LOGIC-->
        <?php if(config('visibility.bill_mode') == 'editing'): ?>
        <?php echo $__env->make('pages.bill.components.elements.logic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </div>


    <!--ELEMENTS (invoice line item)-->
    <?php if(config('visibility.bill_mode') == 'editing'): ?>
    <table class="hidden" id="billing-line-template-plain">
        <?php echo $__env->make('pages.bill.components.elements.line-plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </table>
    <table class="hidden" id="billing-estimation-notes-template">
        <?php echo $__env->make('pages.bill.components.elements.line-estimation-notes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </table>
    <table class="hidden" id="billing-line-template-time">
        <?php echo $__env->make('pages.bill.components.elements.line-time', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </table>
    <table class="hidden" id="billing-line-template-dimensions">
        <?php echo $__env->make('pages.bill.components.elements.line-dimensions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </table>

    <!--MODALS-->
    <?php echo $__env->make('pages.bill.components.modals.items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.bill.components.modals.category-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.bill.components.modals.expenses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.bill.components.timebilling.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--[DYNAMIC INLINE SCRIPT] - Get lavarel objects and convert to javascript onject-->
    <script>
        $(document).ready(function() {
            NXINVOICE.DATA.INVOICE = $.parseJSON('<?php echo $bill->json; ?>');
            NXINVOICE.DOM.domState();
        });
    </script>
    <?php endif; ?><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/bill-web.blade.php ENDPATH**/ ?>