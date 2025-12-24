<!-- right-sidebar -->
<div class="right-sidebar" id="sidepanel-filter-leads">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="bi bi-funnel"></i><?php echo e(cleanLang(__('lang.filter_leads'))); ?>

        <span>
          <i class="bi bi-x-circle js-close-side-panels" data-target="sidepanel-filter-leads"></i>
        </span>
      </div>
      <!--title-->
      <!--body-->
      <div class="r-panel-body">
        

        <!--assigned-->
        <?php if(config('visibility.filter_panel_assigned')): ?>
          <div class="filter-block">
            <div class="title">
              <?php echo e(cleanLang(__('lang.assigned_users'))); ?>

            </div>
            <div class="fields">
              <div class="row">
                <div class="col-md-12">
                  <select name="filter_assigned" id="filter_assigned" class="form-control form-control-sm select2-basic select2-multiple select2-tags select2-hidden-accessible" multiple="multiple"
                    tabindex="-1" aria-hidden="true">
                    <?php $__currentLoopData = config('system.team_members'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($user->id); ?>"><?php echo e($user->full_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <!--assigned-->

        <!--lead status-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.status'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <select name="filter_lead_status" id="filter_lead_status" class="form-control form-control-sm select2-basic select2-multiple select2-tags select2-hidden-accessible" multiple="multiple"
                  tabindex="-1" aria-hidden="true">
                  <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status->leadstatus_id); ?>">
                      <?php echo e(runtimeLang($status->leadstatus_title)); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!--lead status-->


        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.source'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <select name="filter_lead_source" id="filter_lead_source" class="form-control form-control-sm select2-basic select2-multiple select2-tags select2-hidden-accessible" multiple="multiple"
                  tabindex="-1" aria-hidden="true">
                  <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $sourcelist[] = $source->leadsources_title;?>
                    <option value="<?php echo e($source->leadsources_title); ?>" <?php echo e(runtimePreselected($lead->lead_source ?? '', $source->leadsources_title)); ?>><?php echo e($source->leadsources_title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>
        </div>


        <!--date addded-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.date_added'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-6">
                <input type="text" name="filter_lead_created_start" class="form-control form-control-sm pickadate" autocomplete="off" placeholder="Start">
                <input class="mysql-date" type="hidden" id="filter_lead_created_start" name="filter_lead_created_start" value="">
              </div>
              <div class="col-md-6">
                <input type="text" name="filter_lead_created_end" class="form-control form-control-sm pickadate" placeholder="End">
                <input class="mysql-date" type="hidden" id="filter_lead_created_end" name="filter_lead_created_end" value="">
              </div>
            </div>
          </div>
        </div>
        <!--date added-->

        <!--last contacted-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.last_contact'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-6">
                <input type="text" name="filter_lead_last_contacted_start" class="form-control form-control-sm pickadate" autocomplete="off" placeholder="Start">
                <input class="mysql-date" type="hidden" id="filter_lead_last_contacted_start" name="filter_lead_last_contacted_start" value="">
              </div>
              <div class="col-md-6">
                <input type="text" name="filter_lead_last_contacted_end" class="form-control form-control-sm pickadate" autocomplete="off" placeholder="End">
                <input class="mysql-date" type="hidden" id="filter_lead_last_contacted_end" name="filter_lead_last_contacted_end" value="">
              </div>
            </div>
          </div>
        </div>
        <!--last contacted-->

        <!--value-->
        
        <!--value-->

        <!--tags-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.tags'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <select name="filter_tags" id="filter_tags" class="form-control form-control-sm select2-multiple <?php echo e(runtimeAllowUserTags()); ?> select2-hidden-accessible" multiple="multiple"
                  tabindex="-1" aria-hidden="true">
                  <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tag->tag_title); ?>">
                      <?php echo e($tag->tag_title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!--tags-->

        <!--state-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.show'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <select class="select2-basic form-control form-control-sm" id="filter_lead_state" name="filter_lead_state">
                  <option value=""></option>
                  <option value="active"><?php echo app('translator')->get('lang.active_leads'); ?></option>
                  <option value="archived"><?php echo app('translator')->get('lang.archives_leads'); ?></option>
                  <option value="all"><?php echo app('translator')->get('lang.everything'); ?></option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!--status -->


        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.lead_type'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <select class="select2-basic form-control form-control-sm" data-allow-clear="true" id="filter_lead_type" name="filter_lead_type">
                  <option value=""></option>
                  <option value="inhouse"><?php echo e(__('lang.lead_type_inhouse')); ?></option>
                  <option value="associate"><?php echo e(__('lang.lead_type_associate')); ?></option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!--custom fields-->
        <?php echo $__env->make('misc.customfields-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!--buttons-->
        <div class="buttons-block">
          <button type="button" name="foo1" class="btn btn-rounded-x btn-secondary js-reset-filter-side-panel"><?php echo e(cleanLang(__('lang.reset'))); ?></button>
          <input type="hidden" name="action" value="search">
          
          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" data-url="<?php echo e(urlResource('/leads/search')); ?>" data-type="form"
            data-ajax-type="GET"><?php echo e(cleanLang(__('lang.apply_filter'))); ?></button>
        </div>


      </div>
      <!--body-->
    </div>
  </form>
</div>
<!--sidebar-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/leads/components/misc/filter-leads.blade.php ENDPATH**/ ?>