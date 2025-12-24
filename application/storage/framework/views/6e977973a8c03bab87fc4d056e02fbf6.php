<div class="row">
    <!--PAYMENTS TODAY-->
    <!--PAYMENTS THIS MONTH-->

    <div class="col-lg-3 col-md-6 click-url cursor-pointer" data-url="<?php echo e(url('clients')); ?>">
        <div class="card">
            <div style="background:  #ff9041; border-radius:10px" class="card-body p-l-15 p-r-15 ">
                <div class="d-flex  p-10 no-block">
                    <div class="align-self-center display-6">
                        <i class="bi bi-people text-light" style="font-size: 30px"></i>
                    </div>
                    <span class="align-slef-center" style="padding-left:10px;">
                        <h3 class="m-b-0" style="color:white;"><?php echo e($payload['counts']['clients']); ?></h3>
                        <h5 class="m-b-0" style="color:white;"><?php echo e(cleanLang(__('lang.clients'))); ?></h5>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice - Ovedue-->
    <div class="col-lg-3 col-md-6 click-url cursor-pointer"
        data-url="<?php echo e(url('invoices')); ?>">
        <div class="card">
            <div style="background: #24d2b5; border-radius:10px" class="card-body  p-l-15 p-r-15">
                <div class="d-flex  p-10 no-block">
                    <div class="align-items-center display-6">
                        <i class="bi bi-wallet text-light" style="font-size: 30px"></i>
                    </div>
                    <span class="align-slef-center" style="padding-left:10px;">
                        <h3 class="m-b-0" style="color:white;"><?php echo e($payload['counts']['invoices']); ?></h3>
                        <h5 class="m-b-0" style="color:white;"><?php echo e(cleanLang(__('lang.invoices'))); ?></h5>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 click-url cursor-pointer"
        data-url="<?php echo e(url('projects')); ?>">
        <div class="card">
            <div style="background:#7687af ; border-radius:10px" class="card-body p-l-15 p-r-15">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 ">
                        <i class="bi bi-folder-symlink-fill text-light" style="font-size: 30px"></i>
                    </div>
                    <span class="align-items-center" style="padding-left:10px;">
                        <h3 class="m-b-0" style="color:white;"><?php echo e($payload['counts']['projects']); ?></h3>
                        <h5 class=" m-b-0" style="color:white;"><?php echo e(cleanLang(__('lang.projects'))); ?></h5>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 click-url cursor-pointer" data-url="<?php echo e(url('tickets')); ?>">
        <div class="card">
            <div style="background:  #20aee3 ; border-radius:10px" class="card-body p-l-15 p-r-15">
                <div class="d-flex  p-10 no-block">
                    <div class="align-self-center display-6 ">
                        <i class="bi bi-ticket-detailed text-light" style="font-size:30px;"></i>
                    </div>
                    <span class="align-slef-center" style="padding-left:10px;">
                        <h3 class="m-b-0" style="color:white;"><?php echo e($payload['counts']['tickets']); ?></h3>
                        <h5 class="m-b-0" style="color:white;"><?php echo e(cleanLang(__('lang.tickets'))); ?></h5>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/home/admin/widgets/row-b/wrapper.blade.php ENDPATH**/ ?>