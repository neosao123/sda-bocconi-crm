<!--importing results-->
<div class="importing-step-3" id="importing-step-3">
    <div class="x-splash-image"><img src="<?php echo e(url('public/images/import-results-passed.svg')); ?>"
            alt="importing completed" /></div>
    <div class="x-splash-text">
        <h3><?php echo app('translator')->get('lang.importing_completed'); ?></h3>
    </div>
    <div class="x-splash-subtext">
        <span class="label label-rounded label-success p-r-16 p-l-16"><strong><?php echo e($count_passed); ?></strong> <?php echo app('translator')->get('lang.records_imported'); ?></span>
    </div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/import/common/passed.blade.php ENDPATH**/ ?>