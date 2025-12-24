<!--heading-->
<div class="x-heading"><i class="mdi mdi-file-document-box"></i><?php echo e(cleanLang(__('lang.custom_fields'))); ?></div>

<!--Form Data-->
<?php if(count($fields ?? []) > 0): ?>
  <div class="card-show-form-data " id="card-lead-organisation">

    <!--render the form-->
    <?php echo $__env->make('misc.customfields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="form-group text-right">
      <button type="button" class="btn waves-effect waves-light btn-xs btn-default ajax-request"
        data-url="<?php echo e(url('leads/content/' . getLeadId($lead)['leadId'] . '/show-customfields?type=' . getLeadId($lead)['type'])); ?>" data-loading-class="loading-before-centre"
        data-loading-target="card-leads-left-panel"><?php echo app('translator')->get('lang.cancel'); ?></button>
      <button type="button" class="btn btn-danger btn-xs ajax-request" data-loading-target="card-leads-left-panel" data-loading-class="loading-before-centre"
        data-url="<?php echo e(url('/leads/content/' . getLeadId($lead)['leadId'] . '/edit-customfields?type=' . getLeadId($lead)['type'])); ?>" data-type="form" data-ajax-type="post"
        data-form-id="card-lead-organisation">
        <?php echo e(cleanLang(__('lang.update'))); ?>

      </button>
    </div>
  </div>
<?php else: ?>
  nothng here
<?php endif; ?>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/lead/content/customfields/edit.blade.php ENDPATH**/ ?>