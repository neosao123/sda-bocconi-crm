<div class="form-group row">
    <label for="example-month-input" class="col-12 col-form-label text-left"><?php echo e(cleanLang(__('lang.category'))); ?></label>
    <div class="col-12">
        <select class="select2-basic form-control form-control-sm" id="category"
            name="category">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->category_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/misc/change-category.blade.php ENDPATH**/ ?>