<!--ALL THIRD PART JAVASCRIPTS-->
<script src="{{ config('constant.asset_url') }}/public/vendor/js/vendor.footer.js?v={{ config('system.versioning') }}"></script>


<!--nextloop.core.js-->
<script src="{{ config('constant.asset_url') }}/public/js/core/ajax.js?v={{ config('system.versioning') }}"></script>

<!--MAIN JS - AT END-->
<script src="{{ config('constant.asset_url') }}/public/js/core/boot.js?v={{ config('system.versioning') }}"></script>

<!--EVENTS-->
<script src="{{ config('constant.asset_url') }}/public/js/core/events.js?v={{ config('system.versioning') }}"></script>

<!--CORE-->
<script src="{{ config('constant.asset_url') }}/public/js/core/app.js?v={{ config('system.versioning') }}"></script>

<!--SEARCH-->
<script src="{{ config('constant.asset_url') }}/public/js/core/search.js?v={{ config('system.versioning') }}"></script>

<!--BILLING-->
<script src="{{ config('constant.asset_url') }}/public/js/core/billing.js?v={{ time() }}"></script>

<!--project page charts-->
@if (@config('visibility.projects_d3_vendor'))
  <script src="{{ config('constant.asset_url') }}/public/vendor/js/d3/d3.min.js?v={{ config('system.versioning') }}"></script>
  <script src="{{ config('constant.asset_url') }}/public/vendor/js/c3-master/c3.min.js?v={{ config('system.versioning') }}"></script>
@endif

<!--form builder-->
@if (@config('visibility.web_form_builder'))
  <script src="{{ config('constant.asset_url') }}/public/vendor/js/formbuilder/form-builder.min.js?v={{ config('system.versioning') }}"></script>
  <script src="{{ config('constant.asset_url') }}/public/js/webforms/webforms.js?v={{ config('system.versioning') }}"></script>
@endif

<!--export js (https://github.com/hhurz/tableExport.jquery.plugin)-->
<script src="{{ config('constant.asset_url') }}/public/js/core/export.js?v={{ config('system.versioning') }}"></script>
<script type="text/javascript" src="{{ config('constant.asset_url') }}/public/vendor/js/exportjs/libs/FileSaver/FileSaver.min.js?v={{ config('system.versioning') }}"></script>
<script type="text/javascript" src="{{ config('constant.asset_url') }}/public/vendor/js/exportjs/libs/js-xlsx/xlsx.core.min.js?v={{ config('system.versioning') }}"></script>
<script type="text/javascript" src="{{ config('constant.asset_url') }}/public/vendor/js/exportjs/tableExport.min.js?v={{ config('system.versioning') }}"></script>

<!--printing-->
<script type="text/javascript" src="{{ config('constant.asset_url') }}/public/vendor/js/printthis/printthis.js?v={{ config('system.versioning') }}"></script>

<!--table sorter-->
<script type="text/javascript" src="{{ config('constant.asset_url') }}/public/vendor/js/tablesorter/js/jquery.tablesorter.min.js?v={{ config('system.versioning') }}"></script>

<!--bootstrap-timepicker-->
<script type="text/javascript" src="{{ config('constant.asset_url') }}/public/vendor/js/bootstrap-timepicker/bootstrap-timepicker.js?v={{ config('system.versioning') }}"></script>

<!--calendaerfull js [v6.1.13]-->
<script src="{{ config('constant.asset_url') }}/public/vendor/js/fullcalendar/index.global.min.js?v={{ config('system.versioning') }}"></script>
<!--IMPORTANT NOTES (June 2024) - any new JS libraries added here that are booted/initiated in boot.js should also be added to the landlord footerjs.blade.js, for saas-->

{{-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> --}}

<!-- Load Ionicons JS (ESM) -->
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.4.0/ionicons/ionicons.esm.js"></script>

<!-- Or (Legacy JS) -->
<script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.4.0/ionicons/ionicons.js"></script>
