<!--no reminder-->
<div class="reminders-existing-show <?php echo e($reminder->reminder_status); ?>" id="reminders-existing-show">
   
    <div class="x-splash"><ion-icon name="alarm-outline"></ion-icon></div>
    <div class="x-time"><?php echo e(runtimeTime($reminder->reminder_datetime)); ?></div>
    <div class="x-date"><?php echo e(runtimeDate($reminder->reminder_datetime)); ?></div>
    <div class="x-title"><?php echo e($reminder->reminder_title); ?></div>
    <?php if($reminder->reminder_notes != ''): ?>
    <div class="x-notes"><?php echo e($reminder->reminder_notes); ?></div>
    <?php endif; ?>
    <div class="x-buttons">
        <button type="button" class="btn btn-rounded-x btn-default btn-sm ajax-request" 
            data-loading-class="loading-before-centre"
            data-loading-target="card-reminders-container"
            data-url="<?php echo e(url('reminders/edit?&resource_type='.$payload['resource_type'].'&resource_id='.$payload['resource_id'].'&reminder_id='.$reminder->reminder_id)); ?>"
            id="card-a-reminder-button-see-notes"><?php echo app('translator')->get('lang.edit'); ?></button>
        <button type="button" class="btn btn-rounded-x btn-danger btn-sm ajax-request"  
            data-loading-class="loading-before-centre"
            data-loading-target="card-reminders-container"
            data-url="<?php echo e(url('reminders/delete?resource_type='.$payload['resource_type'].'&resource_id='.$payload['resource_id'].'&reminder_id='.$reminder->reminder_id)); ?>"
            id="card-a-reminder-button-delete"><?php echo app('translator')->get('lang.delete'); ?></button>
    </div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/reminders/misc/show.blade.php ENDPATH**/ ?>