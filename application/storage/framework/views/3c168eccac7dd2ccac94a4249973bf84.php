<!-- right-sidebar -->
<div class="right-sidebar right-sidebar-export sidebar-lg" id="sidepanel-export-proforma-invoices">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="ti-export display-inline-block m-t--11 p-r-10"></i><?php echo e(cleanLang(__('lang.export_proforma_invoices'))); ?>

        <span>
          <i class="bi bi-x-circle js-toggle-side-panel" data-target="sidepanel-export-proforma-invoices"></i>
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

          <!--bill_proforma_invoiceid-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_proforma_invoiceid]" name="standard_field[bill_proforma_invoiceid]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_proforma_invoiceid]"><?php echo app('translator')->get('lang.id'); ?></label>
              </div>
            </div>
          </div>


          <!--bill_date-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_date]" name="standard_field[bill_date]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_date]"><?php echo app('translator')->get('lang.date'); ?></label>
              </div>
            </div>
          </div>


          <!--compnay_name-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[company_name]" name="standard_field[company_name]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[company_name]"><?php echo app('translator')->get('lang.company_name'); ?></label>
              </div>
            </div>
          </div>

          <!--project-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[project]" name="standard_field[project]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[project]"><?php echo app('translator')->get('lang.project'); ?></label>
              </div>
            </div>
          </div>

          <!--quotation-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[quotation]" name="standard_field[quotation]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[quotation]"><?php echo app('translator')->get('lang.quotation'); ?></label>
              </div>
            </div>
          </div>

          <!--workorder-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[workorder]" name="standard_field[workorder]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[workorder]"><?php echo app('translator')->get('lang.workorder'); ?></label>
              </div>
            </div>
          </div>


          <!--bill_subtotal-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_subtotal]" name="standard_field[bill_subtotal]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_subtotal]"><?php echo app('translator')->get('lang.sub_total'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_discount_type-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_discount_type]" name="standard_field[bill_discount_type]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_discount_type]"><?php echo app('translator')->get('lang.discount_type'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_discount_percentage-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_discount_percentage]" name="standard_field[bill_discount_percentage]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_discount_percentage]"><?php echo app('translator')->get('lang.discount_percentage'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_discount_amount-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_discount_amount]" name="standard_field[bill_discount_amount]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_discount_amount]"><?php echo app('translator')->get('lang.discount_amount'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_amount_before_tax-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_amount_before_tax]" name="standard_field[bill_amount_before_tax]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_amount_before_tax]"><?php echo app('translator')->get('lang.amount_before_tax'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_tax_total_amount-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_tax_total_amount]" name="standard_field[bill_tax_total_amount]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_tax_total_amount]"><?php echo app('translator')->get('lang.tax'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_adjustment_description-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_adjustment_description]" name="standard_field[bill_adjustment_description]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_adjustment_description]"><?php echo app('translator')->get('lang.adjustment_description'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_adjustment_amount-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_adjustment_amount]" name="standard_field[bill_adjustment_amount]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_adjustment_amount]"><?php echo app('translator')->get('lang.adjustment_amount'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_final_amount-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_final_amount]" name="standard_field[bill_final_amount]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_final_amount]"><?php echo app('translator')->get('lang.amount'); ?></label>
              </div>
            </div>
          </div>

          <!--bill_status-->
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[bill_status]" name="standard_field[bill_status]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[bill_status]"><?php echo app('translator')->get('lang.status'); ?></label>
              </div>
            </div>
          </div>
        </div>

        <!--buttons-->
        <div class="buttons-block">
          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" id="export-invoices-button" data-url="<?php echo e(urlResource('/export/proforma-invoices?')); ?>"
            data-type="form" data-ajax-type="POST" data-button-loading-annimation="yes"><?php echo app('translator')->get('lang.export'); ?></button>
        </div>
      </div>
  </form>
</div>
<!--sidebar-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/export/proforma-invoices/export.blade.php ENDPATH**/ ?>