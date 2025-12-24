<div class="row" id="js-trigger-invoices-modal-add-edit" data-payload="<?php echo e($page['section'] ?? ''); ?>">
    <div class="col-lg-12">

        <!--meta data - creatd by-->
        <?php if(isset($page['section']) && $page['section'] == 'edit'): ?>
        <div class="modal-meta-data">
            <small><strong><?php echo e(cleanLang(__('lang.created_by'))); ?>:</strong> <?php echo e($proforma_invoice->first_name); ?>

                <?php echo e($proforma_invoice->last_name); ?> |
                <?php echo e(runtimeDate($proforma_invoice->bill_created)); ?></small>
        </div>
        <?php endif; ?>


        <?php if(isset($page['section']) && $page['section'] == 'create'): ?>
        <div class="client-selector">
            <div class="client-selector-container" id="client-existing-container">
                <div class="form-group row">
                    <label class="col-sm-12 col-lg-3 text-left control-label col-form-label  required"><?php echo e(cleanLang(__('lang.client'))); ?>*</label>
                    <div class="col-sm-12 col-lg-9">
                        <!--select2 basic search-->
                        <select name="proforma_invoice_clientid" id="proforma_invoice_clientid"
                            class="proforma_invoice_clients_and_quotation_toggle form-control form-control-sm js-select2-basic-search-modal select2-hidden-accessible"
                            data-quotation-dropdown="proforma_invoice_quotation" data-quotation-feed-request-type="clients_quotation" data-ajax--url="<?php echo e(url('/')); ?>/feed/company_names">
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.quotation'))); ?>*</label>
                    <div class="col-sm-12 col-lg-9">
                        <select class="select2-basic-with-search form-control form-control-sm quotation_and_workorder_toggle  dynamic_proforma_invoice_quotation"
                            data-workorder-dropdown="proforma_invoice_workorder" data-project-dropdown="proforma_invoice_project" data-project-quotation-feed-request-type="quotation_projects" data-project-client-feed-request-type="clients_projects" data-workorder-feed-request-type="quotation_workorder" data-allow-clear="true" id="proforma_invoice_quotation"
                            name="proforma_invoice_quotation" disabled>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-lg-3 text-left control-label col-form-label dynamic_proforma_invoice_workorder required"><?php echo e(cleanLang(__('lang.workorder'))); ?>*</label>
                    <div class="col-sm-12 col-lg-9">
                        <select class="select2-basic form-control form-control-sm dynamic_proforma_invoice_workorder" data-allow-clear="true" id="proforma_invoice_workorder" name="proforma_invoice_workorder" disabled></select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.project'))); ?>*</label>
                    <div class="col-sm-12 col-lg-9">
                        <select class="select2-basic form-control form-control-sm dynamic_proforma_invoice_project" data-allow-clear="true" id="proforma_invoice_project" name="proforma_invoice_project" disabled></select>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <!--invoice date-->
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.invoice_date'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control  form-control-sm pickadate" name="proforma_invoice_date" autocomplete="off"
                    value="<?php echo e(runtimeDatepickerDate($proforma_invoice->proforma_invoice_date ?? '')); ?>">
                <input class="mysql-date" type="hidden" name="proforma_invoice_date" id="proforma_invoice_date" value="<?php echo e($proforma_invoice->proforma_invoice_date ?? ''); ?>">
            </div>
        </div>

        <!--due date-->
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.due_date'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm pickadate" name="proforma_invoice_due_date" autocomplete="off"
                    value="<?php echo e(runtimeDatepickerDate($proforma_invoice->proforma_invoice_due_date ?? '')); ?>">
                <input class="mysql-date" type="hidden" name="proforma_invoice_due_date" id="proforma_invoice_due_date" value="<?php echo e($proforma_invoice->proforma_invoice_due_date ?? ''); ?>">
            </div>
        </div>

        <div class="line"></div>

        <!--otions toggle-->
        <div class="spacer row">
            <div class="col-sm-12 col-lg-8">
                <span class="title"><?php echo e(cleanLang(__('lang.additional_information'))); ?></span class="title">
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="switch  text-right">
                    <label>
                        <input type="checkbox" class="js-switch-toggle-hidden-content" data-target="edit_bill_recurring_toggle">
                        <span class="lever switch-col-light-blue"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="hidden" id="edit_bill_recurring_toggle">
            <!--tags-->
            <div class="form-group row">
                <label class="col-12 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.tags'))); ?></label>
                <div class="col-12">
                    <select name="tags" id="tags" class="form-control form-control-sm select2-multiple <?php echo e(runtimeAllowUserTags()); ?> select2-hidden-accessible" multiple="multiple" tabindex="-1"
                        aria-hidden="true">
                        <!--array of selected tags-->
                        <?php if(isset($page['section']) && $page['section'] == 'edit'): ?>
                        <?php $__currentLoopData = $invoice->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $selected_tags[] = $tag->tag_title ; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <!--/#array of selected tags-->
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tag->tag_title); ?>" <?php echo e(runtimePreselectedInArray($tag->tag_title ?? '', $selected_tags ?? [])); ?>>
                            <?php echo e($tag->tag_title); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <!-- notes-->
            <div class="form-group row">
                <label class="col-12 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.notes'))); ?></label>
                <div class="col-12">
                    <textarea id="proforma_invoice_notes" name="proforma_invoice_notes" class="tinymce-textarea"><?php echo e($proforma_invoice->proforma_invoice_notes ?? ''); ?></textarea>
                </div>
            </div>


            <!-- terms-->
            <!-- <div class="form-group row">
                <label class="col-12 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.terms_and_conditions'))); ?></label>
                <div class="col-12">
                    <textarea id="proforma_invoice_terms" name="proforma_invoice_terms" class="tinymce-textarea">
                        <?php if(isset($page['section']) && $page['section'] == 'create'): ?>
                        <?php echo e(config('system.settings_invoices_default_terms_conditions')); ?>

                        <?php else: ?>
                        <?php echo e($proforma_invoice->proforma_invoice_terms ?? ''); ?>

                        <?php endif; ?>                 
                    </textarea>
                </div>
            </div> -->
        </div>
        <!--/#options toggle-->



        <!--source-->
        <input type="hidden" name="source" value="<?php echo e(request('source')); ?>">

        <!--expenses payload-->
        <?php if(config('visibility.invoice_modal_expenses_payload')): ?>
        <input type="hidden" name="expense_payload[]" value="<?php echo e(config('settings.expense_id')); ?>">
        <?php endif; ?>

        <!--notes-->
        <div class="row">
            <div class="col-12">
                <div><small><strong>* <?php echo e(cleanLang(__('lang.required'))); ?></strong></small></div>
            </div>
        </div>


    </div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/proforma-invoices/components/modals/add-edit-inc.blade.php ENDPATH**/ ?>