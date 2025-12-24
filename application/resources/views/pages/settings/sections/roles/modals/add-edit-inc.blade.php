<div class="row">
    <div class="col-lg-12">
        <!--title-->
        <div class="form-group row">
            <label class="col-12 text-left control-label col-form-label required">{{ cleanLang(__('lang.role_name')) }}</label>
            <div class="col-12">
                <input type="text" class="form-control form-control-sm" id="role_name" name="role_name" value="{{ $role->role_name ?? '' }}">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered w-99">
                <thead>
                    <tr>
                        <th>{{ cleanLang(__('lang.resource')) }}</th>
                        <th id="fx-settings-roles-th-1">
                            {{ cleanLang(__('lang.permissions')) }}
                            <span class="align-middle text-themecontrast font-16" data-toggle="tooltip" title="{{ cleanLang(__('lang.edit_delete_permission_only_for_user')) }}" data-placement="top"><i
                                    class="ti-info-alt"></i></span>
                        </th>
                        <th class="text-center">{{ cleanLang(__('lang.global')) }} <span class="align-middle text-themecontrast font-16" data-toggle="tooltip" title="{{ cleanLang(__('lang.roles_scope_info')) }}"
                                data-placement="top"><i class="ti-info-alt"></i></span></th>
                    </tr>
                </thead>
                <tbody>

                    <!--projects-->
                    <tr>
                        <td>{{ cleanLang(__('lang.projects')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_projects" data-allow-clear="false">
                                        <option value="0" {{ runtimePreselected($role->role_projects ?? '', 0) }}>
                                            {{ cleanLang(__('lang.none')) }}
                                        </option>
                                        <option value="1" {{ runtimePreselected($role->role_projects ?? '', 1) }}>
                                            {{ cleanLang(__('lang.view')) }}
                                        </option>
                                        <option value="2" {{ runtimePreselected($role->role_projects ?? '', 2) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }}
                                        </option>
                                        <option value="3" {{ runtimePreselected($role->role_projects ?? '', 3) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }} +
                                            {{ cleanLang(__('lang.delete')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_projects_scope" name="role_projects_scope" class="filled-in chk-col-light-blue" {{ runtimePrechecked($role->role_projects_scope ?? '') }}>
                                    <label for="role_projects_scope"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--projects templates-->
                    <tr>
                        <td>{{ cleanLang(__('lang.project_templates')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_templates_projects" data-allow-clear="false">
                                        <option value="0" {{ runtimePreselected($role->role_templates_projects ?? '', 0) }}>
                                            {{ cleanLang(__('lang.none')) }}
                                        </option>
                                        <option value="1" {{ runtimePreselected($role->role_templates_projects ?? '', 1) }}>
                                            {{ cleanLang(__('lang.view')) }}
                                        </option>
                                        <option value="2" {{ runtimePreselected($role->role_templates_projects ?? '', 2) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }}
                                        </option>
                                        <option value="3" {{ runtimePreselected($role->role_templates_projects ?? '', 3) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }} +
                                            {{ cleanLang(__('lang.delete')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_projects_scope" name="role_templates_projects_scope" class="filled-in chk-col-light-blue" checked disabled>
                                    <label for="role_templates_projects_scope"></label>
                                </div>
                            </div>
                        </td>
                    </tr>



                    <!--team-->
                    <tr>
                        <td>{{ cleanLang(__('lang.team')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_team" data-allow-clear="false">
                                        <option value="0" {{ runtimePreselected($role->role_team ?? '', 0) }}>
                                            {{ cleanLang(__('lang.none')) }}
                                        </option>
                                        <option value="1" {{ runtimePreselected($role->role_team ?? '', 1) }}>
                                            {{ cleanLang(__('lang.view')) }}
                                        </option>
                                        <option value="3" {{ runtimePreselected($role->role_team ?? '', 3) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }} +
                                            {{ cleanLang(__('lang.delete')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_team_scope" name="role_team_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_team_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--leads-->
                    <tr>
                        <td>{{ cleanLang(__('lang.leads')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_leads" data-allow-clear="false">
                                        <option value="0" {{ runtimePreselected($role->role_leads ?? '', 0) }}>
                                            {{ cleanLang(__('lang.none')) }}
                                        </option>
                                        <option value="1" {{ runtimePreselected($role->role_leads ?? '', 1) }}>
                                            {{ cleanLang(__('lang.view')) }}
                                        </option>
                                        <option value="2" {{ runtimePreselected($role->role_leads ?? '', 2) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }}
                                        </option>
                                        <option value="3" {{ runtimePreselected($role->role_leads ?? '', 3) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }} +
                                            {{ cleanLang(__('lang.delete')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_leads_scope" name="role_leads_scope" class="filled-in chk-col-light-blue" {{ runtimePrechecked($role->role_leads_scope ?? '') }}>
                                    <label for="role_leads_scope"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--tasks-->
                    <tr>
                        <td>{{ cleanLang(__('lang.tasks')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_tasks" data-allow-clear="false">
                                        <option value="0" {{ runtimePreselected($role->role_tasks ?? '', 0) }}>
                                            {{ cleanLang(__('lang.none')) }}
                                        </option>
                                        <option value="1" {{ runtimePreselected($role->role_tasks ?? '', 1) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }}
                                        </option>
                                        <option value="2" {{ runtimePreselected($role->role_tasks ?? '', 2) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }}
                                        </option>
                                        <option value="3" {{ runtimePreselected($role->role_tasks ?? '', 3) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }} +
                                            {{ cleanLang(__('lang.delete')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_tasks_scope" name="role_tasks_scope" class="filled-in chk-col-light-blue" {{ runtimePrechecked($role->role_tasks_scope ?? '') }}>
                                    <label for="role_tasks_scope"></label>
                                </div>
                            </div>
                        </td>
                    </tr>



                    <!--timesheets-->
                    <tr>
                        <td>{{ cleanLang(__('lang.time_sheets')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_timesheets" data-allow-clear="false">
                                        <option value="0" {{ runtimePreselected($role->role_timesheets ?? '', 0) }}>
                                            {{ cleanLang(__('lang.none')) }}
                                        </option>
                                        <option value="1" {{ runtimePreselected($role->role_timesheets ?? '', 1) }}>
                                            {{ cleanLang(__('lang.view')) }}
                                        </option>
                                        <option value="2" {{ runtimePreselected($role->role_timesheets ?? '', 2) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.delete')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_timesheets_scope" name="role_timesheets_scope" class="filled-in chk-col-light-blue" {{ runtimePrechecked($role->role_timesheets_scope ?? '') }}>
                                    <label for="role_timesheets_scope"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--Clients-->
                    <tr>
                        <td>{{ cleanLang(__('lang.clients')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_clients" data-allow-clear="false">
                                        <option value="0" {{ runtimePreselected($role->role_clients ?? '', 0) }}>
                                            {{ cleanLang(__('lang.none')) }}
                                        </option>
                                        <option value="1" {{ runtimePreselected($role->role_clients ?? '', 1) }}>
                                            {{ cleanLang(__('lang.view')) }}
                                        </option>
                                        <option value="2" {{ runtimePreselected($role->role_clients ?? '', 2) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }}
                                        </option>
                                        <option value="3" {{ runtimePreselected($role->role_clients ?? '', 3) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }} +
                                            {{ cleanLang(__('lang.delete')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_clients_scope" name="role_clients_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_clients_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--Contacts-->
                    <tr>
                        <td>{{ cleanLang(__('lang.contacts')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_contacts" data-allow-clear="false">
                                        <option value="0" {{ runtimePreselected($role->role_contacts ?? '', 0) }}>
                                            {{ cleanLang(__('lang.none')) }}
                                        </option>
                                        <option value="1" {{ runtimePreselected($role->role_contacts ?? '', 1) }}>
                                            {{ cleanLang(__('lang.view')) }}
                                        </option>
                                        <option value="2" {{ runtimePreselected($role->role_contacts ?? '', 2) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }}
                                        </option>
                                        <option value="3" {{ runtimePreselected($role->role_contacts ?? '', 3) }}>
                                            {{ cleanLang(__('lang.view')) }} + {{ cleanLang(__('lang.add')) }} +
                                            {{ cleanLang(__('lang.edit')) }} +
                                            {{ cleanLang(__('lang.delete')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0  w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_contacts_scope" name="role_contacts_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_contacts_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>


                    <!--assigned projects-->
                    <tr>
                        <td>{{ cleanLang(__('lang.assign_projects')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_assign_projects" data-allow-clear="false">
                                        <option value=no" {{ runtimePreselected($role->role_assign_projects ?? '', 'no') }}>
                                            {{ cleanLang(__('lang.no')) }}
                                        </option>
                                        <option value="yes" {{ runtimePreselected($role->role_assign_projects ?? '', 'yes') }}>
                                            {{ cleanLang(__('lang.yes')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_assign_projects_scope" name="role_assign_projects_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_assign_projects_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--assign leads-->
                    <tr>
                        <td>{{ cleanLang(__('lang.assign_leads')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_assign_leads" data-allow-clear="false">
                                        <option value="no" {{ runtimePreselected($role->role_assign_leads ?? '', 'no') }}>
                                            {{ cleanLang(__('lang.no')) }}
                                        </option>
                                        <option value="yes" {{ runtimePreselected($role->role_assign_leads ?? '', 'yes') }}>
                                            {{ cleanLang(__('lang.yes')) }}
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_assign_leads_scope" name="role_assign_leads_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_assign_leads_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--assign tasks-->
                    <tr>
                        <td>{{ cleanLang(__('lang.assign_tasks')) }}</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_assign_tasks" data-allow-clear="false">
                                        <option value="no" {{ runtimePreselected($role->role_assign_tasks ?? '', 'no') }}>
                                            {{ cleanLang(__('lang.no')) }}
                                        </option>
                                        <option value="yes" {{ runtimePreselected($role->role_assign_tasks ?? '', 'yes') }}>
                                            {{ cleanLang(__('lang.yes')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_assign_tasks_scope" name="role_assign_tasks_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_assign_tasks_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--set project permissions-->
                    <tr>
                        <td>{{ cleanLang(__('lang.set_project_permissions')) }} <span class="align-middle text-themecontrast font-16" data-toggle="tooltip"
                                title="{{ cleanLang(__('lang.all_setting_permissions_when_adding_project')) }}" data-placement="top"><i class="ti-info-alt"></i></span></td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_set_project_permissions" data-allow-clear="false">
                                        <option value=no" {{ runtimePreselected($role->role_set_project_permissions ?? '', 'no') }}>
                                            {{ cleanLang(__('lang.no')) }}
                                        </option>
                                        <option value="yes" {{ runtimePreselected($role->role_set_project_permissions ?? '', 'yes') }}>
                                            {{ cleanLang(__('lang.yes')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_set_project_permissions_scope" name="role_set_project_permissions_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_set_project_permissions_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--import content-->
                    <tr>
                        <td>@lang('lang.import_content')</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_content_import" data-allow-clear="false">
                                        <option value="no" {{ runtimePreselected($role->role_content_import ?? '', 'no') }}>
                                            {{ cleanLang(__('lang.no')) }}
                                        </option>
                                        <option value="yes" {{ runtimePreselected($role->role_content_import ?? '', 'yes') }}>
                                            {{ cleanLang(__('lang.yes')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_content_import_scope" name="role_content_import_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_content_import_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!--export content-->
                    <tr>
                        <td>@lang('lang.export_content')</td>
                        <td>
                            <div class="form-group row m-0">
                                <div class="col-12 text-center">
                                    <select class="select2-basic form-control form-control-sm" name="role_content_export" data-allow-clear="false">
                                        <option value="no" {{ runtimePreselected($role->role_content_export ?? '', 'no') }}>
                                            {{ cleanLang(__('lang.no')) }}
                                        </option>
                                        <option value="yes" {{ runtimePreselected($role->role_content_export ?? '', 'yes') }}>
                                            {{ cleanLang(__('lang.yes')) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group form-group-checkbox row m-0 w-98">
                                <div class="col-12 text-center p-t-5">
                                    <input type="checkbox" id="role_content_export_scope" name="role_content_export_scope" class="filled-in chk-col-light-blue" disabled checked="checked">
                                    <label for="role_content_export_scope" data-toggle="tooltip" title="{{ cleanLang(__('lang.can_only_be_set_as_global')) }}"></label>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>