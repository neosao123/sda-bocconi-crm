<!DOCTYPE html>
<html lang="en" class="logged-out {{ config('visibility.page_rendering') }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" id="meta-csrf" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ config('app.name') }} {{ clean($page['meta_title'] ?? '') }}</title>

  <!--BASEURL-->
  <base href="{{ url('/') }}" target="_self">

  <!--JQUERY & OTHER HEADER JS-->
  <script src="{{ config('constant.asset_url') }}/public/vendor/js/vendor.header.js?v={{ config('system.versioning') }}"></script>

  <!--BOOTSTRAP-->
  <link href="{{ config('constant.asset_url') }}/public/vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!--GOOGLE Poppins-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!--VENDORS CSS-->
  <link rel="stylesheet" href="{{ config('constant.asset_url') }}/public/vendor/css/vendor.css?v={{ config('system.versioning') }}">
  <link rel="stylesheet" href="{{ config('constant.asset_url') }}/public/vendor/js/bootstrap-timepicker/bootstrap-timepicker.css?v={{ config('system.versioning') }}">

  <!--ICONS-->
  <link rel="stylesheet" href="{{ config('constant.asset_url') }}/public/vendor/fonts/all-icons/styles.css?v={{ config('system.versioning') }}">

  <!--DYNAMIC CSS VARS-->
  <style>
    :root {
      --calendar-type-event-background: {{ config('system.settings2_calendar_events_colour') }};
      --calendar-type-project-background: {{ config('system.settings2_calendar_projects_colour') }};
      --calendar-type-task-background: {{ config('system.settings2_calendar_tasks_colour') }};
      --calendar-fc-daygrid-dot-event-background: {{ config('system.settings2_calendar_events_colour') }};
      --calendar-fc-daygrid-dot-event-contrast: color-mix(in srgb, var(--calendar-fc-daygrid-dot-event-background) 70%, black);
    }
  </style>

  <!--THEME STYLE-->
  <!--use the default theme for all external pages (e.g. proposals, cotracts etc) -->
  @if (config('visibility.external_view_use_default_theme'))
    <link href="{{ config('constant.asset_url') }}/public/themes/default/css/style.css?v={{ config('system.settings_system_javascript_versioning') }}" rel="stylesheet">
  @else
    @if (auth()->check())
      <link href="{{ config('constant.asset_url') }}/public/themes/{{ auth()->user()->pref_theme }}/css/style.css?v={{ config('system.settings_system_javascript_versioning') }}" rel="stylesheet">
    @else
      <link href="{{ config('theme.selected_theme_css') }} " rel="stylesheet">
    @endif
  @endif

  <!--USERS CUSTON CSS FILE-->
  <link href="{{ config('constant.asset_url') }}/public/css/custom.css?v={{ config('system.versioning') }}" rel="stylesheet">

  <!--PRINTING CSS-->
  <link href="{{ config('constant.asset_url') }}/public/css/print.css?v={{ config('system.versioning') }}" rel="stylesheet">

  <!-- Favicon icon -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ config('constant.asset_url') }}/public/images/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ config('constant.asset_url') }}/public/images/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ config('constant.asset_url') }}/public/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ config('constant.asset_url') }}/public/images/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ config('constant.asset_url') }}/public/images/favicon/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ config('constant.asset_url') }}/public/images/favicon/ms-icon-144x144.png">
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
    NX.site_url = "{{ url('/') }}";
    NX.system_type = "tenant"; //landlord/tenant/frontend
    NX.site_page_title = "{{ config('system.settings_company_name') }} {{ clean($page['meta_title'] ?? '') }}";
    NX.csrf_token = "{{ csrf_token() }}";
    NX.system_language = "{{ request('system_language') }}";

    NX.show_action_button_tooltips = "{{ config('settings.show_action_button_tooltips') }}";
    NX.notification_position = "{{ config('settings.notification_position') }}";
    NX.notification_error_duration = "{{ config('settings.notification_error_duration') }}";
    NX.notification_success_duration = "{{ config('settings.notification_success_duration') }}";
    NX.session_login_popup = "{{ config('system.settings_system_session_login_popup') }}";

    NXLANG.cancel = "{{ cleanLang(__('lang.cancel')) }}";
    NXLANG.continue = "{{ cleanLang(__('lang.continue')) }}";

    NXLANG.generic_error = "{{ cleanLang(__('lang.error_request_could_not_be_completed')) }}";
    NXLANG.drag_drop_not_supported = "{{ cleanLang(__('lang.drag_drop_not_supported')) }}";
    NXLANG.use_the_button_to_upload = "{{ cleanLang(__('lang.use_the_button_to_upload')) }}";
    NXLANG.file_type_not_allowed = "{{ cleanLang(__('lang.file_type_not_allowed')) }}";

    NXLANG.ok = "{{ cleanLang(__('lang.ok')) }}";
    NXLANG.cancel = "{{ cleanLang(__('lang.cancel')) }}";
    NXLANG.close = "{{ cleanLang(__('lang.close')) }}";

    NXLANG.action_not_completed_errors_found = "{{ cleanLang(__('lang.action_not_completed_errors_found')) }}";

    NXLANG.please_wait = "{{ cleanLang(__('lang.please_wait')) }}";
    //arrays to use generically
    NX.array_1 = [];
    NX.array_2 = [];
    NX.array_3 = [];
    NX.array_4 = [];
  </script>
  <!--boot js-->
  <script src="{{ url('/public/js/core/head.js?v=' . config('system.versioning')) }}"></script>
  {!! config('system.settings_theme_head') !!}
  <link href="{{ url('public/themes/default/css/login.css?v=' . time()) }}" rel="stylesheet" type="text/css" />
</head>

<body>
  <!--preloader-->
  @if (config('visibility.page_rendering') == '' || config('visibility.page_rendering') != 'print-page')
    <div class="preloader">
      <div class="loader">
        <div class="loader-loading"></div>
      </div>
    </div>
  @endif
  <!--preloader-->

  <!--main content-->
  <div id="main-wrapper">
    @yield('content')
  </div>

  <!--js automations-->
  @include('layout.automationjs')
</body>

@include('layout.footerjs')
{!! config('system.settings_theme_body') !!}

</html>
