<div class="boards count-<?php echo e(@count($leads ?? [])); ?> js-trigger-leads-kanban-board" id="leads-view-wrapper" data-position="<?php echo e(url('leads/update-position')); ?>">
  <!--each board-->
  <?php if(isset($boards)): ?>
    <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <!--board-->
      <?php echo $__env->make('pages.leads.components.kanban.board', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</div>
<?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/leads/components/kanban/kanban.blade.php ENDPATH**/ ?>