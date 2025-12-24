
<?php $__env->startSection('settings-page'); ?>
<!--settings-->
<form class="form">
        
<div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-body">
    <!--form checkbox item-->
    <div class="form-group form-group-checkbox row">
        <label class="col-10 col-form-label"><?php echo e(cleanLang(__('lang.mark_estimates_as_billable_by_default'))); ?></label>
        <div class="col-2 p-t-5">
            <input type="checkbox" id="settings_expenses_billable_by_default"
                name="settings_expenses_billable_by_default" class="filled-in chk-col-light-blue"
                <?php echo e(runtimePrechecked($settings['settings_expenses_billable_by_default'] ?? '')); ?>>
            <label for="settings_expenses_billable_by_default"></label>
        </div>
    </div>
    <!--buttons-->

    </div>
                  <div class="card-footer">
                 
                
    <div class="text-right">
        <button type="submit" id="commonModalSubmitButton"
            class="btn btn-rounded-x btn-danger waves-effect text-left js-ajax-ux-request" data-url="/settings/expenses"
            data-loading-target="" data-ajax-type="PUT" data-type="form"
            data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
    </div>

                  </div>
                </div>
            </div>
</div>
</form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/settings/sections/expenses/page.blade.php ENDPATH**/ ?>