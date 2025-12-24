<div class="card count-<?php echo e(@count($workorder ?? [])); ?>" id="workorder-table-wrapper">
  <div class="card-body">
    <div class="table-responsive list-table-wrapper">
      <?php if(@count($workorder ?? []) > 0): ?>
        <table id="workorder-list-table" class="table m-t-0 m-b-0 table-hover no-wrap contact-list" data-page-size="10">
          <thead>
            <tr>
              <!--tableconfig_column_1 [workorder_id]-->
              <th class="col_workorder_id <?php echo e(config('table.tableconfig_column_1')); ?> tableconfig_column_1">
                <a class="js-ajax-ux-request js-list-sorting" id="sort_workorder_id" href="javascript:void(0)"
                  data-url="<?php echo e(urlResource('/workorder?action=sort&orderby=workorder_id&sortorder=asc')); ?>"><?php echo e(cleanLang(__('lang.id'))); ?><span class="sorting-icons"><i
                      class="ti-arrows-vertical"></i></span></a>
              </th>


              <!--tableconfig_column_2 [workorder_client]-->
              <th class="col_workorder_client <?php echo e(config('table.tableconfig_column_3')); ?> tableconfig_column_3">
                <a class="js-ajax-ux-request js-list-sorting" id="sort_workorder_client" href="javascript:void(0)"
                  data-url="<?php echo e(urlResource('/workorder?action=sort&orderby=workorder_client&sortorder=asc')); ?>">
                  <?php echo e(cleanLang(__('lang.client'))); ?><span class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
              </th>


              <!--tableconfig_column_2 [workorder_quotation]-->
              <th class="col_workorder_project <?php echo e(config('table.tableconfig_column_4')); ?> tableconfig_column_4">
                <a class="js-ajax-ux-request js-list-sorting" id="sort_workorder_quotation" href="javascript:void(0)"
                  data-url="<?php echo e(urlResource('/workorder?action=sort&orderby=workorder_quotation&sortorder=asc')); ?>">
                  <?php echo e(cleanLang(__('lang.quotation'))); ?><span class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
              </th>


              <!--tableconfig_column_2 [workorder_date]-->
              <th class="col_workorder_date <?php echo e(config('table.tableconfig_column_5')); ?> tableconfig_column_5">
                <a class="js-ajax-ux-request js-list-sorting" id="sort_workorder_date" href="javascript:void(0)"
                  data-url="<?php echo e(urlResource('/workorder?action=sort&orderby=workorder_date&sortorder=asc')); ?>">
                  <?php echo e(cleanLang(__('lang.date'))); ?><span class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a>
              </th>

              <!--actions-->
              <?php if(config('visibility.action_column')): ?>
                <th class="col_action with-table-config-icon"><a href="javascript:void(0)"><?php echo e(cleanLang(__('lang.action'))); ?></a>

                  
                </th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody id="workorder-td-container">
            <!--ajax content here-->
            <?php echo $__env->make('pages.workorder.components.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--ajax content here-->
          </tbody>
          <tfoot>
            <tr>
              <td colspan="20">
                <!--load more button-->
                <?php echo $__env->make('misc.load-more-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--load more button-->
              </td>
            </tr>
          </tfoot>
        </table>
        <?php endif; ?> <?php if(@count($workorder ?? []) == 0): ?>
          <!--nothing found-->
          <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!--nothing found-->
        <?php endif; ?>
    </div>
  </div>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/workorder/components/table/table.blade.php ENDPATH**/ ?>