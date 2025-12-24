<div class="card-a-reminder kanban-card-view <?php echo e($reminder->reminder_status); ?> m-b-10 m-t-10" id="reminder_card_view_<?php echo e($reminder->reminder_id); ?>">
    <div class="x-top clearfix">
        <div class="x-icon">
    
        <ion-icon name="alarm-outline" class="m-t--4 p-r-6"></ion-icon>
    </div>
        <div class="x-content">
            <div class="x-time"><?php echo e(runtimeTime($reminder->reminder_datetime)); ?></div>
            <div class="x-date"><?php echo e(runtimeDate($reminder->reminder_datetime)); ?></div>
        </div>
    </div>
    <div class="x-title"><?php echo e($reminder->reminder_title); ?></div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/reminders/cards/kanban.blade.php ENDPATH**/ ?>