<?php $__currentLoopData = $techStacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $techstack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!--each row-->
  <tr id="techstack_<?php echo e($techstack->tech_stack_id); ?>">
    <td class="techstacks_col_title">
      <?php echo e($techstack->tech_stack_title); ?>

    </td>
    <td class="techstacks_col_created_by">
      <img src="<?php echo e(getUsersAvatar($techstack->creator->avatar_directory, $techstack->creator->avatar_filename, $techstack->techstack_creatorid)); ?>" alt="user" class="img-circle avatar-xsmall">
      <?php echo e(checkUsersName($techstack->creator->first_name, $techstack->tech_stack_creatorid)); ?>

    </td>
    <td class="techstacks_col_action actions_column">
      <!--action button-->
      <span class="list-table-action dropdown font-size-inherit">
        <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
          class="data-toggle-action-tooltip btn btn-outline-success sl-icon-note-border  btn-circle btn-sm edit-add-modal-button js-ajax-ux-request  reset-target-modal-form" data-toggle="modal"
          data-target="#commonModal" data-url="<?php echo e(url('/settings/tech-stacks/' . $techstack->tech_stack_id . '/edit')); ?>" data-loading-target="commonModalBody"
          data-modal-title="<?php echo e(cleanLang(__('lang.edit_techtstack'))); ?>" data-action-url="<?php echo e(url('/settings/tech-stacks/' . $techstack->tech_stack_id)); ?>" data-action-method="PUT"
          data-action-ajax-loading-target="techstacks-td-container">
          <i class="sl-icon-note"></i>
        </button>

        <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>" class="data-toggle-action-tooltip btn btn-outline-danger sl-icon-trash-border btn-circle btn-sm confirm-action-danger"
          data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
          data-url="<?php echo e(url('/')); ?>/settings/tech-stacks/<?php echo e($techstack->tech_stack_id); ?>">
          <i class="bi bi-trash3 trash"></i>
        </button>

      </span>
      <!--action button-->
    </td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/settings/sections/techstack/table/ajax.blade.php ENDPATH**/ ?>