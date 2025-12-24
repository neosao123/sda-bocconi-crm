<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12  col-lg-5 align-self-center text-right p-b-9 <?php echo e($page['list_page_actions_size'] ?? ''); ?> <?php echo e($page['list_page_container_class'] ?? ''); ?>" id="list-page-actions-container">
  <div id="list-page-actions">
    <?php if(auth()->user()->is_team && auth()->user()->role->role_proforma_invoices >= 2): ?>
      <!--reminder-->
      
      <!--publish invoice-->
      

      
      
      <!--recurring options-->
      
      <!--clone-->
      
      <!--edit-->
      <span class="dropdown">
        <button type="button" data-toggle="dropdown" title="<?php echo e(cleanLang(__('lang.edit'))); ?>" aria-haspopup="true" aria-expanded="false"
          class="data-toggle-tooltip estimate-actions-button btn btn-outline-warning sl-icon-note-border waves-effect waves-dark">
          <i class="sl-icon-note"></i>
        </button>

        <div class="dropdown-menu" aria-labelledby="listTableAction">
          <!--edit-->
          <a class="dropdown-item" href="<?php echo e(url('/proforma-invoices/' . $bill->bill_proforma_invoiceid . '/edit-invoice')); ?>"><i
              class="sl-icon-note display-inline-block p-r-5"></i><?php echo e(cleanLang(__('lang.edit_invoice'))); ?></a>

          

          
        </div>

      </span>
      <!--delete-->
      <?php if(auth()->user()->is_team && auth()->user()->role->role_proforma_invoices >= 3): ?>
        <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.delete_proforma_invoice'))); ?>"
          class="estimate-actions-button btn btn-page-actions sl-icon-trash-border waves-effect waves-dark confirm-action-danger" data-confirm-title="<?php echo e(cleanLang(__('lang.delete_invoice'))); ?>"
          data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE" data-url="<?php echo e(url('/')); ?>/proforma-invoices/<?php echo e($bill->bill_proforma_invoiceid); ?>?source=page">
          <i class="bi bi-trash3 trash"></i></button>
      <?php endif; ?>
    <?php endif; ?>

    

    <!--Download PDF-->
    <a data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.download'))); ?>" id="invoiceDownloadButton" href="<?php echo e(url('/proforma-invoices/' . $bill->bill_uniqueid . '/pdf')); ?>"
      class="estimate-actions-button btn btn-outline-green waves-effect waves-dark" download>
      <ion-icon name="arrow-down-outline"></ion-icon>
    </a>

  </div>
</div>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/misc/proforma-invoice/actions.blade.php ENDPATH**/ ?>