<div class="form-group row">
    <label for="example-month-input" class="col-12 col-form-label text-left"><?php echo e(cleanLang(__('lang.move_to_this_priority'))); ?></label>
    <div class="col-sm-12">
        <select class="select2-basic form-control form-control-sm" id="tasks_priority" name="tasks_priority">
            <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($priority->taskpriority_id); ?>"><?php echo e($priority->taskpriority_title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/tasks/modals/move-priority.blade.php ENDPATH**/ ?>