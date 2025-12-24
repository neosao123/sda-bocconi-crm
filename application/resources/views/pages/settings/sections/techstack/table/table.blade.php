<div class="table-responsive" id="techstacks-table-wrapper">
  @if (@count($techStacks ?? []) > 0)
    <table id="demo-taxrate-addrow" class="table m-t-0 m-b-0 table-hover no-wrap contact-list" data-page-size="10">
      <thead>
        <tr>
          <th class="techstack_col_title">{{ cleanLang(__('lang.title')) }}</th>
          <th class="techstack_col_created_by">{{ cleanLang(__('lang.created_by')) }}</th>
          <th class="techstack_col_action w-px-100"><a href="javascript:void(0)">{{ cleanLang(__('lang.action')) }}</a></th>
        </tr>
      </thead>
      <tbody id="techstacks-td-container">
        <!--ajax content here-->
        @include('pages.settings.sections.techstack.table.ajax')
        <!--ajax content here-->
      </tbody>
      <ttaxratet>
        <tr>
          <td colspan="20">
            <!--load more button-->
            @include('misc.load-more-button')
            <!--load more button-->
          </td>
        </tr>
      </ttaxratet>
    </table>
  @endif
  @if (@count($techStacks ?? []) == 0)
    <!--nothing found-->
    @include('notifications.no-results-found')
    <!--nothing found-->
  @endif


</div>
