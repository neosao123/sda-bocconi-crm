<!-- right-sidebar -->
<div class="right-sidebar" id="sidepanel-filter-expenses">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="bi bi-funnel"></i><?php echo e(cleanLang(__('lang.filter_expenses'))); ?>

        <span>
          <i class="bi bi-x-circle js-close-side-panels" data-target="sidepanel-filter-expenses"></i>
        </span>
      </div>
      <!--title-->
      <!--body-->
      <div class="r-panel-body">


        

        

        

        <!--amount-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.total_amount'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-6 input-group input-group-sm">
                <span class="input-group-addon"><?php echo e(config('system.settings_system_currency_symbol')); ?></span>
                <input type="number" name="filter_expense_amount_min" id="filter_expense_amount_min" class="form-control form-control-sm" placeholder="<?php echo e(cleanLang(__('lang.minimum'))); ?>">
              </div>
              <div class="col-md-6 input-group input-group-sm">
                <span class="input-group-addon"><?php echo e(config('system.settings_system_currency_symbol')); ?></span>
                <input type="number" name="filter_expense_amount_max" id="filter_expense_amount_max" class="form-control form-control-sm" placeholder="<?php echo e(cleanLang(__('lang.maximum'))); ?>">
              </div>
            </div>
          </div>
        </div>

        <!--date-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.date'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-6">
                <input type="text" name="filter_expense_date_start" class="form-control form-control-sm pickadate" autocomplete="off" placeholder="<?php echo e(cleanLang(__('lang.start'))); ?>">
                <input class="mysql-date" type="hidden" id="filter_expense_date_start" name="filter_expense_date_start" value="">
              </div>
              <div class="col-md-6">
                <input type="text" name="filter_expense_date_end" class="form-control form-control-sm pickadate" autocomplete="off" placeholder="<?php echo e(cleanLang(__('lang.end'))); ?>">
                <input class="mysql-date" type="hidden" id="filter_expense_date_end" name="filter_expense_date_end" value="">
              </div>
            </div>
          </div>
        </div>

        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.payment_method'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-sm-12">
                <select id="filter_expense_payment_method" name="filter_expense_payment_method" class="select2-basic-with-search form-control-sm" data-allow-clear="true">
                  <option value=""></option>
                  <?php $__currentLoopData = paymentMethodForExpense(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($method); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>
        </div>

        


        <!--buttons-->
        <div class="buttons-block">
          <button type="button" name="foo1" class="btn btn-rounded-x btn-secondary js-reset-filter-side-panel"><?php echo e(cleanLang(__('lang.reset'))); ?></button>
          <input type="hidden" name="action" value="search">
          <input type="hidden" name="source" value="<?php echo e($page['source_for_filter_panels'] ?? ''); ?>">
          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" data-url="<?php echo e(urlResource('/expenses/search')); ?>" data-type="form"
            data-ajax-type="GET"><?php echo e(cleanLang(__('lang.apply_filter'))); ?></button>
        </div>
      </div>
      <!--body-->
    </div>
  </form>
</div>
<!--sidebar-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/expenses/components/misc/filter-expenses.blade.php ENDPATH**/ ?>