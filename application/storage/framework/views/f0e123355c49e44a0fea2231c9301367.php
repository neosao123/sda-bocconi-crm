<!-- right-sidebar -->
<div class="right-sidebar right-sidebar-export sidebar-lg" id="sidepanel-export-leads">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="ti-export display-inline-block m-t--11 p-r-10"></i><?php echo e(cleanLang(__('lang.export_leads'))); ?>

        <span>
          <i class="bi bi-x-circle js-toggle-side-panel" data-target="sidepanel-export-leads"></i>
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
                <input type="checkbox" id="standard_field[lead_id]" name="standard_field[lead_id]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_id]"><?php echo app('translator')->get('lang.id'); ?></label>
              </div>
            </div>
          </div>


          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_contact_name]" name="standard_field[lead_contact_name]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_contact_name]"><?php echo app('translator')->get('lang.contact_name'); ?></label>
              </div>
            </div>
          </div>

          
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_title]" name="standard_field[lead_title]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_title]"><?php echo app('translator')->get('lang.title'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_type]" name="standard_field[lead_type]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_type]"><?php echo app('translator')->get('lang.lead_type'); ?></label>
              </div>
            </div>
          </div>

          
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_created]" name="standard_field[lead_created]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_created]"><?php echo app('translator')->get('lang.created'); ?></label>
              </div>
            </div>
          </div>

          
          

          
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_status]" name="standard_field[lead_status]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_status]"><?php echo app('translator')->get('lang.status'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_assigned]" name="standard_field[lead_assigned]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_assigned]"><?php echo app('translator')->get('lang.assigned'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_categoryid]" name="standard_field[lead_categoryid]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_categoryid]"><?php echo app('translator')->get('lang.category'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_company_name]" name="standard_field[lead_company_name]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_company_name]"><?php echo app('translator')->get('lang.company'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_email]" name="standard_field[lead_email]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_email]"><?php echo app('translator')->get('lang.email'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_phone]" name="standard_field[lead_phone]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_phone]"><?php echo app('translator')->get('lang.phone'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_job_position]" name="standard_field[lead_job_position]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_job_position]"><?php echo app('translator')->get('lang.position'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_city]" name="standard_field[lead_city]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_city]"><?php echo app('translator')->get('lang.city'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_state]" name="standard_field[lead_state]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_state]"><?php echo app('translator')->get('lang.state'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_zip]" name="standard_field[lead_zip]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_zip]"><?php echo app('translator')->get('lang.zipcode'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_country]" name="standard_field[lead_country]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_country]"><?php echo app('translator')->get('lang.country'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_vat]" name="standard_field[lead_vat]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_vat]"><?php echo app('translator')->get('lang.vat_tax_number'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_last_contacted]" name="standard_field[lead_last_contacted]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_last_contacted]"><?php echo app('translator')->get('lang.last_contacted'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_converted_date]" name="standard_field[lead_converted_date]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_converted_date]"><?php echo app('translator')->get('lang.date_converted'); ?></label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_source]" name="standard_field[lead_source]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_source]"><?php echo app('translator')->get('lang.source'); ?></label>
              </div>
            </div>
          </div>

        </div>


        <div class="m-t-30">
          <h5><?php echo app('translator')->get('lang.custom_fields'); ?></h5>
        </div>
        <div class="line"></div>
        <div class="row">
          <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($field['customfields_status'] === 'enabled'): ?>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group form-group-checkbox row">
                  <div class="col-12 p-t-5">
                    <input type="checkbox" id="custom_field[<?php echo e($field->customfields_name); ?>]" name="custom_field[<?php echo e($field->customfields_name); ?>]" class="filled-in chk-col-light-blue"
                      checked="checked">
                    <label class="p-l-30" for="custom_field[<?php echo e($field->customfields_name); ?>]"><?php echo e($field->customfields_title); ?></label>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!--buttons-->
        <div class="buttons-block">
          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" id="export-leads-button" data-url="<?php echo e(urlResource('/export/leads?')); ?>"
            data-type="form" data-ajax-type="POST" data-button-loading-annimation="yes"><?php echo app('translator')->get('lang.export'); ?></button>
        </div>
      </div>
  </form>
</div>
<!--sidebar-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/export/leads/export.blade.php ENDPATH**/ ?>