<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12  col-lg-6 align-self-center text-right parent-page-actions p-b-9"
    id="list-page-actions-container-contracts">
    <div id="list-page-actions">


        <!--reminder-->
        @if(config('visibility.modules.reminders'))
        <button type="button" data-toggle="tooltip" title="{{ cleanLang(__('lang.reminder')) }}"
            id="reminders-panel-toggle-button"
            class="reminder-toggle-panel-button list-actions-button btn btn-page-actions ti-alarm-clock-border waves-effect waves-dark js-toggle-reminder-panel ajax-request {{ $document->reminder_status }}"
            data-url="{{ url('reminders/start?resource_type='.$document->doc_type.'&resource_id='.$document->doc_id) }}"
            data-loading-target="reminders-side-panel-body" data-progress-bar='hidden'
            data-target="reminders-side-panel" data-title="@lang('lang.my_reminder')" >
            <ion-icon name="alarm-outline"  class="clock"></ion-icon>
        </button>
        @endif

        <!--print-->
        <a data-toggle="tooltip" title="@lang('lang.print')"
            href="{{ url('contracts/'.$document->doc_id.'?render=print') }}" target="_blank"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark print-border" >
            <ion-icon name="print-outline" class="print"></ion-icon>
        </a>
    </div>

</div>