@extends('pages.settings.ajaxwrapper')
@section('settings-page')
<form class="form" id="settingsFormGeneral">
    <div class="row">
        <div class="col-lg-5 col-md-8 ">

            <div class="card">
                <div class="card-body">
                    <!--settings-->

                    <!--date format-->
                    <div class="form-group row">
                        <label for="example-month-input"
                            class="col-12 col-form-label text-left">{{ cleanLang(__('lang.date_format')) }}</label>
                        <div class="col-12">
                            <select class="select2-basic form-control form-control-sm"
                                id="settings_system_date_format" name="settings_system_date_format">
                                <option value="d-m-Y"
                                    {{ runtimePreselected('d-m-Y', $settings->settings_system_date_format ?? '') }}>
                                    d-m-Y</option>
                                <option value="d/m/Y"
                                    {{ runtimePreselected('d/m/Y', $settings->settings_system_date_format ?? '') }}>
                                    d/m/Y</option>
                                <option value="d.m.Y"
                                    {{ runtimePreselected('d.m.Y', $settings->settings_system_date_format ?? '') }}>
                                    d.m.Y</option>
                                <option value="m-d-Y"
                                    {{ runtimePreselected('m-d-Y', $settings->settings_system_date_format ?? '') }}>
                                    m-d-Y</option>
                                <option value="m/d/Y"
                                    {{ runtimePreselected('m/d/Y', $settings->settings_system_date_format ?? '') }}>
                                    m/d/Y</option>
                                <option value="m.d.Y"
                                    {{ runtimePreselected('m.d.Y', $settings->settings_system_date_format ?? '') }}>
                                    m.d.Y</option>
                                <option value="Y-m-d"
                                    {{ runtimePreselected('Y-m-d', $settings->settings_system_date_format ?? '') }}>
                                    Y-m-d</option>
                                <option value="Y/m/d"
                                    {{ runtimePreselected('Y/m/d', $settings->settings_system_date_format ?? '') }}>
                                    Y/m/d</option>
                                <option value="Y.m.d"
                                    {{ runtimePreselected('Y.m.d', $settings->settings_system_date_format ?? '') }}>
                                    Y.m.d</option>
                                <option value="Y-d-m"
                                    {{ runtimePreselected('Y-d-m', $settings->settings_system_date_format ?? '') }}>
                                    Y-d-m</option>
                                <option value="Y/d/m"
                                    {{ runtimePreselected('Y/d/m', $settings->settings_system_date_format ?? '') }}>
                                    Y/d/m</option>
                                <option value="Y.d.m"
                                    {{ runtimePreselected('Y.d.m', $settings->settings_system_date_format ?? '') }}>
                                    Y.d.m</option>
                            </select>
                        </div>
                    </div>
                    <!--date pickerformat-->
                    <div class="form-group row">
                        <label for="example-month-input"
                            class="col-12 col-form-label text-left">{{ cleanLang(__('lang.date_picker_format')) }}</label>
                        <div class="col-12">
                            <select class="select2-basic form-control form-control-sm"
                                id="settings_system_datepicker_format" name="settings_system_datepicker_format">
                                <option value="dd-mm-yyyy"
                                    {{ runtimePreselected('dd-mm-yyyy', $settings->settings_system_datepicker_format ?? '') }}>
                                    dd-mm-yyyy</option>
                                <option value="mm-dd-yyyy"
                                    {{ runtimePreselected('mm-dd-yyyy', $settings->settings_system_datepicker_format ?? '') }}>
                                    mm-dd-yyyy</option>
                                <option value="yyyy-mm-dd"
                                    {{ runtimePreselected('yyyy-mm-dd', $settings->settings_system_datepicker_format ?? '') }}>
                                    yyyy-mm-dd</option>
                            </select>
                        </div>
                    </div>

                    <!--left menu - default position-->
                    <div class="form-group row">
                        <label for="example-month-input"
                            class="col-12 col-form-label text-left">{{ cleanLang(__('lang.left_menu_position')) }}</label>
                        <div class="col-12">
                            <select class="select2-basic form-control form-control-sm"
                                id="settings_system_default_leftmenu" name="settings_system_default_leftmenu">
                                <option value="collapsed"
                                    {{ runtimePreselected('collapsed', $settings->settings_system_default_leftmenu ?? '') }}>
                                    {{ cleanLang(__('lang.collapsed')) }}
                                </option>
                                <option value="open"
                                    {{ runtimePreselected('open', $settings->settings_system_default_leftmenu ?? '') }}>
                                    {{ cleanLang(__('lang.open')) }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <!--stats panel - default position-->
                    <!-- <div class="form-group row">
                        <label for="example-month-input"
                            class="col-12 col-form-label text-left">{{ cleanLang(__('lang.stats_panel_default')) }}</label>
                        <div class="col-12">
                            <select class="select2-basic form-control form-control-sm"
                                id="settings_system_default_statspanel" name="settings_system_default_statspanel">
                                <option value="collapsed"
                                    {{ runtimePreselected('collapsed', $settings->settings_system_default_statspanel ?? '') }}>
                                    {{ cleanLang(__('lang.collapsed')) }}
                                </option>
                                <option value="open"
                                    {{ runtimePreselected('open', $settings->settings_system_default_statspanel ?? '') }}>
                                    {{ cleanLang(__('lang.open')) }}
                                </option>
                            </select>
                        </div>
                    </div> -->

                    <!--alow users to change language-->
                    <div class="form-group row">
                        <label for="example-month-input"
                            class="col-12 col-form-label text-left">{{ cleanLang(__('lang.allow_users_to_change_language')) }}</label>
                        <div class="col-12">
                            <select class="select2-basic form-control form-control-sm"
                                id="settings_system_language_allow_users_to_change"
                                name="settings_system_language_allow_users_to_change">
                                <option value="yes"
                                    {{ runtimePreselected('yes', $settings->settings_system_language_allow_users_to_change ?? '') }}>
                                    {{ cleanLang(__('lang.yes')) }}
                                </option>
                                <option value="no"
                                    {{ runtimePreselected('no', $settings->settings_system_language_allow_users_to_change ?? '') }}>
                                    {{ cleanLang(__('lang.no')) }}
                                </option>
                            </select>
                        </div>
                    </div>


                    <!--exporting html content-->
                    <!-- <div class="form-group row">
                        <label for="example-month-input" class="col-12 col-form-label text-left">@lang('lang.exporting_content') -
                            (@lang('lang.strip_html'))</label>
                        <div class="col-12">
                            <select class="select2-basic form-control form-control-sm"
                                id="settings_system_exporting_strip_html" name="settings_system_exporting_strip_html">
                                <option value="yes"
                                    {{ runtimePreselected('yes', $settings->settings_system_exporting_strip_html ?? '') }}>
                                    {{ cleanLang(__('lang.yes')) }}
                                </option>
                                <option value="no"
                                    {{ runtimePreselected('no', $settings->settings_system_exporting_strip_html ?? '') }}>
                                    {{ cleanLang(__('lang.no')) }}
                                </option>
                            </select>
                        </div>
                    </div> -->





                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="submit" id="commonModalSubmitButton"
                            class="btn btn-rounded-x btn-danger waves-effect text-left" data-url="/settings/general"
                            data-loading-target="" data-ajax-type="PUT" data-type="form"
                            data-on-start-submit-button="disable">{{ cleanLang(__('lang.save_changes')) }}</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection