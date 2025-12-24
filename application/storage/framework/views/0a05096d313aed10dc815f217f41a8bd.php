<div class="row">
    <!--PROJECTS PENDING-->
    <?php echo $__env->make('pages.home.client.widgets.first-row.projects-pending', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--PROJECTS COMPLETED-->
    <?php echo $__env->make('pages.home.client.widgets.first-row.projects-completed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/home/client/widgets/first-row/wrapper.blade.php ENDPATH**/ ?>