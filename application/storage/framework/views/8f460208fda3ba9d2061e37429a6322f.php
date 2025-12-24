
<?php $__env->startSection('settings-page'); ?>
<!--settings-->
<form class="form">
        
<div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-body">
    <div class="form-group form-group-checkbox row">
        <label class="col-4 col-form-label"><?php echo e(cleanLang(__('lang.allow_user_tags'))); ?></label>
        <div class="col-8 p-t-5">
            <input type="checkbox" id="settings_tags_allow_users_create" name="settings_tags_allow_users_create"
                class="filled-in chk-col-light-blue"
                <?php echo e(runtimePrechecked($settings['settings_tags_allow_users_create'] ?? '')); ?>>
            <label for="settings_tags_allow_users_create"></label>
        </div>
    </div>



    </div>
                  <div class="card-footer">
                 
                
    <div class="text-right">
        <button type="submit" id="commonModalSubmitButton"
            class="btn btn-rounded-x btn-danger waves-effect text-left js-ajax-ux-request" data-url="/settings/tags"
            data-loading-target="" data-ajax-type="PUT" data-type="form"
            data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
    </div>
                  </div>
                </div>
            </div>
</div>
</form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/tags/general.blade.php ENDPATH**/ ?>