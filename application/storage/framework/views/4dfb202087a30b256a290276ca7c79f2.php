 <?php $__env->startSection('content'); ?>
  <!-- main content -->
  <div class="container-fluid">

    <!--page heading-->
    <div class="row page-titles">

      <!-- Page Title & Bread Crumbs -->
      <?php echo $__env->make('misc.heading-crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--Page Title & Bread Crumbs -->

      <!-- action buttons -->
      <?php if(isset($page['section']) && $page['section'] == 'view'): ?>
        <?php echo $__env->make('pages.workorder.components.misc.view-page-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php else: ?>
        <?php echo $__env->make('pages.workorder.components.misc.list-page-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
      <!-- action buttons -->
    </div>
    <!--page heading-->

    <!-- page content -->
    <div class="row">
      <div class="col-12">
        <?php if(isset($page['section']) && $page['section'] == 'view'): ?>
          <?php echo $__env->make('pages.workorder.components.pages.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
          <!--workorder table-->
          <?php echo $__env->make('pages.workorder.components.table.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!--workorder table-->
        <?php endif; ?>
      </div>
    </div>
    <!--page content -->


  </div>
  <!--main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/workorder/wrapper.blade.php ENDPATH**/ ?>