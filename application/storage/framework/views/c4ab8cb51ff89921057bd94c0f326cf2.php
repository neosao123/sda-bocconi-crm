<select name="assigned" id="assigned"
    class="form-control form-control-sm select2-basic select2-multiple select2-tags select2-hidden-accessible"
    multiple="multiple" tabindex="-1" aria-hidden="true">
    <!--array of currently assigned-->
    <?php if(isset($assigned)): ?>
    <?php $__currentLoopData = $assigned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $users[] = $user->id; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!--users list-->
    <?php $__currentLoopData = config('system.team_members'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($user->id); ?>" <?php echo e(runtimePreselectedInArray($user->id ?? '', $users ?? [])); ?>><?php echo e($user->full_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--/#users list-->
</select>

<div class="alert alert-info m-t-40">
    <h5 class="text-info"><i class="sl-icon-info"></i> <?php echo app('translator')->get('lang.info'); ?></h5><?php echo app('translator')->get('lang.leads_assigned_info'); ?>
</div>

<!--form buttons-->
<div class="text-right p-t-30">
    <button type="submit" id="submitButton" class="btn btn-danger waves-effect text-left ajax-request" 
        data-url="<?php echo e(url('settings/webforms/'.$webform->webform_id.'/assigned')); ?>"
        data-loading-target="actionsModalBody" 
        data-ajax-type="POST" 
        data-type="form" 
        data-form-id="actionsModalBody" 
        data-on-start-submit-button="disable">Submit~</button>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/webforms/modals/assigned.blade.php ENDPATH**/ ?>