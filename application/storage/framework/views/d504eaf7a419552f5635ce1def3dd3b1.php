<!--folders list view-->
<div class="folders-add-view" id="folders-add-view">

    <!--item-->
    <div class="form-group row">
        <label class="col-12 text-left control-label col-form-label"><?php echo app('translator')->get('lang.name'); ?></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="filefolder_name" name="filefolder_name"
                value="">
        </div>
    </div>


    <!--form buttons-->
    <div class="text-right">
        <button type="submit" id="folders-add-button-submit"
            class="btn btn-default btn-xs waves-effect text-left ajax-request"
            data-url="<?php echo e(urlResource('/files/folders/show')); ?>" data-type="form" data-form-id="folders-add-view"
            data-ajax-type="get" 
            data-button-loading-annimation="yes"
            data-on-start-submit-button="disable"><?php echo app('translator')->get('lang.cancel'); ?></button>

            

        <button type="submit" id="folders-add-button-submit"
            class="btn btn-danger btn-xs waves-effect text-left ajax-request"
            data-url="<?php echo e(urlResource('/files/folders/create')); ?>" 
            data-type="form" 
            data-form-id="folders-add-view"
            data-ajax-type="post" 
            data-button-loading-annimation="yes"
            data-on-start-submit-button="disable"><?php echo app('translator')->get('lang.submit'); ?></button>
    </div>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/files/components/folders/add.blade.php ENDPATH**/ ?>