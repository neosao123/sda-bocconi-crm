<div class="row">
  <div class="col-lg-12">
    <div class="form-group row">
      <label class="col-12 text-left control-label col-form-label">{{ cleanLang(__('lang.title')) }}*</label>
      <div class="col-12">
        <input type="text" class="form-control form-control-sm" id="techstack_title" name="techstack_title" value="{{ $techStacks->tech_stack_title ?? '' }}">
      </div>
    </div>
  </div>
</div>
