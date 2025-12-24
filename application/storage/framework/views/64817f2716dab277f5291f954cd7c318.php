<div class="col-12">
    <div class="table-responsive mt-3 invoice-table-wrapper <?php echo e(config('css.bill_mode')); ?> clear-both">
        <table class="table table-hover invoice-table <?php echo e(config('css.bill_mode')); ?>" style="border-collapse: collapse; !important;">
            <thead>
                <tr>
                    <!--action-->
                    <?php if(config('visibility.bill_mode') == 'editing'): ?>
                    <th class="text-left x-action bill_col_action"></th>
                    <?php endif; ?>
                    
                    <th class="text-uppercase text-left x-hsncode bill_col_hsncode " style="padding-top: 0px; padding-bottom: 4px;"><?php echo e(cleanLang(__('lang.hsn_sac_codes'))); ?>

                    </th>
                    <!--quantity-->
                    <th class="text-uppercase text-left x-quantity bill_col_quantity " style="padding-top: 0px; padding-bottom: 4px;"><?php echo e(cleanLang(__('lang.qty'))); ?></th>
                    <!--description-->
                    <th class="text-uppercase text-left x-description bill_col_description " style="padding-top: 0px; padding-bottom: 4px;"><?php echo e(cleanLang(__('lang.description'))); ?>

                    </th>
                    <!--unit price-->
                    <th class="text-uppercase text-left x-unit bill_col_unit " style="padding-top: 0px; padding-bottom: 4px;"><?php echo e(cleanLang(__('lang.unit'))); ?></th>
                    <!--rate-->
                    <th class="text-uppercase text-right x-rate bill_col_rate " style="padding-top: 0px; padding-bottom: 4px;"><?php echo e(cleanLang(__('lang.rate'))); ?></th>

                    <th class="text-uppercase text-right x-total bill_col_taxable_total <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="padding-top: 0px; padding-bottom: 4px;"
                        id="bill_col_taxable_total">
                        <?php echo e(cleanLang(__('lang.amount'))); ?>

                    </th>
                    <!--tax-->
                    <?php if(config('visibility.bill_mode') == 'editing'): ?>
                    <th class="text-uppercase text-left x-tax bill_col_tax <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>">
                        <?php echo e(cleanLang(__('lang.tax'))); ?>

                    </th>
                    <?php else: ?>
                    <?php if($gstType == 'CSGST'): ?>
                    <th class="text-uppercase text-left x-tax bill_col_tax <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="padding-top: 0px; padding-bottom: 4px;">
                        <?php echo e(cleanLang(__('lang.cgst'))); ?>

                    </th>
                    <th class="text-uppercase text-left x-tax bill_col_tax   <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="padding-top: 0px; padding-bottom: 4px;">
                        <?php echo e(cleanLang(__('lang.sgst'))); ?>

                    </th>
                    <?php elseif($gstType == 'IGST'): ?>
                    <th class="text-uppercase text-left x-tax bill_col_tax   <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="padding-top: 0px; padding-bottom: 4px;">
                        <?php echo e(cleanLang(__('lang.igst'))); ?>

                    </th>
                    <?php else: ?>
                    <th class="text-uppercase text-left x-tax bill_col_tax   <?php echo e(runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type)); ?>" style="padding-top: 0px; padding-bottom: 4px;">
                        <?php echo e(cleanLang(__('lang.tax'))); ?>

                    </th>
                    <?php endif; ?>
                    <?php endif; ?>
                    <!--total-->
                    <th class="text-uppercase text-right x-total bill_col_total " style="padding-top: 0px; padding-bottom: 4px;" id="bill_col_total"><?php echo e(cleanLang(__('lang.total'))); ?>

                    </th>
                </tr>
            </thead>
            <?php if(config('visibility.bill_mode') == 'editing'): ?>
            <tbody id="billing-items-container" class="billing-items-container-editing">
                <?php $__currentLoopData = $lineitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lineitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--plain line-->
                <?php if($lineitem->lineitem_type == 'plain'): ?>
                <?php echo $__env->make('pages.bill.components.elements.line-plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <!--estimation notes-->
                <?php if($lineitem->item_notes_estimatation != ''): ?>
                <?php echo $__env->make('pages.bill.components.elements.line-estimation-notes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <!--time line-->
                <?php if($lineitem->lineitem_type == 'time'): ?>
                <?php echo $__env->make('pages.bill.components.elements.line-time', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <!--dimensions line-->
                <?php if($lineitem->lineitem_type == 'dimensions'): ?>
                <?php echo $__env->make('pages.bill.components.elements.line-dimensions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <?php else: ?>
            <tbody id="billing-items-container">
                <?php echo $__env->make('pages.bill.components.elements.lineitems', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </tbody>
            <?php endif; ?>
        </table>
    </div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/main-table.blade.php ENDPATH**/ ?>