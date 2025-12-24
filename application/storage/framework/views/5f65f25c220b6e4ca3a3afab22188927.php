<?php
  $client_tax_number = $bill->client->client_vat ?? '';
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
    /* @font-face {
      font-family: 'DejaVuSans';
      font-style: normal;
      font-weight: normal;
      src: url('<?php echo e(storage_path('app/DejaVuSans.ttf')); ?>') format("truetype");
    }

    @font-face {
      font-family: 'DejaVuSans';
      font-style: normal;
      font-weight: 400;
      src: url('<?php echo e(storage_path('app/DejaVuSans.ttf')); ?>') format("truetype");
    }

    @font-face {
      font-family: 'DejaVuSans';
      font-style: normal;
      font-weight: bold;
      src: url('<?php echo e(storage_path('app/DejaVuSans-Bold.ttf')); ?>') format("truetype");
    }

    @font-face {
      font-family: 'DejaVuSans';
      font-style: normal;
      font-weight: 600;
      src: url('<?php echo e(storage_path('app/DejaVuSans-Bold.ttf')); ?>') format("truetype");
    } */


    @font-face {
      font-family: 'ProductSans';
      font-style: normal;
      font-weight: normal;
      src: url('<?php echo e(storage_path('app/font/Product-Sans-Regular.ttf')); ?>') format("truetype");
    }

    @font-face {
      font-family: 'ProductSans';
      font-style: italic;
      font-weight: normal;
      src: url('<?php echo e(storage_path('app/font/Product-Sans-Italic.ttf')); ?>') format("truetype");
    }

    @font-face {
      font-family: 'ProductSans';
      font-style: italic;
      font-weight: bold;
      src: url('<?php echo e(storage_path('app/font/Product-Sans-Bold-Italic.ttf')); ?>') format("truetype");
    }

    @font-face {
      font-family: 'ProductSans';
      font-style: normal;
      font-weight: bold;
      src: url('<?php echo e(storage_path('app/font/Product-Sans-Bold.ttf')); ?>') format("truetype");
    }


    .logo-img img {
      width: auto !important;
      height: 55px !important;
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


    body {
      font-family: 'ProductSans' !important;
    }

    @page {
      size: A4;
      margin-top: 100px;
      margin-bottom: 100px;
      margin-left: 75px;
      margin-right: 75px;
    }

    header {
      position: fixed;
      top: -70px;
      left: 0;
      right: 0;
      height: 50px;
      text-align: center;
      line-height: 15px;
      font-size: 12px;
    }

    footer {
      position: fixed;
      bottom: -100px;
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
  </style>


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
    <!--HEADER-->
    <div class="bill-header">
      <table>
        <tbody>
          <tr>
            <td class="x-right">
              <div class="logo-img">
                <img src="<?php echo e(BASE_DIR); ?>/public/images/neosao-description-pdf-logo.png" />
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </header>
  <footer>
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
    <!--TERMS-->
    <div><?php echo $bill->bill_notes; ?></div>
  </main>
</body>

</html>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/bill/bill-description-pdf.blade.php ENDPATH**/ ?>