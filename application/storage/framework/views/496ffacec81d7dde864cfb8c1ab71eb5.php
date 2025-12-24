<?php $__currentLoopData = $project_modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!--each row-->
  <tr id="project_module_<?php echo e($project_module->project_module_id); ?>">
    <td class="project_modules_col_title">
      <?php echo e($project_module->project_module_title); ?>

    </td>
    <td class="project_modules_col_deliverable">
      <?php echo e($project_module->deliverable->deliverable_title ?? ''); ?>

    </td>
    <td class="project_modules_col_created_by">
      <img src="<?php echo e(getUsersAvatar($project_module->creator->avatar_directory, $project_module->creator->avatar_filename, $project_module->project_module_creatorid)); ?>" alt="user"
        class="img-circle avatar-xsmall">
      <?php echo e(checkUsersName($project_module->creator->first_name, $project_module->project_module_creatorid)); ?>

    </td>
    <td class="project_modules_col_action actions_column">
      <!--action button-->
      <span class="list-table-action dropdown font-size-inherit">
        <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
          class="data-toggle-action-tooltip btn btn-outline-success sl-icon-note-border  btn-circle btn-sm edit-add-modal-button js-ajax-ux-request  reset-target-modal-form" data-toggle="modal"
          data-target="#commonModal" data-url="<?php echo e(url('/settings/project-modules/' . $project_module->project_module_id . '/edit')); ?>" data-loading-target="commonModalBody"
          data-modal-title="<?php echo e(cleanLang(__('lang.edit_project_module'))); ?>" data-action-url="<?php echo e(url('/settings/project-modules/' . $project_module->project_module_id)); ?>" data-action-method="PUT"
          data-action-ajax-loading-target="project-modules-td-container">
          <i class="sl-icon-note"></i>
        </button>

        <a href="/app/settings/project-modules/<?php echo e($project_module->project_module_id ?? ''); ?>" class="btn btn-outline-info btn-circle btn-sm">
          <i class="ti-new-window"></i>
        </a>

        <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>" class="data-toggle-action-tooltip btn btn-outline-danger sl-icon-trash-border btn-circle btn-sm confirm-action-danger"
          data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
          data-url="<?php echo e(url('/')); ?>/settings/project-modules/<?php echo e($project_module->project_module_id); ?>">
          <i class="bi bi-trash3 trash"></i>
        </button>

      </span>
      <!--action button-->
    </td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/settings/sections/project-modules/table/ajax.blade.php ENDPATH**/ ?>