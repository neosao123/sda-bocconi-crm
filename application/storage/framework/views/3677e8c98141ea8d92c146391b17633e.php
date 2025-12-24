
<?php $__env->startSection('settings-page'); ?>
<!--settings-->
<form class="form">
        
<div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-body">
    <!--settings2_file_bulk_download-->
    <div class="form-group row">
        <label class="col-sm-12 text-left control-label col-form-label"><?php echo app('translator')->get('lang.bulk_file_download'); ?></label>
        <div class="col-sm-12">
            <select class="select2-basic form-control form-control-sm select2-preselected"
                id="settings2_file_bulk_download" name="settings2_file_bulk_download"
                data-preselected="<?php echo e($settings->settings2_file_bulk_download ?? ''); ?>">
                <option value="enabled"><?php echo app('translator')->get('lang.enabled'); ?></option>
                <option value="disabled"><?php echo app('translator')->get('lang.disabled'); ?></option>
            </select>
        </div>
    </div>


    <!--buttons-->
    </div>
                  <div class="card-footer">
                 
                
    <div class="text-right">
        <button type="submit" id="commonModalSubmitButton"
            class="btn btn-rounded-x btn-danger waves-effect text-left js-ajax-ux-request"
            data-url="/settings/files/general" data-loading-target="" data-ajax-type="PUT" data-type="form"
            data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
    </div>
                  </div>
                </div>
            </div>
</div>
</form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/files/general.blade.php ENDPATH**/ ?>