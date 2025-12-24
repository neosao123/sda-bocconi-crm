<div class="form-group row m-b-50 m-t-20">
    <div class="col-sm-12">
        <select class="select2-basic form-control form-control-sm select2-preselected" id="status" name="status"
            data-preselected="1">
            <!--statuses-->
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($status->leadstatus_id); ?>">
                <?php echo e($status->leadstatus_title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

    </div>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/leads/components/modals/change-status.blade.php ENDPATH**/ ?>