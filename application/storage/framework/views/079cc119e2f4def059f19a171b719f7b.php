<!-- right-sidebar -->
<div class="right-sidebar" id="sidepanel-filter-proforma-invoices">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="bi bi-funnel"></i><?php echo e(cleanLang(__('lang.filter_proforma_invoices'))); ?>

        <span>
          <i class="bi bi-x-circle js-close-side-panels" data-target="sidepanel-filter-proforma-invoices"></i>
        </span>
      </div>
      <!--title-->
      <!--body-->
      <div class="r-panel-body">

        <?php if(config('visibility.filter_panel_client_project')): ?>
          <!--company name-->
          <div class="filter-block">
            <div class="title">
              <?php echo e(cleanLang(__('lang.company_name'))); ?>

            </div>
            <div class="fields">
              <div class="row">
                <div class="col-md-12">
                  <select name="proforma_filter_bill_clientid" id="proforma_filter_bill_clientid"
                    class="clients_and_projects_toggle form-control form-control-sm js-select2-basic-search select2-hidden-accessible" data-projects-dropdown="proforma_filter_bill_projectid"
                    data-feed-request-type="clients_projects" data-ajax--url="<?php echo e(url('/')); ?>/feed/company_names"></select>
                </div>
              </div>
            </div>
          </div>

          <!--project-->
          <div class="filter-block">
            <div class="title">
              <?php echo e(cleanLang(__('lang.project'))); ?>

            </div>
            <div class="fields">
              <div class="row">
                <div class="col-md-12">
                  <select class="select2-basic form-control form-control-sm dynamic_proforma_filter_bill_projectid" id="proforma_filter_bill_projectid" name="proforma_filter_bill_projectid" disabled>
                  </select>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>


        <!--clients project list-->
        <?php if(config('visibility.filter_panel_clients_projects')): ?>
          <div class="filter-block">
            <div class="title">
              <?php echo e(cleanLang(__('lang.project'))); ?>

            </div>
            <div class="fields">
              <div class="row">
                <div class="col-md-12">
                  <select class="select2-basic form-control form-control-sm" id="proforma_filter_bill_projectid" name="proforma_filter_bill_projectid">
                    <option></option>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($project->project_id); ?>"><?php echo e($project->project_title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <!--invoice amount-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.amount'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-6 input-group input-group-sm">
                <span class="input-group-addon"><?php echo e(config('system.settings_system_currency_symbol')); ?></span>
                <input type="number" name="proforma_filter_bill_final_amount_min" id="proforma_filter_bill_final_amount_min" class="form-control form-control-sm" placeholder="min">
              </div>
              <div class="col-md-6 input-group input-group-sm">
                <span class="input-group-addon"><?php echo e(config('system.settings_system_currency_symbol')); ?></span>
                <input type="number" name="proforma_filter_bill_final_amount_max" id="proforma_filter_bill_final_amount_max" class="form-control form-control-sm" placeholder="max">
              </div>
            </div>
          </div>
        </div>

        <!--invoice date-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.date'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-6">
                <input type="text" name="proforma_filter_bill_date_start" class="form-control form-control-sm pickadate" autocomplete="off" placeholder="Start">
                <input class="mysql-date" type="hidden" name="proforma_filter_bill_date_start" id="proforma_filter_bill_date_start" value="">
              </div>
              <div class="col-md-6">
                <input type="text" name="proforma_filter_bill_date_end" class="form-control form-control-sm pickadate" autocomplete="off" placeholder="End">
                <input class="mysql-date" type="hidden" name="proforma_filter_bill_date_end" id="proforma_filter_bill_date_end" value="">
              </div>
            </div>
          </div>
        </div>

        <!--status-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.status'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <select name="proforma_filter_bill_status" id="proforma_filter_bill_status"
                  class="form-control form-control-sm select2-multiple <?php echo e(runtimeAllowUserTags()); ?> select2-hidden-accessible" multiple="multiple" tabindex="-1" aria-hidden="true">
                  <option value=""></option>
                  <?php $__currentLoopData = config('settings.invoice_statuses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e(runtimeLang($key)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!--created by -->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.added_by'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <select name="proforma_filter_bill_creatorid" id="proforma_filter_bill_creatorid"
                  class="form-control form-control-sm select2-basic select2-multiple select2-tags select2-hidden-accessible" multiple="multiple" tabindex="-1" aria-hidden="true">
                  <?php $__currentLoopData = config('system.team_members'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->full_name); ?></option>
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
          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" data-url="<?php echo e(urlResource('/proforma-invoices/search')); ?>" data-type="form"
            data-ajax-type="GET"><?php echo e(cleanLang(__('lang.apply_filter'))); ?></button>
        </div>
      </div>
      <!--body-->
    </div>
  </form>
</div>
<!--sidebar-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/proforma-invoices/components/misc/filter-proforma-invoices.blade.php ENDPATH**/ ?>