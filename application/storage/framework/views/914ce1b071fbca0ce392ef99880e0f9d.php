<div class="form-group row">
    <label for="example-month-input" class="col-12 col-form-label text-left">Status</label>
    <div class="col-sm-12">
        <select class="select2-basic form-control form-control-sm" id="lead_status" name="lead_status">
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($status->leadstatus_id); ?>"
                <?php echo e(runtimePreselected($lead->lead_status ?? '', $status->leadstatus_id)); ?>><?php echo e(runtimeLang($status->leadstatus_title)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/leads/components/actions/change-status.blade.php ENDPATH**/ ?>