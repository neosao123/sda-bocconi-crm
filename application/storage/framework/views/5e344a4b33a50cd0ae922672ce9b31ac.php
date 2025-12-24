<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-9 col-md-12">
        <div class="form-group row">
          <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(__('lang.client')); ?></label>
          <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="workorder_clientid" name="workorder_clientid" value="<?php echo e($workorder->client->client_company_name ?? ''); ?>" placeholder=""
              readonly="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(__('lang.quotation')); ?></label>
          <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm " id="workorder_quotation" name="workorder_quotation" placeholder="" autocomplete="off"
              value="<?php echo e($workorder->estimate->formatted_bill_estimateid ?? ''); ?>" readonly="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(__('lang.date')); ?></label>
          <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm " id="workorder_date" name="workorder_date" placeholder="" autocomplete="off"
              value="<?php echo e(runtimedate($workorder->workorder_date) ?? ''); ?>" readonly="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">
            <?php echo e(__('lang.project_requirement')); ?>

          </label>
          <div class="col-sm-12 col-lg-9">
            <?php echo $workorder->workorder_requirements ?? '-'; ?>

          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">
            <?php echo e(__('lang.project_requirement')); ?>

          </label>
          <?php if($workorder->workorder_requirement_attachments): ?>
            <div class="col-sm-12 col-lg-9 x-file-attachment">
              <div class="workorder-downloadable-file-attachment">
                <a target="_blank" href="<?php echo e(url($workorder->workorder_requirement_attachments)); ?>" download="<?php echo e(basename($workorder->workorder_requirement_attachments)); ?>">
                  <span class="x-extension"><i class="ti-clip"></i></span>
                  <span class="x-file-name uploaded-file-name"><?php echo e(str_limit(basename($workorder->workorder_requirement_attachments), 50)); ?></span>
                </a>
              </div>
            </div>
          <?php else: ?>
            <div class="col-sm-12 col-lg-9 x-file-attachment">
              <h6 class="m-0"><small>No File Available</small></h6>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/workorder/components/pages/show.blade.php ENDPATH**/ ?>