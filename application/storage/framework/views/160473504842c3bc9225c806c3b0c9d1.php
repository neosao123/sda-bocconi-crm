
<?php $__env->startSection('content'); ?>
    <!--calender js [nextloop]-->
    <script src="<?php echo e(url('/public/js/calendar/calendar.js?v=' . time())); ?>"></script>

    <!-- main content -->
    <div class="container-fluid">

        <!-- page content -->
        <div class="row">
            <div class="col-12" id="calendar-container">
                <?php echo $__env->make('pages.calendar.calendar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <!--a void space for dynamic rendering-->
        <div id="calendar-dynamic-render"></div>

    </div>
    <!--main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/calendar/wrapper.blade.php ENDPATH**/ ?>