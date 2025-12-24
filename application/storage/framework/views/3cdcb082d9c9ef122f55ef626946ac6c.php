<!-- right-sidebar -->
<div class="right-sidebar" id="sidepanel-filter-workorder">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="bi bi-funnel"></i><?php echo e(cleanLang(__('lang.filter_workorder'))); ?>

        <span>
          <i class="bi bi-x-circle js-close-side-panels" data-target="sidepanel-filter-workorder"></i>
        </span>
      </div>
      <!--title-->
      <!--body-->
      <div class="r-panel-body">

        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.company_name'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <!--select2 basic search-->
                <select name="filter_workorder_clientid" id="filter_workorder_clientid"
                  class="filter_clients_and_quotation_toggle form-control form-control-sm js-select2-basic-search-modal select2-hidden-accessible"
                  data-filter-quotation-dropdown="filter_workorder_quotation" data-feed-request-type="clients_quotation" data-ajax--url="<?php echo e(url('/')); ?>/feed/company_names">
                </select>
              </div>
            </div>
          </div>
        </div>


        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.quotation'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-12">
                <!--select2 basic search-->
                <select class="select2-basic form-control form-control-sm dynamic_filter_workorder_quotation" data-allow-clear="true" id="filter_workorder_quotation" name="filter_workorder_quotation"
                  disabled>
                </select>
              </div>
            </div>
          </div>
        </div>



        <!--filter item-->
        <div class="filter-block">
          <div class="title">
            <?php echo e(cleanLang(__('lang.date_created'))); ?>

          </div>
          <div class="fields">
            <div class="row">
              <div class="col-md-6">
                <input type="text" name="filter_date_created_start" class="form-control form-control-sm pickadate" autocomplete="off" placeholder="<?php echo e(cleanLang(__('lang.start'))); ?>">
                <input class="mysql-date" type="hidden" name="filter_date_created_start" id="filter_date_created_start" value="">
              </div>
              <div class="col-md-6">
                <input type="text" name="filter_date_created_end" autocomplete="off" class="form-control form-control-sm pickadate" placeholder="<?php echo e(cleanLang(__('lang.end'))); ?>">
                <input class="mysql-date" type="hidden" name="filter_date_created_end" id="filter_date_created_end" value="">
              </div>
            </div>
          </div>
        </div>


        <!--buttons-->
        <div class="buttons-block">
          <button type="button" name="foo1" class="btn btn-rounded-x btn-secondary js-reset-filter-side-panel"><?php echo e(cleanLang(__('lang.reset'))); ?></button>
          <input type="hidden" name="action" value="search">
          <input type="hidden" name="source" value="<?php echo e($page['source_for_filter_panels'] ?? ''); ?>">
          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" data-url="<?php echo e(urlResource('/workorder/search')); ?>" data-type="form"
            data-ajax-type="GET"><?php echo e(cleanLang(__('lang.apply_filter'))); ?></button>
        </div>


      </div>
      <!--body-->
    </div>
  </form>
</div>
<!--sidebar-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/workorder/components/misc/filter-workorder.blade.php ENDPATH**/ ?>