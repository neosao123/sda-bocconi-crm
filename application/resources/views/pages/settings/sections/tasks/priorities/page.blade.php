@extends('pages.settings.ajaxwrapper')
@section('settings-page')
<!-- action buttons -->
@include('pages.settings.sections.tasks.misc.list-page-actions')
<!-- action buttons -->

<!--heading-->
@include('pages.settings.sections.tasks.priorities.table')


 

@endsection