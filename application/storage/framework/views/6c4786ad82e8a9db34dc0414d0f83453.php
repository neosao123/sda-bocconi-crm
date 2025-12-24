<div class="table-responsive" id="techstacks-table-wrapper">
  <?php if(@count($techStacks ?? []) > 0): ?>
    <table id="demo-taxrate-addrow" class="table m-t-0 m-b-0 table-hover no-wrap contact-list" data-page-size="10">
      <thead>
        <tr>
          <th class="techstack_col_title"><?php echo e(cleanLang(__('lang.title'))); ?></th>
          <th class="techstack_col_created_by"><?php echo e(cleanLang(__('lang.created_by'))); ?></th>
          <th class="techstack_col_action w-px-100"><a href="javascript:void(0)"><?php echo e(cleanLang(__('lang.action'))); ?></a></th>
        </tr>
      </thead>
      <tbody id="techstacks-td-container">
        <!--ajax content here-->
        <?php echo $__env->make('pages.settings.sections.techstack.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--ajax content here-->
      </tbody>
      <ttaxratet>
        <tr>
          <td colspan="20">
            <!--load more button-->
            <?php echo $__env->make('misc.load-more-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--load more button-->
          </td>
        </tr>
      </ttaxratet>
    </table>
  <?php endif; ?>
  <?php if(@count($techStacks ?? []) == 0): ?>
    <!--nothing found-->
    <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--nothing found-->
  <?php endif; ?>


</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/settings/sections/techstack/table/table.blade.php ENDPATH**/ ?>