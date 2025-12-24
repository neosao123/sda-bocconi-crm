
<?php $__env->startSection('settings-page'); ?>
  <style>
    .hsncode-list .list-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .hsncode-list .list-item {
      background-color: #f8f9fa;
      border: 1px solid #ced4da;
      border-radius: 4px;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      font-size: 1rem;
      font-weight: 600;
    }

    .hsncode-list .remove-btn {
      margin-left: 15px;
      width: 1.6rem;
      height: 1.6rem;
      font-size: .85rem;
      font-weight: 600;
    }

    .hsncode-list .remove-btn:focus,
    .hsncode-list .remove-btn:active {
      border: none;
      outline: none;
    }
  </style>


  <div class="row gx-3">
    
    <div class="col-md-5">
      <?php echo $__env->make('pages.settings.sections.hsncodes.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    <div class="col-md-7">
      <?php echo $__env->make('pages.settings.sections.hsncodes.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Variable Declaration
      const baseUrl = "<?php echo e(url('/')); ?>";
      const addHsncodes = $("#addHsncodes");
      var hsnCodes = {
        'information-technology': [{
            code: '998313',
            name: 'IT Software development services'
          },
          {
            code: '998314',
            name: 'IT Technical support services'
          }
        ],
        'research-and-development': [{
            code: '998312',
            name: 'Research in computer related sciences'
          },
          {
            code: '998315',
            name: 'Development of computer-related technologies'
          }
        ]
      };

      // List on Page Load
      show_hsn_code_list();
      // On change event for getting hsncode list using hsn service type
      $('#hsn_service_type').on('change', function() {
        var serviceType = $(this).val();
        var $hsnCodeDropdown = $('#hsn_sac_code');
        $hsnCodeDropdown.empty();
        $hsnCodeDropdown.append('<option value="0">Select HSN Code</option>');
        if (hsnCodes[serviceType]) {
          $.each(hsnCodes[serviceType], function(index, hsnCodes) {
            $hsnCodeDropdown.append('<option value="' + hsnCodes.code + '">' + hsnCodes.code + '</option>');
          });
        }
      });
      // On Click event for Add HSN Button
      addHsncodes.on("click", function() {
        var formData = new FormData($("form#add-hsn")[0]);
        formData.append("_token", "<?php echo e(csrf_token()); ?>");
        var formUrl = baseUrl + "/settings/hsncodes";
        $.ajax({
          type: "POST",
          url: formUrl,
          data: formData,
          dataType: "JSON",
          processData: false,
          contentType: false,
          beforeSend: function() {
            addHsncodes.prop("disabled", true);
          },
          success: function(response) {
            let hsn_list = response.hsncoderepo;
            updateOptions(hsn_list);
            resetForm();
            addHsncodes.prop("disabled", false);
            if (response.notification) {
              let type = response?.notification?.type;
              let message = response?.notification?.value;
              sendToastNotification(type, message);
            }
          },
          error: function(error) {
            let err = error.responseJSON;
            if (err.notification) {
              let type = err?.notification?.type;
              let message = err?.notification?.value;
              sendToastNotification(type, message);
            }
            addHsncodes.removeAttr("disabled", false);
            return false;
          },
        });
      });
    });

    //   Show HSN Code List on Page Load
    function show_hsn_code_list() {
      let hsncoderepo = <?php echo json_encode($hsncoderepo, 15, 512) ?>;
      $.each(hsncoderepo, function(index, item) {
        var $listItem = $('<div class="list-item"></div>').text(item.hsncode_number);
        var $removeBtn = $(`<button type="button"
                  class="remove-btn data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                  data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>"
                  data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                  data-url="<?php echo e(url('/')); ?>/settings/hsncodes/${ item.hsncode_number }"><i class="sl-icon-trash"></i></button>`);
        $listItem.append($removeBtn);
        $('.list-container').append($listItem);
      });
    }

    // Show Updated List When Adding New HSN Code
    function updateOptions(hsn_list) {
      $('.list-container').empty();
      $.each(hsn_list, function(index, item) {
        var $listItem = $('<div class="list-item"></div>').text(item.hsncode_number);
        var $removeBtn = $(`<button type="button"
                  class="remove-btn data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                  data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>"
                  data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                  data-url="<?php echo e(url('/')); ?>/settings/hsncodes/${ item.hsncode_number }"><i class="sl-icon-trash"></i></button>`);
        $listItem.append($removeBtn);
        $('.list-container').append($listItem);
      });
    }

    //  Send Toast Notification
    function sendToastNotification(type, message) {
      if (type && message) {
        NX.notification({
          type: type,
          message: message
        });
      }
    }


    //   Reset Form
    function resetForm() {
      $('#hsn_service_type').val('empty').trigger('change');
      var $hsnCodeDropdown = $('#hsn_sac_code');
      $hsnCodeDropdown.empty();
      $hsnCodeDropdown.append('<option value="0">Select HSN Code</option>');
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/hsncodes/page.blade.php ENDPATH**/ ?>