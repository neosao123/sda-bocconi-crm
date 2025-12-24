<!--update an existing event as sent by the backend-->
<script>
    var event_id = "<?php echo e($event_id); ?>";

    // Find and update the event
    var calendar_event = NX.calendar.getEventById(event_id);

    //remove the event
    if (calendar_event) {
        calendar_event.remove();
    }
</script><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/calendar/components/dynamic/delete-event.blade.php ENDPATH**/ ?>