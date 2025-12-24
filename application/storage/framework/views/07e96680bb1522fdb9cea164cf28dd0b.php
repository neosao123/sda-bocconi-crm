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
                
                <td style="width: 50%; vertical-align: top; padding: 0px; margin: 0px;">
                    <div class="px-2 py-2 mt-0" style="color: #01508e;">
                        
                        <p class="p-0 m-0 uppercaseText"><strong><?php echo e($bill->client_company_name ?? '-'); ?></strong></p>

                        
                        <div class="text-div"><?php echo e($bill->client_billing_street ?? '-'); ?></div>

                        
                        <div class="text-div">
                            <?php echo e($bill->client_billing_city || $bill->client_billing_state
                                ? trim(implode(', ', array_filter([$bill->client_billing_city, $bill->client_billing_state])))
                                : '-'); ?>

                        </div>

                        
                        <div class="text-div">
                            <?php echo e($bill->client_billing_country || $bill->client_billing_zip
                                ? trim(implode(' - ', array_filter([$bill->client_billing_country, $bill->client_billing_zip])))
                                : '-'); ?>

                        </div>

                        
                        <div class="text-div">
                            <?php echo e($bill->client_phone ? 'Contact: ' . $bill->client_phone : '-'); ?>

                        </div>

                        
                        <div class="text-div">
                            <?php echo $bill->client_vat ? 'Customer <strong> GSTIN: </strong>' . $bill->client_vat : '-'; ?>

                        </div>
                    </div>
                </td>

                
                <td style="width: 50%; vertical-align: top; padding: 0px; margin: 0px;">
                    <div class="px-2 py-2 mt-0" style="color: #01508e;">
                        
                        <p class="p-0 m-0 uppercaseText"><strong><?php echo e(config('system.settings_company_name') ?? '-'); ?></strong></p>

                        
                        <div class="text-div"><?php echo e(config('system.settings_company_address_line_1') ?? '-'); ?></div>

                        
                        <div class="text-div">
                            <?php echo e(config('system.settings_company_city') || config('system.settings_company_state')
                                ? trim(implode(', ', array_filter([config('system.settings_company_city'), config('system.settings_company_state')])))
                                : '-'); ?>

                        </div>

                        
                        <div class="text-div">
                            <?php echo e(config('system.settings_company_country') || config('system.settings_company_zipcode')
                                ? trim(implode(' - ', array_filter([config('system.settings_company_country'), config('system.settings_company_zipcode')])))
                                : '-'); ?>

                        </div>

                        
                        <div class="text-div">
                            <?php echo e(config('system.settings_company_telephone')
                                ? 'Tel: ' . config('system.settings_company_telephone')
                                : '-'); ?>

                        </div>

                        
                        <div class="text-div">
                            <?php echo config('system.settings_company_gst_number')
                            ? '<strong>GSTIN: </strong>' . config('system.settings_company_gst_number')
                            : '-'; ?>

                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/amc-invoice/amc-invoice-header.blade.php ENDPATH**/ ?>