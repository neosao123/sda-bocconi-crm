<div class="row" id="js-trigger-expenses" data-client-id="<?php echo e($expense->expense_clientid ?? ''); ?>" data-payload="<?php echo e(config('visibility.expense_modal_trigger_clients_project_list')); ?>">
  <div class="col-lg-12">

    <!--date-->
    <div class="form-group row">
      <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.date'))); ?>*</label>
      <div class="col-sm-12 col-lg-9">
        <input type="text" class="form-control form-control-sm pickadate" autocomplete="off" name="expense_date" value="<?php echo e(runtimeDatepickerDate($expense->expense_date ?? date('Y-m-d'))); ?>">
        <input class="mysql-date" type="hidden" name="expense_date" id="expense_date" value="<?php echo e($expense->expense_date ?? date('Y-m-d')); ?>">
      </div>
    </div>

    <!-- Pay To -->
    <div class="form-group row">
      <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.pay_to'))); ?>*</label>
      <div class="col-sm-12 col-lg-9">
        <input type="text" class="form-control form-control-sm" id="expense_pay_to" name="expense_pay_to" value="<?php echo e($expense->expense_pay_to ?? ''); ?>" />
      </div>
    </div>

    <!--description-->
    <div class="form-group row">
      <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.being'))); ?>*</label>
      <div class="col-sm-12 col-lg-9">
        <textarea class="w-100" id="expense_description" rows="4" name="expense_description"><?php echo e($expense->expense_description ?? ''); ?></textarea>
      </div>
    </div>

    <!--amount-->
    <div class="form-group row">
      <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.total_amount'))); ?>*</label>
      <div class="col-sm-12 col-lg-9">
        <div class="input-group input-group-sm">
          <span class="input-group-addon" id="basic-addon2"><?php echo e(config('system.settings_system_currency_symbol')); ?></span>
          <input type="number" name="expense_amount" id="expense_amount" class="form-control form-control-sm" value="<?php echo e($expense->expense_amount ?? ''); ?>" aria-describedby="basic-addon2" required>
        </div>
      </div>
    </div>

    <!-- Rs In Words -->
    <div class="form-group row">
      <label class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.rs_in_words'))); ?></label>
      <div class="col-sm-12 col-lg-9">
        <input type="text" class="form-control form-control-sm" id="expense_amount_in_words" name="expense_amount_in_words" value="<?php echo e($expense->expense_amount_in_words ?? ''); ?>" />
      </div>
    </div>


    <!--payment method-->
    <div class="form-group row">
      <label class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.payment_method'))); ?></label>
      <div class="col-sm-12 col-lg-9">
        <select id="expense_payment_method" name="expense_payment_method" class="select2-basic-with-search form-control-sm" data-allow-clear="true">
          <option value=""></option>
          <?php $__currentLoopData = paymentMethodForExpense(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>" <?php echo e(selectedExpensePaymentMethod($key, $expense ?? '')); ?>><?php echo e($method); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
    </div>

    <!--transaction id-->
    <div class="form-group row">
      <label class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.reference_id'))); ?></label>
      <div class="col-sm-12 col-lg-9">
        <input type="text" name="expense_reference_id" class="form-control form-control-sm" id="expense_reference_id" autocomplete="off"
          placeholder=""value="<?php echo e($expense->expense_reference_id ?? ''); ?>" />
      </div>
    </div>

    <!-- Authorized By -->
    <div class="form-group row">
      <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.authorized_by'))); ?>*</label>
      <div class="col-sm-12 col-lg-9">
        <input type="text" class="form-control form-control-sm" id="expense_authorized_by" name="expense_authorized_by" value="<?php echo e($expense->expense_authorized_by ?? ''); ?>" />
      </div>
    </div>

    


    

    <div class="line"></div>

    <!--attach recipt - toggle-->
    <div class="spacer row">
      <div class="col-sm-12 col-lg-8">
        <span class="title"><?php echo e(cleanLang(__('lang.attach_receipt'))); ?></span class="title">
      </div>
      <div class="col-sm-12 col-lg-4">
        <div class="switch  text-right">
          <label>
            <input type="checkbox" name="show_more_settings_expenses" id="show_more_settings_expenses" class="js-switch-toggle-hidden-content" data-target="add_expense_attach_receipt"
              <?php echo e(isset($attachments) && count($attachments) > 0 ? 'checked' : ''); ?>>
            <span class="lever switch-col-light-blue"></span>
          </label>
        </div>
      </div>
    </div>

    <!--attach recipt-->
    <div class="<?php echo e(isset($attachments) && count($attachments) > 0 ? '' : 'hidden'); ?>" id="add_expense_attach_receipt">
      <!--fileupload-->
      <div class="form-group row">
        <div class="col-sm-12">
          <div class="dropzone dz-clickable" id="fileupload_expense_receipt">
            <div class="dz-default dz-message">
              <i class="icon-Upload-toCloud"></i>
              <span><?php echo e(cleanLang(__('lang.drag_drop_file'))); ?></span>
            </div>
          </div>
        </div>
      </div>
      <!--fileupload-->
      <!--existing files-->
      <?php if(isset($page['section']) && $page['section'] == 'edit'): ?>
        <table class="table table-bordered">
          <tbody>
            <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr id="expense_attachment_<?php echo e($attachment->attachment_id); ?>">
                <td><?php echo e($attachment->attachment_filename); ?> </td>
                <td class="w-px-40"> <button type="button" class="btn btn-danger btn-circle btn-sm confirm-action-danger" data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>"
                    data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" active" data-ajax-type="DELETE"
                    data-url="<?php echo e(url('/expenses/attachments/' . $attachment->attachment_uniqiueid)); ?>">
                    <i class="sl-icon-trash"></i>
                  </button></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>

    <!--pass source-->
    <input type="hidden" name="source" value="<?php echo e(request('source')); ?>">
    <input type="hidden" name="ref" value="<?php echo e(request('ref')); ?>">

    <div class="row">
      <div class="col-12">
        <div><small><strong>* <?php echo e(cleanLang(__('lang.required'))); ?></strong></small></div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/expenses/components/modals/add-edit-inc.blade.php ENDPATH**/ ?>