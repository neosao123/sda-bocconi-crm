    <!--dates-->
    <div class="pull-left invoice-dates">
        <table>
            <tr>
                <td class="x-date-lang" id="fx-invoice-date-lang"><?php echo e(cleanLang(__('lang.from_date'))); ?> </td>
                <?php if(config('visibility.bill_mode') == 'editing'): ?>
                <td><input type="text" class="form-control form-control-xs pickadate" name="bill_from_date"
                        autocomplete="off" value="<?php echo e(runtimeDate($bill->bill_from_date)); ?>">
                    <input class="mysql-date" type="hidden" name="bill_from_date" id="bill_from_date"
                        value="<?php echo e($bill->bill_from_date); ?>">
                </td>
                <?php else: ?>
                <td class="x-date"> <span><?php echo e(runtimeDate($bill->bill_from_date)); ?></span></td>
                <?php endif; ?>
            </tr>
            <tr>
                <td class="x-date-due-lang"><?php echo e(cleanLang(__('lang.to_date'))); ?> </td>
                <?php if(config('visibility.bill_mode') == 'editing'): ?>
                <td><input type="text" class="form-control form-control-xs pickadate" name="bill_to_date"
                        autocomplete="off" value="<?php echo e(runtimeDate($bill->bill_to_date)); ?>">
                    <input class="mysql-date" type="hidden" name="bill_to_date" id="bill_to_date"
                        value="<?php echo e($bill->bill_to_date); ?>">
                </td>
                <?php else: ?>
                <td class="x-date-due"> <span><?php echo e(runtimeDate($bill->bill_to_date)); ?></span></td>
                <?php endif; ?>
            </tr>
        </table>
    </div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/amc-invoice/dates.blade.php ENDPATH**/ ?>