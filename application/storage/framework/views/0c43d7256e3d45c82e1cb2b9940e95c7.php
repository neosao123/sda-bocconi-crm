<div class="row">
    <div class="col-lg-12">


        <!--client-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label  required"><?php echo e(cleanLang(__('lang.client'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <!--select2 basic search-->
                <select name="project_clientid" id="project_clientid"
                    class="form-control form-control-sm js-select2-basic-search select2-hidden-accessible"
                    data-ajax--url="<?php echo e(url('/')); ?>/feed/company_names">
                </select>
            </div>
        </div>

        <!--title<>-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.project_title'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm" id="project_title" name="project_title"
                    placeholder="" value="<?php echo e($project->project_title ?? ''); ?>">
            </div>
        </div>

        <!--start date-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.start_date'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control  form-control-sm pickadate" name="project_date_start"
                    autocomplete="off" value="<?php echo e(runtimeDatepickerDate(now())); ?>">
                <input class="mysql-date" type="hidden" name="project_date_start" id="project_date_start"
                    value="<?php echo e(now()); ?>">
            </div>
        </div>

        <!--due date-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.deadline'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm pickadate" name="project_date_due"
                    autocomplete="off" value="">
                <input class="mysql-date" type="hidden" name="project_date_due" id="project_date_due"
                    value="">
            </div>
        </div>

        <!--tags-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.tags'))); ?></label>
            <div class="col-sm-12 col-lg-9">
                <select name="tags" id="tags"
                    class="form-control form-control-sm select2-multiple <?php echo e(runtimeAllowUserTags()); ?> select2-hidden-accessible"
                    multiple="multiple" tabindex="-1" aria-hidden="true">
                    <!--array of selected tags-->
                    <?php $__currentLoopData = $project->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $selected_tags[] = $tag->tag_title ; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--/#array of selected tags-->
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tag->tag_title); ?>"
                        <?php echo e(runtimePreselectedInArray($tag->tag_title ?? '', $selected_tags  ?? [])); ?>>
                        <?php echo e($tag->tag_title); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <!--/#tags-->
        <!--project category-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label  required"><?php echo e(cleanLang(__('lang.category'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <select class="select2-basic form-control form-control-sm" id="project_categoryid"
                    name="project_categoryid">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->category_id); ?>"
                        <?php echo e(runtimePreselected($project->project_categoryid ?? '', $category->category_id)); ?>><?php echo e(runtimeLang($category->category_name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="line"></div>

        <!--copy items-->
        <h5 class="p-b-10"><?php echo app('translator')->get('lang.copy_these_items'); ?></h5>
        <!--milestones-->
        <div class="form-group form-group-checkbox row">
            <div class="col-12 p-t-5">
                <input type="checkbox" id="copy_milestones" name="copy_milestones" class="filled-in chk-col-light-blue">
                <label class="p-l-30" for="copy_milestones"><?php echo app('translator')->get('lang.milestones'); ?></label>
            </div>
        </div>

        <!--tasks-->
        <div class="form-group form-group-checkbox row">
            <div class="col-12 p-t-5">
                <input type="checkbox" id="copy_tasks" name="copy_tasks" class="filled-in chk-col-light-blue">
                <label class="p-l-30" for="copy_tasks"><?php echo app('translator')->get('lang.tasks'); ?></label>
            </div>
        </div>

        <!--task options-->
        <div class="highlighted-panel hidden" id="clone_project_task_options">
            <div class="form-group form-group-checkbox row">
                <div class="col-12 p-t-5">
                    <input type="checkbox" id="copy_tasks_files" name="copy_tasks_files" class="filled-in chk-col-light-blue">
                    <label class="p-l-30" for="copy_tasks_files"><?php echo app('translator')->get('lang.copy_task_file'); ?>  (<?php echo app('translator')->get('lang.uploaded_by_team_members'); ?>)</label>
                </div>
            </div>
            <div class="form-group form-group-checkbox row">
                <div class="col-12 p-t-5">
                    <input type="checkbox" id="copy_tasks_checklist" name="copy_tasks_checklist" class="filled-in chk-col-light-blue">
                    <label class="p-l-30" for="copy_tasks_checklist"><?php echo app('translator')->get('lang.copy_task_checklist'); ?></label>
                </div>
            </div>
        </div>

        <!--invoices-->
        <div class="form-group form-group-checkbox row">
            <div class="col-12 p-t-5">
                <input type="checkbox" id="copy_invoices" name="copy_invoices" class="filled-in chk-col-light-blue">
                <label class="p-l-30" for="copy_invoices"><?php echo app('translator')->get('lang.invoices'); ?></label>
            </div>
        </div>

        <!--estimates-->
        <div class="form-group form-group-checkbox row">
            <div class="col-12 p-t-5">
                <input type="checkbox" id="copy_estimates" name="copy_estimates" class="filled-in chk-col-light-blue">
                <label class="p-l-30" for="copy_estimates"><?php echo app('translator')->get('lang.estimates'); ?></label>
            </div>
        </div>

        <!--team files-->
        <div class="form-group form-group-checkbox row">
            <div class="col-12 p-t-5">
                <input type="checkbox" id="copy_files" name="copy_files" class="filled-in chk-col-light-blue">
                <label class="p-l-30" for="copy_files"><?php echo app('translator')->get('lang.files'); ?> (<?php echo app('translator')->get('lang.uploaded_by_team_members'); ?>)</label>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/projects/components/modals/clone.blade.php ENDPATH**/ ?>