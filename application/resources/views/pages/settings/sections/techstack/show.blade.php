@extends('pages.settings.ajaxwrapper')
@section('settings-page')
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-9 col-md-12">
          <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">{{ __('lang.title') }}</label>
            <div class="col-sm-12 col-lg-9">
              <input type="text" class="form-control form-control-sm" value="{{ $deliverable->deliverable_title }}" placeholder="" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">{{ __('lang.tech_stacks') }}</label>
            <div class="col-sm-12 col-lg-9">
              {{ showDeliverablesTechStacks($deliverable, true) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
