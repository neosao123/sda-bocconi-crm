<div class="row">
  <div class="col-lg-12">
    <input type="hidden" class="form-control form-control-sm" id="project_module_id" name="project_module_id" value="<?php echo e($project_module->project_module_id ?? ''); ?>">
    <div class="form-group row">
      <label class="col-12 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.title'))); ?>*</label>
      <div class="col-12">
        <input type="text" class="form-control form-control-sm" id="project_module_title" name="project_module_title" value="<?php echo e($project_module->project_module_title ?? ''); ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-12 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.deliverable'))); ?>*</label>
      <div class="col-12 ">
        <select name="project_module_deliverable" id="project_module_deliverable" class="form-control form-control-sm js-select2-basic-search select2-hidden-accessible"
          data-ajax--url="<?php echo e(url('/')); ?>/feed/deliverables">
          <?php if(isset($project_module)): ?>
            <option value="<?php echo e($project_module->project_module_deliverableid); ?>"><?php echo e($project_module->deliverable->deliverable_title); ?></option>
          <?php endif; ?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <!-- Intern Time -->
      <div class="col-lg-4 col-md-6 col-md-12 mb-2">
        <label class="d-block text-left control-label col-form-label">
          <?php echo e(cleanLang(__('lang.estimated_time_intern'))); ?>*
        </label>
        <div class="row">
          <div class="col-6 pr-2">
            <input type="number" step="1" placeholder="Hours" class="form-control form-control-sm hours_validation" id="estimated_time_intern_hours" name="estimated_time_intern_hours"
              value="<?php echo e(isset($project_module) && $project_module->project_module_intern_estimated_time ? getHoursMinutes($project_module->project_module_intern_estimated_time, 'hours') : ''); ?>">
          </div>
          <div class="col-6 pl-2">
            <input type="number" step="1" placeholder="Minutes" class="form-control form-control-sm minutes_validation" id="estimated_time_intern_minutes" name="estimated_time_intern_minutes"
              value="<?php echo e(isset($project_module) && $project_module->project_module_intern_estimated_time ? getHoursMinutes($project_module->project_module_intern_estimated_time, 'minutes') : ''); ?>">
          </div>
        </div>
      </div>

      <!-- Junior Time -->
      <div class="col-lg-4 col-md-6 col-md-12 mb-2">
        <label class="d-block text-left control-label col-form-label">
          <?php echo e(cleanLang(__('lang.estimated_time_junior'))); ?>*
        </label>
        <div class="row">
          <div class="col-6 pr-2">
            <input type="number" step="1" placeholder="Hours" class="form-control form-control-sm hours_validation" id="estimated_time_junior_hours" name="estimated_time_junior_hours"
              value="<?php echo e(isset($project_module) && $project_module->project_module_junior_estimated_time ? getHoursMinutes($project_module->project_module_junior_estimated_time, 'hours') : ''); ?>">
          </div>
          <div class="col-6 pl-2">
            <input type="number" step="1" placeholder="Minutes" class="form-control form-control-sm minutes_validation" id="estimated_time_junior_minutes" name="estimated_time_junior_minutes"
              value="<?php echo e(isset($project_module) && $project_module->project_module_junior_estimated_time ? getHoursMinutes($project_module->project_module_junior_estimated_time, 'minutes') : ''); ?>">
          </div>
        </div>
      </div>

      <!-- Senior Time -->
      <div class="col-lg-4 col-md-6 col-md-12 mb-2">
        <label class="d-block text-left control-label col-form-label">
          <?php echo e(cleanLang(__('lang.estimated_time_senior'))); ?>*
        </label>
        <div class="row">
          <div class="col-6 pr-2">
            <input type="number" step="1" placeholder="Hours" class="form-control form-control-sm hours_validation" id="estimated_time_senior_hours" name="estimated_time_senior_hours"
              value="<?php echo e(isset($project_module) && $project_module->project_module_senior_estimated_time ? getHoursMinutes($project_module->project_module_senior_estimated_time, 'hours') : ''); ?>">
          </div>
          <div class="col-6 pl-2">
            <input type="number" step="1" placeholder="Minutes" class="form-control form-control-sm minutes_validation" id="estimated_time_senior_minutes" name="estimated_time_senior_minutes"
              value="<?php echo e(isset($project_module) && $project_module->project_module_senior_estimated_time ? getHoursMinutes($project_module->project_module_senior_estimated_time, 'minutes') : ''); ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/settings/sections/project-modules/modals/add-edit-inc.blade.php ENDPATH**/ ?>