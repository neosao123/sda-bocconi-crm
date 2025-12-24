<!-- right-sidebar -->
<div class="right-sidebar right-sidebar-export sidebar-lg" id="sidepanel-export-workorder">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="ti-export display-inline-block m-t--11 p-r-10"></i><?php echo e(cleanLang(__('lang.export_workorder'))); ?>

        <span>
          <i class="bi bi-x-circle js-toggle-side-panel" data-target="sidepanel-export-workorder"></i>
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

          
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[workorder_id]" name="standard_field[workorder_id]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[workorder_id]"><?php echo app('translator')->get('lang.id'); ?></label>
              </div>
            </div>
          </div>

          
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[workorder_lead_id]" name="standard_field[workorder_lead_id]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[workorder_lead_id]"><?php echo app('translator')->get('lang.lead'); ?></label>
              </div>
            </div>
          </div>

          
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[workorder_client_id]" name="standard_field[workorder_client_id]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[workorder_client_id]"><?php echo app('translator')->get('lang.client'); ?></label>
              </div>
            </div>
          </div>

          
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[workorder_quotation]" name="standard_field[workorder_quotation]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[workorder_quotation]"><?php echo app('translator')->get('lang.quotation'); ?></label>
              </div>
            </div>
          </div>

          
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[workorder_date]" name="standard_field[workorder_date]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[workorder_date]"><?php echo app('translator')->get('lang.date'); ?></label>
              </div>
            </div>
          </div>
        </div>

        <!--buttons-->
        <div class="buttons-block">
          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" id="export-workorder-button" data-url="<?php echo e(urlResource('/export/workorder?')); ?>"
            data-type="form" data-ajax-type="POST" data-button-loading-annimation="yes"><?php echo app('translator')->get('lang.export'); ?></button>
        </div>
      </div>
  </form>
</div>
<!--sidebar-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/export/workorder/export.blade.php ENDPATH**/ ?>