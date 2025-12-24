<div class="row">
  <div class="col-12">
    <div class="table-responsive receipt">
      <table class="table table-bordered">
        <tbody>
          <!--date-->
          <tr>
            <td><?php echo e(cleanLang(__('lang.date'))); ?></td>
            <td><?php echo e(runtimeDate($expense->expense_date)); ?></td>
          </tr>
          <!--client-->
          <tr>
            <td><?php echo e(cleanLang(__('lang.pay_to'))); ?></td>
            <td><?php echo e($expense->expense_pay_to ?? ''); ?></td>
          </tr>
          <!--description-->
          <tr>
            <td><?php echo e(cleanLang(__('lang.being'))); ?></td>
            <td><?php echo e($expense->expense_description); ?></td>
          </tr>
          <!--project-->
          <tr>
            <td><?php echo e(cleanLang(__('lang.authorized_by'))); ?></td>
            <td><?php echo e($expense->expense_authorized_by); ?></td>
          </tr>
          <!--user-->
          <tr>
            <td><?php echo e(cleanLang(__('lang.created_by'))); ?></td>
            <td><?php echo e($expense->first_name); ?> <?php echo e($expense->last_name); ?></td>
          </tr>

          <tr>
            <td><?php echo e(cleanLang(__('lang.payment_method'))); ?></td>
            <td><?php echo e(getExpensePaymentMethod($expense)); ?></td>
          </tr>

          <tr>
            <td><?php echo e(cleanLang(__('lang.reference_id'))); ?></td>
            <td><?php echo e($expense->expense_reference_id ?? '---'); ?></td>
          </tr>

          <!--Attchment-->
          <tr>
            <td><?php echo e(cleanLang(__('lang.attachement'))); ?></td>
            <td>
              <?php $__empty_1 = true; $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <ul class="p-0 m-0">
                  <li id="fx-expenses-files-attached" class="py-1">
                    <a href="expenses/attachments/download/<?php echo e($attachment->attachment_uniqiueid); ?>" download>
                      <?php echo e($attachment->attachment_filename); ?> <i class="ti-download"></i>
                    </a>
                  </li>
                </ul>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="p-0 m-0 text-muted">No attachments found.</p>
              <?php endif; ?>
            </td>
          </tr>
          <!--date-->
          <!--description-->
          
          

          <tr>
            <td><?php echo e(cleanLang(__('lang.rs_in_words'))); ?></td>
            <td><?php echo e($expense->expense_amount_in_words ?? '---'); ?></td>
          </tr>
          <tr>
            <td id="fx-expenses-td-amount"><?php echo e(cleanLang(__('lang.total_amount'))); ?></td>
            <td id="fx-expenses-td-money"><?php echo e(runtimeMoneyFormat($expense->expense_amount)); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/expenses/components/modals/expense.blade.php ENDPATH**/ ?>