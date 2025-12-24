<!--cover image-->
<div class="card-cover-image-wrapper hidden" id="card-cover-image-wrapper">
    <span class="cover-image-remove-button hidden">
        <button type="button" id="remove-cover-image-button" data-progress-bar="hidden" data-id="<?php echo e($lead->lead_id); ?>"
            data-url="<?php echo e(url('/leads/'.$lead->lead_id.'/remove-cover-image')); ?>"
            class="btn btn-outline-secondary btn-sm js-remove-cover-image remove-cover-image-button"><?php echo app('translator')->get('lang.remove_cover'); ?></button>
    </span>
    <div class="card-cover-image-container fancybox" id="card-cover-image-container"
        href="<?php echo e(url('storage/files/'. $lead->lead_cover_image_uniqueid .'/'. $lead->lead_cover_image_filename)); ?>" <?php echo runtimeCoverImage($lead->lead_cover_image_uniqueid, $lead->lead_cover_image_filename); ?>>

    </div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/lead/cover.blade.php ENDPATH**/ ?>