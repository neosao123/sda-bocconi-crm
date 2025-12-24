<?php
// Always define all keys in same order
$to = [
'title' => normalizeCompanyName($bill?->client_company_name) ?: '-',
'street' => $bill?->client_billing_street ?: '-',
'city' => $bill?->client_billing_city || $bill?->client_billing_state
? trim(implode(', ', array_filter([$bill?->client_billing_city, $bill?->client_billing_state])))
: '-',
'country_zip' => $bill?->client_billing_country || $bill?->client_billing_zip
? trim(implode(' - ', array_filter([$bill?->client_billing_country, $bill?->client_billing_zip])))
: '-',
'phone' => $bill?->client_phone ? 'Contact: ' . $bill?->client_phone : '-',
'vat' => $bill?->client_vat ? '<strong>GSTIN: </strong> ' . $bill?->client_vat : '-',
];

$from = [
'title' => normalizeCompanyName(config('system.settings_company_name')) ?: '-',
'street' => config('system.settings_company_address_line_1') ?: '-',
'city' => config('system.settings_company_city') || config('system.settings_company_state')
? trim(implode(', ', array_filter([config('system.settings_company_city'), config('system.settings_company_state')])))
: '-',
'country_zip' => config('system.settings_company_country') || config('system.settings_company_zipcode')
? trim(implode(' - ', array_filter([config('system.settings_company_country'), config('system.settings_company_zipcode')])))
: '-',
'phone' => config('system.settings_company_telephone') ? 'Tel: ' . config('system.settings_company_telephone') : '-',
'vat' => config('system.settings_company_gst_number') ? '<strong>GSTIN: </strong> ' . config('system.settings_company_gst_number') : '-',
];

// Keys are fixed now
$keys = array_keys($to);
?>

<div class="text-start quotation-header p-0 m-0" style="width: 100%">
    <table style="width: 100%">
        <thead>
            <tr style="background: #f5f5f5; border: 0.8px solid #A9C3E9;">
                <td style="width: 50%" class="p-0 m-0">
                    <h6 style="color: #01508e;" class="text-uppercase px-2 py-0 mb-1 mt-0">
                        <strong><?php echo e(cleanLang(__('lang.to'))); ?></strong>
                    </h6>
                </td>
                <td style="width: 50%" class="p-0 m-0">
                    <h6 style="color: #01508e;" class="text-uppercase px-2 py-0 mb-1 mt-0">
                        <strong><?php echo e(cleanLang(__('lang.from'))); ?></strong>
                    </h6>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr style="background: #e0e8f1; border: 0.8px solid #A9C3E9;">
                <td style="width: 50%; vertical-align:top; padding: 0px; margin: 0px;">
                    <div class="px-2 py-2 mt-0" style="color: #01508e;">
                        <?php $__currentLoopData = $keys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key === 'title'): ?>
                        <p class="p-0 m-0 uppercaseText"><strong><?php echo e($to[$key]); ?></strong></p>
                        <?php else: ?>
                        <div class="text-div"><?php echo $to[$key]; ?></div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </td>
                <td style="width: 50%; vertical-align:top; padding: 0px; margin: 0px;">
                    <div class="px-2 py-2 mt-0" style="color: #01508e;">
                        <?php $__currentLoopData = $keys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key === 'title'): ?>
                        <p class="p-0 m-0 uppercaseText"><strong><?php echo e($from[$key]); ?></strong></p>
                        <?php else: ?>
                        <div class="text-div"><?php echo $from[$key]; ?></div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/invoice/invoice-header.blade.php ENDPATH**/ ?>