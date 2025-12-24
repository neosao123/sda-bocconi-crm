<!DOCTYPE html>
<html lang="en" class="logged-out <?php echo e(config('visibility.page_rendering')); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" id="meta-csrf" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?php echo e(config('app.name')); ?> <?php echo e(clean($page['meta_title'] ?? '')); ?></title>

  <!--BASEURL-->
  <base href="<?php echo e(url('/')); ?>" target="_self">

  <!--JQUERY & OTHER HEADER JS-->
  <script src="<?php echo e(config('constant.asset_url')); ?>/public/vendor/js/vendor.header.js?v=<?php echo e(config('system.versioning')); ?>"></script>

  <!--BOOTSTRAP-->
  <link href="<?php echo e(config('constant.asset_url')); ?>/public/vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!--GOOGLE Poppins-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!--VENDORS CSS-->
  <link rel="stylesheet" href="<?php echo e(config('constant.asset_url')); ?>/public/vendor/css/vendor.css?v=<?php echo e(config('system.versioning')); ?>">
  <link rel="stylesheet" href="<?php echo e(config('constant.asset_url')); ?>/public/vendor/js/bootstrap-timepicker/bootstrap-timepicker.css?v=<?php echo e(config('system.versioning')); ?>">

  <!--ICONS-->
  <link rel="stylesheet" href="<?php echo e(config('constant.asset_url')); ?>/public/vendor/fonts/all-icons/styles.css?v=<?php echo e(config('system.versioning')); ?>">

  <!--DYNAMIC CSS VARS-->
  <style>
    :root {
      --calendar-type-event-background: <?php echo e(config('system.settings2_calendar_events_colour')); ?>;
      --calendar-type-project-background: <?php echo e(config('system.settings2_calendar_projects_colour')); ?>;
      --calendar-type-task-background: <?php echo e(config('system.settings2_calendar_tasks_colour')); ?>;
      --calendar-fc-daygrid-dot-event-background: <?php echo e(config('system.settings2_calendar_events_colour')); ?>;
      --calendar-fc-daygrid-dot-event-contrast: color-mix(in srgb, var(--calendar-fc-daygrid-dot-event-background) 70%, black);
    }
  </style>

  <!--THEME STYLE-->
  <!--use the default theme for all external pages (e.g. proposals, cotracts etc) -->
  <?php if(config('visibility.external_view_use_default_theme')): ?>
    <link href="<?php echo e(config('constant.asset_url')); ?>/public/themes/default/css/style.css?v=<?php echo e(config('system.settings_system_javascript_versioning')); ?>" rel="stylesheet">
  <?php else: ?>
    <?php if(auth()->check()): ?>
      <link href="<?php echo e(config('constant.asset_url')); ?>/public/themes/<?php echo e(auth()->user()->pref_theme); ?>/css/style.css?v=<?php echo e(config('system.settings_system_javascript_versioning')); ?>" rel="stylesheet">
    <?php else: ?>
      <link href="<?php echo e(config('theme.selected_theme_css')); ?> " rel="stylesheet">
    <?php endif; ?>
  <?php endif; ?>

  <!--USERS CUSTON CSS FILE-->
  <link href="<?php echo e(config('constant.asset_url')); ?>/public/css/custom.css?v=<?php echo e(config('system.versioning')); ?>" rel="stylesheet">

  <!--PRINTING CSS-->
  <link href="<?php echo e(config('constant.asset_url')); ?>/public/css/print.css?v=<?php echo e(config('system.versioning')); ?>" rel="stylesheet">

  <!-- Favicon icon -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo e(config('constant.asset_url')); ?>/public/images/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!--SET DYNAMIC VARIABLE IN JAVASCRIPT-->
  <script type="text/javascript">
    //name space & settings
    NX = (typeof NX == 'undefined') ? {} : NX;
    NXJS = (typeof NXJS == 'undefined') ? {} : NXJS;
    NXLANG = (typeof NXLANG == 'undefined') ? {} : NXLANG;
    NXINVOICE = (typeof NXINVOICE == 'undefined') ? {} : NXINVOICE;
    NXDOC = (typeof NXDOC == 'undefined') ? {} : NXDOC;
    NX.data = (typeof NX.data == 'undefined') ? {} : NX.data;

    NXINVOICE.DATA = {};
    NXINVOICE.DOM = {};
    NXINVOICE.CALC = {};

    //variables
    NX.site_url = "<?php echo e(url('/')); ?>";
    NX.system_type = "tenant"; //landlord/tenant/frontend
    NX.site_page_title = "<?php echo e(config('system.settings_company_name')); ?> <?php echo e(clean($page['meta_title'] ?? '')); ?>";
    NX.csrf_token = "<?php echo e(csrf_token()); ?>";
    NX.system_language = "<?php echo e(request('system_language')); ?>";

    NX.show_action_button_tooltips = "<?php echo e(config('settings.show_action_button_tooltips')); ?>";
    NX.notification_position = "<?php echo e(config('settings.notification_position')); ?>";
    NX.notification_error_duration = "<?php echo e(config('settings.notification_error_duration')); ?>";
    NX.notification_success_duration = "<?php echo e(config('settings.notification_success_duration')); ?>";
    NX.session_login_popup = "<?php echo e(config('system.settings_system_session_login_popup')); ?>";

    NXLANG.cancel = "<?php echo e(cleanLang(__('lang.cancel'))); ?>";
    NXLANG.continue = "<?php echo e(cleanLang(__('lang.continue'))); ?>";

    NXLANG.generic_error = "<?php echo e(cleanLang(__('lang.error_request_could_not_be_completed'))); ?>";
    NXLANG.drag_drop_not_supported = "<?php echo e(cleanLang(__('lang.drag_drop_not_supported'))); ?>";
    NXLANG.use_the_button_to_upload = "<?php echo e(cleanLang(__('lang.use_the_button_to_upload'))); ?>";
    NXLANG.file_type_not_allowed = "<?php echo e(cleanLang(__('lang.file_type_not_allowed'))); ?>";

    NXLANG.ok = "<?php echo e(cleanLang(__('lang.ok'))); ?>";
    NXLANG.cancel = "<?php echo e(cleanLang(__('lang.cancel'))); ?>";
    NXLANG.close = "<?php echo e(cleanLang(__('lang.close'))); ?>";

    NXLANG.action_not_completed_errors_found = "<?php echo e(cleanLang(__('lang.action_not_completed_errors_found'))); ?>";

    NXLANG.please_wait = "<?php echo e(cleanLang(__('lang.please_wait'))); ?>";
    //arrays to use generically
    NX.array_1 = [];
    NX.array_2 = [];
    NX.array_3 = [];
    NX.array_4 = [];
  </script>
  <!--boot js-->
  <script src="<?php echo e(url('/public/js/core/head.js?v=' . config('system.versioning'))); ?>"></script>
  <?php echo config('system.settings_theme_head'); ?>

  <link href="<?php echo e(url('public/themes/default/css/login.css?v=' . time())); ?>" rel="stylesheet" type="text/css" />
</head>

<body>
  <!--preloader-->
  <?php if(config('visibility.page_rendering') == '' || config('visibility.page_rendering') != 'print-page'): ?>
    <div class="preloader">
      <div class="loader">
        <div class="loader-loading"></div>
      </div>
    </div>
  <?php endif; ?>
  <!--preloader-->

  <!--main content-->
  <div id="main-wrapper">
    <?php echo $__env->yieldContent('content'); ?>
  </div>

  <!--js automations-->
  <?php echo $__env->make('layout.automationjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

<?php echo $__env->make('layout.footerjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo config('system.settings_theme_body'); ?>


</html>
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/layout/wrapperauth.blade.php ENDPATH**/ ?>