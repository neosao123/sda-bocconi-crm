<!--item-->
<div class="form-group row">
    <label class="col-sm-12 text-left control-label col-form-label"><?php echo app('translator')->get('lang.home_page'); ?></label>
    <div class="col-sm-12">
        <select class="select2-basic form-control form-control-sm select2-preselected" id="role_homepage"
            name="role_homepage" data-preselected="<?php echo e($role->role_homepage ?? ''); ?>">
            <option></option>
            <option value="dashboard"><?php echo app('translator')->get('lang.dashboard'); ?></option>
            <option value="clients"><?php echo app('translator')->get('lang.clients'); ?></option>
            <option value="projects"><?php echo app('translator')->get('lang.projects'); ?></option>
            <option value="tasks"><?php echo app('translator')->get('lang.tasks'); ?></option>
            <option value="leads"><?php echo app('translator')->get('lang.leads'); ?></option>
        </select>
    </div>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/settings/sections/roles/modals/homepage.blade.php ENDPATH**/ ?>