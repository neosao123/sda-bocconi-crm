<?php $__currentLoopData = $lineitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lineitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    
    <td class="x-hsncode text-wrap-new-lines" style="width: 10.5% !important; padding-top: 0px; padding-bottom: 4px;"><?php echo e($lineitem->lineitem_hsncode); ?></td>


    <!--quantity - [plain]-->
    <?php if($lineitem->lineitem_type == 'plain'): ?>
      <td class="x-quantity" style="width: 9.5% !important; padding-top: 0px; padding-bottom: 4px;"><?php echo e($lineitem->lineitem_quantity); ?></td>
    <?php endif; ?>

    <!--quantity -[time]-->
    <?php if($lineitem->lineitem_type == 'time'): ?>
      <td class="x-quantity" style="width: 9.5% !important; padding-top: 0px; padding-bottom: 4px;">
        <?php if($lineitem->lineitem_time_hours > 0): ?>
          <?php echo e($lineitem->lineitem_time_hours); ?><?php echo e(strtolower(__('lang.hrs'))); ?>&nbsp;
        <?php endif; ?>
        <?php if($lineitem->lineitem_time_minutes > 0): ?>
          <?php echo e($lineitem->lineitem_time_minutes); ?><?php echo e(strtolower(__('lang.mins'))); ?>

        <?php endif; ?>
      </td>
    <?php endif; ?>

    <!--quantity - [dimensions]-->
    <?php if($lineitem->lineitem_type == 'dimensions'): ?>
      <td class="x-quantity" style="width: 5% !important; padding-top: 0px; padding-bottom: 4px;"><?php echo e($lineitem->lineitem_quantity); ?></td>
    <?php endif; ?>

    <!--description-->
    <td class="x-description text-wrap-new-lines" style="width: auto !important; padding-top: 0px; padding-bottom: 4px;"><?php echo e($lineitem->lineitem_description); ?></td>

    <!--unit price-->
    <td class="x-unit" style="width: 11% !important; padding-top: 0px; padding-bottom: 4px;"><?php echo e($lineitem->lineitem_unit); ?></td>
    <!--rate-->
    <td class="x-rate text-right" style="width: 11% !important; padding-top: 0px; padding-bottom: 4px;"><?php echo e(runtimeNumberFormat($lineitem->lineitem_rate)); ?></td>
    <!--tax-->
    
    <td class="x-total text-right <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="width: 12% !important; padding-top: 0px; padding-bottom: 4px;">
      <?php echo e(runtimeNumberFormat($lineitem->lineitem_taxable_total)); ?></td>
    <?php if($gstType == 'CSGST'): ?>
      <td class="x-tax <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="width: 8% !important; padding-top: 0px; padding-bottom: 4px;">
        <?php $__currentLoopData = $lineitem->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($tax->tax_rate == '0.00'): ?>
            ---
          <?php else: ?>
            <?php echo e($tax->tax_rate / 2 . '%'); ?>

          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </td>
      <td class="x-tax <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="width: 8% !important; padding-top: 0px; padding-bottom: 4px;">
        <?php $__currentLoopData = $lineitem->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($tax->tax_rate == '0.00'): ?>
            ---
          <?php else: ?>
            <?php echo e($tax->tax_rate / 2 . '%'); ?>

          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </td>
    <?php elseif($gstType == 'IGST'): ?>
      <td class="x-tax <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="width: 8% !important; padding-top: 0px; padding-bottom: 4px;">
        <?php $__currentLoopData = $lineitem->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($tax->tax_rate == '0.00'): ?>
            ---
          <?php else: ?>
            

            <?php echo e($tax->tax_rate . '%'); ?>

          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </td>
    <?php else: ?>
      <td class="x-tax <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="width: 8% !important; padding-top: 0px; padding-bottom: 4px;">
        <?php $__currentLoopData = $lineitem->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($tax->tax_rate == '0.00'): ?>
            ---
          <?php else: ?>
            <?php echo e($tax->tax_rate . '%'); ?>

          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </td>
    <?php endif; ?>


    <!--total-->
    <?php if(config('css.bill_mode') === 'pdf-mode-download'): ?>
      <td class="x-total text-right" style="width: 14% !important; background: #e9e7dc !important; padding-top: 0px; padding-bottom: 4px;">
        <?php echo e(runtimeNumberFormat($lineitem->lineitem_total)); ?>

      </td>
    <?php else: ?>
      <td class="x-total text-right" style="width: 14% !important; padding-top: 0px; padding-bottom: 4px;">
        <?php echo e(runtimeNumberFormat($lineitem->lineitem_total)); ?>

      </td>
    <?php endif; ?>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/lineitems.blade.php ENDPATH**/ ?>