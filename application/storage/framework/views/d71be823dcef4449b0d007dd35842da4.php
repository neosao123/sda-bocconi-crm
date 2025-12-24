<!--main table view-->
<?php echo $__env->make('pages.workorder.components.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--filter-->
<?php if(auth()->user()->is_team): ?>
  <?php echo $__env->make('pages.workorder.components.misc.filter-workorder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<!--export-->
<?php if(config('visibility.list_page_actions_exporting')): ?>
  <?php echo $__env->make('pages.export.workorder.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/workorder/components/table/wrapper.blade.php ENDPATH**/ ?>