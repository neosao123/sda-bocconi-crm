@extends('pages.settings.ajaxwrapper')
@section('settings-page')
  @include('pages.settings.sections.techstack.components.misc.list-page-actions')

  @include('pages.settings.sections.techstack.table.table')
@endsection
