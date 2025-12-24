<div class="text-start quotation-header">
    
    <div style="display: inline-block; width: 32.05%; vertical-align: top; padding-right: 9px;">
        <h6 style="background: #1f487c; color: #fff; height: 20px; line-height: 14.5px;" class="text-uppercase px-1 py-0">
            <strong><?php echo e(cleanLang(__('lang.quotation_for'))); ?></strong>
        </h6>
        <div style="padding: 0px !important; margin: 0px !important;">

            
            <p class="p-0 m-0 uppercaseText" style="font-size: 11px; line-height: 13px;">
                <strong>
                    <?php if(isset($bill->lead) && isset($bill->bill_leadid)): ?>
                    <?php echo e($bill->bill_leadtype == 'customer_lead'
              ? ($bill->lead->client->client_company_name ?? '-')
              : ($bill->lead->lead_company_name ?? '-')); ?>

                    <?php else: ?>
                    <?php echo e($bill->client_company_name ?? '-'); ?>

                    <?php endif; ?>
                </strong>
            </p>

            
            <div class="text-div">
                <?php if(isset($bill->lead) && isset($bill->bill_leadid)): ?>
                <?php echo e($bill->bill_leadtype == 'customer_lead'
            ? ($bill->lead->client->client_billing_street ?? '-')
            : ($bill->lead->lead_street ?? '-')); ?>

                <?php else: ?>
                <?php echo e($bill->client_billing_street ?? '-'); ?>

                <?php endif; ?>
            </div>

            
            <div class="text-div">
                <?php if(isset($bill->lead) && isset($bill->bill_leadid)): ?>
                <?php echo e($bill->bill_leadtype == 'customer_lead'
            ? (($bill->lead->client->client_billing_city || $bill->lead->client->client_billing_zip)
                ? trim(implode(' - ', array_filter([$bill->lead->client->client_billing_city, $bill->lead->client->client_billing_zip])))
                : '-')
            : (($bill->lead->lead_city || $bill->lead->lead_zip)
                ? trim(implode(' - ', array_filter([$bill->lead->lead_city, $bill->lead->lead_zip])))
                : '-')); ?>

                <?php else: ?>
                <?php echo e(($bill->client_billing_city || $bill->client_billing_zip)
              ? trim(implode(' - ', array_filter([$bill->client_billing_city, $bill->client_billing_zip])))
              : '-'); ?>

                <?php endif; ?>
            </div>

            
            <div class="text-div">
                <?php if(isset($bill->lead) && isset($bill->bill_leadid)): ?>
                <?php echo e($bill->bill_leadtype == 'customer_lead'
            ? ($bill->lead->client->client_billing_state ?? '-')
            : ($bill->lead->lead_state ?? '-')); ?>

                <?php else: ?>
                <?php echo e($bill->client_billing_state ?? '-'); ?>

                <?php endif; ?>
            </div>

            
            <div class="text-div">
                <?php if(isset($bill->lead) && isset($bill->bill_leadid)): ?>
                <?php echo e($bill->bill_leadtype == 'customer_lead'
            ? ($bill->lead->client->client_billing_country ?? '-')
            : ($bill->lead->lead_country ?? '-')); ?>

                <?php else: ?>
                <?php echo e($bill->client_billing_country ?? '-'); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div style="display: inline-block; width: 32.05%; vertical-align: top; padding-right: 9px;">
        <h6 style="background: #1f487c; color: #fff; height: 20px; line-height: 14.5px;" class="text-uppercase px-1 py-0">
            <strong><?php echo e(cleanLang(__('lang.quotation_from'))); ?></strong>
        </h6>
        <div style="padding: 0px !important; margin: 0px !important;">
            
            <p class="p-0 m-0 uppercaseText" style="font-size: 11px; line-height: 13px;">
                <strong><?php echo e(config('system.settings_company_name') ?? '-'); ?></strong>
            </p>

            
            <div class="text-div"><?php echo e(config('system.settings_company_address_line_1') ?? '-'); ?></div>

            
            <div class="text-div">
                <?php echo e(config('system.settings_company_city') || config('system.settings_company_zipcode')
            ? trim(implode(' - ', array_filter([config('system.settings_company_city'), config('system.settings_company_zipcode')])))
            : '-'); ?>

            </div>

            
            <div class="text-div">
                <?php echo e(config('system.settings_company_state') || config('system.settings_company_country')
            ? trim(implode(', ', array_filter([config('system.settings_company_state'), config('system.settings_company_country')])))
            : '-'); ?>

            </div>
        </div>
    </div>

    
    <div style="display: inline-block; width: 32.05%; vertical-align: top;">
        <h6 style="background: #1f487c; color: #fff; height: 20px; line-height: 14.5px;" class="text-uppercase px-1 py-0">
            <strong><?php echo e(cleanLang(__('lang.shipping_details'))); ?></strong>
        </h6>
        <div style="padding: 0px !important; margin: 0px !important;">
            <!-- contact person -->
            <div class="text-div">
                <?php echo e(cleanLang(__('lang.contact_person'))); ?> : <span class="mx-2">Shubham Mulye</span>
            </div>
            <!-- contact number -->
            <div class="text-div">
                <?php echo e(cleanLang(__('lang.contact_number'))); ?> : <span class="mx-2">+91 7038317038</span>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/components/elements/estimate/quotation-header.blade.php ENDPATH**/ ?>