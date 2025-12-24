<div class="form-group row">
  <label for="example-month-input" class="col-12 col-form-label text-left"><?php echo e(__('lang.lead_type')); ?> *</label>
  <div class="col-sm-12">
    <select class="select2-basic form-control form-control-sm" id="lead_type" name="lead_type">
      <option value="inhouse" <?php echo e(runtimePreselected($lead->lead_type ?? '', 'inhouse')); ?>><?php echo e(__('lang.lead_type_inhouse')); ?></option>
      <option value="associate" <?php echo e(runtimePreselected($lead->lead_type ?? '', 'associate')); ?>><?php echo e(__('lang.lead_type_associate')); ?></option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-12 col-form-label text-left">* <?php echo e(__('lang.note_to_change_lead_type')); ?> </label>
</div>
<?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/leads/components/actions/change-type.blade.php ENDPATH**/ ?>