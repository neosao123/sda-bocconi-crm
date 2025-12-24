<!-- right-sidebar -->
<div class="right-sidebar" id="table-config-projects">
    <form id="table-config-form">
        <div class="slimscrollright">
            <div class="rpanel-title">
                <i class="bi bi-funnel"></i>{{ cleanLang(__('lang.table_settings')) }}
                <span>
                    <i class="bi bi-x-circle js-close-side-panels" data-target="table-config-projects"></i>
                </span>
            </div>

            <!--set ajax url on parent container-->
            <div class="r-panel-body table-config-ajax" data-url="{{ url('preferences/tables') }}" data-type="form"
                data-form-id="table-config-form" data-ajax-type="post" data-progress-bar="hidden">

                <!--tableconfig_column_2 [project_title]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_2" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_2')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.title')</span>
                    </label>
                </div>


                <!--tableconfig_column_3 [client_company_name]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_3" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_3')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.client')</span>
                    </label>
                </div>


                <!--tableconfig_column_4 [project_date_start]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_4" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_4')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.start_date')</span>
                    </label>
                </div>


                <!--tableconfig_column_5 [project_date_due]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_5" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_5')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.due_date')</span>
                    </label>
                </div>


                <!--tableconfig_column_6 [tags]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_6" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_6')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.tags')</span>
                    </label>
                </div>


                <!--tableconfig_column_7 [project_progress]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_7" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_7')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.progress')</span>
                    </label>
                </div>


                <!--tableconfig_column_8 [count_pending_tasks]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_8" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_8')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.pending_tasks')</span>
                    </label>
                </div>


                <!--tableconfig_column_9 [count_completed_tasks]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_9" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_9')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.completed_tasks')</span>
                    </label>
                </div>


                <!--tableconfig_column_18 [count_files]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_18" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_18')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.files')</span>
                    </label>
                </div>

                <!--tableconfig_column_21 [assigned]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_21" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_21')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.team')</span>
                    </label>
                </div>


                <!--tableconfig_column_22 [project_status]-->
                <div class="p-b-5">
                    <label class="custom-control custom-checkbox table-config-checkbox-container">
                        <input name="tableconfig_column_22" type="checkbox"
                            class="custom-control-input table-config-checkbox cursor-pointer"
                            {{ runtimePrechecked(config('table.tableconfig_column_22')) }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('lang.status')</span>
                    </label>
                </div>



                <!--table name-->
                <input type="hidden" name="tableconfig_table_name" value="projects">

                <!--buttons-->
                <div class="buttons-block">
                    <button type="button" name="foo1" class="btn btn-rounded-x btn-secondary js-close-side-panels"
                        data-target="table-config-projects">{{ cleanLang(__('lang.close')) }}</button>
                    <input type="hidden" name="action" value="search">
                </div>
            </div>
            <!--body-->
        </div>
    </form>
</div>
<!--sidebar-->