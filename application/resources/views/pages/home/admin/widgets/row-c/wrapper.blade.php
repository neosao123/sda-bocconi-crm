<div class="row">

  <!--TIMELINE-->
  <div class="col-lg-8  col-md-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ cleanLang(__('lang.latest_activity')) }}</h5>
        <div class="dashboard-events profiletimeline" id="dashboard-admin-events">
          @php $events = $payload['all_events'] ; @endphp
          @include('pages.timeline.components.misc.ajax')
        </div>
        <!--load more-->
      </div>
    </div>
  </div>

  <!--PROJECTS-->
  <div class="col-lg-4  col-md-12">
    <div class="card">
      <div class="card card-body mailbox m-b-0">
        <h5 class="card-title">{{ cleanLang(__('lang.projects')) }}</h5>
        <div class="message-center dashboard-projects-admin">
          <!-- not started -->
          <a href="javascript:void(0)">
            <div class="btn label-default ">{{ $payload['all_projects']['not_started'] }}</div>
            <div class="mail-contnet">
              <h5>{{ cleanLang(__('lang.not_started')) }}</h5> <span
                class="mail-desc">{{ cleanLang(__('lang.assigned_to_me')) }}:
                <strong>{{ $payload['my_projects']['not_started'] }}</strong></span>
            </div>
          </a>

          <!-- in progress -->
          <a href="javascript:void(0)">
            <div class="btn btn-info ">{{ $payload['all_projects']['in_progress'] }}</div>
            <div class="mail-contnet">
              <h5>{{ cleanLang(__('lang.in_progress')) }}</h5> <span
                class="mail-desc">{{ cleanLang(__('lang.assigned_to_me')) }}:
                <strong>{{ $payload['my_projects']['in_progress'] }}</strong></span>
            </div>
          </a>

          <!-- on hold -->
          <a href="javascript:void(0)">
            <div class="btn btn-warning ">{{ $payload['all_projects']['on_hold'] }}</div>
            <div class="mail-contnet">
              <h5>{{ cleanLang(__('lang.on_hold')) }}</h5> <span
                class="mail-desc">{{ cleanLang(__('lang.assigned_to_me')) }}:
                <strong>{{ $payload['my_projects']['on_hold'] }}</strong></span>
            </div>
          </a>


          <!-- completed -->
          <a href="javascript:void(0)">
            <div class="btn btn-success ">{{ $payload['all_projects']['completed'] }}</div>
            <div class="mail-contnet">
              <h5>{{ cleanLang(__('lang.completed')) }}</h5> <span
                class="mail-desc">{{ cleanLang(__('lang.assigned_to_me')) }}:
                <strong>{{ $payload['my_projects']['completed'] }}</strong></span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>


</div>
