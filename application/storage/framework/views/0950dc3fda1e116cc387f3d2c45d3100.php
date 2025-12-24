<!--importing results-->
<div class="importing-step-3" id="importing-step-3">
    <div class="x-splash-image"><img src="<?php echo e(url('public/images/import-results-failed.svg')); ?>"
            alt="importing completed" /></div>
    <div class="x-splash-text">
        <h3><?php echo app('translator')->get('lang.importing_failed'); ?></h3>
    </div>
    <div class="x-splash-subtext">
        <span class="label label-rounded label-danger p-r-16 p-l-16"><strong>0</strong> <?php echo app('translator')->get('lang.records_imported'); ?></span>
    </div>
    <!--see error log-->
    <div class="x-splash-failed-text p-t-15">
        <a href="#" class="js-ajax-request" data-loading-target="commonModalBody"
            data-url="<?php echo e(url('import/errorlog?ref='.$error_ref)); ?>"><?php echo app('translator')->get('lang.click_to_view_error_log'); ?></a>
    </div>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/import/common/failed.blade.php ENDPATH**/ ?>