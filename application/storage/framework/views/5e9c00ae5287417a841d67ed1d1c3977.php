
<?php $__env->startSection('settings-page'); ?>
<!--settings-->
<form class="form" id="settingsFormSubscriptions">



        
<div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-body">


    <!--form text tem-->
    <div class="form-group row">
        <label class="col-12 control-label col-form-label"><?php echo e(cleanLang(__('lang.subscription_prefix'))); ?></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="settings_subscriptions_prefix"
                name="settings_subscriptions_prefix" value="<?php echo e($settings->settings_subscriptions_prefix ?? ''); ?>">
        </div>
    </div>

    <!--buttons-->
    </div>
                  <div class="card-footer">
                 
                
    <div class="text-right">
        <button type="submit" id="commonModalSubmitButton" class="btn btn-rounded-x btn-danger waves-effect text-left"
            data-url="/settings/subscriptions" data-loading-target="" data-ajax-type="PUT" data-type="form"
            data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
    </div>
                  </div>
                </div>
            </div>
</div>
</form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/subscriptions/page.blade.php ENDPATH**/ ?>