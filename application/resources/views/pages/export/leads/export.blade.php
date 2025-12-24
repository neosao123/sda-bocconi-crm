<!-- right-sidebar -->
<div class="right-sidebar right-sidebar-export sidebar-lg" id="sidepanel-export-leads">
  <form>
    <div class="slimscrollright">
      <!--title-->
      <div class="rpanel-title">
        <i class="ti-export display-inline-block m-t--11 p-r-10"></i>{{ cleanLang(__('lang.export_leads')) }}
        <span>
          <i class="bi bi-x-circle js-toggle-side-panel" data-target="sidepanel-export-leads"></i>
        </span>
      </div>
      <!--title-->
      <!--body-->
      <div class="r-panel-body p-l-35 p-r-35">

        <!--standard fields-->
        <div class="">
          <h5>@lang('lang.standard_fields')</h5>
        </div>
        <div class="line"></div>
        <div class="row">

          {{-- ID --}}
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_id]" name="standard_field[lead_id]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_id]">@lang('lang.id')</label>
              </div>
            </div>
          </div>


          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_contact_name]" name="standard_field[lead_contact_name]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_contact_name]">@lang('lang.contact_name')</label>
              </div>
            </div>
          </div>

          {{-- Lead --}}
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_title]" name="standard_field[lead_title]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_title]">@lang('lang.title')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_type]" name="standard_field[lead_type]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_type]">@lang('lang.lead_type')</label>
              </div>
            </div>
          </div>

          {{-- Client --}}
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_created]" name="standard_field[lead_created]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_created]">@lang('lang.created')</label>
              </div>
            </div>
          </div>

          {{-- Quotation --}}
          {{-- <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_value]" name="standard_field[lead_value]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_value]">@lang('lang.value')</label>
              </div>
            </div>
          </div> --}}

          {{-- Date --}}
          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_status]" name="standard_field[lead_status]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_status]">@lang('lang.status')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_assigned]" name="standard_field[lead_assigned]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_assigned]">@lang('lang.assigned')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_categoryid]" name="standard_field[lead_categoryid]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_categoryid]">@lang('lang.category')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_company_name]" name="standard_field[lead_company_name]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_company_name]">@lang('lang.company')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_email]" name="standard_field[lead_email]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_email]">@lang('lang.email')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_phone]" name="standard_field[lead_phone]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_phone]">@lang('lang.phone')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_job_position]" name="standard_field[lead_job_position]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_job_position]">@lang('lang.position')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_city]" name="standard_field[lead_city]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_city]">@lang('lang.city')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_state]" name="standard_field[lead_state]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_state]">@lang('lang.state')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_zip]" name="standard_field[lead_zip]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_zip]">@lang('lang.zipcode')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_country]" name="standard_field[lead_country]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_country]">@lang('lang.country')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_vat]" name="standard_field[lead_vat]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_vat]">@lang('lang.vat_tax_number')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_last_contacted]" name="standard_field[lead_last_contacted]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_last_contacted]">@lang('lang.last_contacted')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_converted_date]" name="standard_field[lead_converted_date]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_converted_date]">@lang('lang.date_converted')</label>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group form-group-checkbox row">
              <div class="col-12 p-t-5">
                <input type="checkbox" id="standard_field[lead_source]" name="standard_field[lead_source]" class="filled-in chk-col-light-blue" checked="checked">
                <label class="p-l-30" for="standard_field[lead_source]">@lang('lang.source')</label>
              </div>
            </div>
          </div>

        </div>


        <div class="m-t-30">
          <h5>@lang('lang.custom_fields')</h5>
        </div>
        <div class="line"></div>
        <div class="row">
          @foreach ($fields as $field)
            @if ($field['customfields_status'] === 'enabled')
              <div class="col-sm-12 col-lg-6">
                <div class="form-group form-group-checkbox row">
                  <div class="col-12 p-t-5">
                    <input type="checkbox" id="custom_field[{{ $field->customfields_name }}]" name="custom_field[{{ $field->customfields_name }}]" class="filled-in chk-col-light-blue"
                      checked="checked">
                    <label class="p-l-30" for="custom_field[{{ $field->customfields_name }}]">{{ $field->customfields_title }}</label>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>

        <!--buttons-->
        <div class="buttons-block">
          <button type="button" class="btn btn-rounded-x btn-danger js-ajax-ux-request apply-filter-button" id="export-leads-button" data-url="{{ urlResource('/export/leads?') }}"
            data-type="form" data-ajax-type="POST" data-button-loading-annimation="yes">@lang('lang.export')</button>
        </div>
      </div>
  </form>
</div>
<!--sidebar-->
