<?php $__currentLoopData = $deliverables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliverable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!--each row-->
  <tr id="deliverable_<?php echo e($deliverable->deliverable_id); ?>">
    <td class="deliverables_col_title">
      <?php echo e($deliverable->deliverable_title); ?>

    </td>
    <td class="deliverables_col_tech_stack">
      <?php echo e(showDeliverablesTechStacks($deliverable)); ?>

    </td>
    <td class="deliverables_col_created_by">
      <img src="<?php echo e(getUsersAvatar($deliverable->creator->avatar_directory, $deliverable->creator->avatar_filename, $deliverable->deliverable_creatorid)); ?>" alt="user"
        class="img-circle avatar-xsmall">
      <?php echo e(checkUsersName($deliverable->creator->first_name, $deliverable->deliverable_creatorid)); ?>

    </td>
    <td class="deliverables_col_action actions_column">
      <!--action button-->
      <span class="list-table-action dropdown font-size-inherit">
        <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
          class="data-toggle-action-tooltip btn btn-outline-success sl-icon-note-border  btn-circle btn-sm edit-add-modal-button js-ajax-ux-request  reset-target-modal-form" data-toggle="modal"
          data-target="#commonModal" data-url="<?php echo e(url('/settings/deliverables/' . $deliverable->deliverable_id . '/edit')); ?>" data-loading-target="commonModalBody"
          data-modal-title="<?php echo e(cleanLang(__('lang.edit_deliverable'))); ?>" data-action-url="<?php echo e(url('/settings/deliverables/' . $deliverable->deliverable_id)); ?>" data-action-method="PUT"
          data-action-ajax-loading-target="deliverables-td-container">
          <i class="sl-icon-note"></i>
        </button>

        <a href="/app/settings/deliverables/<?php echo e($deliverable->deliverable_id ?? ''); ?>" class="btn btn-outline-info btn-circle btn-sm">
          <i class="ti-new-window"></i>
        </a>

        <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>" class="data-toggle-action-tooltip btn btn-outline-danger sl-icon-trash-border btn-circle btn-sm confirm-action-danger"
          data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
          data-url="<?php echo e(url('/')); ?>/settings/deliverables/<?php echo e($deliverable->deliverable_id); ?>">
          <i class="bi bi-trash3 trash"></i>
        </button>

      </span>
      <!--action button-->
    </td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/settings/sections/deliverables/table/ajax.blade.php ENDPATH**/ ?>