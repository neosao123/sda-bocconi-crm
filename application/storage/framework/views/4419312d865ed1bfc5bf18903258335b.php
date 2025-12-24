<div class="card bg-light shadow-sm">
  <div class="card-body">
    <form id="add-hsn" class="mb-3">
      <div class="row gx-3 align-items-end">
        <div class="col-lg-12 pb-3">
          <h4 class=""><?php echo app('translator')->get('lang.add_hsn_sac_code'); ?></h4>
        </div>
        <div class="col-lg-12 pb-3">
          <label class="control-label col-form-label"><?php echo app('translator')->get('lang.hsn_service_type'); ?> *</label>
          <div class="">
            <select class="select2-basic form-control form-control-sm" id="hsn_service_type" name="hsn_service_type" aria-placeholder="Select">
              <option value="empty"><?php echo app('translator')->get('lang.select_hsn_service_type'); ?></option>
              <option value="information-technology">Information technology (IT) consulting and support services</option>
              <option value="research-and-development">Research and development originals in computer related sciences </option>
            </select>
          </div>
        </div>
        <div class="col-lg-12 pb-3">
          <label class="control-label col-form-label"><?php echo app('translator')->get('lang.hsn_sac_code'); ?> *</label>
          <div class="">
            <select class="select2-basic form-control form-control-sm select2-preselected" id="hsn_sac_code" name="hsn_sac_code">
            </select>
          </div>
        </div>
        <div class="col-lg-12 text-right pb-3">
          <div>
            <button type="submit" id="addHsncodes" class="btn btn-rounded-x btn-danger waves-effect text-left" data-loading-target=""><?php echo e(cleanLang(__('lang.add'))); ?></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/hsncodes/add.blade.php ENDPATH**/ ?>