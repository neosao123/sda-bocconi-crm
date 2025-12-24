<!--users-->
<div class="form-group row">
    <label class="col-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.user'); ?></label>
    <div class="col-12">
        <select class="select2-basic form-control form-control-sm select2-preselected" id="user_id"
            name="user_id">
            <option></option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/clients/components/modals/change-owner.blade.php ENDPATH**/ ?>