<!--bulk actions-->
<?php echo $__env->make('pages.proforma-invoices.components.actions.checkbox-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--main table view-->
<?php echo $__env->make('pages.proforma-invoices.components.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--filter-->
<?php if(auth()->user()->is_team): ?>
  <?php echo $__env->make('pages.proforma-invoices.components.misc.filter-proforma-invoices', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter-->

<!--export-->
<?php if(config('visibility.list_page_actions_exporting')): ?>
  <?php echo $__env->make('pages.export.proforma-invoices.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/proforma-invoices/components/table/wrapper.blade.php ENDPATH**/ ?>