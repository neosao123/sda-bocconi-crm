<div class="x-file-attachment" id="file_attachment_<?php echo e($file->file_uniqueid); ?>">
    <a href="<?php echo e(url('storage/files/'.$file->file_directory.'/'.$file->file_filename)); ?>" download><span
            class="x-extension"><i class="ti-clip"></i></span>
        <span class="x-file-name"><?php echo e(str_limit($file->file_filename ?? '---', 17)); ?></span>
    </a>
    <?php if(config('visibility.bill_attachments_delete_button')): ?>
    <span class="x-delete" id="delete-bill-file-attachment" data-parent="file_attachment_<?php echo e($file->file_uniqueid); ?>"
        data-progress-bar="hidden"
        data-url="<?php echo e(url(config('bill.url_end_point').'/delete-attachment?file_uniqueid='.$file->file_uniqueid)); ?>"><i
            class="sl-icon-close"></i></span>
    <?php endif; ?>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/attachment.blade.php ENDPATH**/ ?>