<!--each category-->
<div class="x-each-category <?php echo e($files['search_type'] ?? 'all'); ?>">

    <!--heading-->
    <?php if($files['search_type'] == 'all'): ?>
    <div class="x-heading clearfix">
        <span class="pull-left x-title">
            <?php echo app('translator')->get('lang.files'); ?>
        </span>
        <span class="pull-right x-count">
            <a href="javascript:void(0);" class="ajax-request" data-url="<?php echo e(url('search?search_type=files')); ?>"
                data-type="form" data-form-id="global-search-form" data-ajax-type="post"
                data-loading-target="global-search-form" name="search_query"><?php echo app('translator')->get('lang.view_all'); ?>
                (<?php echo e($files['count']); ?>)</a>
        </span>
    </div>
    <?php endif; ?>

    <!--results-->
    <ul>

        <!-- each result -->
        <?php $__currentLoopData = $files['results']->take(runtimeSearchDisplyLimit($files['search_type'])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="files">
            <a href="javascript:void(0);">
                <!--icon-->
                <span class="x-icon">
                    <i class="sl-icon-cloud-download"></i>
                </span>
                <!--title-->
                <span class="x-title">
                    <a href="<?php echo e(url('files/download?file_id='.$file->file_uniqueid)); ?>"
                        download><?php echo e($file->file_filename); ?></a>
                </span>
                <!--matched  on tags-->
                <?php if($file->tags->isNotEmpty() && $file->tags->contains('tag_title', $search_query)): ?>
                <span class="ti-bookmark x-tag-match" title="<?php echo app('translator')->get('lang.matched_tags'); ?>" data-toggle="tooltip"></span>
                <?php endif; ?>
                <!--meta-->
                <span class="x-meta">
                    <?php if($file->fileresource_type == 'project'): ?>
                    - <?php echo e(str_limit($file->project_title ?? '', 50)); ?>

                    <?php endif; ?>
                    <?php if($file->fileresource_type == 'client'): ?>
                    - <?php echo e(str_limit($file->client_company_name ?? '', 50)); ?>

                    <?php endif; ?>
                </span>

            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!--ajax loading-->

    </ul>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/search/results/files.blade.php ENDPATH**/ ?>