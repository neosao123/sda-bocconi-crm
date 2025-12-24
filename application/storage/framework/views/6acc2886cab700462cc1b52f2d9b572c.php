<div class="col-12 align-self-center hidden checkbox-actions  box-shadow-minimum" id="proforma-invoices-checkbox-actions-container">
  <!--button-->
  <?php if(config('visibility.action_buttons_edit')): ?>
    <div class="x-buttons">
      <?php if(config('visibility.action_buttons_delete')): ?>
        <button type="button" class="btn btn-sm btn-default sl-icon-trash-border waves-effect waves-dark confirm-action-danger" data-type="form" data-ajax-type="POST"
          data-form-id="proforma-invoices-list-table" data-url="<?php echo e(url('/proforma-invoices/delete')); ?>" data-confirm-title="<?php echo e(cleanLang(__('lang.delete_selected_items'))); ?>"
          data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" id="checkbox-actions-delete-proforma-invoices">
          <i class="bi bi-trash3 trash"></i>
          <?php echo e(cleanLang(__('lang.delete'))); ?>

        </button>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <div class="x-notice">
      <?php echo e(cleanLang(__('lang.no_actions_available'))); ?>

    </div>
  <?php endif; ?>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/proforma-invoices/components/actions/checkbox-actions.blade.php ENDPATH**/ ?>