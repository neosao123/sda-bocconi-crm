<!-- right-sidebar -->
<div class="right-sidebar right-sidebar-export sidebar-lg" id="sidepanel-export-expenses">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="ti-export display-inline-block m-t--11 p-r-10"></i><?php echo e(cleanLang(__('lang.export_expenses'))); ?>

        <span>
          <i class="bi bi-x-circle js-toggle-side-panel" data-target="sidepanel-export-expenses"></i>
        </span>
      </div>
      <!--title-->
      <!--body-->
      <div class="r-panel-body p-l-35 p-r-35">

        <!--standard fields-->
        <div class="">
          <h5><?php echo app('translator')->get('lang.standard_fields'); ?></h5>
        </div>
        <div class="line"></div>
        <div class="row">

          <!-- ID -->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[expense_id]" name="standard_field[expense_id]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[expense_id]"><?php echo app('translator')->get('lang.id'); ?></label>
              </div>
            </div>
          </div>

          <!--expense_date-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[expense_date]" name="standard_field[expense_date]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[expense_date]"><?php echo app('translator')->get('lang.date'); ?></label>
              </div>
            </div>
          </div>

          <!--expense_pay_to-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[expense_pay_to]" name="standard_field[expense_pay_to]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[expense_pay_to]"><?php echo app('translator')->get('lang.pay_to'); ?></label>
              </div>
            </div>
          </div>

          <!--expense_description-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[expense_description]" name="standard_field[expense_description]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[expense_description]"><?php echo app('translator')->get('lang.being'); ?></label>
              </div>
            </div>
          </div>

          <!--expense_amount-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[expense_amount]" name="standard_field[expense_amount]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[expense_amount]"><?php echo app('translator')->get('lang.total_amount'); ?></label>
              </div>
            </div>
          </div>

          <!--expense_authorized_by-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[expense_authorized_by]" name="standard_field[expense_authorized_by]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[expense_authorized_by]"><?php echo app('translator')->get('lang.authorized_by'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[expense_payment_method]" name="standard_field[expense_payment_method]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[expense_payment_method]"><?php echo app('translator')->get('lang.payment_method'); ?></label>
              </div>
            </div>
          </div>


          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[expense_reference_id]" name="standard_field[expense_reference_id]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[expense_reference_id]"><?php echo app('translator')->get('lang.reference_id'); ?></label>
              </div>
            </div>
          </div>




          

          

          

          

        </div>

        <!--buttons-->
        <div class="buttons-block">

          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" id="export-expenses-button" data-url="<?php echo e(urlResource('/export/expenses?')); ?>"
            data-type="form" data-ajax-type="POST" data-button-loading-annimation="yes"><?php echo app('translator')->get('lang.export'); ?></button>
        </div>
      </div>
  </form>
</div>
<!--sidebar-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/export/expenses/export.blade.php ENDPATH**/ ?>