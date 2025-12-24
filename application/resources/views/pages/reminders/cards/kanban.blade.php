<div class="card-a-reminder kanban-card-view {{ $reminder->reminder_status }} m-b-10 m-t-10" id="reminder_card_view_{{ $reminder->reminder_id }}">
    <div class="x-top clearfix">
        <div class="x-icon">
    
        <ion-icon name="alarm-outline" class="m-t--4 p-r-6"></ion-icon>
    </div>
        <div class="x-content">
            <div class="x-time">{{ runtimeTime($reminder->reminder_datetime) }}</div>
            <div class="x-date">{{ runtimeDate($reminder->reminder_datetime) }}</div>
        </div>
    </div>
    <div class="x-title">{{ $reminder->reminder_title }}</div>
</div>