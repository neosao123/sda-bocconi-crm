<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12  col-lg-7 p-b-9 align-self-center text-right <?php echo e($page['list_page_actions_size'] ?? ''); ?> <?php echo e($page['list_page_container_class'] ?? ''); ?>" id="list-page-actions-container">
  <div id="list-page-actions">
    <a data-toggle="tooltip" title="<?php echo e(__('lang.project_requirement')); ?>" id="projectRequirementsDownloadButton" href="<?php echo e(url('/workorder/download/requirements/' . $workorder->workorder_id)); ?>"
      class="estimate-actions-button btn btn-outline-green waves-effect waves-dark" download>
      <ion-icon name="arrow-down-outline"></ion-icon>
    </a>
  </div>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/workorder/components/misc/view-page-actions.blade.php ENDPATH**/ ?>