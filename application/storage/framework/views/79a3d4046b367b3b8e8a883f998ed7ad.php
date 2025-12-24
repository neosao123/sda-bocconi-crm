<!--modal-->

<div class="row" id="js-trigger-clients-modal-add-edit" data-payload="<?php echo e($page['section'] ?? ''); ?>">
    <div class="col-lg-12">

        <?php if(isset($page['section']) && $page['section'] == 'edit' && auth()->user()->is_team): ?>

        <div class="client-selector-container" id="client-existing-container">
            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.client'))); ?>*</label>
                <div class="col-sm-12 col-lg-9">
                    <!--select2 basic search-->
                    <select name="workorder_clientid" id="workorder_clientid" class="clients_and_quotation_toggle form-control form-control-sm js-select2-basic-search-modal select2-hidden-accessible"
                        data-quotation-dropdown="workorder_quotation" data-feed-request-type="clients_quotation" data-ajax--url="<?php echo e(url('/')); ?>/feed/company_names">
                        <?php if(isset($workorder->client)): ?>
                        <option value="<?php echo e($workorder->client->client_id); ?>"><?php echo e($workorder->client->client_company_name); ?></option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.quotation'))); ?>*</label>
                <div class="col-sm-12 col-lg-9">
                    <select class="select2-basic form-control form-control-sm dynamic_workorder_quotation" data-allow-clear="true" id="workorder_quotation" name="workorder_quotation"
                        <?php if(isset($workorder->estimate) && isset($workorder->client) && $workorder->client->client_id): ?> "" <?php else: ?> disabled <?php endif; ?>>
                        <?php if(isset($workorder->estimate) && isset($workorder->client) && $workorder->client->client_id): ?>
                        <?php $__currentLoopData = $quotationbyclient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->bill_estimateid); ?>" <?php echo e($value->bill_estimateid === $workorder->estimate->bill_estimateid ? 'selected' : ''); ?>><?php echo e($value->formatted_bill_estimateid); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!--contact section-->
        <?php if(isset($page['section']) && $page['section'] == 'create'): ?>
        <div class="client-selector-container" id="client-existing-container">
            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label  required"><?php echo e(cleanLang(__('lang.client'))); ?>*</label>
                <div class="col-sm-12 col-lg-9">
                    <!--select2 basic search-->
                    <select name="workorder_clientid" id="workorder_clientid" class="clients_and_quotation_toggle form-control form-control-sm js-select2-basic-search-modal select2-hidden-accessible"
                        data-quotation-dropdown="workorder_quotation" data-feed-request-type="clients_quotation" data-ajax--url="<?php echo e(url('/')); ?>/feed/company_names">
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.quotation'))); ?>*</label>
                <div class="col-sm-12 col-lg-9">
                    <select class="select2-basic form-control form-control-sm dynamic_workorder_quotation" data-allow-clear="true" id="workorder_quotation" name="workorder_quotation" disabled>
                    </select>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.date'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm pickadate" autocomplete="off" name="workorder_date" value="<?php echo e(runtimeDatepickerDate($workorder->workorder_date ?? '')); ?>">
                <input class="mysql-date" type="hidden" name="workorder_date" id="workorder_date" value="<?php echo e($workorder->workorder_date ?? ''); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.project_requirement'))); ?></label>
            <div class="col-sm-12">
                <textarea class="form-control form-control-sm tinymce-textarea " rows="3" name="workorder_project_requirement" id="workorder_project_requirement"><?php echo e($workorder->workorder_requirements ?? ''); ?></textarea>
            </div>
        </div>

        <?php if(isset($page['section']) && $page['section'] == 'create'): ?>
        <div class="form-group row">
            <label class="col-12 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.project_requirement_file'))); ?></label>
            <div class="col-12 x-file-attachment" style="display: none">
                <div class="workorder-file-attachment">
                    <a><span class="x-extension"><i class="ti-clip"></i></span>
                        <span class="x-file-name uploaded-file-name"></span>
                    </a>
                    <span class="x-delete remove-file-btn" id="delete-bill-file-attachment"><i class="sl-icon-close"></i></span>
                </div>
            </div>
            <div class="col-12 workorder-file-attachments-wrapper" id="workorder-file-attachments-wrapper">
                <div class="x-add-file-button">
                    <button type="button" id="workorder-file-attachments-upload-button" class="btn waves-effect waves-light btn-rounded btn-xs btn-danger"><?php echo app('translator')->get('lang.add_file_attachments'); ?></button>
                </div>
            </div>
            <div class="col-12" id="workorder-file-attachments-dropzone-wrapper" style="display: none;">
                <div class="dropzone dz-clickable text-center file-upload-box import-workorder-files-upload">
                    <div class="dz-default dz-message">
                        <div>
                            <h4>Drop a single file or click to upload</h4>
                        </div>
                        <div>
                            <h6>(PDF)</h6>
                        </div>
                    </div>
                    <button type="button" class="close" id="workorder-file-attachments-close-button" style="
            position: absolute;
            top:5%;
            right:3%;
            ">
                        <i class="bi bi-x-circle"></i>
                    </button>
                    <input type="hidden" id="importing-file-name" name="importing-file-name">
                    <input type="hidden" id="importing-file-uniqueid" name="importing-file-uniqueid">
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(isset($page['section']) && $page['section'] == 'edit' && auth()->user()->is_team): ?>
        <div class="form-group row">
            <label class="col-12 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.project_requirement_file'))); ?></label>
            <div class="col-12 x-file-attachment" <?php if($workorder->workorder_requirement_attachments): ?> style="display: block;" <?php else: ?> style="display: none;" <?php endif; ?>>
                <div class="<?php echo e($workorder->workorder_requirement_attachments ? 'workorder-downloadable-file-attachment' : 'workorder-file-attachment'); ?>">
                    <?php if($workorder->workorder_requirement_attachments): ?>
                    <a target="_blank" href="<?php echo e($workorder->workorder_requirement_attachments ? url($workorder->workorder_requirement_attachments) : ''); ?>"
                        download="<?php echo e($workorder->workorder_requirement_attachments ? basename($workorder->workorder_requirement_attachments) : ''); ?>"><span class="x-extension"><i
                                class="ti-clip"></i></span>
                        <span class="x-file-name uploaded-file-name"><?php echo e($workorder->workorder_requirement_attachments ? str_limit(basename($workorder->workorder_requirement_attachments), 50) : ''); ?></span>
                    </a>
                    <?php else: ?>
                    <a><span class="x-extension"><i class="ti-clip"></i></span>
                        <span class="x-file-name uploaded-file-name"></span>
                    </a>
                    <?php endif; ?>
                    <span class="x-delete remove-file-btn" data-file-url="<?php echo e($workorder->workorder_requirement_attachments ?? ''); ?>" data-workorder-id="<?php echo e($workorder->workorder_id); ?>"
                        id="delete-bill-file-attachment"><i class="sl-icon-close"></i></span>
                </div>
            </div>
            <div class="col-12 workorder-file-attachments-wrapper" id="workorder-file-attachments-wrapper" <?php if($workorder->workorder_requirement_attachments): ?> style="display: none;" <?php else: ?> style="display: block;" <?php endif; ?>>
                <div class="x-add-file-button">
                    <button type="button" id="workorder-file-attachments-upload-button" class="btn waves-effect waves-light btn-rounded btn-xs btn-danger"><?php echo app('translator')->get('lang.add_file_attachments'); ?></button>
                </div>
            </div>
            <div class="col-12" id="workorder-file-attachments-dropzone-wrapper" style="display: none;">
                <div class="dropzone dz-clickable text-center file-upload-box import-workorder-files-upload">
                    <div class="dz-default dz-message">
                        <div>
                            <h4>Drop a single file or click to upload</h4>
                        </div>
                        <div>
                            <h6>(PDF)</h6>
                        </div>
                    </div>
                    <button type="button" class="close" id="workorder-file-attachments-close-button" style="
            position: absolute;
            top:5%;
            right:3%;
            ">
                        <i class="bi bi-x-circle"></i>
                    </button>
                    <input type="hidden" id="importing-file-name" name="importing-file-name">
                    <input type="hidden" id="importing-file-uniqueid" name="importing-file-uniqueid">
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!--notes-->
        <div class="row">
            <div class="col-12">
                <div><small><strong>* <?php echo e(cleanLang(__('lang.required'))); ?></strong></small></div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/workorder/components/modals/add-edit-inc.blade.php ENDPATH**/ ?>