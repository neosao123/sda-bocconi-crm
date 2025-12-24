@extends('layout.wrapper')
@section('content')
    <!--calender js [nextloop]-->
    <script src="{{ url('/public/js/calendar/calendar.js?v=' . time()) }}"></script>

    <!-- main content -->
    <div class="container-fluid">

        <!-- page content -->
        <div class="row">
            <div class="col-12" id="calendar-container">
                @include('pages.calendar.calendar')
            </div>
        </div>

        <!--a void space for dynamic rendering-->
        <div id="calendar-dynamic-render"></div>

    </div>
    <!--main content -->
@endsection
