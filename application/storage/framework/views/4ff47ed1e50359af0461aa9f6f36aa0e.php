<?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="priority_<?php echo e($priority->taskpriority_id); ?>">
    <td class="priority_col_date">
        <span class="mdi mdi-drag-vertical cursor-pointer"></span>
        <!--sorting data-->
        <input type="hidden" name="sort-priorities[<?php echo e($priority->taskpriority_id); ?>]" value="<?php echo e($priority->taskpriority_id); ?>">
        <?php echo e(runtimeLang($priority->taskpriority_title)); ?>

        <!--system initial stage-->
        <?php if($priority->taskpriority_system_default == 'yes' && $priority->taskpriority_id == 1): ?>
        <span class="sl-icon-star text-warning p-l-5" data-toggle="tooltip"
            title="<?php echo e(cleanLang(__('lang.required_system_priority'))); ?>"></span>
        <span class="label label-light-info label-rounded"><?php echo e(cleanLang(__('lang.default_priority'))); ?></span>

        <?php endif; ?>
    </td>
    <td class="priority_col_count"><?php echo e($priority->count_tasks); ?></td>
    <td class="priority_col_color"><span class="bg-<?php echo e($priority->taskpriority_color); ?>" id="fx-settimgs-tasks-priority">&nbsp;</span>
    </td>
    <td class="priority_col_created_by">
        <img src="<?php echo e(getUsersAvatar($priority->avatar_directory, $priority->avatar_filename, $priority->taskpriority_creatorid)); ?>" alt="user"
            class="img-circle avatar-xsmall">
            <?php echo e(checkUsersName($priority->first_name, $priority->taskpriority_creatorid)); ?>

        </td>
    <td class="priority_col_action actions_column">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit" >
            <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                class="data-toggle-tooltip data-toggle-tooltip btn btn-outline-success sl-icon-note-border  btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                data-url="<?php echo e(url('/settings/tasks/priorities/'.$priority->taskpriority_id.'/edit')); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo e(cleanLang(__('lang.edit_task_priority'))); ?>"
                data-action-url="<?php echo e(url('/settings/tasks/priorities/'.$priority->taskpriority_id)); ?>" data-action-method="PUT"
                data-action-ajax-class="" data-action-ajax-loading-target="priority-td-container">
                <i class="sl-icon-note"></i>
            </button>
            <button type="button" title="<?php echo e(cleanLang(__('lang.move'))); ?>"
                class="data-toggle-tooltip data-toggle-tooltip btn btn-outline-warning btn-circle sl-icon-share-alt-border btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal" title="<?php echo e(cleanLang(__('lang.move'))); ?>"
                data-url="<?php echo e(url('/settings/tasks/move/priority/'.$priority->taskpriority_id)); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo app('translator')->get('lang.move_tasks'); ?>"
                data-action-url="<?php echo e(url('/settings/tasks/move/priority/'.$priority->taskpriority_id)); ?>" data-action-method="PUT"
                data-action-ajax-class="js-ajax-ux-request" data-action-ajax-loading-target="commonModalBody" >
                <ion-icon name="share-social-outline" class="sharer"></ion-icon>

            </button>
            <?php if($priority->taskpriority_system_default == 'no'): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>" class="data-toggle-action-tooltip btn sl-icon-trash-border btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.delete_task_priority'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                data-ajax-type="DELETE" data-url="<?php echo e(url('/')); ?>/settings/tasks/priorities/<?php echo e($priority->taskpriority_id); ?>" >
                <i class="bi bi-trash3 trash"></i>

            </button>
            <?php else: ?>
            <!--optionally show disabled button?-->
            <span class="btn btn-outline-default btn-circle btn-sm disabled <?php echo e(runtimePlaceholdeActionsButtons()); ?>"
                data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.actions_not_available'))); ?>"><i class="sl-icon-trash" ></i></span>
            <?php endif; ?>
        </span>
        <!--action button-->
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/tasks/priorities/ajax.blade.php ENDPATH**/ ?>