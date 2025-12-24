@extends('pages.settings.ajaxwrapper')
@section('settings-page')
<!--settings-->
<div class="table-responsive">
    <form>


        <div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-body">

                        <table id="demo-foo-addrow" class="table m-t-0 m-b-0 table-hover no-wrap app-modules" data-page-size="10">
                            <thead>
                                <tr>
                                    <th class="">@lang('lang.module')</th>
                                    <th class="w-px-100">@lang('lang.enabled')</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!--projects-->
                                <tr>
                                    <td>@lang('lang.projects')</td>
                                    <td>
                                        <div class="form-group form-group-checkbox m-0 p-0">
                                            <div class="col-2 text-right m-0 p-0">
                                                <input type="checkbox" id="settings_modules_projects" name="settings_modules_projects" {{ runtimePrechecked($settings->settings_modules_projects) }}
                                                    class="filled-in chk-col-light-blue">
                                                <label class="m-0 p-0" for="settings_modules_projects"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!--tasks-->
                                <tr>
                                    <td>@lang('lang.tasks') - <small>(@lang('lang.linked_to_projects'))</small></td>
                                    <td>
                                        <div class="form-group form-group-checkbox m-0 p-0">
                                            <div class="col-2 text-right m-0 p-0">
                                                <input type="checkbox" id="settings_modules_tasks" name="settings_modules_tasks" {{ runtimePrechecked($settings->settings_modules_tasks) }}
                                                    class="filled-in chk-col-light-blue">
                                                <label class="m-0 p-0" for="settings_modules_tasks"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>



                                <!--leads-->
                                <tr>
                                    <td>@lang('lang.leads')</td>
                                    <td>
                                        <div class="form-group form-group-checkbox m-0 p-0">
                                            <div class="col-2 text-right m-0 p-0">
                                                <input type="checkbox" id="settings_modules_leads" name="settings_modules_leads" {{ runtimePrechecked($settings->settings_modules_leads) }}
                                                    class="filled-in chk-col-light-blue">
                                                <label class="m-0 p-0" for="settings_modules_leads"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>





                                <!--time_tracking-->
                                <tr>
                                    <td>@lang('lang.time_tracking') - <small>(@lang('lang.linked_to_tasks'))</small></td>
                                    <td>
                                        <div class="form-group form-group-checkbox m-0 p-0">
                                            <div class="col-2 text-right m-0 p-0">
                                                <input type="checkbox" id="settings_modules_timetracking" name="settings_modules_timetracking" {{ runtimePrechecked($settings->settings_modules_timetracking) }}
                                                    class="filled-in chk-col-light-blue">
                                                <label class="m-0 p-0" for="settings_modules_timetracking"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!--spaces-- [FUTURE] also enable in SettingsRepository
                                                                                                                      <tr>
                                                                                                                          <td>@lang('lang.spaces')</td>
                                                                                                                          <td>
                                                                                                                              <div class="form-group form-group-checkbox m-0 p-0">
                                                                                                                                  <div class="col-2 text-right m-0 p-0">
                                                                                                                                      <input type="checkbox" id="settings_modules_spaces" name="settings_modules_spaces"
                                                                                                                                          {{ runtimePrechecked($settings->settings_modules_spaces) }}
                                                                                                                                          class="filled-in chk-col-light-blue">
                                                                                                                                      <label class="m-0 p-0" for="settings_modules_spaces"></label>
                                                                                                                                  </div>
                                                                                                                              </div>
                                                                                                                          </td>
                                                                                                                      </tr>
                                                                                                                  -->

                                <!--reminders-->
                                <tr>
                                    <td>@lang('lang.reminders')</td>
                                    <td>
                                        <div class="form-group form-group-checkbox m-0 p-0">
                                            <div class="col-2 text-right m-0 p-0">
                                                <input type="checkbox" id="settings_modules_reminders" name="settings_modules_reminders" {{ runtimePrechecked($settings->settings_modules_reminders) }}
                                                    class="filled-in chk-col-light-blue">
                                                <label class="m-0 p-0" for="settings_modules_reminders"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!--calendar-->
                                <tr>
                                    <td>@lang('lang.calendar')</td>
                                    <td>
                                        <div class="form-group form-group-checkbox m-0 p-0">
                                            <div class="col-2 text-right m-0 p-0">
                                                <input type="checkbox" id="settings_modules_calendar" name="settings_modules_calendar" {{ runtimePrechecked($settings->settings_modules_calendar) }}
                                                    class="filled-in chk-col-light-blue">
                                                <label class="m-0 p-0" for="settings_modules_calendar"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>



                            </tbody>
                        </table>





                    </div>
                    <div class="card-footer">


                        <div class="text-right">
                            <button type="submit" id="commonModalSubmitButton" class="btn btn-rounded-x btn-danger waves-effect text-left ajax-request" data-url="{{ url('/settings/modules') }}"
                                data-loading-target="" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">@lang('lang.save_changes')</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>





    </form>
</div>
@endsection