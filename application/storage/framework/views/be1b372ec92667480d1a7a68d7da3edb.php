<?php
$client_tax_number = $bill->client->client_vat ?? '';
if ($bill->bill_type == 'estimate') {
if (isset($bill->lead) && isset($bill->bill_leadid)) {
if ($bill->bill_leadtype == 'customer_lead') {
$client_tax_number = $bill->lead->client->client_vat ?? '';
} else {
$client_tax_number = $bill->lead->lead_vat ?? '';
}
}
}
$company_tax_number = config('system.settings_company_gst_number') ?? '';
$pattern = "/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/";
$gstType = 'TAX';
if ($client_tax_number != '' && $company_tax_number != '') {
if (preg_match($pattern, $client_tax_number)) {
$client_tax_state = substr($client_tax_number, 0, 2);
$company_tax_state = substr($company_tax_number, 0, 2);
if ($company_tax_state == $client_tax_state) {
$gstType = 'CSGST';
} else {
$gstType = 'IGST';
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" id="meta-csrf" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(config('system.settings_company_name')); ?></title>
    <?php if(request('view') == 'preview'): ?>
    <base href="<?php echo e(url('/')); ?>" target="_self">
    <link href="<?php echo e(config('constant.asset_url')); ?>/public/vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <?php else: ?>
    <base href="" target="_self">
    <link href="<?php echo e(BASE_DIR); ?>/public/vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <?php endif; ?>
    <!-- [DYNAMIC] style sets dynamic paths to font files-->
    <style>
        @font-face {
            font-family: 'ProductSans';
            font-style: normal;
            font-weight: normal;
            src: url('<?php echo e(storage_path(' app/Product-Sans-Regular.ttf')); ?>') format("truetype");
        }

        @font-face {
            font-family: 'ProductSans';
            font-style: italic;
            font-weight: normal;
            src: url('<?php echo e(storage_path(' app/Product-Sans-Italic.ttf')); ?>') format("truetype");
        }

        @font-face {
            font-family: 'ProductSans';
            font-style: italic;
            font-weight: bold;
            src: url('<?php echo e(storage_path(' app/Product-Sans-Bold-Italic.ttf')); ?>') format("truetype");
        }

        @font-face {
            font-family: 'ProductSans';
            font-style: normal;
            font-weight: bold;
            src: url('<?php echo e(storage_path(' app/Product-Sans-Bold.ttf')); ?>') format("truetype");
        }

        .logo-img img {
            width: 45px !important;
            height: 50px !important;
        }

        .invoice-table th {
            /* background: #EEECE1 !important; */
            background: ##ddd9c4 !important;
            border: 1px solid #c0c0c0 !important;
        }

        body {
            font-family: 'ProductSans' !important;
        }

        .bill-watermark {
            background: url('<?php echo e(BASE_DIR); ?>/storage/logos/neosao.png') no-repeat center center fixed !important;
            background-size: contain;
            background-color: #fff;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
    <?php if($bill->bill_type == 'proforma-invoice' || $bill->bill_type == 'invoice' || $bill->bill_type == 'amc-invoice'): ?>
    <style>
        @page {
            size: A4;
            margin-top: 220px;
            margin-bottom: 100px;
            margin-left: 40px;
            margin-right: 40px;
        }

        header {
            position: fixed;
            top: -193px;
            left: 0;
            right: 0;
            height: 100px;
            text-align: center;
            line-height: 15px;
            font-size: 12px;
        }
    </style>
    <?php endif; ?>

    <?php if($bill->bill_type == 'estimate'): ?>
    <style>
        @page {
            size: A4;
            margin-top: 260px;
            margin-bottom: 100px;
            margin-left: 40px;
            margin-right: 40px;
        }

        header {
            position: fixed;
            top: -220px;
            left: 0;
            right: 0;
            height: 100px;
            text-align: center;
            line-height: 15px;
            font-size: 12px;
        }
    </style>
    <?php endif; ?>
    <style>
        footer {
            position: fixed;
            bottom: -90px;
            left: 50%;
            transform: translateX(-50%);
            height: 100px;
            text-align: center;
            line-height: 15px;
            font-size: 12px;
            width: 100%;
        }

        footer table {
            margin: 0 auto;
        }

        main {
            box-sizing: border-box;
        }

        thead {
            display: table-header-group;
        }

        .quotation-header .text-div {
            line-height: 13px;
            font-size: 11px;
        }
    </style>

    <?php if(config('css.bill_mode') === 'pdf-mode-download'): ?>
    <style>
        .invoice-table {
            width: 100%;
            table-layout: fixed;
        }


        .invoice-table th,
        .invoice-table td {
            border: 1px solid #c0c0c0;
            word-wrap: break-word;
            white-space: normal;
            vertical-align: top;
        }

        .invoice-table th {
            font-size: 9.9px !important;
        }

        .invoice-table td {
            font-size: 11px !important;
        }
    </style>
    <?php endif; ?>


    <?php if(request('view') == 'preview'): ?>
    <link href="<?php echo e(config('theme.selected_theme_pdf_css')); ?>" rel="stylesheet">
    <?php else: ?>
    <link href="<?php echo e(config('theme.selected_theme_pdf_css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <!--custom CSS file (DB) -->
    <?php echo customDPFCSS(config('system.settings2_bills_pdf_css')); ?>


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon.png">
</head>

<body class="pdf-page">
    <div class="bill-watermark"></div>
    <header class="bill-pdf <?php echo e(config('css.bill_mode')); ?> <?php echo e($page['bill_mode'] ?? ''); ?>">
        <div class="bill-header">
            <?php if($bill->bill_type == 'estimate'): ?>
            <table>
                <tbody>
                    <tr>
                        <td class="x-left">
                            <div class="logo-img">
                                <img src="<?php echo e(BASE_DIR); ?>/storage/logos/app/<?php echo e(config('system.settings_system_logo_large_name')); ?>">
                            </div>
                        </td>
                        <td class="x-right">
                            <h2 class=""><strong><span class="mx-3" style="color: #4f81bc;">#<?php echo e($bill->formatted_bill_estimateid); ?></span><span class=""
                                        style="color: #c04e4e !important"><?php echo e(cleanLang(__('lang.quote'))); ?></span></strong></h2>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
        </div>

        <!--ADDRESSES & DATES-->
        <div class="bill-addresses">
            <table>
                <tbody>
                    <tr>
                        <td class="x-left" style="vertical-align: bottom">
                            <?php if($bill->bill_type == 'estimate'): ?>
                            <!--company-->
                            <div class="x-company-name text-uppercase">
                                <h5 class="p-0 m-0" style="color: #000000;"><?php echo e(config('system.settings_company_name')); ?></h5>
                            </div>

                            <?php if(config('system.settings_company_address_line_1')): ?>
                            <div class="x-line">
                                <?php echo e(config('system.settings_company_address_line_1')); ?>

                            </div>
                            <?php endif; ?>
                            <?php if(config('system.settings_company_city') || config('system.settings_company_zipcode')): ?>
                            <div class="x-line">
                                <?php echo e(trim(implode(' - ', array_filter([config('system.settings_company_city'), config('system.settings_company_zipcode')])))); ?>,
                            </div>
                            <?php endif; ?>

                            <?php if(config('system.settings_company_state') || config('system.settings_company_country')): ?>
                            <div class="x-line">
                                <?php echo e(trim(implode(', ', array_filter([config('system.settings_company_state'), config('system.settings_company_country')])))); ?>

                            </div>
                            <?php endif; ?>

                            <!--custom company fields-->
                            <?php if(config('system.settings_company_customfield_1') != ''): ?>
                            <div class="x-line">
                                Mail: <span style="color: #001f5f"><?php echo e(config('system.settings_company_customfield_1')); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if(config('system.settings_company_customfield_2') != ''): ?>
                            <div class="x-line">
                                Website: <span style="color: #001f5f"><?php echo e(config('system.settings_company_customfield_2')); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if(config('system.settings_company_customfield_3') != ''): ?>
                            <div class="x-line">
                                <?php echo e(config('system.settings_company_customfield_3')); ?>

                            </div>
                            <?php endif; ?>
                            <?php if(config('system.settings_company_customfield_4') != ''): ?>
                            <div class="x-line">
                                <?php echo e(config('system.settings_company_customfield_4')); ?>

                            </div>
                            <?php endif; ?>
                            <?php else: ?>
                            <!-- For proforma-invoice, invoice, or amc-invoice -->
                            <div class="logo-img">
                                <img src="<?php echo e(BASE_DIR); ?>/storage/logos/app/<?php echo e(config('system.settings_system_logo_large_name')); ?>">
                            </div>
                            <div class="x-company-name text-uppercase mt-2">
                                <h5 class="p-b-0 m-b-0" style="color: #000000;"><?php echo e(config('system.settings_company_name')); ?></h5>
                            </div>
                            <?php if(config('system.settings_company_state')): ?>
                            <div class="x-line">
                                <strong>State: </strong><?php echo e(config('system.settings_company_state')); ?>

                            </div>
                            <?php endif; ?>
                            <?php if(config('system.settings_company_gst_number')): ?>
                            <div class="x-line">
                                <strong>GSTIN: </strong><?php echo e(config('system.settings_company_gst_number')); ?>

                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td class="x-right" style="vertical-align: bottom<?php echo e($bill->bill_type != 'estimate' ? ';' : ''); ?>">
                            <div style="float: right; display: inline-block; width: 70%; vertical-align: bottom;">
                                <table style="border-collapse: collapse; width: 100%; vertical-align: bottom;">
                                    <?php if($bill->bill_type == 'estimate'): ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.date'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #e1e1e1; padding: 1px 4px 4px;">
                                            <?php echo e(runtimeDate($bill->bill_date)); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.quotation_no'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #c5d9f0; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->formatted_bill_estimateid); ?>

                                        </td>
                                    </tr>
                                    <?php if(isset($bill->lead) && isset($bill->bill_leadid)): ?>
                                    <?php if($bill->bill_leadtype == 'customer_lead'): ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.customer_id'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #e1e1e1; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->lead->client->formatted_customerid ?? '---'); ?>

                                        </td>
                                    </tr>
                                    <?php else: ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.client_id'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #e1e1e1; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->lead->formatted_clientid ?? '---'); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.customer_id'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #e1e1e1; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->client->formatted_customerid); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php elseif($bill->bill_type == 'amc-invoice'): ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.from_date'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #e1e1e1; padding: 1px 4px 4px;">
                                            <?php echo e(runtimeDate($bill->bill_from_date)); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.to_date'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #c5d9f0; padding: 1px 4px 4px;">
                                            <?php echo e(runtimeDate($bill->bill_to_date)); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.invoice_id'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #e1e1e1; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->formatted_bill_amc_invoiceid); ?>

                                        </td>
                                    </tr>
                                    <?php else: ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.date'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #e1e1e1; padding: 1px 4px 4px;">
                                            <?php echo e(runtimeDate($bill->bill_date)); ?>

                                        </td>
                                    </tr>
                                    <?php if($bill->bill_type == 'invoice'): ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.invoice_id'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #c5d9f0; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->formatted_bill_invoiceid); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.proforma_invoice_no'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #e1e1e1; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->proformainvoice->formatted_bill_proforma_invoiceid); ?>

                                        </td>
                                    </tr>
                                    <?php elseif($bill->bill_type == 'proforma-invoice'): ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.proforma_invoice_no'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: #c5d9f0; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->formatted_bill_proforma_invoiceid); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($bill->bill_type != 'estimate'): ?>
                                    <tr>
                                        <td style="border: 1px solid #000; font-weight: bold; text-align: right; padding: 1px 4px 4px;">
                                            <?php echo e(cleanLang(__('lang.customer_id'))); ?>

                                        </td>
                                        <td style="border: 1px solid #000; text-align: left; background-color: <?php echo e(in_array($bill->bill_type, ['proforma-invoice']) ? '#e1e1e1' : '#c5d9f0'); ?>; padding: 1px 4px 4px;">
                                            #<?php echo e($bill->client->formatted_customerid); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </td>
                    </tr>

                    <?php if(in_array($bill->bill_type, ['proforma-invoice', 'invoice', 'amc-invoice'])): ?>
                    <tr>
                        <td class="text-center" colspan="2">
                            <div class="text-uppercase mt-1" style="display: inline-block; width: auto;">
                                <h4 class="p-0 m-0" style="color: #01508e;">
                                    <strong>
                                        <?php if($bill->bill_type == 'proforma-invoice'): ?>
                                        <?php echo e(cleanLang(__('lang.proforma_invoice'))); ?>

                                        <?php elseif($bill->bill_type == 'invoice'): ?>
                                        <?php echo e(cleanLang(__('lang.invoice'))); ?>

                                        <?php elseif($bill->bill_type == 'amc-invoice'): ?>
                                        <?php echo e(cleanLang(__('lang.amc_invoice'))); ?>

                                        <?php endif; ?>
                                    </strong>
                                </h4>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div style="margin: 8px 0px;">
            <div style="width: 100%;height: 2px;background-color: #b7b7b7;"></div>
            <div style="width: 100%;height: 3px;background-color: #d9d9d98c;"></div>
        </div>
    </header>
    <footer>
        <div style="margin: 2px 0px;">
            <div class="text-muted" style="font-size: 10px important;">*This is a system-generated <?php echo e(billTypeTextForPdf($bill->bill_type)); ?> and does not require a signature*</div>
        </div>
        <div style="margin: 2px 0px;">
            <div style="width: 100%;height: 2px;background-color: #b7b7b7;"></div>
            <div style="width: 100%;height: 3px;background-color: #d9d9d98c;"></div>
        </div>
        <table>
            <tbody>
                <tr class="">
                    <!--company-->
                    <td class="text-center">
                        <div class="x-company-name text-center text-uppercase">
                            <h6 class="p-0 m-0" style="color: #01508e; font-weight: bold;"><?php echo e(config('system.settings_company_name')); ?></h6>
                        </div>

                        <div class="" style="display: flex; justify-content: center; align-items: center; height: 25px; vertical-align: baseline;">
                            <img src="<?php echo e(BASE_DIR . '/public/images/pdf-footer-location-icon.png'); ?>" style="width: 13px; height: 13px; margin-top: 10px;" />
                            <span style="">Pune | Kolhapur, Maharashtra, India.</span>
                        </div>


                        <!--custom company fields-->
                        <div class="x-line">
                            <?php if(config('system.settings_company_telephone')): ?>
                            Tel: <span style="color: #001f5f"><?php echo e(config('system.settings_company_telephone')); ?></span>
                            <?php endif; ?>
                            <?php if(config('system.settings_company_customfield_1') != ''): ?>
                            Email: <span style="color: #001f5f"><?php echo e(config('system.settings_company_customfield_1')); ?></span>
                            <?php endif; ?>
                            <?php if(config('system.settings_company_customfield_2') != ''): ?>
                            URL: <span style="color: #001f5f"><?php echo e(config('system.settings_company_customfield_2')); ?></span>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>
    <main class="bill-pdf <?php echo e(config('css.bill_mode')); ?> <?php echo e($page['bill_mode'] ?? ''); ?>">

        <?php if($bill->bill_type == 'estimate'): ?>
        <?php echo $__env->make('pages.bill.components.elements.estimate.quotation-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if($bill->bill_type == 'proforma-invoice'): ?>
        <?php echo $__env->make('pages.bill.components.elements.proforma-invoice.proforma-invoice-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if($bill->bill_type == 'invoice'): ?>
        <?php echo $__env->make('pages.bill.components.elements.invoice.invoice-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if($bill->bill_type == 'amc-invoice'): ?>
        <?php echo $__env->make('pages.bill.components.elements.amc-invoice.amc-invoice-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <!--INVOICE TABLE-->
        <div class="bill-table-pdf">
            <?php echo $__env->make('pages.bill.components.elements.main-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- TOTAL & SUMMARY -->
        <?php if(config('css.bill_mode') === 'pdf-mode-download'): ?>
        <div class="bill-totals-table-pdf">
            <?php if($bill->bill_type == 'estimate'): ?>
            <?php echo $__env->make('pages.bill.components.elements.estimate.footer-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if($bill->bill_type == 'proforma-invoice'): ?>
            <?php echo $__env->make('pages.bill.components.elements.proforma-invoice.footer-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if($bill->bill_type == 'invoice' || $bill->bill_type == 'amc-invoice'): ?>
            <?php echo $__env->make('pages.bill.components.elements.invoice.footer-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="bill-totals-table-pdf">
            <?php echo $__env->make('pages.bill.components.elements.totals-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endif; ?>
    </main>


</body>

</html><?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/bill-pdf.blade.php ENDPATH**/ ?>