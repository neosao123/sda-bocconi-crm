@foreach ($sections as $section)
  <!--each row-->
  <tr id="section_{{ $section->section_id }}">

    <!--tableconfig_column_1 [section_id]-->
    <td class="sections_col_id {{ config('table.tableconfig_column_1') }} tableconfig_column_1"
      id="sections_col_id_{{ $section->section_id }}">
      {{ $section->section_id }}
    </td>

    <!--tableconfig_column_2 [section_name]-->
    <td class="sections_col_company {{ config('table.tableconfig_column_2') }} tableconfig_column_2"
      id="sections_col_id_{{ $section->section_id }}">
      <a href="/sections/{{ $section->section_id ?? '' }}">{{ str_limit($section->section_name, 35) }}</a>
    </td>

    <!--actions-->
    @if (config('visibility.action_column'))
      <td class="sections_col_action actions_column" id="sections_col_action_{{ $section->section_id }}">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
          <!--delete-->
          @if (config('visibility.action_buttons_delete'))
            <button type="button" title="{{ cleanLang(__('lang.delete')) }}"
              class="data-toggle-action-tooltip btn btn-outline-danger sl-icon-trash-border btn-circle btn-sm confirm-action-danger"
              data-confirm-title="{{ cleanLang(__('lang.delete_section')) }}"
              data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}" data-ajax-type="DELETE"
              data-url="{{ url('/sections/' . $section->section_id) }}"  >
              <i class="bi bi-trash3 trash"></i>

            </button>
          @endif
          <!--edit-->
          @if (config('visibility.action_buttons_edit'))
            <button type="button" title="{{ cleanLang(__('lang.edit')) }}"
              class="data-toggle-action-tooltip btn btn-outline-success sl-icon-note-border  btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
              data-toggle="modal" data-target="#commonModal"
              data-url="{{ urlResource('/sections/' . $section->section_id . '/edit') }}"
              data-loading-target="commonModalBody" data-modal-title="{{ cleanLang(__('lang.edit_section')) }}"
              data-action-url="{{ urlResource('/sections/' . $section->section_id . '?ref=list') }}" data-action-method="PUT"
              data-action-ajax-loading-target="sections-td-container">
              <i class="sl-icon-note"></i>
            </button>
          @endif

          <a href="/sections/{{ $section->section_id ?? '' }}" class="btn btn-outline-info btn-circle btn-sm">
            <i class="ti-new-window"></i>
          </a>
        </span>
        <!--action button-->
        <!--more button (hidden)-->
        <span class="list-table-action dropdown hidden font-size-inherit">
          <button type="button" id="listTableAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            class="btn btn-outline-default-light btn-circle btn-sm">
            <i class="ti-more"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="listTableAction">
            <a class="dropdown-item" href="javascript:void(0)">
              <i class="ti-new-window"></i> {{ cleanLang(__('lang.view_details')) }}</a>
          </div>
        </span>
        <!--more button-->
      </td>
    @endif

  </tr>
@endforeach
<!--each row-->
