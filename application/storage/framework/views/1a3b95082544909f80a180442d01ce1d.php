<?php $__currentLoopData = $workorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!--each row-->
  <tr id="workorder_<?php echo e($data->workorder_id); ?>">

    <!--tableconfig_column_1 [workorder_id]-->
    <td class="workorder_col_id <?php echo e(config('table.tableconfig_column_1')); ?> tableconfig_column_1" id="workorder_col_id_<?php echo e($data->workorder_id); ?>">
      <a href="<?php echo e(isset($data->formatted_workorderid) && $data->formatted_workorderid ? url('workorder/' . $data->workorder_id) : ''); ?>">
        <?php echo e($data->formatted_workorderid ?? '---'); ?>

      </a>
    </td>

    <!--tableconfig_column_3 [workorder_col_client]-->
    <td class="workorder_col_client <?php echo e(config('table.tableconfig_column_3')); ?> tableconfig_column_3" id="workorder_col_client_<?php echo e($data->workorder_id); ?>">
      <a href="<?php echo e(isset($data->client) && $data->client->client_id ? url('clients/' . $data->client->client_id) : ''); ?>"><?php echo e($data->client->client_company_name ?? '---'); ?></a>
    </td>

    <!--tableconfig_column_4 [workorder_col_estimate]-->

    <td class="workorder_col_estimate <?php echo e(config('table.tableconfig_column_4')); ?> tableconfig_column_4" id="workorder_col_col_estimate_<?php echo e($data->workorder_id); ?>">
      <a href="<?php echo e(isset($data->estimate) && $data->estimate->bill_estimateid ? url('estimates/' . $data->estimate->bill_estimateid) : ''); ?>">
        <?php echo e($data->estimate->formatted_bill_estimateid ?? '---'); ?> </a>
    </td>


    <!--tableconfig_column_5 [workorder_col_date]-->
    <td class="workorder_col_date <?php echo e(config('table.tableconfig_column_5')); ?> tableconfig_column_5" id="workorder_col_date_<?php echo e($data->workorder_id); ?>">
      <?php echo e(runtimeDate($data->workorder_date) ?? '---'); ?>

    </td>

    <!--actions-->
    <?php if(config('visibility.action_column')): ?>
      <td class="clients_col_action actions_column" id="clients_col_action_<?php echo e($data->workorder_id); ?>">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
          <!--delete-->
          <?php if(config('visibility.action_buttons_delete')): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>" class="data-toggle-action-tooltip btn  sl-icon-trash-border btn-outline-danger btn-circle btn-sm confirm-action-danger"
              data-confirm-title="<?php echo e(cleanLang(__('lang.delete_workorder'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
              data-url="<?php echo e(url('/workorder/' . $data->workorder_id)); ?>">
              <i class="bi bi-trash3 trash"></i>

            </button>
          <?php endif; ?>
          <!--edit-->
          <?php if(config('visibility.action_buttons_edit')): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
              class="data-toggle-action-tooltip btn btn-outline-success sl-icon-note-border  btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form" data-toggle="modal"
              data-target="#commonModal" data-url="<?php echo e(urlResource('/workorder/' . $data->workorder_id . '/edit')); ?>" data-loading-target="commonModalBody"
              data-modal-title="<?php echo e(cleanLang(__('lang.edit_workorder'))); ?>" data-action-url="<?php echo e(urlResource('/workorder/' . $data->workorder_id . '?ref=list')); ?>" data-action-method="PUT"
              data-action-ajax-loading-target="workorder-td-container">
              <i class="sl-icon-note"></i>
            </button>
          <?php endif; ?>

          <a href="/workorder/<?php echo e($data->workorder_id ?? ''); ?>" class="btn btn-outline-info btn-circle btn-sm">
            <i class="ti-new-window"></i>
          </a>
        </span>
        <!--action button-->
        <!--more button (hidden)-->
        <span class="list-table-action dropdown font-size-inherit">
          <button type="button" id="listTableAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(cleanLang(__('lang.more'))); ?>"
            class="data-toggle-action-tooltip btn btn-outline-default-light btn-circle btn-sm">
            <i class="ti-more"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="listTableAction">
            <a class="dropdown-item" href="<?php echo e(url('/workorder/download/requirements/' . $data->workorder_id)); ?>" download>
              <ion-icon name="arrow-down-outline" class="text-success"></ion-icon> <?php echo e(__('lang.project_requirement')); ?></a>
          </div>
        </span>
        <!--more button-->
      </td>
    <?php endif; ?>

  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/workorder/components/table/ajax.blade.php ENDPATH**/ ?>