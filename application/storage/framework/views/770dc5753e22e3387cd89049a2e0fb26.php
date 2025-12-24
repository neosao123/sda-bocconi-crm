<div class="row">
    <div class="col-lg-12">
        <?php if(isset($page['section']) && $page['section'] == 'create'): ?>
        <div class="form-group row">
            <label for="example-month-input" class="col-12 col-form-label text-left"><?php echo e(cleanLang(__('lang.resource_type'))); ?></label>
            <div class="col-12">
                <select class="select2-basic form-control form-control-sm" id="tagresource_type"
                    name="tagresource_type">
                    <option></option>
                    <?php $__currentLoopData = $resource_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type); ?>"><?php echo e(runtimeLang($type)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <?php endif; ?>
        <!--title-->
        <div class="form-group row">
            <label class="col-12 text-left control-label col-form-label">Tag <?php echo e(cleanLang(__('lang.title'))); ?></label>
            <div class="col-12">
                <input type="text" class="form-control form-control-sm" id="tag_title" name="tag_title"
                    value="<?php echo e($tag->tag_title ?? ''); ?>">
            </div>
        </div>
        <!--pass source-->
        <input type="hidden" name="source" value="<?php echo e(request('source')); ?>">
        <!--notes-->
        <?php if(isset($page['section']) && $page['section'] == 'create'): ?>
        <div class="row">
            <div class="col-12">
                <div><small><?php echo e(cleanLang(__('lang.tags_available_to_all_users'))); ?></small></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/tags/components/modals/add-edit-inc.blade.php ENDPATH**/ ?>