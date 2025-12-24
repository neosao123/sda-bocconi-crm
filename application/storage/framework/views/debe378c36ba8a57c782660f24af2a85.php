<div class="row">
    <!--PAYMENTS TODAY-->
    <div class="col-lg-3 col-md-6 click-url cursor-pointer"
        data-url="<?php echo e(url('invoices/search?ref=list&filter_bill_status[]=due')); ?>">
        <div class="card">
            <div style="border: 2px solid #e39520; border-radius:10px" class="card-body p-l-15 p-r-15 ">
                <div class="d-flex gap-5 p-10 no-block">
                    <div class="align-self-center display-6 ">
                        <i class="bi bi-receipt" style="color:#e39520"></i>
                    </div>
                    <span class="align-slef-center " style="padding-left:10px;">
                        <h3 class="m-b-0"><?php echo e(runtimeMoneyFormat($payload['invoices']['due'])); ?></h3>
                        <h6 class="text-muted m-b-0"><?php echo e(cleanLang(__('lang.invoices'))); ?> -
                            <?php echo e(cleanLang(__('lang.due'))); ?></h6>
                    </span>
                </div>
            </div>
            <!-- <div class="progress">
            <div class="progress-bar bg-warning w-100 h-px-3" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div> -->
        </div>
    </div>


    <!--PAYMENTS THIS MONTH-->
    <div class="col-lg-3 col-md-6 click-url cursor-pointer"
        data-url="<?php echo e(url('invoices/search?ref=list&filter_bill_status[]=overdue')); ?>">
        <div class="card">
            <div style="border: 2px solid #be2514e5; border-radius:10px" class="card-body  p-l-15 p-r-15">
                <div class="d-flex gap-5 p-10 no-block">
                    <div class="align-self-center display-6 ">
                        <i class="bi bi-receipt" style="color:#be2514e5"></i>
                    </div>
                    <span class="align-slef-center" style="padding-left:10px;">
                        <h3 class="m-b-0"><?php echo e(runtimeMoneyFormat($payload['invoices']['overdue'])); ?></h3>
                        <h6 class="text-muted m-b-0"><?php echo e(cleanLang(__('lang.invoices'))); ?> -
                            <?php echo e(cleanLang(__('lang.overdue'))); ?></h6>
                    </span>
                </div>
            </div>
            <!-- <div class="progress">
            <div class="progress-bar bg-danger w-100 h-px-3" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div> -->
        </div>
    </div>

    <!--INVOICES DUE-->
    <div class="col-lg-3 col-md-6 click-url cursor-pointer"
        data-url="<?php echo e(url('payments/search?ref=list&filter_payment_date_start=' . $payload['filter_payment_month_start'] . '&filter_payment_date_end=' . $payload['filter_payment_month_end'])); ?>">
        <div class="card">
            <div style="border: 2px solid #16a575 ; border-radius:10px" class="card-body p-l-15 p-r-15">
                <div class="d-flex gap-5 p-10 no-block">
                    <div class="align-self-center display-6 ">
                      <i class="bi bi-cash-stack" style="color:#16a575"></i>
                    </div>
                    <span class="align-slef-center" style="padding-left:10px;">
                        <h3 class="m-b-0"><?php echo e(runtimeMoneyFormat($payload['payments']['this_month'])); ?></h3>
                        <h6 class="text-muted m-b-0"><?php echo e(cleanLang(__('lang.payments'))); ?> -
                            <?php echo e(cleanLang(__('lang.this_month'))); ?></h6>
                    </span>
                </div>
            </div>
            <!-- <div class="progress">
            <div class="progress-bar bg-info w-100 h-px-3" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div> -->
        </div>
    </div>

    <!--INVOICES OVERDUE-->

    <div class="col-lg-3 col-md-6 click-url cursor-pointer"
        data-url="<?php echo e(url('payments/search?ref=list&filter_payment_date_start=' . $payload['filter_payment_today'] . '&filter_payment_date_end=' . $payload['filter_payment_today'])); ?>">
        <div class="card">
            <div style="border: 2px solid #4a20e2 ; border-radius:10px" class="card-body p-l-15 p-r-15">
                <div class="d-flex  gap-5 p-10 no-block">
                    <div class="align-self-center display-6 ">
                      <i class="bi bi-cash" style="color:#4a20e2"></i>
                    </div>
                    <span class="align-slef-center" style="padding-left:10px;">
                        <h3 class="m-b-0"><?php echo e(runtimeMoneyFormat($payload['payments']['today'])); ?></h3>
                        <h6 class="text-muted m-b-0"><?php echo e(cleanLang(__('lang.payments'))); ?> -
                            <?php echo e(cleanLang(__('lang.today'))); ?></h6>
                    </span>

                </div>
            </div>
            <!-- <div class="progress">
          <div class="progress-bar bg-success w-100 h-px-3" role="progressbar" aria-valuenow="100" aria-valuemin="0"
              aria-valuemax="100"></div>
      </div> -->
        </div>
    </div>

</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/home/admin/widgets/row-a/wrapper.blade.php ENDPATH**/ ?>