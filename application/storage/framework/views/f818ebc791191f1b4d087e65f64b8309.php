<!--show calendar-->
<div class="calendar-show-container" id="calendar-show-container">

    <div class="modal-selector event-title p-l-40">
        <?php echo e($event['title'] ?? '---'); ?>

    </div>

    <!--date-->
    <div class="row event-details">
        <div class="col-lg-3 event-icon">
            <ion-icon name="calendar-clear-outline"></ion-icon> <span><?php echo app('translator')->get('lang.date'); ?></span>
        </div>
        <div class="col-lg-9 event-info">
            <?php echo e(runtimeDate($event['extendedProps']['start_date'])); ?> <span class="calendar-show-date-to"> - </span>
            <?php echo e(runtimeDate($event['extendedProps']['end_date'])); ?>

        </div>
    </div>

    <!--time-->
    <?php if($event['extendedProps']['all_day'] == 'no'): ?>
        <div class="row event-details">
            <div class="col-lg-3 event-icon">
                <i class="sl-icon-clock"></i> <span><?php echo app('translator')->get('lang.time'); ?></span>
            </div>
            <div class="col-lg-9 event-info">
                <?php echo e(runtimeSimpleTime($event['extendedProps']['start_time'])); ?> <span class="calendar-show-date-to"> -
                </span>
                <?php echo e(runtimeSimpleTime($event['extendedProps']['end_time'])); ?>

            </div>
        </div>
    <?php endif; ?>

    <!--creator-->
    <div class="row event-details">
        <div class="col-lg-3 event-icon">
            <ion-icon name="person-outline"></ion-icon> <span><?php echo app('translator')->get('lang.added_by'); ?></span>
        </div>
        <div class="col-lg-9 event-info">
            <?php if(isset($event['extendedProps']['creator']->first_name)): ?>
                <?php echo e($event['extendedProps']['creator']->first_name); ?> <?php echo e($event['extendedProps']['creator']->last_name); ?>

            <?php else: ?>
                ---
            <?php endif; ?>
        </div>
    </div>

    <!--type-->
    <div class="row event-details">
        <div class="col-lg-3 event-icon">
            <i class="ti-bookmark"></i> <span><?php echo app('translator')->get('lang.type'); ?></span>
        </div>
        <div class="col-lg-9 event-info">
            <?php if($event['extendedProps']['resource_type'] == 'project'): ?>
                <span class="label label-outline-success">
                    <a href="<?php echo e(url('/projects/' . $event['extendedProps']['resource_id'])); ?>">
                        <?php echo app('translator')->get('lang.project'); ?>
                    </a>
                </span>
            <?php endif; ?>

            <?php if($event['extendedProps']['resource_type'] == 'task'): ?>
                <span class="label label-outline-success">
                    <a href="<?php echo e(url('/tasks/v/' . $event['extendedProps']['resource_id'])); ?>">
                        <?php echo app('translator')->get('lang.task'); ?>
                    </a>
                </span>
            <?php endif; ?>

            <?php if($event['extendedProps']['resource_type'] == 'calendarevent'): ?>
                <span class="label label-outline-success"><?php echo app('translator')->get('lang.event'); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <!--[task] - status-->
    <?php if($event['extendedProps']['resource_type'] == 'task'): ?>
        <div class="row event-details">
            <div class="col-lg-3 event-icon">
                <i class="sl-icon-flag"></i> <span><?php echo app('translator')->get('lang.status'); ?></span>
            </div>
            <div class="col-lg-9 event-info">
                <span
                    class="label label-outline-<?php echo e($event['extendedProps']['taskstatus_color']); ?>"><?php echo e(runtimeLang($event['extendedProps']['taskstatus_title'])); ?></span>
            </div>
        </div>
    <?php endif; ?>

    <!--[task] - project title-->
    <?php if($event['extendedProps']['resource_type'] == 'task'): ?>
        <div class="row event-details">
            <div class="col-lg-3 event-icon">
                <i class="ti-folder"></i> <span><?php echo app('translator')->get('lang.project'); ?></span>
            </div>
            <div class="col-lg-9 event-info">
                <a href="<?php echo e(url('/projects/' . $event['extendedProps']['project_id'])); ?>">
                    <?php echo e($event['extendedProps']['project_title']); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>

    <!--[project] - status-->
    <?php if($event['extendedProps']['resource_type'] == 'project'): ?>
        <div class="row event-details">
            <div class="col-lg-3 event-icon">
                <i class="sl-icon-flag"></i> <span><?php echo app('translator')->get('lang.status'); ?></span>
            </div>
            <div class="col-lg-9 event-info">
                <span
                    class="label <?php echo e(runtimeProjectStatusColors($event['extendedProps']['project_status'], 'label')); ?>">
                    <?php echo e(runtimeLang($event['extendedProps']['project_status'])); ?>

                </span>
            </div>
        </div>
    <?php endif; ?>

    <!--reminder-->
    <div class="row event-details">
        <div class="col-lg-3 event-icon">
            <i class="sl-icon-bell"></i> <span><?php echo app('translator')->get('lang.reminder'); ?></span>
        </div>
        <div class="col-lg-9 event-info">
            <?php if($event['extendedProps']['reminder'] == 'yes'): ?>
                <span class="label label-outline-default"><?php echo app('translator')->get('lang.email_notification'); ?></span>
            <?php else: ?>
                ---
            <?php endif; ?>
        </div>
    </div>

    <!--users-->
    <div class="row event-details">
        <div class="col-lg-3 event-icon">
            <ion-icon name="people-outline" class="people"></ion-icon> <span><?php echo app('translator')->get('lang.users'); ?></span>
        </div>
        <div class="col-lg-9 event-info">
            <!--self-->
            <?php if($event['extendedProps']['sharing'] == 'myself'): ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-6 event-user m-b-20">
                        <img src="<?php echo e(getUsersAvatar(auth()->user()->avatar_directory, auth()->user()->avatar_filename)); ?>"
                            alt="user" class="img-circle avatar-xsmall">
                        <?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?>

                    </div>
                </div>
            <?php endif; ?>

            <!--whole team-->
            <?php if($event['extendedProps']['sharing'] == 'whole-team'): ?>
                <span class="label label-outline-info"><?php echo app('translator')->get('lang.all_team_members'); ?></span>
            <?php endif; ?>


            <!--selected users-->
            <?php if($event['extendedProps']['sharing'] == 'selected-users'): ?>
                <?php if(count($users) > 0): ?>
                    <div class="row">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-12 col-lg-6 event-user m-b-20">
                                <img src="<?php echo e(getUsersAvatar($user['avatar_directory'], $user['avatar_filename'])); ?>"
                                    alt="user" class="img-circle avatar-xsmall">
                                <?php echo e($user['name']); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <span class="label label-outline-default"><?php echo app('translator')->get('lang.no_users'); ?></span>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <!--location-->
    <div class="row event-details">
        <div class="col-lg-3 event-icon">
            <i class="sl-icon-location-pin"></i> <span><?php echo app('translator')->get('lang.location'); ?></span>
        </div>
        <div class="col-lg-9 event-info">
            <?php echo e($event['extendedProps']['location'] ?? '---'); ?>

        </div>
    </div>

    <!--details-->
    <div class="row event-details">
        <div class="col-lg-3 event-icon">
            <i class="ti-align-left"></i> <span><?php echo app('translator')->get('lang.details'); ?></span>
        </div>
        <div class="col-lg-9 event-info">
            <div class="switch  text-left">
                <label>
                    <input type="checkbox" name="more_information" id="more_information"
                        class="js-switch-toggle-hidden-content" data-target="toogle_calendar_details">
                    <span class="lever switch-col-light-blue m-l-0"></span>
                </label>
            </div>
            <!--more information-->
            <div class="hidden p-t-10" id="toogle_calendar_details">
                <?php echo $event['extendedProps']['details'] ?? '---'; ?>

            </div>
        </div>
    </div>

    <!--files-->
    <div class="row event-details">
        <div class="col-lg-3 event-icon">
            <i class="ti-clip"></i> <span><?php echo app('translator')->get('lang.files'); ?></span>
        </div>
        <div class="col-lg-9 event-info file-attachments">
            <?php if(count($event['extendedProps']['files']) == 0): ?>
                ---
            <?php endif; ?>
            <ul>
                <?php $__currentLoopData = $event['extendedProps']['files']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="event_file_<?php echo e($file['file_uniqueid']); ?>">
                        <a class="label label-rounded label-default tag" href="<?php echo e($file['file_url']); ?>"
                            download><?php echo e($file['file_name']); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

        </div>
    </div>

    <div class="text-right p-t-10 p-b-30">
        <!--close-->
        <button type="button" class="btn btn-rounded-x btn-secondary waves-effect text-left"
            data-dismiss="modal"><?php echo app('translator')->get('lang.close'); ?></button>

        <!--delete project event-->
        <?php if($event['extendedProps']['resource_type'] == 'project' && $event['extendedProps']['delete_permission']): ?>
            <a class="btn btn-danger data-toggle-action-tooltip confirm-action-danger"
                title="<?php echo e(cleanLang(__('lang.edit'))); ?>" data-confirm-title="<?php echo app('translator')->get('lang.delete_project'); ?>"
                data-confirm-text="<?php echo app('translator')->get('lang.calendar_delete_project'); ?>" data-ajax-type="DELETE"
                data-url="<?php echo e(url('/calendar/' . $event['id'] . '?resource_type=project')); ?>">
                <?php echo app('translator')->get('lang.delete_project'); ?>
            </a>
        <?php endif; ?>

        <!--delete task event-->
        <?php if($event['extendedProps']['resource_type'] == 'task' && $event['extendedProps']['delete_permission']): ?>
            <a class="btn btn-danger data-toggle-action-tooltip confirm-action-danger"
                title="<?php echo e(cleanLang(__('lang.edit'))); ?>" data-confirm-title="<?php echo app('translator')->get('lang.delete_project'); ?>"
                data-confirm-text="<?php echo app('translator')->get('lang.calendar_delete_task'); ?>" data-ajax-type="DELETE"
                data-url="<?php echo e(url('/calendar/' . $event['id'] . '?resource_type=task')); ?>">
                <?php echo app('translator')->get('lang.delete_task'); ?>
            </a>
        <?php endif; ?>

        <!--delete calendar event-->
        <?php if($event['extendedProps']['resource_type'] == 'calendarevent' && $event['extendedProps']['delete_permission']): ?>
            <a class="btn btn-danger data-toggle-action-tooltip confirm-action-danger"
                title="<?php echo e(cleanLang(__('lang.edit'))); ?>" data-confirm-title="<?php echo app('translator')->get('lang.delete_event'); ?>"
                data-confirm-text="<?php echo app('translator')->get('lang.are_you_sure'); ?>" data-ajax-type="DELETE"
                data-url="<?php echo e(url('/calendar/' . $event['id'] . '?resource_type=calendarevent')); ?>">
                <?php echo app('translator')->get('lang.delete_event'); ?>
            </a>
        <?php endif; ?>

        <!--edit-->
        <?php if($event['extendedProps']['edit_permission']): ?>
            <a type="submit" class="btn btn-rounded-x btn-info waves-effect text-left ajax-request"
                id="calendar-edit-event-button" data-ajax-type="GET"
                data-form-id="commonModalBody"><?php echo app('translator')->get('lang.edit'); ?></a>
        <?php endif; ?>

    </div>
</div>


<!--edit calendar-->
<?php if($event['extendedProps']['edit_permission']): ?>
    <div class="calendar-edit-container hidden" id="calendar-edit-container">
        <?php echo $__env->make('pages.calendar.components.modals.add-edit-inc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="text-right p-t-10 p-b-30">

            <!--close-->
            <button type="button" class="btn btn-rounded-x btn-secondary waves-effect text-left"
                id="calendar-cancel-edit-event-button"><?php echo app('translator')->get('lang.cancel_editing'); ?></button>

            <!--save-->
            <button type="submit" class="btn btn-rounded-x btn-danger waves-effect text-left ajax-request"
                data-url="<?php echo e(url('/calendar/' . $event['id'])); ?>" data-loading-target="commonModalBody"
                data-ajax-type="PUT" data-on-start-submit-button="disable"
                data-form-id="calendar-edit-container"><?php echo app('translator')->get('lang.save_changes'); ?></button>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/calendar/components/modals/show.blade.php ENDPATH**/ ?>