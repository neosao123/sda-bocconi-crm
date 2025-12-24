<table style="width: 100%; border-collapse: collapse;">
  <tr>
    <td style="width: 63%; vertical-align: top; padding-right: .4rem">
      <!-- TERMS -->
      <div style="border: 1px solid #c0c0c0;">
        <h6 style="background: #1f487c; color: #fff; height: 20px; line-height: 14.5px;" class="text-uppercase px-1 py-0">
          <strong><?php echo e(cleanLang(__('lang.terms_and_conditions'))); ?></strong>
        </h6>
        <div class="px-1 py-0 m-0" style="font-size: 10px; padding: 0px; margin: 0px;">
          <?php echo clean($bill->bill_terms); ?>

        </div>
      </div>
      <div class="text-start mt-2" style="font-size: 13px; font-weight: 550; font-style: italic;">
        <strong>“THANKS FOR YOUR BUSINESS”</strong>
      </div>
    </td>
    <td style="width: 35%; vertical-align: top;">
      <table class="invoice-table" style="width: 100%; border-collapse: collapse; font-weight: 650 !important; font-size: 7.8px !important;">
        <tr>
          <td class="m-0 p-0" style="width: 46% !important; height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
            Subtotal
          </td>
          <td class="text-right m-0 p-0"
            style="width: 64% !important; height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;"
            id="billing-subtotal-figure">
            <span><?php echo runtimeMoneyFormatPDF($bill->bill_subtotal); ?></span>
          </td>
        </tr>
        <tr id="billing-sums-discount-container">
          <?php if($bill->bill_discount_type == 'percentage'): ?>
            <td class="x-line m-0 p-0" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important; ">
              <?php echo e(cleanLang(__('lang.discount'))); ?> <span class="x-small" id="dom-billing-discount-type">(<?php echo e($bill->bill_discount_percentage); ?>%)</span>
            </td>
          <?php else: ?>
            <td class="x-line m-0 p-0" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important; ">
              <?php echo e(cleanLang(__('lang.discount'))); ?> <span class="x-small" id="dom-billing-discount-type">(<?php echo e(cleanLang(__('lang.fixed'))); ?>)</span></td>
          <?php endif; ?>
          <td class="text-right x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;"
            id="billing-sums-discount">
            -<?php echo runtimeMoneyFormatPDF($bill->bill_discount_amount); ?>

          </td>
        </tr>
        <tr>
          <td class="x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">Taxable Amount</td>
          <td class="text-right x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
            <span><?php echo runtimeMoneyFormatPDF($bill->bill_amount_before_tax); ?></span>
          </td>
        </tr>
        <?php if($bill->bill_tax_type == 'summary'): ?>
          <tr>
            <td class="x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">Tax (%)</td>
            <?php $__empty_1 = true; $__currentLoopData = $bill->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <?php if($gstType == 'CSGST'): ?>
                <td class="p-0">
                  <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                      <td class="x-left x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                        <?php echo e('CGST'); ?> (<?php echo e($tax->tax_rate / 2); ?>%) </td>
                      <td class="x-right text-right x-line"
                        style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                        <span><?php echo runtimeMoneyFormatPDF(($bill->bill_amount_before_tax * $tax->tax_rate) / 100 / 2); ?></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="x-left x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                        <?php echo e('SGST'); ?> (<?php echo e($tax->tax_rate / 2); ?>%) </td>
                      <td class="x-right text-right x-line"
                        style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                        <span><?php echo runtimeMoneyFormatPDF(($bill->bill_amount_before_tax * $tax->tax_rate) / 100 / 2); ?></span>
                      </td>
                    </tr>
                  </table>
                </td>
              <?php elseif($gstType == 'IGST'): ?>
                <td class="p-0 m-0">
                  <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                      <td class="x-left x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                        <?php echo e('IGST'); ?> (<?php echo e($tax->tax_rate); ?>%) </td>
                      <td class="x-right text-right x-line"
                        style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                        <span><?php echo runtimeMoneyFormatPDF(($bill->bill_amount_before_tax * $tax->tax_rate) / 100); ?></span>
                      </td>
                    </tr>
                  </table>

                </td>
              <?php else: ?>
                <td class="p-0 m-0">
                  <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                      <td class="x-left x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                        <?php echo e($tax->tax_name); ?> <span class="x-small">(<?php echo e($tax->tax_rate); ?>%)</span></td>
                      <td class="x-right text-right x-line"
                        style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                        <span><?php echo runtimeMoneyFormatPDF(($bill->bill_amount_before_tax * $tax->tax_rate) / 100); ?></span>
                      </td>
                    </tr>
                  </table>
                </td>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <td class="x-right text-right x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                <span><?php echo runtimeMoneyFormatPDF(0); ?></span>
              </td>
            <?php endif; ?>
          </tr>
        <?php endif; ?>

        <!--taxes (inline)-->
        <?php if($bill->bill_tax_type == 'inline'): ?>
          <tr>
            <td class="x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">Tax</td>
            <td class="p-0 m-0">
              <table style="width: 100%; border-collapse: collapse;">
                <tr>
                  <td class="x-right text-right x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
                    <span><?php echo runtimeMoneyFormatPDF($bill->bill_tax_total_amount); ?></span></span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        <?php endif; ?>


        <tr class="billing-adjustment-container <?php echo e($bill->visibility_adjustment_row); ?>" id="billing-adjustment-container">
          <td class="x-line billing-adjustment-text" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;"
            id="billing-adjustment-container-description">
            <?php echo e($bill->bill_adjustment_description); ?></td>
          <td class="text-right x-line billing-adjustment-text"
            style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px
            !important;">
            <span id="billing-adjustment-container-amount"><?php echo runtimeMoneyFormatPDF($bill->bill_adjustment_amount); ?></span>
          </td>
        </tr>
        <tr style="background-color: #f4f4f4;">
          <td class="x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">Total</td>
          <td class="text-right x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
            <span><?php echo runtimeMoneyFormatPDF($bill->bill_final_amount); ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="2" class="x-line" style="height: 30px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">In
            words:
            <?php echo convertNumberToWords($bill->bill_final_amount); ?>

            Only</td>
        </tr>
        <tr>
          <td class="x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">Currency</td>
          <td class="text-right x-line" style="height: 20px; line-height: 10px; text-align: left; vertical-align: middle; padding-left: 5px !important; padding-right: 5px !important;">
            <?php echo e(config('system.settings_system_currency_code')); ?>

          </td>
        </tr>
      </table>
      <table style="margin-top: 75px; width: 100%; font-weight: 650 !important; font-size: 11px;">
        <tr>
          <td>
            <div class="text-right">
              <hr style="height: .8px; background-color: #A9C3E9; width: 75%;" class="mb-0 p-0" />
              <div class="p-0 m-0 text-center">
                <p class="p-0 m-0" style="color: #01508e;"><strong><?php echo e(__('lang.for')); ?></strong></p>
                <p class="p-0 m-0 text-uppercase" style="color: #01508e;"><strong><?php echo e(config('system.settings_company_name')); ?></strong></p>
                <p class="p-0 m-0">(<?php echo e(__('lang.authorized_signatory')); ?>)</p>
              </div>
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/proforma-invoice/footer-table.blade.php ENDPATH**/ ?>